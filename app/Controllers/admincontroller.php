<?php

namespace App\Controllers;

use App\Models\TopicModel;

use App\Models\SubTopicModel;

use App\Models\ImageModel;

use App\Models\ContentModel;

use App\Models\Login1Model;


class admincontroller extends BaseController
{

    public function screen3()
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
    
        $TopicModel = new TopicModel();
        $ImageModel = new ImageModel();
        $SubTopicModel = new SubTopicModel();
        $contentModel = new ContentModel();
    
        $contentDetailss = $contentModel
            ->orderBy('timestamp', 'DESC')
            ->where('status','Approve')
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
                    $content['img'] = "Image not found";
                }
            }
        }
    
        return view('admin/alldetails', [
            'userDetails' => $userDetails,
            'topics' => $topics,
            'contentDetailss' => $contentDetailss
        ]);
    }

    

}
