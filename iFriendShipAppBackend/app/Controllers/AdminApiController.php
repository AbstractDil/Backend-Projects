<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use CodeIgniter\API\ResponseTrait;

// add model 

use App\Models\UserModel;
use App\Models\FormModel;
use App\Models\FormHitCountModel;
use App\Models\PersonalAccessTokenModel;

class AdminApiController extends BaseApiController
{
    use ResponseTrait;
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */

     // get all user from database
     public function getUsers($id = null)
     {
         // Authenticate the admin
         $adminId = $this->authenticateAdmin();
     
         // Check if the authentication failed
         if (is_array($adminId)) {
             return $adminId; // This returns the failure response (e.g., invalid JWT token)
         }
     
         // Ensure the user is an admin and authorized
         if ($adminId != $id) {
             return $this->fail('Unauthorized access: Admin ID mismatch', 403);
         }
     
         // Retrieve all user data from the database
         $userModel = new UserModel();
         //$users = $userModel->findAll();
         $users = $userModel->orderBy('id', 'DESC')->findAll();
     
         // Create an array to hold users with form hit counts
         $result = [];
     
         // Initialize the FormHitCountModel
         $formHitCountModel = new FormHitCountModel();
     
         foreach ($users as $user) {
             // Fetch the form hit count for the user
             $formHits = $formHitCountModel
                 ->select('COUNT(ip_address) as hit_count')
                 ->where('user_form_id', $user['form_id'])
                 ->first();
     
             // Add the hit count to the user data
             $user['form_hit_count'] = $formHits['hit_count'] ?? 0;

              // Append the full URL to the profile_photo_path
           if (!empty($user['profile_photo_path'])) {
            $user['profile_photo_path'] = base_url($user['profile_photo_path']);
        }
     
             // Append the user with form hit count to the result
             $result[] = $user;
         }
     
         // Return the combined user data with form hit counts in JSON format
         return $this->respond([
             'status' => 'success',
             'message' => 'User data with form hit counts retrieved successfully',
             'data' => $result,
         ]);
     }
     

     // update user details including delete a user / unblock a user / account recovery process
     // req_type means request type : 1(update email and name), 2(block a user for a certain time), 3(hard delete), 4(deleted account recovery), 5(unblock user account), 6(temporary delete user account)

     public function updateUserDetails(){
         // Extract request parameters
         $admId = $this->request->getGet('admId');
         $req_type = $this->request->getGet('req_type');
         $uid = $this->request->getGet('uid');
     
         // Authenticate admin and validate access
         $adminId = $this->authenticateAdmin();
         if (is_array($adminId)) {
             return $adminId; // Invalid token or authentication failure
         }
     
         if ($adminId != $admId) {
             return $this->fail('Unauthorized access: Admin ID mismatch', 403);
         }
     
         // Load user model and fetch user
         $userModel = new UserModel();
         $user = $userModel->where('id', $uid)->first();
         if (!$user) {
             return $this->fail('No user found', 404);
         }
     
         // Define handlers for each request type
         $handlers = [
             1 => 'handleUpdateUserDetails',
             2 => 'handleBlockUser',
             3 => 'handleDeleteUser',
             4 => 'handleRestoreDeletedAccount',
             5 => 'handleUnblockUser',
             6 => 'handleTemporarilyDeleteAccount',
             7 => 'handleShowUser',
             8=> 'handlePhotoUpload'
         ];
     
         // Check if handler exists for the given request type
         if (!isset($handlers[$req_type])) {
             return $this->fail('Invalid request type', 400);
         }
     
         // Call the corresponding handler
         return $this->{$handlers[$req_type]}($user);
     }

     // hadnle form actions for admin

     public function formActions(){

         $admId = $this->request->getGet('admId');
         $req_type = $this->request->getGet('req_type');
         $formId = $this->request->getGet('formId');
         $userId = $this->request->getGet('userId');

     
         // Authenticate admin and validate access
         $adminId = $this->authenticateAdmin();
         if (is_array($adminId)) {
             return $adminId; // Invalid token or authentication failure
         }
     
         if ($adminId != $admId) {
             return $this->fail('Unauthorized access: Admin ID mismatch', 403);
         }
     
         // Load user model and fetch user
         $userModel = new UserModel();
         $form = $userModel
                  ->where('id', $userId)
                  ->where('form_id', $formId)
                  ->first();
         if (!$form) {
             return $this->fail('No user found', 404);
         }
     
         // Define handlers for each request type
         $handlers = [
             1 => 'handleAllFormResponses',
             2 => 'handleOneFormResponse',
             3 => 'handleUpdateFormResponse',
             4 => 'handleDeleteFormResponse',

         ];
     
         // Check if handler exists for the given request type
         if (!isset($handlers[$req_type])) {
             return $this->fail('Invalid request type', 400);
         }
     
         // Call the corresponding handler
         return $this->{$handlers[$req_type]}($form);

     }

     // function to get all form responses of a user

     private function handleAllFormResponses($form){

        $page = $this->request->getGet('page') ?? 1; // Default to 1 if not set
        $limit = $this->request->getGet('limit') ?? 10; // Default to 10 if not set
        $order = $this->request->getGet('order') ?? 'DESC'; // Default to DESC if not set

            // Fetch form data model
        $formModel = new FormModel();

        // Define filters and sorting
        //$filters = ['id' => $uid];
        if ($form) {
            $filters['ref_form_id'] = $form['form_id'];
        }

        // Fetch data with pagination
        $data = $formModel
            ->where($filters)
            ->orderBy('created_at', $order)
            ->paginate($limit, 'default', $page);

        // Check if data exists
        if (empty($data)) {
            return $this->failNotFound('No forms found');
        }

        // Return the response
        return $this->respond([
            'status' => 200,
            'message' => 'Forms retrieved successfully',
            'data' => $data,
            'pagination' => $formModel->pager->getDetails()
        ], 200);

     }
     // function to get only one form response for a user

     private function handleOneFormResponse($form) {
        $responseId = $this->request->getGet('responseId');
        
        // Validate response ID
        if (!$responseId || !is_numeric($responseId)) {
            return $this->fail('Invalid Response ID', 400);
        }
    
        // Load the form model
        $formModel = new FormModel();
    
        // Fetch the response data
        $responseData = $formModel
                ->where('form_id', $responseId)
                ->where('ref_form_id', $form['form_id'])
                ->first();
    
        // Check if the response exists
        if (!$responseData) {
            return $this->fail('No response found!', 404);
        }
    
        // Send the response data as JSON
        return $this->respond([
            'status' => 200,
            'message' => 'Response retrieved successfully.',
            'data' => $responseData
        ]);
    }

      // function to modify one form response

      private function handleUpdateFormResponse($form) {
        $responseId = $this->request->getGet('responseId');
        
        // Validate the response ID
        if (!$responseId || !is_numeric($responseId)) {
            return $this->fail('Invalid Response ID', 400);
        }

        // Load the form model
        $formModel = new FormModel();
    
        // Check if the response exists
        //$existingResponse = $formModel->find($responseId);
        $existingResponse = $formModel
        ->where('form_id', $responseId)
        ->where('ref_form_id', $form['form_id'])
        ->first();

        if (!$existingResponse) {
            return $this->fail('Response not found!', 404);
        }
    
       
        // Get raw JSON input and decode it into an array
        $jsonData = $this->request->getJSON(true); // true will return as an associative array
            
        // Fallback to form data if JSON is empty (for form-data requests)
        $input = $jsonData ? $jsonData : $this->request->getPost();

        // Define validation rules
        $rules = [
            'ques_1' => 'required|min_length[2]|max_length[100]',
            'ques_2' => 'required|min_length[2]|max_length[100]',
            'ques_3' => 'required|min_length[2]|max_length[100]',
            'ques_4' => 'required|min_length[2]|max_length[100]',
            'ques_5' => 'required|min_length[2]|max_length[100]',
            'ques_6' => 'required|min_length[2]|max_length[100]',
            'ques_7' => 'required|min_length[2]|max_length[100]',
            'ques_8' => 'required|min_length[2]|max_length[100]',
            'ques_9' => 'required|min_length[2]|max_length[100]',
            'ques_10' => 'required|min_length[2]|max_length[255]',
        ];
    
        // Validate input data
        if (!$this->validate($rules)) {
            return $this->failValidationErrors($this->validator->getErrors());
        }
        // Prepare user data
        $data = [
            'ques_1'  => $input[ 'ques_1' ],
            'ques_2'  => $input[ 'ques_2' ],
            'ques_3'  => $input[ 'ques_3' ],
            'ques_4'  => $input[ 'ques_4' ],
            'ques_5'  => $input[ 'ques_5' ],
            'ques_6'  => $input[ 'ques_6' ],
            'ques_7'  => $input[ 'ques_7' ],
            'ques_8'  => $input[ 'ques_8' ],
            'ques_9'  => $input[ 'ques_9' ],
            'ques_10'  => $input[ 'ques_10' ],
        ];

        
        
            // Update the record
            $updateSuccess = $formModel->update($responseId, $data);
        
            if (!$updateSuccess) {
                return $this->fail('Failed to update the response.', 500);
            }
        
            // Return success response
            return $this->respond([
                'status' => 200,
                'message' => 'Response updated successfully.',
                'data' => $formModel->find($responseId) // Return updated data
            ]);
    }

    // handle delete form response

    private function handleDeleteFormResponse($form)
    {
        $responseId = $this->request->getGet('responseId');
        
        // Validate the response ID
        if (!$responseId || !is_numeric($responseId)) {
            return $this->fail('Invalid Response ID', 400);
        }
    
        // Load the form model
        $formModel = new FormModel();
        
        // Check if the response exists
        $existingResponse = $formModel
            ->where('form_id', $responseId)
            ->where('ref_form_id', $form['form_id'])
            ->first();
    
        if (!$existingResponse) {
            return $this->fail('Response not found!', 404);
        }
    
        // If the response exists, delete it
        $deleted = $formModel
            ->where('form_id', $responseId)
            ->where('ref_form_id', $form['form_id'])
            ->delete();
    
        if ($deleted) {
            return $this->respond([
            'status' => 200,
            'message' => 'Response deleted successfully.'
          ]);
        } else {
            return $this->fail('Failed to delete the response. Please try again.', 500);
        }
    }
    
    
    

     private function handleShowUser($user){
        return $this->respond([
            'status' => 200,
            'message' => 'User data retrieved successfully',
            'data' => [
                'uid' => $user['id'],
                'name' => $user['name'],
                'email' => $user['email'],
                'profile_photo' => $user['profile_photo'],
                'profile_photo_path' => base_url().$user['profile_photo_path'],
                'created_at' => $user['created_at'],
                'updated_at' => $user['updated_at'],
                'is_email_verified' => $user['is_email_verified'],
                'email_verified_at' => $user['email_verified_at'],
                'form_id' => $user['form_id'],
                'ip_address' => $user['ip_address'],
                'user_type' => $user['user_type'],
                'blocked_at' => $user['blocked_at'],
                'deleted_at' => $user['deleted_at'],
            ]
        ]);
     }

     // upload photo
     private function handlePhotoUpload($user){
        $profile_photo_file = $this->request->getFile('profile_photo_file');

        // Validation rules for the file
        $rules = [
            'profile_photo_file' => [
                'rules' => [
                    'uploaded[profile_photo_file]',
                    'is_image[profile_photo_file]',
                    'mime_in[profile_photo_file,image/jpg,image/jpeg,image/png]',
                    'max_size[profile_photo_file,1024]',
                    'max_dims[profile_photo_file,1024,768]',
                ],
            
                'errors' => [
                    'uploaded' => 'No file uploaded.',
                    'is_image' => 'The file must be a valid image.',
                    'mime_in' => 'The file type must be jpg, jpeg, or png.',
                    'max_size' => 'The image size must not exceed 1MB.',
                    'max_dims' => 'The image dimensions must not exceed 1024x768 pixels.',
                ],
            ],
        ];

        // Validate the uploaded file
        if (!$this->validate($rules)) {
            return $this->fail($this->validator->getErrors());
        }

        if (!$profile_photo_file->isValid()) {
            return $this->fail($profile_photo_file->getErrorString());
        }

        // Generate a random name for the file and move it to the destination folder
        $newName = pathinfo($profile_photo_file->getName(), PATHINFO_FILENAME) // Original name without extension
        . '_' 
        . $profile_photo_file->getRandomName(); // Appends random name with extension

        $profile_photo_file->move('uploads/profileImage', $newName);


        // Prepare the response data
        $data = [
            'profile_photo' => $newName,
            'profile_photo_path' => 'uploads/profileImage/'.$newName,
            'updated_at' => date('Y-m-d H:i:s'),

        ];

        // Load the UserModel
        $userModel = new UserModel();

        // Update profile photo using the user's ID
            $uploadProfilePhoto = $userModel->update($user, $data);

            if (!$uploadProfilePhoto) {
                return $this->fail('Failed to upload profile photo. Please try again.', 500);
            }
            

        return $this->respondCreated([
            'status' => 200,
            'message' => 'Profile photo uploaded successfully.',
            'profile_photo' => $newName,
            'profile_photo_path' => base_url().'uploads/profileImage/'.$newName
        ]);
     }
     
     private function handleUpdateUserDetails($user)
     {
         $jsonData = $this->request->getJSON(true) ?: $this->request->getPost();
         $rules = [
             'name' => 'required|min_length[3]|max_length[50]',
             'email' => 'required|valid_email',
         ];
     
         if (!$this->validate($rules)) {
             return $this->failValidationErrors($this->validator->getErrors());
         }
     
         $userData = [
             'name' => $jsonData['name'],
             'email' => $jsonData['email'],
             'updated_at' => date('Y-m-d H:i:s'),
         ];
     
         $userModel = new UserModel();
         if ($userModel->update($user['id'], $userData)) {
             return $this->respond(['status' => 200, 'message' => 'User updated successfully']);
         }
         return $this->fail('Failed to update user', 500);
     }
     
     private function handleBlockUser($user)
     {
         if ($this->isBlocked($user)) {
             return $this->fail($user['name'] . ' is already blocked.', 400);
         }
         if ($this->isTemporarilyDeleted($user)) {
             return $this->fail($user['name'] . ' is temporarily deleted. Restore the account to block again.', 400);
         }
     
         $userModel = new UserModel();
         $updateData = [
             'user_type' => 3,
             'blocked_at' => date('Y-m-d H:i:s'),
         ];
     
         if ($userModel->update($user['id'], $updateData)) {
             return $this->respond([
                 'status' => 200,
                 'message' => 'Successfully blocked ' . $user['name'] . ' for 15 minutes.',
             ]);
         }
         return $this->fail('Failed to block user', 500);
     }
     
     private function handleDeleteUser($user)
     {
         $userModel = new UserModel();
         $formModel = new FormModel();
         $formHitCountModel = new FormHitCountModel();
     
         $isSuccess = $userModel->delete($user['id']);
         if ($isSuccess && $user['form_id']) {
             $isSuccess = $formModel->delete($user['form_id']);
             $isSuccess &= $formHitCountModel->where('user_form_id', $user['form_id'])->delete();
         }
     
         if ($isSuccess) {
             return $this->respond([
                 'status' => 200,
                 'message' => 'Successfully deleted the account of ' . $user['name'],
             ]);
         }
         return $this->fail('Failed to delete user and associated data', 500);
     }
     
     private function handleRestoreDeletedAccount($user)
     {
         if ($this->isBlocked($user)) {
             return $this->fail($user['name'] . ' is blocked. Unblock to restore.', 400);
         }
     
         if ($this->isTemporarilyDeleted($user)) {
             $userModel = new UserModel();
             if ($userModel->update($user['id'], ['user_type' => 1, 'updated_at' => date('Y-m-d H:i:s')])) {
                 return $this->respond(['status' => 200, 'message' => $user['name'] . ' account has been restored.']);
             }
             return $this->fail('Failed to restore account', 500);
         }
     
         return $this->fail($user['name'] . ' account is not temporarily deleted.', 400);
     }
     
     private function handleUnblockUser($user)
     {
         if ($this->isTemporarilyDeleted($user)) {
             return $this->fail($user['name'] . ' account is temporarily deleted. Restore to unblock.', 400);
         }
     
         if ($this->isBlocked($user)) {
             $userModel = new UserModel();
             if ($userModel->update($user['id'], ['user_type' => 1, 'updated_at' => date('Y-m-d H:i:s')])) {
                 return $this->respond(['status' => 200, 'message' => $user['name'] . ' account has been unblocked.']);
             }
             return $this->fail('Failed to unblock user', 500);
         }
     
         return $this->fail($user['name'] . ' account is not blocked.', 400);
     }
     
     private function handleTemporarilyDeleteAccount($user)
     {
         $userModel = new UserModel();
         if ($userModel->update($user['id'], ['user_type' => 0, 'updated_at' => date('Y-m-d H:i:s')])) {
             return $this->respond([
                 'status' => 200,
                 'message' => $user['name'] . ' account has been temporarily deleted for 3 hours.',
             ]);
         }
         return $this->fail('Failed to temporarily delete account', 500);
     }
     
     // Helper Methods
     private function isBlocked($user)
     {
         return $user['user_type'] == 3;
     }
     
     private function isTemporarilyDeleted($user)
     {
         return $user['user_type'] == 0;
     }
     









}
