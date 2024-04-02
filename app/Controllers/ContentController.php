<?php

namespace App\Controllers;

use App\Models\ContentModel;
use CodeIgniter\Controller;

class ContentController extends Controller
{
    public function increaseCount($cid)
    {
        $contentModel = new ContentModel();
        $contentModel->where('c_id', $cid)->set('count', 'count + 1', false)->update();
        
        return $this->response->setJSON(['success' => true]);
    }

    public function index()
{
    // Load ContentModel
    $contentModel = new ContentModel();

    // Get trending topics
    $trendingTopics = $contentModel->getTrendingTopics(10); // You can adjust the limit as needed

    // Pass trending topics data to the view
    $data['trendingTopics'] = $trendingTopics;

    // Load the view with trending topics data
    return view('userwiki/Home', $data);
}

}
