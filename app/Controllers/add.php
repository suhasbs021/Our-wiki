<?php

namespace App\Controllers;

use App\Models\TopicModel;

use App\Models\SubTopicModel;

use App\Models\ImageModel;

use App\Models\ContentModel;

use App\Models\Login1Model;

class add  extends BaseController
{
    public function task()
    {

        $session = session();
       
        if (!$session->has('user_id')) {
            // Redirect or handle unauthorized access
            return redirect()->to('/login'); // Redirect to login page
        }
        $data['user_id'] = $session->get('user_id');
        
        if (!$session->has('user_id')) {
            return redirect()->to('/login'); 
        }
        $user_id = $session->get('user_id');
        $login1Model = new Login1Model();
        $userDetails = $login1Model->find($user_id);
    
        $topicModel = new TopicModel();
        $topics = $topicModel->findAll();

        $data = [
            'topics' => $topics,
            'userDetails' => $userDetails,
        ];

        return view('add/add-topic.php',$data);

       
    }

    public function addtopic()
    {
        $session = session();
    
        if (!$session->has('user_id')) {
            // Redirect or handle unauthorized access
            return redirect()->to('/login'); // Redirect to login page
        }
    
        $data['user_id'] = $session->get('user_id');
    
        $logins = new Login1Model();
        $logdata = $logins->find($session->get('user_id'));  
        $userType = $logdata['user_type'];
    
        $addtopic = new TopicModel();
        
        // Set default status based on user type
        $status = ($userType == 'admin') ? 'Approve' : 'Pending';
    
        // Prepare data for insertion
        $data = [
            'topic_name' => $this->request->getPost('topic'),
            'user_id' => $session->get('user_id'),
            'status' => $status,
        ];
    
        // Process form submission
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Assuming you have some logic to handle form submission here
            // For example, saving the submitted topic to the database
            // After successful submission, set the success message
            $addtopic->insert($data);
            $success_message = "Topic submitted successfully!";
        }
    
        return redirect()->to(base_url('add'))->with('success_message', $success_message);
    }
    
    
    public function addsubtopic()
{
    $session = session();
    if (!$session->has('user_id')) {
        // Redirect or handle unauthorized access
        return redirect()->to('/login'); // Redirect to login page
    }
    $data['user_id'] = $session->get('user_id');

    if (!$session->has('user_id')) {
        return redirect()->to('/login');
    }

    $user_id = $session->get('user_id');
    $logins = new Login1Model();
    $userDetails = $logins->find($user_id);
    $logdata = $logins->find($user_id); // Assuming $user_id should be used here instead of $session->get('user_id')
    $userType = $logdata['user_type'];

    $topicModel = new TopicModel();
    $addtopic = new TopicModel();

    // Fetch topics based on user type
    if ($userType == 'admin') {
        $data['topics'] = $addtopic->findAll();
    } elseif ($userType === 'user') {
        $data['topics'] = $addtopic->where('status', 'approve')->findAll();
    }

    $data['userDetails'] = $userDetails;

    return view('add/add-subtopic.php', $data);
}


        public function savesubtopic()
        {
            $session = session();
            if (!$session->has('user_id')) {
                // Redirect or handle unauthorized access
                return redirect()->to('/login'); // Redirect to login page
            }
            $logins = new Login1Model();
        $logdata = $logins->find($session->get('user_id'));  
        $userType = $logdata['user_type'];

            $addsubtopic =new SubTopicModel();
            if ($userType == 'admin') {
            $data=[
                't_id' =>$this -> request ->getPost('topic'),
                'user_id'=>  $session->get('user_id'),
                
                'sub_topic_name' => $this -> request ->getPost('subtopic'),
                'status' => 'Approve',
                
            ];
        }
        elseif ($userType === 'user')
        {
            $data=[
                't_id' =>$this -> request ->getPost('topic'),
                'user_id'=>  $session->get('user_id'),
                
                'sub_topic_name' => $this -> request ->getPost('subtopic'),
                'status' => 'pending',
                
            ];
        }
         //dd($data);  
               if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Assuming you have some logic to handle form submission here
            // For example, saving the submitted topic to the database
            // After successful submission, set the success message
            $addsubtopic->save($data);
            $success_message = "Topic submitted successfully!";
        }
    
        return redirect()->to(base_url('show-subtopic'))->with('success_message', $success_message);
    }
           

        
        public function addimage()
{
    $session = session();
    if (!$session->has('user_id')) {
        return redirect()->to('/login');
    }

    $user_id = $session->get('user_id');
    $login1Model = new Login1Model();
    $userDetails = $login1Model->find($user_id);

    $topicModel = new TopicModel();
    $topics = $topicModel->findAll();

    $data = [
        'topics' => $topics,
        'userDetails' => $userDetails,
        'user_id' => $user_id
    ];

    $addimage = new ImageModel();
    
    return view('add/add-image.php', $data);
}


        public function saveImage()
        {
            $session = session();
            if (!$session->has('user_id')) {
                // Redirect or handle unauthorized access
                return redirect()->to('/login'); // Redirect to login page
            }
            $imageModel = new ImageModel();
            $logins = new Login1Model();
            $logdata = $logins->find($session->get('user_id'));  
             $userType = $logdata['user_type'];

    
            // Handle file upload
            $file = $this->request->getFile('file');
    
            if ($file->isValid() && !$file->hasMoved()) {
                $newName = $file->getRandomName();
                $file->move('./uploads', $newName); // Adjust the path as needed
    
                // Save image details to the database

                if ($userType == 'admin') {
                $data = [
                    'user_id' => $session->get('user_id'),
                    'img' => 'uploads/' . $newName,
                    'status' => 'Approve',// Default status
                ];
            }
            elseif ($userType === 'user')
            {
                $data = [
                    'user_id' => $session->get('user_id'),
                    'img' => 'uploads/' . $newName,
                    'status' => 'pending', // Default status
                ];
            }
               
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Assuming you have some logic to handle form submission here
                    // For example, saving the submitted topic to the database
                    // After successful submission, set the success message
                    $imageModel->insert($data);
                    $success_message = "Topic submitted successfully!";
                }
            
                return redirect()->to(base_url('show-image'))->with('success_message', $success_message);
            
                // Redirect or show success message
               // return redirect()->to('show-image');
            } else {
                // Handle file upload error
                return redirect()->back()->withInput()->with('error', $file->getErrorString());
            }
        }
        public function addContent()
{
    $session = session();
    if (!$session->has('user_id')) {
        return redirect()->to('/login');
    }

    $user_id = $session->get('user_id');
    $login1Model = new Login1Model();
    $userDetails = $login1Model->find($user_id);

    $logdata = $login1Model->find($user_id);  
    $userType = $logdata['user_type'];

    $addtopic = new TopicModel();
    $addsubtopic = new SubTopicModel();
    $imageModel = new ImageModel();

    if ($userType == 'admin') {
        $topics = $addtopic->where('status', 'approve')->findAll();
        $subtopics = $addsubtopic->where('status', 'approve')->findAll();
    } elseif ($userType === 'user') {
        $topics = $addtopic->where('status', 'approve')->findAll();
        $subtopics = $addsubtopic->where('status', 'approve')->findAll();
    }

    $images = $imageModel->orderBy('timestamp', 'DESC')->findAll();

    $data = [
        'userDetails' => $userDetails,
        'topics' => $topics,
        'subtopics' => $subtopics,
        'images' => $images
    ];

    return view('add/add-content.php', $data);
}


        public function savecontent()
        {
            $session = session();
            if (!$session->has('user_id')) {
                // Redirect or handle unauthorized access
                return redirect()->to('/login'); // Redirect to login page
            }
            $imageModel = new ImageModel();
            $logins = new Login1Model();
            $logdata = $logins->find($session->get('user_id'));  
             $userType = $logdata['user_type'];

             $addcontent = new ContentModel();
             if ($userType == 'admin') {
                $data=[
                    'user_id'=>  $session->get('user_id'),
                    't_id' =>$this -> request ->getPost('topic'),
                    's_id' =>$this -> request ->getPost('subtopic'),
                    'img_id'=>$this -> request ->getPost('selected_image'),
                    
                    
                    'content_info' => $this -> request ->getPost('content'),
                    'status' => 'Approve',
                    'count' =>0,
                    
                ];
            }
            elseif ($userType === 'user')
            {
                $data=[
                    'user_id'=>  $session->get('user_id'),
                    't_id' =>$this -> request ->getPost('topic'),
                    's_id' =>$this -> request ->getPost('subtopic'),
                    'img_id'=>$this -> request ->getPost('selected_image'),
                    'content_info' => $this -> request ->getPost('content'),
                    'status' => 'pending',
                    'count' =>0,
                    
                ];
            }
           // dd($data);
           if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Assuming you have some logic to handle form submission here
            // For example, saving the submitted topic to the database
            // After successful submission, set the success message
            $addcontent->save($data);
            $success_message = "Topic submitted successfully!";
        }
    
        return redirect()->to(base_url('show-content'))->with('success_message', $success_message);
           
            //return redirect()-> to(base_url('show-content'));
            $errors = $addcontent->errors();
        if ($errors) {
                    print_r($errors);


        }
    }
    public function add()
    {
        $session = session();
        if (!$session->has('user_id')) {
            return redirect()->to('/login'); 
        }
        $user_id = $session->get('user_id');
        $login1Model = new Login1Model();
        $userDetails = $login1Model->find($user_id);
    
        $topicModel = new TopicModel();
        $topics = $topicModel->findAll();

        $data = [
            'topics' => $topics,
        ];

        return view('add/addall.php', ['userDetails' => $userDetails,  'topics' => $topics]);
    } 
    public function contentsaveImage()
    {
        $session = session();
        $imageModel = new ImageModel();
        $logins = new Login1Model();
        $logdata = $logins->find($session->get('user_id'));  
         $userType = $logdata['user_type'];


        // Handle file upload
        $file = $this->request->getFile('file');
        dd($file);

        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('./uploads', $newName); // Adjust the path as needed

            // Save image details to the database

            if ($userType == 'admin') {
            $data = [
                'user_id' => $session->get('user_id'),
                'img' => 'uploads/' . $newName,
                'status' => 'Approve',// Default status
            ];
        }
        elseif ($userType === 'user')
        {
            $data = [
                'user_id' => $session->get('user_id'),
                'img' => 'uploads/' . $newName,
                'status' => 'pending', // Default status
            ];
        }
        dd($data);
            $imageModel->insert($data);

            // Redirect or show success message
            return redirect()->to('show-content');
        } else {
            // Handle file upload error
            return redirect()->back()->withInput()->with('error', $file->getErrorString());
        }
    } 
    }