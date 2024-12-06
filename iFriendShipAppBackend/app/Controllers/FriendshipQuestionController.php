<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class FriendshipQuestionController extends ResourceController
{
    public function NovemberFriendshipQuestions2024()
    {
        return $this->respond([
            'status' => 200,
            'message' => 'Questions retrieved successfully',
            'data' => [
                [
                    "id" => 1,
                    "description" => "What is your name?",
                    "type" => "text",
                ],
                [
                    "id" => 2,
                    "description" => "How would you describe your relationship with me?",
                    "type" => "radio",
                    "options" => [
                        ["value" => "Friend", "label" => "Friend"],
                        ["value" => "Classmate", "label" => "Classmate"],
                        ["value" => "Best Friend", "label" => "Best Friend"],
                        ["value" => "Close Friend", "label" => "Close Friend"],
                        ["value" => "Enemy", "label" => "Enemy"],
                        ["value" => "Lover", "label" => "Lover"],
                    ],
                ],
                [
                    "id" => 3,
                    "description" => "What one thing most people don't know about me?",
                    "type" => "text",
                ],
                [
                    "id" => 4,
                    "description" => "How would you describe my behavior?",
                    "type" => "text",
                ],
                [
                    "id" => 5,
                    "description" => "Do you trust me?",
                    "type" => "radio",
                    "options" => [
                        ["value" => "Yes", "label" => "Yes"],
                        ["value" => "No", "label" => "No"],
                    ],
                ],
                [
                    "id" => 6,
                    "description" => "Where did we first meet?",
                    "type" => "text",
                ],
                [
                    "id" => 7,
                    "description" => "What is my favourite hobby?",
                    "type" => "text",
                ],
                [
                    "id" => 8,
                    "description" => "What is my favourite song?",
                    "type" => "text",
                ],
                [
                    "id" => 9,
                    "description" => "Do you like me?",
                    "type" => "radio",
                    "options" => [
                        ["value" => "Yes", "label" => "Yes"],
                        ["value" => "No", "label" => "No"],
                    ],
                ],
                [
                    "id" => 10,
                    "description" => "Any suggestion for me or, Dedicate me a song?",
                    "type" => "textarea",
                ],
            ],
        ]);
    }
}
