<?php

namespace App\Controllers;

use App\Models\Login1Model;

class LoginController extends BaseController
{
    public function home()
    {
        $session = session();
        if ($session->has('user_id')) {
            // distoy the session 
            $session->destroy();
        } 
        return view('login/login.php');
    }

    public function check()
    {
        $loginModel = new Login1Model();
    
        $email = $this->request->getPost('email');
        $password = (string)$this->request->getPost('password');
    
        // Fetch user data based on the provided email
        $userData = $loginModel->where('email', $email)->first();
        //$Admin = $loginModel->where('user_type', 'Admim')->first();
        //$user = $loginModel->where('user_type', 'user')->first();
            
       
        
    
        if ($userData !== null && $userData['user_type'] == 'admin' && $password == $userData['password']) {
            // If email and password are correct, start session and redirect
           // $session = session();
            //$session->set($Admin);
            //session()->set('user_id', $Admin);
            // You can set more session data if needed
            $session = session();
            $session->set('user_id', $userData['user_id']);
            // Redirect to the next page (replace 'nextPage' with your actual route)
            return redirect()->to(base_url('adminhome'));
        }

    elseif ($userData !== null && $userData['user_type'] == 'user' && $password== $userData['password'])
        {
           // $session = session();
            //$session->set($user);
            //session()->set('user_id', $user);
            $session = session();
            $session->set('user_id', $userData['user_id']);
            return redirect()->to(base_url('userhome'));
        }
         else
          {
            // If email or password is incorrect, you might want to handle this accordingly
            echo "Invalid email or password!";
            // You can also redirect back to the login page with an error message
            // return redirect()->to(base_url('login'))->with('error', 'Invalid email or password');
            // $session = session();
            // $session->set('user_id', $userData['user_id']);
            // return redirect()->to(base_url('loginsss'));
        }
    }
    public function show()
    {
        //return view('login/newlog.php');
        $session = session();
        $data['user_id'] = $session->get('user_id');
        return view('login/newlog.php', $data);
    }

    public function logout()
    {
        // Start the session
        $session = session();

        // Destroy the session data
        $session->destroy();

        // Redirect to the login page or any other desired page
        return redirect()->to('/login');
    }
    
}
