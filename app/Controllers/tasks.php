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
        if(session()->get('role')=='inhabitant')
        {
                return redirect()->to('/');
        }
        else{
        $taskmodel=new taskmodel();
        $result=$taskmodel->where('isActive',1)->orderBy('phase','ASC')->get()->getResultArray();
        $data=array('tasks'=> $result);
        //echo '<pre>'; print_r($data); echo '</pre>';
        echo view('templates/header', $data);
        echo view('tasks');
        echo view('templates/footer');

    }}
    public function edit()
    {
        if(session()->get('role')=='inhabitant')
        {
            return redirect()->to('/');
        }
        else{
        if(isset($_POST['id'])){
            $data=array(
                'phase'=>$_POST['phase'],
                'description'=>$_POST['description'],
            );
            $taskmodel=new taskmodel();
            $taskmodel->where('taskID',$_POST['id'])->set($data)->update();

        }

    }}
    public function insert()
    {
        if(session()->get('role')=='inhabitant')
        {
            return redirect()->to('/');
        }
        else{
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
    }}

    public function delete()
    {
        if(session()->get('role')=='inhabitant')
        {
            return redirect()->to('/');
        }
        else{
        if(isset($_POST['id'])){
            $taskmodel=new taskmodel();
            $id=$_POST['id'];
            $taskmodel->where('taskID',$id)->set('isActive',false)->update();
            $progressmodel=new progressmodel();
            $progressmodel->where('taskID',$id)->delete();

        }

    }}

    public function note_progress(){

        if(session()->get('role')=='inhabitant')
        {
            return redirect()->to('/');
        }
        else{
        $taskmodel=new taskmodel();
        $result_tasks=$taskmodel->select()->where('isActive',1)->orderBy('phase','ASC')->get()->getResultArray();
        $db=db_connect();
        $custommodel=new customModel($db);
        $results_inhabitants =$custommodel->getActiveInhabitants();

        $progressmodel=new progressmodel();
        $id=[];
        foreach($results_inhabitants as $rows)
        {
            array_push($id,$rows['inhabitantID']);
        }
        $results_progress=$progressmodel->select()->whereIn('inhabitantID',$id)->get()->getResultArray();
        $data=array(
            'inhabitants'=>$results_inhabitants,
            'tasks'=>$result_tasks,
            'id'=>$id,
            'progress'=>$results_progress
        );

        echo view('templates/header', $data);
        echo view('note_progress');
        echo view('templates/footer');
    }}

    public function complete()
    {
        if(session()->get('role')=='inhabitant')
        {
            return redirect()->to('/');
        }
        else{
        $progressmodel=new progressmodel();
        $id=$this->request->getVar('id');
        $progressmodel->where('progressID',$id)->set('isCompleted',1)->update();
        return redirect()->to('/note-progress');
    }}

    public function uncomplete(){
        if(session()->get('role')=='inhabitant')
        {
            return redirect()->to('/');
        }
        else{
        $progressmodel=new progressmodel();
        $id=$this->request->getVar('id2');
        $progressmodel->where('progressID',$id)->set('isCompleted',0)->update();
        return redirect()->to('/note-progress');
    }}
}



