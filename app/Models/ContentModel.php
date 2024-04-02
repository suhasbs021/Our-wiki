<?php

namespace App\Models;

use CodeIgniter\Model;

class ContentModel extends Model
{
    protected $table            = 'content';
    protected $primaryKey       = '	c_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'user_id',
        't_id',
        's_id',
        'img_id',
        'content_info',
        'timestamp',
        'status',
        'count',
    ];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';



    public function updateStatus($c_id, $status)
    {
        $this->set('status', $status);
        $this->where('c_id', $c_id);
        $this->update();
    }
    public function incrementCount($c_id)
    {
        // Find the content by its ID
        $content = $this->find($c_id);

        if ($content) {
            // Increment the count
            $count = $content['count'] + 1;

            // Update the count in the database
            $this->update($c_id, ['count' => $count]);
        }
    }
    public function getTrendingTopics($limit)
    {
        // Fetch top trending topics with their associated image URLs from the database
        return $this->select('content.t_id, topic.topic_name, image.img, content.count')
                    ->join('topic', 'topic.t_id = content.t_id')
                    ->join('image', 'image.img_id = content.img_id')
                    ->orderBy('content.count', 'DESC')
                     ->where('content.status','Approve')
                    ->limit($limit)
                    ->findAll();
    }
                

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
