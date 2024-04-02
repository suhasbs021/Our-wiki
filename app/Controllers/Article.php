<?php

namespace App\Controllers;

use App\Models\emp;

class Article extends BaseController
{
    public function index()
    {
        $employee= new emp();
        $data['employee']= $employee->findAll();
        return view('Article/art.php',$data);
    }

    public function create()
    {
        return view('Article/create');
    }
    public function store()
    {
        $employee= new emp();
        $data=[
            'username' => $this -> request ->getPost('username'),
            'password' => $this -> request ->getPost('password'),
        ];
        $employee->save($data);
        return redirect()-> to(base_url('article')); 
    }

    public function edit($id)
    {
        $employee=new emp();
        $data['employee']=$employee->find($id);
        return view('Article/edit',$data);
    }

    public function update($id)
    {
        $employee=new emp();
        $data=[
            'username' => $this -> request ->getPost('username'),
            'password' => $this -> request ->getPost('password'),
        ];
        $employee->update($id,$data);
        return redirect()-> to(base_url('article')); 
    }
    public function deletes($id)
    {
        $employee=new emp(); 
        $employee->delete($id);
        return redirect()-> to(base_url('article')); 

    }

}

