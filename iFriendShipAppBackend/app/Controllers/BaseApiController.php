<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class BaseApiController extends ResourceController
{
    // Autheticate UserId
    protected function getAuthenticatedUserId()
    {
        // Get the JWT token from the Authorization header
        $authHeader = $this->request->getHeader('Authorization');
        $token = null;

        if ($authHeader) {
            $token = $authHeader->getValue();
            // Remove 'Bearer' from the token string
            $token = str_replace('Bearer ', '', $token);
        }

        if (!$token) {
            return $this->fail('JWT Token not provided', 401);
        }

        try {
            // Decode the JWT token
            $decodedToken = $this->decodeJWT($token);

             // Retrieve the user ID from the decoded token
        $userId = $decodedToken['user_id'];

        // Check if the user exists in the database
        $userModel = new \App\Models\UserModel();
        $user = $userModel->where('id', $userId)->first();

        if (!$user) {
            return $this->fail('No user found', 401); // User not found
        }

        // Return the user ID
        return $userId;
        } catch (\Exception $e) {
            return $this->fail('Invalid JWT Token', 401);
        }
    }

    // Authenticate Admin 
    protected function authenticateAdmin()
    {
        $authHeader = $this->request->getHeader('Authorization');
        $token = null;
    
        if ($authHeader) {
            $token = $authHeader->getValue();
            $token = str_replace('Bearer ', '', $token);
        }
    
        if (!$token) {
            return $this->fail('JWT Token not provided', 401);
        }
    
        try {
            $decodedToken = $this->decodeJWT($token);
            $userId = $decodedToken['user_id'];
    
            // Check if the user exists in the database
            $userModel = new \App\Models\UserModel();
            $user = $userModel->where('id', $userId)->first();
    
            if (!$user) {
                return $this->fail('No user found', 401);
            }
    
            // Ensure the user is an admin
            if ($user['user_type'] != 2) {
                return $this->fail('Access denied: Admin privileges required', 403);
            }
    
            // Return the admin's user ID
            return $userId;
        } catch (\Exception $e) {
            return $this->fail('Invalid JWT Token: ' . $e->getMessage(), 401);
        }
    }
    
    // create a new JWT token
    protected function createJWT($userId)
    {
        // Create token header as a JSON string
        $header = json_encode(['typ' => 'JWT', 'alg' => 'HS256']);

        // Create token payload as a JSON string
        $payload = json_encode(['user_id' => $userId, 'exp' => time() + 3600]); // 1 hour expiration

        // Encode Header to Base64Url String
        $base64UrlHeader = $this->base64UrlEncode($header);

        // Encode Payload to Base64Url String
        $base64UrlPayload = $this->base64UrlEncode($payload);

        // Create Signature Hash
        $secretKey = '7e5d8966a4972c9372e75b47294343f4';
        $signature = hash_hmac('sha256', $base64UrlHeader . "." . $base64UrlPayload, $secretKey, true);

        // Encode Signature to Base64Url String
        $base64UrlSignature = $this->base64UrlEncode($signature);

        // Create JWT
        return $base64UrlHeader . "." . $base64UrlPayload . "." . $base64UrlSignature;
    }

    // Decode token
    protected function decodeJWT($token)
    {
        // Split the token into its components
        $tokenParts = explode('.', $token);
        if (count($tokenParts) !== 3) {
            throw new \Exception('Invalid token structure');
        }

        // Decode the token parts
        $header = json_decode(base64_decode($tokenParts[0]), true);
        $payload = json_decode(base64_decode($tokenParts[1]), true);
        $signatureProvided = $tokenParts[2];

        // Check the algorithm
        if ($header['alg'] !== 'HS256') {
            throw new \Exception('Unsupported token algorithm');
        }

        // Recreate the signature
        $secretKey = '7e5d8966a4972c9372e75b47294343f4';
        $base64UrlHeader = $this->base64UrlEncode(json_encode($header));
        $base64UrlPayload = $this->base64UrlEncode(json_encode($payload));
        $signature = hash_hmac('sha256', $base64UrlHeader . "." . $base64UrlPayload, $secretKey, true);
        $base64UrlSignature = $this->base64UrlEncode($signature);

        // Verify the signature
        if ($base64UrlSignature !== $signatureProvided) {
            throw new \Exception('Invalid signature');
        }

        // Return the payload if the signature is valid
        return $payload;
    }

    protected function base64UrlEncode($data)
    {
        return str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($data));
    }

   // Options Handler For POST Request
    public function optionsHandler()
    {
        return $this->response->setStatusCode(200)
            ->setHeader('Access-Control-Allow-Origin', '*') // Change '*' to your specific origin if needed
            ->setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT, DELETE')
            ->setHeader('Access-Control-Allow-Headers', 'Content-Type, Authorization, X-Requested-With');
    }
}
