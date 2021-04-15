<?php

namespace App\Controllers;

use App\Models\customModel;
use App\Models\eventsModel;
use App\Models\inhabitantModel;
use App\Models\progressmodel;
use App\Models\taskmodel;

class Dashboard extends BaseController
{
	public function index()
	{

	    $data=[];
	    $data['event']=$this->dashAgenda();
	    if (session()->get('role')=='inhabitant'){
	        $data['progress']=$this->progress(session()->get('id'));
	    }

        echo view('templates/header',$data);
        echo view('dashboard',$data);
        echo view('templates/footer',$data);
	}
	private function dashAgenda()
    {
        date_default_timezone_set('Europe/Brussels');
        $current_date=date('Y-m-d');
        $current_time=date('H:i:s',time()-3600);
        $eventmodel=new eventsModel();
        $events=$eventmodel->where('date',$current_date)
            ->where('startTime >',$current_time)
            ->limit(4)
            ->select('startTime,description')
            ->get()
            ->getResultArray();
        return $events;
    }

    public function progress($id){
	    $inhabitantmodel=new inhabitantModel();
	    $inhabitantID= $inhabitantmodel->select('inhabitantID')->where('userID',$id)->first();

        $db=db_connect();
        $custommodel=new customModel($db);
        $resultProgress =$custommodel->getCompletedTasksPhases($inhabitantID);
        $resulttask=$custommodel->getActiveTasks();
       // echo '<pre>'; print_r($resulttask); echo '</pre>';
       // echo '<pre>'; print_r($resultProgress); echo '</pre>';
        $data=array();
        foreach ($resulttask as $tasks)
        {
            $percentage=0;
            foreach ($resultProgress as $progress)
            {
                if($tasks['PHASE']==$progress['PHASE'])
                {
                    $percentage= round(($progress['Quantity']/$tasks['Quantity'])*100,2);
             //       echo '<pre>'; echo  $percentage; echo '</pre>';
                }
            }
            $a=array('phase'=>$tasks['PHASE']
            ,'percentage'=>$percentage);
            array_push($data,$a);

        }
        //echo '<pre>'; print_r($data); echo '</pre>';
        return $data;
	}
}
