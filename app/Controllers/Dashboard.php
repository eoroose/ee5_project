<?php

namespace App\Controllers;

use App\Models\appointmentModel;
use App\Models\customModel;
use App\Models\dailyQuote;
use App\Models\eventsModel;
use App\Models\inhabitantModel;
use App\Models\progressmodel;
use App\Models\taskmodel;
use App\Models\yellowCardModel;
use phpDocumentor\Reflection\Types\Null_;

class Dashboard extends BaseController
{
	public function index()
	{

	    $data=[];
	    $data['event']=$this->dashAgenda();
	    $quote=$this->quote();
	    if($quote==NULL){
            $data['quote']= "Geen quote vandaag";
        }
	    else{
            $data['quote']=$quote['description'];
        }
	    if (session()->get('role')=='inhabitant'){
	        $id=session()->get('id');
	        $data['progress']=$this->progress($id);
	        $yellowcard=$this->checkYellowCards($id);
	        if($yellowcard==null){
	            $data['yellowCard']=0;
            }
	        else{
	            $data['yellowCard']=1;
                $data['info']=$yellowcard;
            }
	        $appointment=$this->getDoctorsApointment($id);
	        if($appointment==null)
            {
                $data['apointment']=null;
            }
	        else
            {
                $data['apointment']=$appointment;
            }
	    }

       // echo '<pre>'; print_r($data); echo '</pre>';
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

    private function quote(){
        $quoteModel=new dailyQuote();
        $date=date('Y-m-d');
        $data= $quoteModel->where('date=',$date)->first();
        if($data==NULL){
            return NULL;
        }
        else{
            return $data;
        }
    }

    public function getInhabitantid($id){
        $inhabitantmodel=new inhabitantModel();
        $inhabitantID= $inhabitantmodel->select('inhabitantID')->where('userID',$id)->first();
        return $inhabitantID;
    }

    public function getDoctorsApointment($id){
	    $inhabitantID= $this->getInhabitantid($id);
	    $apointmentModel=new appointmentModel();

        $date=date('Y-m-d');
	    $data=$apointmentModel->where('date',$date)->where('inhabitantID',$inhabitantID)->first();
        //echo '<pre>'; print_r($data ); echo '</pre>';
        return $data;
    }
    public function progress($id){

	    $inhabitantID= $this->getInhabitantid($id);
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

	public function checkYellowCards($id)
    {
        $inhabitantID=$this->getInhabitantid($id);
        $yellowcardModel=new yellowCardModel();
        $result=$yellowcardModel->where('inhabitantID',$inhabitantID)->where('isActive',1)->first();
        //echo '<pre>'; print_r($result); echo '</pre>';
        if($result==Null){
            return null;
        }
        else{
            return $result;
        }
    }
}
