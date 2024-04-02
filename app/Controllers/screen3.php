<?php

namespace App\Controllers;

use App\Models\TopicModel;

use App\Models\SubTopicModel;

use App\Models\ImageModel;

use App\Models\ContentModel;

use App\Models\Login1Model;


class screen3 extends BaseController
{

    public function screen3($t_id)
{
    $session = session();
    if (!$session->has('user_id')) {
        // Redirect or handle unauthorized access
        return redirect()->to('/login'); // Redirect to login page
    }
    $TopicModel = new TopicModel();
    $ImageModel = new ImageModel();
    $SubTopicModel = new SubTopicModel();
    $contentModel = new ContentModel();
    $loginModel = new Login1Model();
    
    $topics = $TopicModel->findAll();
    
    $session = session();
    $userId = $session->get('user_id');
    $userDetails = $loginModel->find($userId); // Storing user details

    // Fetching content details using TopicModel
    $contentDetails = $TopicModel->find($t_id);
    
    // Fetching all content details with t_id = 39 using ContentModel
    $contentDetailss = $contentModel->where('t_id', $t_id)
        ->where('status', 'Approve')
        ->findAll();

    if (!empty($contentDetailss)) {
        foreach ($contentDetailss as &$content) {
            $subTopicModelResult = $SubTopicModel->find($content['s_id']);
            if ($subTopicModelResult) {
                $content['sub_topic_name'] = $subTopicModelResult['sub_topic_name'];
            } else {
                $content['sub_topic_name'] = "Sub Topic not found";
            }
        }
        foreach ($contentDetailss as &$content) {
            $ImageModelResult = $ImageModel->find($content['img_id']);
            if ($ImageModelResult) {
                $content['img'] = $ImageModelResult['img'];
            } else {
                $content['img'] = "Sub Topic not found";
            }
        }
    }

    return view('screen3/boxpage', [
        'contentDetails' => $contentDetails,
        'contentDetailss' => $contentDetailss,
        'topics' => $topics,
        'userDetails' => $userDetails, // Passing user details including user type
    ]);
}

public function Userhome()
{
    $session = session();
    
    // Instantiate necessary models
    $TopicModel = new TopicModel();
    $ImageModel = new ImageModel();
    $SubTopicModel = new SubTopicModel();
    $contentModel = new ContentModel();
    $loginModel = new Login1Model();
    
    // Get user ID from session
    $userId = $session->get('user_id');
    
    // Fetch all topics
    $topics = $TopicModel->findAll();
    
    // Fetch user details
    $userData = $loginModel->find($userId);

    // Fetching all content details with t_id = 39 using ContentModel
    $contentDetailss = $contentModel->orderBy('count', 'DESC')->orderBy('timestamp', 'DESC')
        ->where('status', 'Approve')
        ->findAll();
    
    // If there are more than 10 records, slice the array to include only the first 10
    if (count($contentDetailss) > 10) {
        $contentDetailss = array_slice($contentDetailss, 0, 10);
    }
    
    // Iterate through each content detail to fetch sub-topic name and image
    foreach ($contentDetailss as &$content) {
        $TopicModelResult = $TopicModel->find($content['t_id']);
        $content['topic_name'] = $TopicModelResult ? $TopicModelResult['topic_name'] : "Sub Topic not found";
        
        $subTopicModelResult = $SubTopicModel->find($content['s_id']);
        $content['sub_topic_name'] = $subTopicModelResult ? $subTopicModelResult['sub_topic_name'] : "Sub Topic not found";
        
        $ImageModelResult = $ImageModel->find($content['img_id']);
        $content['img'] = $ImageModelResult ? $ImageModelResult['img'] : "Sub Topic not found";
    }

    return view('screen3/userhome', [
        'contentDetailss' => $contentDetailss,
        'topics' => $topics
    ]);
}


    public function contentcount($c_id)
    {
        // Load necessary libraries and models
        $session = session();
       
    if (!$session->has('user_id')) {
        // Redirect or handle unauthorized access
        return redirect()->to('/login'); // Redirect to login page
    }
        $user_id = $session->get('user_id');

        // Instantiate the ContentModel
        $contentModel = new ContentModel();

        // Call the method to increment the count
        $contentModel->incrementCount($c_id);

        // Redirect back to the previous page or any desired location
        return redirect()->to(base_url('screen4/') . $c_id);
    }
}
