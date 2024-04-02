<?php

namespace App\Controllers;

use App\Models\TopicModel;
use App\Models\SubTopicModel;
use App\Models\ContentModel;


class notification  extends BaseController
{
    
    public function topicscheck()
    {
        $session = session();
        if (!$session->has('user_id')) {
            return redirect()->to('/login'); 
        }
    
        $topicModel = new TopicModel();
        $subtopic = new SubTopicModel();
        $content = new ContentModel(); 
        $topics = $topicModel->findAll();

        $counttopics = $topicModel->where('status','pending')->countAllResults();
        $countsubtopics = $subtopic->where('status','pending')->countAllResults();
        $countcontent = $content->where('status','pending')->countAllResults();

        return view('notification/topics.php', [
            'topics' => $topics,
            'counttopics' => $counttopics,
            'countsubtopics'=>$countsubtopics,
            'countcontent' => $countcontent

        ]);
    }
    public function topictable()
    {
        $session = session();
    $user_id = $session->get('user_id');
    
    // Fetch all topics from TopicModel
    $topicModel = new TopicModel();
    $topics = $topicModel->findAll();
    
    // Fetch topics with status = 0 (pending) from TopicModel
    $pendingTopics = $topicModel->where('status', 'pending')->findAll();
    
    return view('notification/topictable', [
        'topics' => $topics,
        'pendingTopics' => $pendingTopics,
        'user_id' => $user_id
    ]);
       
    }

    public function topicapprove($t_id)
    {
        $session = session();
        if (!$session->has('user_id')) {
            // Redirect or handle unauthorized access
            return redirect()->to('/login'); // Redirect to login page
        }
        $user_id = $session->get('user_id');
        
        $TopicModel = new TopicModel();
        $TopicModel->updateStatus($t_id, 'Approve');
        $session->setFlashdata('success', 'The topic has been approved successfully.');

    
        return redirect()->to('topic');
    }
    public function topicdisapprove($t_id)
    {
        $session = session();
        if (!$session->has('user_id')) {
            // Redirect or handle unauthorized access
            return redirect()->to('/login'); // Redirect to login page
        }
        $user_id = $session->get('user_id');
        
        $TopicModel = new TopicModel();
        $TopicModel->updateStatus($t_id, 'Disapprove');
        $session->setFlashdata('success', 'The topic has been disapproved successfully.');
    
        return redirect()->to('topic');
    }
    
    
    public function subtopictable()
    {

        $session = session();
    if (!$session->has('user_id')) {
        return redirect()->to('/login'); 
    }

    $user_id = $session->get('user_id');

    // Fetch pending sub-topics from SubTopicModel
    $subTopicModel = new SubTopicModel();
    $subTopicsData = $subTopicModel->where('status', 'pending')->findAll();

    // Fetch all topics from TopicModel
    $topicModel = new TopicModel();
    $topics = $topicModel->findAll();

    return view('notification/subtopictable.php', [
        'data' => $subTopicsData,
        'user_id' => $user_id,
        'topics' => $topics
    ]);
    }
    public function subtopicapprove($t_id)
    {
        $session = session();
        $user_id = $session->get('user_id');
        
        $SubTopicModel = new SubTopicModel();
        $SubTopicModel->updateStatus($t_id, 'Approve');
    
        return redirect()->to('subtopic');
    }
    public function subtopicdisapprove($t_id)
    {
        $session = session();
        $user_id = $session->get('user_id');
        
        $SubTopicModel = new SubTopicModel();
        $SubTopicModel->updateStatus($t_id, 'Disapprove');
    
        return redirect()->to('subtopic');
    }
    public function contenttable()
    {
        $session = session();
    $user_id = $session->get('user_id');
    
    // Fetch content with status = 'pending' from ContentModel
    $contentModel = new ContentModel();
    $contentData = $contentModel->where('status', 'pending')->findAll();
    
    // Fetch all topics from TopicModel
    $topicModel = new TopicModel();
    $topics = $topicModel->findAll();
    
    // Fetch topics with status = 0 (pending) from TopicModel
    $pendingTopics = $topicModel->where('status', 'pending')->findAll();
    
    return view('notification/contenttable', [
        'data' => $contentData,
        'topics' => $topics,
        'pendingTopics' => $pendingTopics,
        'user_id' => $user_id
    ]);
    }

    public function contapprove($t_id)
    {
        $session = session();
        if (!$session->has('user_id')) {
            // Redirect or handle unauthorized access
            return redirect()->to('/login'); // Redirect to login page
        }
        $user_id = $session->get('user_id');
        
        $ContentModel = new ContentModel();
        $ContentModel->updateStatus($t_id, 'Approve');
    
        return redirect()->to('content');
    }
    public function contdisapprove($t_id)
    {
        $session = session();
        $user_id = $session->get('user_id');
        
        $ContentModel = new ContentModel();
        $ContentModel->updateStatus($t_id, 'Disapprove');
    
        return redirect()->to('content');
    }
    
}