<?php

namespace App\Controllers;

use App\Controllers\BaseApiController;

use CodeIgniter\API\ResponseTrait;

// add model 

use App\Models\UserModel;
use App\Models\PersonalAccessTokenModel;

class UserApiController extends BaseApiController
{
    use ResponseTrait;
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */

// create a new user
public function createUser(){

        // Get raw JSON input and decode it into an array
        $jsonData = $this->request->getJSON(true); // true will return as an associative array
        
        // Fallback to form data if JSON is empty (for form-data requests)
        $input = $jsonData ? $jsonData : $this->request->getPost();

        // Define validation rules
        $rules = [
            'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[ifriendship_myusers.email]',
            'name' => 'required|min_length[3]|max_length[30]',
            'password' => 'required|min_length[6]|max_length[30]',
            'confirm_password' => 'required|matches[password]', // confirm password
        ];
    
        // Validate input data
        if (!$this->validate($rules)) {
            return $this->failValidationErrors($this->validator->getErrors());
        }

        // create unique form id

        //$form_id = date('ymdhis').rand(1000,9999);
    
        // Prepare user data
        $data = [
            'name' => $input['name'],
            'email' => $input['email'],
            //'password' => $input['password'],
            'password' => password_hash($input['password'], PASSWORD_BCRYPT),
            'ip_address' => $this->request->getIPAddress(),
            'form_id' => date('ymdhis').rand(1000,9999),
            'created_at' => date('Y-m-d H:i:s')
        ];
    
        // Insert the new user into the database
        $userModel = new UserModel();
        $userId = $userModel->insert($data);
    
        // Check if the user was created successfully
        if (!$userId) {
            return $this->fail('Failed to create user, please try again.', 500);
        }
    
        // Generate a token for email verification
        $token = bin2hex(random_bytes(16));
    
        // Create a new entry in the personal access tokens table
        $personalAccessTokenModel = new PersonalAccessTokenModel();
        $tokenCreation = $personalAccessTokenModel->createToken('email_verification', $userId, $data['email'], $token);
    
        // Check if the token was created successfully
        if (!$tokenCreation) {
            return $this->fail('Failed to generate verification token, please try again.', 500);
        }
    
        // Respond with a success message and the token (optional)
        return $this->respondCreated([
            'message' => 'User created successfully',
            'verification_token' => $token,
            'verification_link' => base_url("api/v1/verify-email/{$token}")  // Optional: provide a link for verification
        ]);
}
// Email verification
public function verifyEmail($token){
        // Load the PersonalAccessTokenModel
        $personalAccessTokenModel = new PersonalAccessTokenModel();
        
        // Find the token in the database
        $tokenData = $personalAccessTokenModel->verifyToken($token);
        
        
        if (!$tokenData) {
            return $this->fail('Invalid or expired token.', 400);
        }
        
        // Load the UserModel
        $userModel = new UserModel();
        
        // Fetch the user associated with this token
        $user = $userModel->find($tokenData['tokenable_id']);
        
        if (!$user) {
            return $this->fail('User not found.', 404);
        }
        
        // Check if the email is already verified
        if ($user['is_email_verified']) {
            return $this->respond(['message' => 'Email is already verified.']);
        }
        
        // Mark the user's email as verified (boolean true)
        $updateStatus = $userModel->update($user['id'], ['is_email_verified' => true, 'email_verified_at'=>date('Y-m-d H:i:s')]);
        
        if (!$updateStatus) {
            return $this->fail('Failed to verify email. Please try again.', 500);
        }
        
        // Optionally, delete the token after verification to prevent reuse
        $personalAccessTokenModel->delete($tokenData['id']);
        
        // Respond with a success message
        return $this->respond(['message' => 'Email verified successfully.']);
}

// get single user data - if login
public function showUser($id = null){
       
        $userId = $this->getAuthenticatedUserId();


        if (is_array($userId)) {
            return $userId; // This returns the failure response if JWT is invalid
            
        }

        if ($userId != $id) {
            return $this->fail('Unauthorized access', 403);
        }

            // Retrieve user data from the database
            $userModel = new UserModel();
            $user = $userModel->find($id);

            if (!$user) {
                return $this->fail('User not found', 404);
            } 

            //Return user data
            
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
                    'user_type' => $user['user_type'],
                ]
            ]);
            

       
}

// get user data - withour login 

public function getUser($id = null){
       

        // Retrieve user data from the database
        $userModel = new UserModel();
        $user = $userModel->where('form_id', $id)->first();

        if (!$user) {
            return $this->fail('User not found', 404);
        } 

        //Return user data
        
        return $this->respond([
            'status' => 200,
            'message' => 'User data retrieved successfully',
            'data' => [
               // 'uid' => $user['id'],
                'name' => $user['name'],
               // 'email' => $user['email'],
                //'profile_photo' => $user['profile_photo'],
                'profile_photo_path' => base_url().$user['profile_photo_path'],
               // 'created_at' => $user['created_at'],
                //'updated_at' => $user['updated_at'],
               // 'is_email_verified' => $user['is_email_verified'],
                //'email_verified_at' => $user['email_verified_at'],
                'form_id' => $user['form_id'],

                // Add any other fields you want to return
            ]
        ]);
        

   
}


// update a user
public function updateUser($id = null){
       
        $userId = $this->getAuthenticatedUserId();
        if (is_array($userId)) {
            return $userId; // This returns the failure response if JWT is invalid
        }

        if ($userId != $id) {
            return $this->fail('Unauthorized access', 403);
        }

        // Get raw JSON input and decode it into an array
        $jsonData = $this->request->getJSON(true); // true will return as an associative array
        
        // Fallback to form data if JSON is empty (for form-data requests)
        $input = $jsonData ? $jsonData : $this->request->getPost();
    
            // Validate input data
            $rules=[
                'name' => 'required|min_length[3]|max_length[50]',
                'email' => 'required|valid_email'
            ];
    
            // Validate input data
            if (!$this->validate($rules)) {
                return $this->failValidationErrors($this->validator->getErrors());
            }
    
    
            // Update user data in the database
            $userModel = new UserModel();
            $userData = [
                'name' => $input['name'],
                'email' => $input['email'],
                'updated_at' => date('Y-m-d H:i:s'),
            ];
    
            if ($userModel->update($id, $userData)) {
                return $this->respond([
                    'status' => 200,
                    'message' => [
                        'success' => 'User updated successfully'
                    ],
                ]);
            } else {
                return $this->fail('Failed to update user', 500);
            }
    
        
}

// upload profile photo


public function uploadProfilePhoto($id = null)
{
    $userId = $this->getAuthenticatedUserId();
    if (is_array($userId)) {
        return $userId; // Returns the failure response if JWT is invalid
    }

    if ($userId != $id) {
        return $this->fail('Unauthorized access', 403);
    }

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
    $uploadProfilePhoto = $userModel->update($id, $data);

    if (!$uploadProfilePhoto) {
        return $this->fail('Failed to upload profile photo. Please try again.', 500);
    }
    

    return $this->respondCreated([
        'message' => 'Profile photo uploaded successfully.',
        'profile_photo' => $newName,
        'profile_photo_path' => base_url().'uploads/profileImage/'.$newName
    ]);
}


// Soft Delete a user 
public function softDeleteUser($id = null){

    $userId = $this->getAuthenticatedUserId();
    if (is_array($userId)) {
        return $userId; // Returns the failure response if JWT is invalid
    }

    if ($userId != $id) {
        return $this->fail('Unauthorized access', 403);
    }

      // Load the UserModel
      $userModel = new UserModel();

      // check if the user already blocked or not

      // Fetch the user by id
        $user = $userModel->find($id);


        // Check if user exists and user_type is 0
        if ($user && $user['user_type'] == 0) {
            // Create a DateTime object from the deleted_at field
            $deletedAt = new \DateTime($user['deleted_at']);
            
            // Format the date as Month Day, Year 01:34:41 am
            $formattedDate = $deletedAt->format('F j, Y g:i:s a');
            
            return $this->fail('Your account was already deleted. This action was performed on ' . $formattedDate, 403);
        }

      // Update the user_type to 0 where id = $id
      $deleteUser = $userModel->update($id, [
        'user_type' => 0,
        'deleted_at' => date('Y-m-d H:i:s'),
      ]);;

      //$deleteUser = $userModel->delete($id);

      if (!$deleteUser) {
        return $this->fail('Failed to run delete query. Please try again.', 500);
      }
    

    return $this->respondCreated([
        'message' => 'Your account has been deleted successfully. It will be automatically restored in 3 hours. If you need immediate restoration, please contact the system administrator. After 3 hours, please log in to check your account status.',
    ]);

}

// forget password request email verify
public function forgetPassword($id = null){
    // Get email from user input
    $email = $this->request->getVar('email');

    // Define validation rules
    $rules = [
        'email' => 'required|min_length[6]|max_length[50]|valid_email',
    ];

    // Validate input data
    if (!$this->validate($rules)) {
        return $this->failValidationErrors($this->validator->getErrors());
    }

    // Check the user in the database
    $userModel = new \App\Models\UserModel();
    $user = $userModel->where('email', $email)->first();

    if (!$user) {
        return $this->fail('Invalid Email', 401); // Email not found
    }

    // Check if the email is verified
    if (!$user['is_email_verified']) {
        return $this->fail('Email is not verified. Please verify your email to forget your password.', 403);
    }

    // Check if the email is verified
    if ($user['user_type'] == 0 || $user['user_type'] == 3) {
            return $this->fail('Your account is currently inactive. Please activate your account to utilize this feature.', 403);
    }

    // Get user ID from the user data
    $userId = $user['id']; // Assuming the `id` field exists in the `users` table

    // Generate a token for email verification
    $token = bin2hex(random_bytes(16));

    // Create a new entry in the personal access tokens table
    $personalAccessTokenModel = new PersonalAccessTokenModel();
    $tokenCreation = $personalAccessTokenModel->createToken('password_reset_token', $userId, $email, $token);

    // Check if the token was created successfully
    if (!$tokenCreation) {
        return $this->fail('Failed to generate verification token, please try again.', 500);
    }

    // Respond with a success message and the token (optional)
    return $this->respondCreated([
        'status' => 200,
        'message' => 'Password change request has been created successfully. Please check your email and click on the link below to change your password. Link is active for the next 10 minutes.',
        'data' => [
        'password_reset_token' => $token,
        'password_reset_link' => base_url("api/v1/change-password/{$token}")  
        ] 
    ]);
}


// change password
public function changePassword($token) {
    // Load the PersonalAccessTokenModel
    $personalAccessTokenModel = new PersonalAccessTokenModel();
    
    // Find the token in the database
    $tokenData = $personalAccessTokenModel->verifyToken($token);
    
    if (!$tokenData) {
        return $this->fail('Invalid or expired token.', 400);
    }
    
    // Load the UserModel
    $userModel = new UserModel();
    
    // Fetch the user associated with this token
    $user = $userModel->find($tokenData['tokenable_id']);
    
    if (!$user) {
        return $this->fail('User not found.', 404);
    }
    
    // Get raw JSON input and decode it into an array
    $jsonData = $this->request->getJSON(true); // true will return as an associative array
        
    // Fallback to form data if JSON is empty (for form-data requests)
    $input = $jsonData ? $jsonData : $this->request->getPost();

    // Define validation rules
    $rules = [
        'password' => 'required|min_length[6]|max_length[30]',
        'confirm_password' => 'required|matches[password]', // confirm password
    ];

    // Validate input data
    if (!$this->validate($rules)) {
        return $this->failValidationErrors($this->validator->getErrors());
    }

    // Prepare user data
    $data = [
        'password' => password_hash($input['password'], PASSWORD_BCRYPT),
        'updated_at' => date('Y-m-d H:i:s')
    ];

    // Update password using the user's ID
    $updatePassword = $userModel->update($user['id'], $data);
    
    if (!$updatePassword) {
        return $this->fail('Failed to change password. Please try again.', 500);
    }
    
    // Optionally, delete the token after verification to prevent reuse
    $personalAccessTokenModel->delete($tokenData['id']);
    
    // Respond with a success message
    return $this->respond([
        'status' => 200,
        'message' => 'Your password has been changed successfully.'
    ]);
}

    
/* ---------------------
* Update Password (Date 22/11/2024 Time- 10:12 P.M.)
* ----------------------
* If a user if logged in he/she can update the password
*/ 

public function updatePassword($id = null){
    // Authenticate the user and get the user ID from the JWT
    $userId = $this->getAuthenticatedUserId();
    if (is_array($userId)) {
        return $userId; // Return failure response if JWT is invalid
    }

    // Check if the authenticated user is attempting to update their own password
    if ($userId != $id) {
        return $this->fail('Unauthorized access', 403);
    }

    // Get the raw JSON input and decode it, fallback to form data if JSON is empty
    $input = $this->request->getJSON(true) ?: $this->request->getPost();

    // Define validation rules
    $rules = [
        'CurrentPassword' => 'required|min_length[6]|max_length[30]',
        'userPassword' => 'required|min_length[6]|max_length[30]',
        'userCPassword' => 'required|matches[userPassword]', // Confirm password
    ];

    // Validate the input data
    if (!$this->validate($rules)) {
        return $this->failValidationErrors($this->validator->getErrors());
    }

    // Load the UserModel and fetch the user's current password
    $userModel = new UserModel();
    $user = $userModel->find($id);

    if (!$user) {
        return $this->fail('User not found', 404);
    }

    // Verify the current password
    if (!password_verify($input['CurrentPassword'], $user['password'])) {
        return $this->fail('The current password you entered is incorrect', 401);
    }

    // Hash the new password and prepare the data for updating
    $data = [
        'password' => password_hash($input['userPassword'], PASSWORD_BCRYPT),
        'updated_at' => date('Y-m-d H:i:s'),
    ];

    // Update the user's password in the database
    if ($userModel->update($id, $data)) {
        return $this->respond([
            'status' => 200,
            'message' => [
                'success' => 'Password updated successfully',
            ],
        ]);
    } else {
        return $this->fail('Failed to update password', 500);
    }
}

// Email Verification: If a user forget to verify email during registration process

function emailVerification(){

    // Get raw JSON input and decode it into an array
    $jsonData = $this->request->getJSON(true); // true will return as an associative array
        
    // Fallback to form data if JSON is empty (for form-data requests)
    $input = $jsonData ? $jsonData : $this->request->getPost();

    // Define validation rules
    $rules = [
        'email' => 'required|min_length[6]|max_length[50]|valid_email',
    ];

    // Validate input data
    if (!$this->validate($rules)) {
        return $this->failValidationErrors($this->validator->getErrors());
    }

    // Check the user in the database
    $userModel = new \App\Models\UserModel();
    $user = $userModel->where('email', $input['email'])->first();

    if (!$user) {
        return $this->fail('Invalid email or password', 401); // Email not found
    }

    // Check if the email is already verified or not
    if ($user['is_email_verified']) {
        return $this->fail('Your email is already verified. You may log in now.', 403);
    }

    // Load token model
    $personalAccessTokenModel = new PersonalAccessTokenModel();
    
    $existingToken = $personalAccessTokenModel
        ->where('tokenable_type', 'email_verification')
        ->where('tokenable_id', $user['id'])
        ->where('email', $user['email'])
        ->first();

   // If an existing token is found
    if ($existingToken) {
        // Check if the token is expired
        if (strtotime($existingToken['expires_at']) < time()) {
            // Token expired, delete it
            $personalAccessTokenModel->delete($existingToken['id']);
        } else {
            // Token is valid, return it
            return $this->respond([
                'message' => 'A verification token already exists. We have sent you an email with the verification link.',
                'verification_token' => $existingToken['token'],
                'verification_link' => base_url("api/v1/verify-email/{$existingToken['token']}")
            ]);
        }
    }

    // If no valid token exists, create a new one
    $newToken = bin2hex(random_bytes(16)); // Generate a secure random token
    $tokenCreation = $personalAccessTokenModel->createToken('email_verification', $user['id'], $input['email'], $newToken);

    // Check if the token was created successfully
    if (!$tokenCreation) {
        return $this->fail('Failed to generate verification token, please try again.', 500);
    }

    // Respond with a success message and the token (optional)
    return $this->respondCreated([
        'message' => 'A new verification token has been created.',
        'verification_token' => $newToken,
        'verification_link' => base_url("api/v1/verify-email/{$newToken}")  // Optional: provide a link for verification
    ]);


}


// Account recovery : If account is blocked or temporarily deleted


    
    

    
    
}
