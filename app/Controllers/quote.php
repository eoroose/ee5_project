<?php

namespace App\Controllers;

use App\Models\appointmentModel;
use App\Models\dailyQuote;
use App\Models\employeeModel;
use App\Models\godchildModel;
use App\Models\godparentModel;
use App\Models\inhabitantModel;
use App\Models\JournalModel;
use App\Models\progressmodel;
use App\Models\taskmodel;
use App\Models\UserModel;
use App\Models\customModel;

class quote extends BaseController
{
    public function index()
    {
        if(session()->get('role')=='inhabitant')
        {
                return redirect()->to('/');
        }
        else{
        $quotemodel=new dailyQuote();
        $date=date('Y-m-d');
        $result=$quotemodel->where('date >=',$date)->get()->getResultArray();
        $data=array('quotes'=> $result);
        echo view('templates/header', $data);
        echo view('quote');
        echo view('templates/footer');

    }}
    public function edit()
    {
       echo 'test';
    }

    public function test()
    {
        if(session()->get('role')=='inhabitant')
        {
            return redirect()->to('/');
        }
        else{
            if(isset($_POST['id'])){
                $data=array(
                    'date'=>$_POST['date'],
                    'description'=>$_POST['description'],
                );
                $quotemodel=new dailyQuote();
                $quotemodel->where('dailyQuoteID',$_POST['id'])->set($data)->update();
            }
            else{
               echo "echo werkt niet";
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
            'date'=>$this->request->getVar('date'),
            'description'=>$this->request->getVar('description'),
        );
        $quotemodel=new dailyQuote();
        $quotemodel->save($data);
        $id=$quotemodel->select('dailyQuoteID')->orderBy('dailyQuoteID','DESC')->first();
        return redirect()->to('/quote');
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



