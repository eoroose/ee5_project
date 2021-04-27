<?php

namespace App\Controllers;

use App\Models\progressmodel;
use App\Models\taskmodel;
use App\Models\customModel;
use App\Models\dailyQuote;

class Screensaver extends BaseController
{

    public function index(){

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

        $quote=$this->quote();
	    if($quote==NULL){
            $data['quote']= "Geen quote vandaag";
        }
	    else{
            $data['quote']=$quote['description'];
        }



        echo view('templates/header', $data);
        echo view('screensaver');
        echo view('templates/footer');
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
}