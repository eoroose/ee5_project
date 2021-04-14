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

    public function progress(){
	    $inhabitantmodel=new inhabitantModel();
	    $inhabitantID= $inhabitantmodel->select('inhabitantID')->where('userID',3)->first();

        $db=db_connect();
        $custommodel=new customModel($db);
        $resultProgress =$custommodel->getCompletedTasksPhases($inhabitantID);
        $taskmodel=new taskmodel();
        $resulttask=$taskmodel->where('isActive',1)->groupBy('phase')->selectCount('phase')->select('phase')->get()->getResultArray();
        echo '<pre>'; print_r($resulttask); echo '</pre>';
        echo '<pre>'; print_r($resultProgress); echo '</pre>';
	    $progressmodel=new progressmodel();
	    //$progressmodel->selectCount('phase')->where('inhabitantId',$inhabitantID)->groupBy('phase')->get()->getResultArray();
    }
}
