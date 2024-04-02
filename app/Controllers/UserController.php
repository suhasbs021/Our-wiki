<?php namespace App\Controllers;


use App\Models\Login1Model;

class UserController extends BaseController
{
    public function index()
    {
        
        $user=new Login1Model();
        $data['user']=$user->findAll();
        return view('userwiki/index',$data);
    }
    public function create()
    {
        return view('userwiki/create');
    }
    public function store()
    {
        $user=new Login1Model();

        $userType = $this->determineUserType();

        $existingUser = $user->where('email', $this->request->getPost('email'))->first();

        // If the email already exists, redirect with an error message
        if ($existingUser) {
            return redirect()->back()->withInput()->with('error', 'Email already registered.');
        }
    
        $data=[
            'user_name'=>$this->request->getPost('user_name'),
            'email'=>$this->request->getPost('email'),
            'password'=>$this->request->getPost('password'),
            'user_type'=>$userType, 
            'age'=>$this->request->getPost('age'),
            'gender'=>$this->request->getPost('gender'),
            'time_stamp' => date('Y-m-d H:i:s') 
        ];
        try {
            $user->save($data);
            return redirect()->to(base_url('userwiki'))->with('status','User has been Registered Successfully');
        } catch (\Exception $e) {
            // Handle any exceptions, such as database errors
            return redirect()->back()->withInput()->with('error', 'Failed to register user: ' . $e->getMessage());
        }
    }
    private function determineUserType()
    {
        // Check if the user is an admin based on some condition
        if ($this->isAdminUser()) {
            return 'admin';
        } else {
        return 'user';
         }
    
    }  
    private function isAdminUser()
    {
    // Check if the user is logged in and has admin privileges
    // For example, if you have a session variable indicating admin status:
    if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] === true) {
        return true;
    } else {
        return false;
    } 
}
   
}
?>