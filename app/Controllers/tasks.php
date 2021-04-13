<?php

namespace App\Controllers;

use App\Models\appointmentModel;
use App\Models\employeeModel;
use App\Models\godchildModel;
use App\Models\godparentModel;
use App\Models\inhabitantModel;
use App\Models\JournalModel;
use App\Models\progressmodel;
use App\Models\taskmodel;
use App\Models\UserModel;
use App\Models\customModel;

class tasks extends BaseController
{
    public function index()
    {
        $taskmodel=new taskmodel();
        $result=$taskmodel->where('isActive',1)->orderBy('phase','ASC')->get()->getResultArray();
        $data=array('tasks'=> $result);
        echo view('templates/header', $data);
        echo view('tasks');
        echo view('templates/footer');
    }
    public function edit()
    {
        ;
        $data=array(
            'taskID'=>$this->request->getVar('taskId'),
            'phase'=>$this->request->getVar('phase'),
            'description'=>$this->request->getVar('description'),
            'isActive'=>1
        );
        $taskmodel=new taskmodel();
        $taskmodel->where('taskID',$this->request->getVar('taskId'))->replace($data);
        return redirect()->to('/tasks');
    }
    public function insert()
    {

        $data=array(
            'phase'=>$this->request->getVar('phase2'),
            'description'=>$this->request->getVar('description2'),
            'isActive'=>1
        );
        $taskmodel=new taskmodel();
        $taskmodel->save($data);
        $id=$taskmodel->select('taskId')->orderBy('taskId','DESC')->first();

        $db=db_connect();
        $customModel=new customModel($db);
        $customModel->activateNewTask($id['taskId']);
        return redirect()->to('/tasks');
    }

    public function delete()
    {
        $taskmodel=new taskmodel();
        $id=$this->request->getVar('taskId3');
        $taskmodel->where('taskID',$id)->set('isActive',false)->update();
        $progressmodel=new progressmodel();
        $progressmodel->where('taskID',$id)->delete();
        return redirect()->to('/tasks');
    }

    public function note_progress(){
        $data=[];

        echo view('templates/header', $data);
        echo view('note_progress');
        echo view('templates/footer');
}
}



