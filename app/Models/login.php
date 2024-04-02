<?php namespace App\Models ;

use CodeIgniter\Model;

class login extends Model{
         protected $table='user_login';
         protected $primarykey='user_id';
         protected $allowedFields=[
            'user_name',
            'email',
            'password',
            'user_type',
            'age',
            'gender',
            'time_stamp',
        ];
}