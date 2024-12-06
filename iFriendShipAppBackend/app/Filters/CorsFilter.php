<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class CorsFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $origin = $request->getHeader('Origin');

        if ($origin) {
            $allowedOrigins = [
                 'http://localhost:8080', 'http://192.168.0.100:8080', 'http://192.168.0.101:8080',  'http://192.168.0.102:8080', 
                   'http://192.168.0.104:8080'
            ]; // Add allowed origins here

            if (in_array($origin->getValue(), $allowedOrigins)) {
                // Setting headers for CORS
                $response = \Config\Services::response();
                $response->setHeader('Access-Control-Allow-Origin', $origin->getValue())
                         ->setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT, DELETE')
                         ->setHeader('Access-Control-Allow-Headers', 'Content-Type, Authorization, X-Requested-With');

                if ($request->getMethod() === 'options') {
                    return $response->setStatusCode(200);
                }
            } else {
                // Optionally handle disallowed origin
                return \Config\Services::response()->setStatusCode(403, 'Forbidden');
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        
    }
}
