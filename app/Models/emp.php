<?php namespace App\Models ;

use CodeIgniter\Model;


class emp extends Model
{
    protected $table='pro';
    protected $primarykey='id';
    protected $allowedFields=[
        'username',
        'password',
    ];
}
?>