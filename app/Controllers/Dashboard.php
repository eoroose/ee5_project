<?php

namespace App\Controllers;

use App\Models\eventsModel;

class Dashboard extends BaseController
{
	public function index()
	{

	    $data=[];
	    $data['event']=$this->dashAgenda();
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
}
