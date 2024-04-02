
<?php

namespace App\Controllers;

use App\Models\TopicModel;
use App\Models\SubtopicModel;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;

class Home extends Controller
{
    public function index()
    {
        $request = \Config\Services::request();
        // Load models
        $topicModel = new TopicModel();
        $subtopicModel = new SubtopicModel();

        // Fetch topics and subtopics
        $topics = $topicModel->findAll();
        $subtopics = $subtopicModel->findAll();

        // Pass data to view
        $data = [
            'topics' => $topics,
            'subtopics' => $subtopics
        ];

        // Load header view
        return view('screen3', $data);
    }
    protected $request;

    public function __construct()
    {
        $this->request = service('request');
    }


}