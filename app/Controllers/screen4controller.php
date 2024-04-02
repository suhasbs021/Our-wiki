<?php

namespace App\Controllers;

use App\Models\TopicModel;

use App\Models\SubTopicModel;

use App\Models\ImageModel;

use App\Models\ContentModel;

use App\Models\Login1Model;


class screen4controller extends BaseController
{
    public function main($c_id)
    {
          $session = session();
         // $session = session();
   
         $data['user_id'] = $session->get('user_id');
        //$c_id = 9;  
        $topicModel = new TopicModel();
        $ImageModel = new ImageModel();
        $SubTopicModel = new SubTopicModel();
        $contentModel = new ContentModel();
        $loginModel = new Login1Model();
        $topics = $topicModel->where('status', 'Approve')->findAll();

    $session = session();
    $userId = $session->get('user_id');
    $userDetails = $loginModel->find($userId);

        $contentDetails = $contentModel->where('status','Approve')->find($c_id);

        if ($contentDetails) {
            // Fetch topic name corresponding to t_id from TopicModel
            $topicDetails = $topicModel->where('status','Approve')->find($contentDetails['t_id']);

            if ($topicDetails) {
                // Add topic_name to contentDetails
                $contentDetails['topic_name'] = $topicDetails['topic_name'];
            } else {
                // Topic not found for the given t_id, handle accordingly
                $contentDetails['topic_name'] = "Topic not found";
            }
            $SubTopicModel = $SubTopicModel->find($contentDetails['s_id']);

            if ($SubTopicModel) {
                // Add sub_topic_name to contentDetails
                $contentDetails['sub_topic_name'] = $SubTopicModel['sub_topic_name'];
            } else {
                // Sub topic not found for the given s_id, handle accordingly
                $contentDetails['sub_topic_name'] = "Sub Topic not found";
            }
            $ImageModel = $ImageModel->find($contentDetails['img_id']);

            if ($ImageModel) {
                // Add img to contentDetails
                $contentDetails['img'] = $ImageModel['img'];
            } else {
                // Image not found for the given img_id, handle accordingly
                $contentDetails['img'] = "Image not found";
            }

            // Now you can use $contentDetails as needed
            return view('screen4/s4mian', ['contentDetails' => $contentDetails,'topics' => $topics,
            'userDetails' => $userDetails]);
        } 
        
    }
    public function delete($c_id)
    {
        $session = session();
        if (!$session->has('user_id')) {
            // Redirect or handle unauthorized access
            return redirect()->to('/login'); // Redirect to login page
        }
        $user_id = $session->get('user_id');
        
        $ContentModel = new ContentModel();
        $ContentModel->updateStatus($c_id, 'AdminDelete');
    
        // Redirect to adminhome with success message
        return redirect()->to('adminhome')->with('success', 'Content deleted successfully');
    }
}    
