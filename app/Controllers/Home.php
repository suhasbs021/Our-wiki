<?php

namespace App\Controllers;

use App\Models\Login1Model;
use App\Models\TopicModel;
use CodeIgniter\Controller;

class Home extends Controller
{
    public function index()
    {
        // Load topics
        $topicModel = new TopicModel();
        $topics = $topicModel->findAll();

        // Retrieve user type from session
        $session = session();
        $userId = $session->get('user_id');
        $userType = null;

        if ($userId !== null) {
            $loginModel = new Login1Model();
            $userData = $loginModel->find($userId);

            if ($userData !== null) {
                $userType = $userData['user_type'];
            }
        }

        // Determine which layout to use based on user type
        $layout = ($userType === 'admin') ? 'Layout/adminheader' : 'Layout/default';

        // Pass topics data to the view
        $data = ['topics' => $topics];

        // Return view with appropriate layout
        return view($layout, $data);
    }
}
