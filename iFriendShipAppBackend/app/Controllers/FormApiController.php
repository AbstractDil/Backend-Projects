<?php

namespace App\Controllers;

use App\Controllers\BaseApiController;

use CodeIgniter\API\ResponseTrait;

// add model 

use App\Models\FormModel;
use App\Models\UserModel;

//use App\Models\PersonalAccessTokenModel;

class FormApiController extends BaseApiController
{
    use ResponseTrait;

// insert form data  

public function insertData($id){

    
    // Check the form id in the database in myusers table
    $userModel = new \App\Models\UserModel();
    $form_id = $userModel->where('form_id', $id)->first();

    if (!$form_id) {
        return $this->fail('Invalid Form ID', 401); // Email not found
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
        'ref_form_id'  => $id,
        'created_at' => date('Y-m-d H:i:s'),
        'ip_address' => $this->request->getIPAddress(),
     ];
 
     // Insert the new user into the database
     $FormModel = new FormModel();
     $result = $FormModel->insert($data);
 
     // Check if the user was created successfully
     if (!$result) {
         return $this->fail('Failed to insert your form response, please try again.', 500);
     }
 
     // Respond with a success message and the token (optional)
     return $this->respondCreated([
         'status'   => 200,
         'message' => 'Your form response has been created successfully.',
        
     ]);
  
}

// get all form responses for a specific user 

public function getAllFormData()
{
    // Retrieve query parameters
    $page = $this->request->getGet('page') ?? 1; // Default to 1 if not set
    $limit = $this->request->getGet('limit') ?? 10; // Default to 10 if not set
    $uid = $this->request->getGet('userId');
    $order = $this->request->getGet('order') ?? 'DESC'; // Default to DESC if not set
    $formId = $this->request->getGet('formId'); 

    // Check authenticated user
    $userId = $this->getAuthenticatedUserId();

    if (is_array($userId)) {
        return $userId; // Return failure response if JWT is invalid
    }

    //echo 'userId from GET: ' . $uid . ', authenticated user_id: ' . json_encode($userId);


    if ($userId != $uid) {
        return $this->fail('Unauthorized access', 403); // User mismatch
    }

    // Validate formId if provided
    if ($formId && !is_numeric($formId)) {
        return $this->fail('Invalid Form ID', 400); // Bad request if formId is invalid
    }


     // Check if the formId belongs to the user
     if ($formId) {
        $userModel = new UserModel();
        
        // Verify ownership of the form
        $formData = $userModel
            ->where('id', $userId) // Match authenticated user ID
            ->where('form_id', $formId) // Check if the requested form exists for this user
            ->first();

        if (!$formData) {
            return $this->fail('Form not found or access denied', 404);
        }
    }


    // Fetch form data model
    $formModel = new FormModel();

    // Define filters and sorting
    //$filters = ['id' => $uid];
    if ($formId) {
        $filters['ref_form_id'] = $formId;
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
        'status' => 'success',
        'message' => 'Forms retrieved successfully',
        'data' => $data,
        'pagination' => $formModel->pager->getDetails()
    ], 200);
}



    
}
