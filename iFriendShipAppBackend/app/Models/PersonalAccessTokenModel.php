<?php
namespace App\Models;

use CodeIgniter\Model;


class PersonalAccessTokenModel extends Model
{
    protected $table = 'ifriendship_personal_access_tokens';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields = [
        'tokenable_type', 'tokenable_id', 'email', 'token', 'abilities', 'last_used_at', 'expires_at', 'created_at', 'updated_at',
    ];

    /**
     * Create a new personal access token.
     *
     * @param string $tokenableType The type of the entity that owns the token.
     * @param int $tokenableId The ID of the entity that owns the token.
     * @param string $name The name of the token.
     * @param array $abilities The abilities or permissions granted by the token.
     * @return int|bool The ID of the newly created token or false on failure.
     */
    public function createToken($tokenableType, $tokenableId, $email, $token)
    {

        // Calculate the expiration time (10 minutes from now)
        $expiresAt = date('Y-m-d H:i:s', strtotime('+10 minutes'));
        
        $data = [
            'tokenable_type' => $tokenableType,
            'tokenable_id' => $tokenableId,
            'email' => $email,
            'token' => $token, 
            'expires_at' => $expiresAt,
            'created_at' => date('Y-m-d H:i:s'),
            //'updated_at' => date('Y-m-d H:i:s'),
        ];

        $this->insert($data);
        
        // Return the plain token to the user (not hashed)
        return $token;
    }

    /**
     * Verify a given token and update its last used timestamp.
     *
     * @param string $token The plain token to verify.
     * @return array|false The token data if valid, or false if invalid.
     */
    public function verifyToken($urlToken)
{
    // Clean the URL token if needed
    $cleanedToken = trim($urlToken);

    // Fetch the token data from the database where abilities match the cleaned token
    $tokenData = $this->where('token',$cleanedToken) // Match exactly with the abilities
                      ->where('expires_at >', date('Y-m-d H:i:s'))
                      ->orWhere('expires_at', null)
                      ->first();

    // Debug: Output the token data from the database
    /*
    echo '<pre>';
    echo "URL Token: " . htmlspecialchars($urlToken) . "<br>";
    echo "Cleaned Token: " . htmlspecialchars($cleanedToken) . "<br>";
    echo "Token Data from Database: ";
    print_r($tokenData);
    echo '</pre>';
    */


    // Check if token data was found
    if ($tokenData) {
        // Debug: Check the hashed token from the database
        //echo "Hashed Token from Database: " . htmlspecialchars($tokenData['token']) . "<br>";

        // Verify the token using the hashed value
        if ($cleanedToken === $tokenData['token']) {
            // Update last_used_at timestamp
            $this->update($tokenData['id'], ['last_used_at' => date('Y-m-d H:i:s')]);
            return $tokenData;
        } else {
            echo "Token verification failed.";
        }
    }

    // No valid token found
    return false;
}

    
   
}
?>
