<?php 

namespace App\Controllers;

class AuthController extends BaseApiController
{
    public function login()
    {
        // Get the request data
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        // Validate the input
        if (!$email || !$password) {
            return $this->fail('Email and Password are required', 400);
        }

        // Check the user in the database
        $userModel = new \App\Models\UserModel();
        $user = $userModel->where('email', $email)->first();

        if (!$user) {
            return $this->fail('Invalid email or password', 401); // Email not found
        }

        // Check if the email is verified
        if ($user['user_type'] == 0) {
            $deletedAt = strtotime($user['deleted_at']);
            $restoreTime = strtotime('+3 hours', $deletedAt);
    
            if (time() >= $restoreTime) {
                // Restore the account by updating user_type to 1
                $userModel->update($user['id'], ['user_type' => 1, 'deleted_at' => null]);
                $user['user_type'] = 1; // Update in memory for further processing
            } else {
                $remainingTime = ceil(($restoreTime - time()) / 3600);
                return $this->fail(
                    "Your account was deleted. It will be automatically restored after $remainingTime hour(s). Please contact system admin if you need assistance.",
                    403
                );
            }
        }

        // check if the user is blocked or not blocked
        if ($user['user_type'] == 3) {
            $blockedAt = strtotime($user['blocked_at']);
            $unblockTime = strtotime('+15 minutes', $blockedAt);
    
            if (time() >= $unblockTime) {
                // Unblock the account by updating user_type to 1
                $userModel->update($user['id'], ['user_type' => 1, 'blocked_at' => null]);
                $user['user_type'] = 1; // Update in memory for further processing
            } else {
                $remainingTime = ceil(($unblockTime - time()) / 60);
                return $this->fail(
                    "Your account is blocked. It will be automatically unblocked after $remainingTime minute(s). Please contact system admin if you need assistance.",
                    403
                );
            }
        }

        // Check if the email is verified
        if (!$user['is_email_verified']) {
            return $this->fail('Email is not verified. Please verify your email to log in.', 403);
        }

        // Verify the password
        if (!password_verify($password, $user['password'])) {
            // Increment failed attempts
        $failedAttempts = $user['failed_attempts'] + 1;

        if ($failedAttempts > 3) {
            // Block the account
            $userModel->update($user['id'], ['user_type' => 3, 'blocked_at' => date('Y-m-d H:i:s'), 'failed_attempts' => $failedAttempts]);
            return $this->fail('Your account has been blocked due to multiple failed login attempts. It will be automatically unblocked after 15 minutes.', 403);
        }

        // Update failed attempts in the database
        $userModel->update($user['id'], ['failed_attempts' => $failedAttempts]);

        return $this->fail('Invalid email or password', 401);
        }

            // Reset failed attempts on successful login
        $userModel->update($user['id'], ['failed_attempts' => 0]);

        // Create JWT token
        $jwt = $this->createJWT($user['id']);


        // Send the token as a response
        return $this->respond([
            'status' => 200,
            'message' => 'Login successful',
            'data' => [
            'token' => $jwt,
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


}
