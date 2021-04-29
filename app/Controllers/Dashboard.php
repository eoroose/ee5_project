<?php

namespace App\Controllers;

use App\Models\appointmentModel;
use App\Models\customModel;
use App\Models\dailyQuote;
use App\Models\eventsModel;
use App\Models\inhabitantModel;
use App\Models\progressmodel;
use App\Models\RecurringModel;
use App\Models\taskmodel;
use App\Models\UserModel;
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
	        $data['godParent']=$this->getGodparent($id);
            $godchilds=$this->getGodChilds($id);
            if($godchilds==null)
            {
                $data['godchilds']=null;
            }
            else
            {
                $data['godchilds']=$godchilds;
            }
	    }

        //echo '<pre>'; print_r($data); echo '</pre>';
        echo view('templates/header',$data);
        echo view('dashboard',$data);
        echo view('templates/footer',$data);
	}

	private function dashAgenda()
    {
        date_default_timezone_set('Europe/Brussels');
        $high_date=date('Y-m-d H:i:s',time()+(4*3600));
        $low_date=date('Y-m-d H:i:s',time()-(2*3600));
        $date=date('Y-m-d');

        $eventmodel=new eventsModel();
        $events=$eventmodel->where('start>=',$low_date)
            ->where('start <=',$high_date)
            ->limit(4)
            ->select('start,title')
            ->orderBy('start','ASC')
            ->get()
            ->getResultArray();
        //echo '<pre>'; print_r($events); echo '</pre>';
        $dayofweek = date('w', strtotime($date));
        //echo $dayofweek;
        $recuringmodel= new RecurringModel();
        $time_high=date('H:i:s',time()+(4*3600));
        $time_low=date('H:i:s',time()-(2*3600));
        $recurringEvents=$recuringmodel->like('daysOfWeek',$dayofweek)
            ->where("startTime <=",$time_high)
            ->where("startTime >=",$time_low)
            ->orderBy('startTime','ASC')
            ->get()->getResultArray();
        //echo '<pre>'; print_r($recurringEvents); echo '</pre>';
        $data=[];
        foreach ($events as $row)
        {
            $time= strtotime($row['start']);
            $tijd=date('H:i:s',$time);
            //echo 'tijd:'.$tijd;
            foreach ($recurringEvents as $col)
            {
                if($col['startTime']<=$tijd) {

                    $test=array(
                        'Start'=>$col["startTime"],
                        'title'=>$col["title"]
                    );
                    array_push($data, $test);
                }
            }
            $test=array(
                'Start'=>$tijd,
                'title'=>$row["title"]);
            array_push($data,$test);
        }
        //echo '<pre>'; print_r($data); echo '</pre>';
        return $data;
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
    private function getGodparent($id)
    {
        $inhabitantID=$this->getInhabitantid($id);
        $inhabitantmodel= new inhabitantModel();
        $inhabitant= $inhabitantmodel->where('inhabitantID',$inhabitantID)->first();
        $godparentID=$inhabitant['godParentID'];
        $godparent=$inhabitantmodel->where('inhabitantID',$godparentID)->first();
        $userID=$godparent['userID'];
        $userModel=new UserModel();
        $user=$userModel->where('userID',$userID)->select('firstname, lastname')->first();
        ///echo print_r($user);
        return $user;
    }

    public function getGodChilds($id){
        $inhabitantID=$this->getInhabitantid($id);
        $inhabitantmodel= new inhabitantModel();
        $godchilds= $inhabitantmodel->where('godParentID',$inhabitantID)->get()->getResultArray();
        //echo 'godchilds';
       //echo '<pre>'; print_r($godchilds ); echo '</pre>';
        $data=[];
        foreach ($godchilds as $row)
        {
            $userModel=new UserModel();
            $user=$userModel->where('userID',$row['userID'])->select('firstname, lastname')->first();
            array_push($data,$user);

        }
        //echo '<pre>'; print_r($data ); echo '</pre>';
        return $data;
    }
    private function getInhabitantid($id){
        $inhabitantmodel=new inhabitantModel();
        $inhabitantID= $inhabitantmodel->select('inhabitantID')->where('userID',$id)->first();
        return $inhabitantID;
    }

    private function getDoctorsApointment($id){
	    $inhabitantID= $this->getInhabitantid($id);
	    $apointmentModel=new appointmentModel();

        $date=date('Y-m-d');
	    $data=$apointmentModel->where('date',$date)->where('inhabitantID',$inhabitantID)->first();
        //echo '<pre>'; print_r($data ); echo '</pre>';
        return $data;
    }
    private function progress($id){

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

	private function checkYellowCards($id)
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
