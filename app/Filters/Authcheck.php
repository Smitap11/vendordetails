<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthCheck implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $currentRoute = $request->getUri()->getPath(); // Get the current URI path

        // Define routes that do not require authentication
        $publicRoutes = [
            'login',        // Login route
            'signup',       // Signup route
            'logout',       // Logout route
            'loginForm'
        ];

        // Exclude public routes from the authentication check
        foreach ($publicRoutes as $route) {
            if (strpos($currentRoute, $route) !== false) {
                return; // Skip auth check for these routes
            }
        }

        // Check if the user is logged in
        if (!session()->has('userId')) {
            // Redirect to the login page if not logged in
            return redirect()->to('/login')->with('error', 'Please log in to access this page.');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No action required after processing
    }
}
