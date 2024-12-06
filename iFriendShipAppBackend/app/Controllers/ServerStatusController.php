<?php

namespace App\Controllers;

use App\Models\VisitorsModel;
use App\Models\FormHitCountModel;
use App\Models\UserModel;


use CodeIgniter\RESTful\ResourceController;

class ServerStatusController extends ResourceController {

    // application visitors count

    public function index() {
        $ip = $this->request->getIPAddress();

        $visitorsModel = new VisitorsModel();
        $existingVisitor = $visitorsModel->where('ip_address', $ip)->first();

        $data = [
            'ip_address' => $ip,
            'visit_date_time' => date('Y-m-d H:i:s')
        ];

        if ($existingVisitor) {
            $visitorsModel->update($existingVisitor['id'], $data); // Assuming 'id' is the primary key
        } else {
            $visitorsModel->insert($data);
            
        }

        // Count all visitors
        $totalVisitors = $visitorsModel->countAllResults();

        return $this->respond([
            'status' => 200,
            'message' => 'Welcome to iFriendship App. Our Server is running!',
            'your_ip' => $ip,
            'total_visitors' => $totalVisitors
        ]);
    }

    // users form hit count

    public function formHitCount($formId){

    // Check the form id in the database in myusers table
    $userModel = new UserModel();
    $form_id = $userModel->where('form_id', $formId)->first();

    if ($form_id) {
        
        $ip = $this->request->getIPAddress();

        $formHitCountModel = new FormHitCountModel();

	$existingIp = $formHitCountModel->where([
	    'ip_address' => $ip,
	    'user_form_id' => $formId
	])->first();

        $data = [
            'ip_address' => $ip,
            'user_form_id' => $formId,
            'hit_date_time' => date('Y-m-d H:i:s')
        ];

        if ($existingIp) {
            $formHitCountModel->update($existingIp['id'], $data); // Assuming 'id' is the primary key
        } else {
            $formHitCountModel->insert($data);
            
        }

        $formHitCountModel = new FormHitCountModel();
     // Count all visitors
     $totalHits = $formHitCountModel->where('user_form_id', $formId)->countAllResults();

     return $this->respond([
         'status' => 200,
         'message' => 'You have total of ' .$totalHits.' hits on your friendship form ID : '.$formId,
         'your_form_id' => $formId,
         'total_hits' => $totalHits
     ]);
    }else{
        return $this->respond([
            'status' => 401,
            'message' => 'The form ID you provided is invalid',
        ]);
    }

    

    }
}
