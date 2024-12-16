<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class AuthController extends Controller
{
    
    public function showSignupForm()
    {
        log_message('debug', 'Rendering signup form');
        return view('signup');
    }

    public function register()
    {
        helper(['form']);

        if ($this->request->getMethod() === 'POST') {

            $userModel = new UserModel();

            $username = $this->request->getVar('username');
            $email = $this->request->getVar('email');
            $password = $this->request->getVar('password');

            log_message('error', 'Form data: ' . print_r($this->request->getPost(), true));

            // Check for duplicate username
            if ($userModel->where('username', $username)->first()) {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'This username is already taken. Please choose another.',
                    'csrf_hash' => csrf_hash()
                ]);
            }

            // Check for duplicate email
            if ($userModel->where('email', $email)->first()) {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'This email is already registered. Please use a different email.',
                    'csrf_hash' => csrf_hash()
                ]);
            }

            // Proceed to save user data
            $data = [
                'username' => $username,
                'email' => $email,
                'password' => password_hash($password, PASSWORD_DEFAULT),
            ];

            if ($userModel->save($data)) {
                
                $user = $userModel->where('username', $username)->first();
    
                // Set user session
                session()->set([
                    'userId' => $user['id'],
                    'userName' => $user['username'],
                    'isLoggedIn' => true,
                ]);

                log_message('error', 'Session Data: ' . print_r(session()->get(), true));  // Check session data here

                return $this->response->setJSON(['status' => 'success', 'csrf_hash' => csrf_hash() ]);
            } else {
                // If save fails, send an error message
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'Failed to create account. Please try again.',
                    'csrf_hash' => csrf_hash()
                ]);
            }
        }

        // Return the signup view (not used in AJAX)
            return view('signup');
    }

    public function showLoginForm()
    {
        log_message('debug', 'Rendering login form');
        return view('login'); // Replace with the actual login view
    }


    public function loginForm()
    {
        if ($this->request->getMethod() === 'POST') {

            log_message('error', 'Inside controller post request');
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            $userModel = new UserModel();
            $user = $userModel->where('username', $username)->first();

            if ($user && password_verify($password, $user['password'])) {
                // Set user session
                session()->set([
                    'userId' => $user['id'],
                    'userName' => $user['username'],
                    'isLoggedIn' => true,
                ]);
                $this->response->setJSON(['status' => 'success', 'csrf_hash' => csrf_hash()]);
                
                return redirect()->to('/vendordetails');

                // return $this->response->setJSON(['status' => 'success', 'csrf_hash' => csrf_hash()]);
            } else {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid username or password.', 'csrf_hash' => csrf_hash()]);
            }
        } else {
            log_message('error', 'not post request');
        }    

        // If not a POST request, redirect to login page
        return redirect()->to('login');
    }


    public function logout()
    {
        // Destroy the session
        session()->destroy();

        // Redirect to the login page
        return redirect()->to('/');
    }

}
