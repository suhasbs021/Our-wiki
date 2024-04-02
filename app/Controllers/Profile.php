<?php

namespace App\Controllers;

use App\Models\TopicModel;
use App\Models\SubTopicModel;
use App\Models\ImageModel;
use App\Models\ContentModel;
use App\Models\Login1Model;

class Profile extends BaseController
{
    public function userprofile()
{
    // Check if user is logged in
    $session = session();
    if (!$session->has('user_id')) {
        // Redirect or handle unauthorized access
        return redirect()->to('/login'); // Redirect to login page
    }

    // Retrieve user ID from session
    $user_id = $session->get('user_id');

    // Load user details from the database using the user ID
    $login1Model = new Login1Model();
    $userDetails = $login1Model->find($user_id);

    // Load content related to the current user
    $contentModel = new ContentModel();
    $contentDetails = $contentModel->where('user_id', $user_id)->where('status','Approve')->findAll();

    // Check if content exists for the user
    if ($contentDetails) {
        // Iterate through each content detail
        foreach ($contentDetails as &$content) {
            // Fetch topic name corresponding to t_id from TopicModel
            $topicModel = new TopicModel();
            $topicDetails = $topicModel->find($content['t_id']);
            if ($topicDetails) {
                $content['topic_name'] = $topicDetails['topic_name'];
            } else {
                $content['topic_name'] = "Topic not found";
            }

            // Fetch sub-topic name corresponding to s_id from SubTopicModel
            $subTopicModel = new SubTopicModel();
            $subTopicDetails = $subTopicModel->find($content['s_id']);
            if ($subTopicDetails) {
                $content['sub_topic_name'] = $subTopicDetails['sub_topic_name'];
            } else {
                $content['sub_topic_name'] = "Sub Topic not found";
            }

            // Fetch image corresponding to img_id from ImageModel
            $imageModel = new ImageModel();
            $imageDetails = $imageModel->find($content['img_id']);
            if ($imageDetails) {
                $content['img'] = $imageDetails['img'];
            } else {
                $content['img'] = "Image not found";
            }
        }
    }

    // Load all topics from the TopicModel
    $topicModel = new TopicModel();
    $topics = $topicModel->where('status','Approve')->
    findAll();

    // Pass user details, content details, and topics to the view
    return view('profile', ['userDetails' => $userDetails, 'contentDetails' => $contentDetails, 'topics' => $topics]);
}


    public function updateProfilePic()
    {
        // Check if user is logged in
        $session = session();
        if (!$session->has('user_id')) {
            // Redirect or handle unauthorized access
            return redirect()->to('/login'); // Redirect to login page
        }

        // Retrieve user ID from session
        $user_id = $session->get('user_id');

        // Check if a file was uploaded
        if ($this->request->getFile('profile_pic')) {
            // Get the uploaded file
            $profilePic = $this->request->getFile('profile_pic');

            // Generate a unique name for the file
            $newName = $profilePic->getRandomName();

            // Move the file to the designated folder
            if ($profilePic->isValid() && $profilePic->move(ROOTPATH . 'public/uploads', $newName)) {
                // File uploaded successfully, store the file path in the database
                $filePath = 'uploads/' . $newName;

                // Update the profile picture path for the user in the database
                $login1Model = new Login1Model();
                $userDetails = $login1Model->find($user_id);
                if ($userDetails) {
                    // Update the profile picture path for the user
                    $userDetails['profile'] = $filePath; // Update the 'profile' column
                    $login1Model->update($user_id, $userDetails);

                    // Redirect or return a success response
                    return redirect()->to('profile')->with('success', 'Profile picture updated successfully.');
                } else {
                    return "User not found.";
                }
            } else {
                // File upload failed, return an error response
                return redirect()->to('profile')->with('error', 'Failed to upload profile picture.');
            }
        } else {
            // No file uploaded, return an error response
            return redirect()->to('profile')->with('error', 'No profile picture uploaded.');
        }
    }
    public function status()
    {
        $topicModel = new TopicModel();
        $topics = $topicModel->findAll();
         $data= ['topics' => $topics];
        return view ('userstatus' , $data);

    }
}
