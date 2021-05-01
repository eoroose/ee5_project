<?php

namespace App\Controllers;


use App\Models\avatarModel;
use App\Models\customModel;
use App\Models\inhabitantModel;
use App\Models\progressmodel;
use App\Models\taskmodel;
use App\Models\UserModel;

class progress extends BaseController
{
    public function index()
    {
        if(session()->get('role')=="inhabitant") {
            $id = session()->get('id');
            $inhabitantID = $this->getInhabitantid($id);
            $percentage=$this->getProcentProgress($inhabitantID);
            $progress=$this->getProgress($inhabitantID);
            $total=$this->getTotalProgress($inhabitantID);
            $location=$this->getLocation($id);

            $data=array(
                'percentage'=>$percentage,
                'progress'=>$progress,
                'total'=>$total,
                'location'=>$location
            );
            //echo '<pre>'; print_r($data); echo '</pre>';
            echo view('templates/header', $data);
            echo view('progress');
            echo view('templates/footer');
    }
        else{
            return redirect()->to('/dashboard');
        }
    }
    private function getLocation($id){
        $userModel=new UserModel();
        $avatar=$userModel->select('avatar')->where('userID',$id)->first();
        $avatarModel=new avatarModel();
        $location= $avatarModel->where('id',$avatar)->first();
        return $location['location'];
    }
    private function getInhabitantid($id){
        $inhabitantmodel=new inhabitantModel();
        $inhabitantID= $inhabitantmodel->select('inhabitantID')->where('userID',$id)->first();
        return $inhabitantID;
    }
    private function getProcentProgress($inhabitantID){
        $db = db_connect();
        $custommodel = new customModel($db);
        $resultProgress = $custommodel->getCompletedTasksPhases($inhabitantID);
        $resulttask = $custommodel->getActiveTasks();
        //echo '<pre>'; print_r($resulttask); echo '</pre>';
        //echo '<pre>'; print_r($resultProgress); echo '</pre>';
        $data = array();

        foreach ($resulttask as $tasks) {
            $percentage = 0;
            foreach ($resultProgress as $progress) {
                if ($tasks['PHASE'] == $progress['PHASE']) {
                    $percentage = round(($progress['Quantity'] / $tasks['Quantity']) * 100, 2);
                          // echo '<pre>'; echo  $percentage; echo '</pre>';
                }
            }
            $a = array('phase' => $tasks['PHASE']
            , 'percentage' => $percentage);
            array_push($data, $a);

        }
        return $data;
    }


    private function getTotalProgress($inhabitantID){
        $db = db_connect();
        $custommodel = new customModel($db);
        $resultProgress = $custommodel->getCompletedTasksPhases($inhabitantID);
        $resulttask = $custommodel->getActiveTasks();
        //echo '<pre>'; print_r($resulttask); echo '</pre>';
        ///echo '<pre>'; print_r($resultProgress); echo '</pre>';
        $data = array();
        $totalTask=0;
        $totalprogress=0;
        foreach ($resulttask as $tasks) {
            $totalTask=$totalTask+$tasks['Quantity'];
        }
        foreach ($resultProgress as $progress) {
                $totalprogress=$totalprogress+$progress['Quantity'];
            }

        //echo 'total';
        //echo $totalTask; echo '<pre>';
        //echo $totalprogress; echo '<pre>';
        return number_format(round((($totalprogress/$totalTask)*10), 2), 2);
    }
    private function getProgress($inhabitantID)
    {
        $progressModel=new progressmodel();
        $progress=$progressModel->select()->where('inhabitantID',$inhabitantID)->get()->getResultArray();
        $data=[];
        foreach ($progress as $row){
            $taskModel=new taskmodel();
            $task=$taskModel->where('taskID',$row['taskID'])->select()->first();
            $test=array(
                'description'=>$task['description'],
                'phase'=>$task['phase'],
                'completed'=>$row['isCompleted']
            );
            array_push($data,$test);
        }
        return $data;

    }
}