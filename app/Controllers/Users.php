<?php

namespace App\Controllers;

use App\Models\appointmentModel;
use App\Models\avatarModel;
use App\Models\employeeModel;
use App\Models\godchildModel;
use App\Models\godparentModel;
use App\Models\inhabitantModel;
use App\Models\JournalModel;
use App\Models\UserModel;
use App\Models\customModel;
use App\Models\yellowCardModel;

class Users extends BaseController
{
	public function index()
	{
	    $data= [];
	    helper(['form']);
	    #helper geeft je veel mogelijke helper functies die codeigniter heeft
        if($this->request->getMethod()=='post') {

            $rules = [
                'username' => 'required|min_length[3]|max_length[50]',
				'password' => 'required|min_length[4]|max_length[255]|validateUser[email,password]',
            ];

            $errors =[
                'password'=>['validateUser' => 'Email or Password don\'t match']
            ];
            if (!$this->validate($rules,$errors)) {
                $data['validation'] = $this->validator;
            }
            else{
                $model=new UserModel();
                $user = $model->where('username', $this->request->getVar('username'))
                    ->first();
                $user['role']=$this->findRole($user);
                $this->setUserSession($user);

                return redirect()->to('dashboard');
            }
        }



	    echo view('templates/header',$data);
        echo view('login');
        echo view('templates/footer');
	}



    private function findRole($user)
    {
        $model= new inhabitantModel();
        $inhabitant = $model->where('userID', $user['userID'])
            ->first();
        if($inhabitant!=null)
        {
            return 'inhabitant';
        }
        else{
            $adminmodel=new employeeModel();
            $employee= $adminmodel->where('userID',$user['userID'])
                ->first();
               if( $employee['isAdmin']==true)
               {
                   return 'admin';
               }
               else{
                   return 'employee';
               }
        }
    }

    public function getAvatars(){
	    $avatarModel=new avatarModel();
	    $data=$avatarModel->select()->get()->getResultArray();
        return $data;
    }
    // public  function getWeek(){
    //    $date_halfway=date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') + 21, date('Y')));
    //    $date=date('Y-m-d');
    //    $journalmodel=new JournalModel();
    //    $data=$journalmodel->getBetweendates($date,$date_halfway,2);

    //    echo '<pre>'; print_r($data); echo '</pre>';
    //}

    //public function getMonth(){
    //    $date=date('Y-m-d');
    //    $journalmodel=new JournalModel();
    //    $data=$journalmodel->getMonthappoint($date,23);
    //    echo '<pre>'; print_r($data); echo '</pre>';
    //}

    private function setUserSession($user){
        $data = [
            'id' => $user['userID'],
            'firstname' => $user['firstname'],
            'lastname' => $user['lastname'],
            'username' => $user['username'],
            'isLoggedIn' => true,
            'role'=>$user['role'],
        ];

        session()->set($data);
        return true;
    }
    public function screensaver()
    {
        echo view('templates/header');
        echo view('screensaver');
        echo view('templates/footer');
    }

    public function logout(){
	    session()->destroy();
	    return redirect()->to('/');
    }



    public function setYellowCards(){
        $inhabitantModel=new inhabitantModel();
        $date=date('Y-m-d');
        $data=$inhabitantModel->select()->get()->getResultArray();
        echo '<pre>'; print_r($data); echo '</pre>';
        $yellowCardModel=new yellowCardModel();
        foreach ($data as $row){

            $yellowCard=[
                'employeeAdminID'=>1,
                'inhabitantID'=>$row['inhabitantID'],
                'reason'=>'',
                'date'=>$date,
                'isActive'=>false
            ];
            $yellowCardModel->save($yellowCard);
        }
    }
    public function register(){
        if(session()->get('role')=='admin')
	    {
	    helper(['form']);

        $db=db_connect();
        $customModel=new customModel($db);
        $result=$customModel->getActiveInhabitants();
        $doctor=$customModel->getDoctors();
        $avatars=$this->getAvatars();
        $data=array('godfathers'=> $result,'doctors'=>$doctor,'avatars'=>$avatars);
	    if($this->request->getMethod()=='post'){
	        $rules =[
	            'firstname' => 'required|min_length[3]|max_length[50]',
                'lastname' => 'required|min_length[3]|max_length[50]',
                'username' => 'required|min_length[3]|max_length[50]|validateUserName[email,password]',
                'password' => 'required|min_length[8]|max_length[255]',
                'password_confirm' => 'matches[password]',
                'birthday' =>'required',
                'avatar'=>'required'
            ];
            $errors =[
                'username'=>['validateUserName' => 'Kies een unieke username']
            ];
	        if(!$this->validate($rules,$errors)){
	            $data['validation']= $this->validator;
            }else{

	            $user_model= new UserModel();
	            $newData=[
	                'firstname'=> $this->request->getVar('firstname'),
                    'lastname'=> $this->request->getVar('lastname'),
                    'username'=> $this->request->getVar('username'),
                    'password'=> $this->request->getVar('password'),
                    'birthday' =>$this->request->getVar('birthday'),
                    'isActive' =>true,
                    'gender'=>$this->request->getVar('gender'),
                    'avatar'=>$this->request->getVar('avatar')
                ];
                $user_model->save($newData);
                $user = $user_model->where('username', $this->request->getVar('username'))
                    ->first();
                $id=$user['userID'];
                $select=$this->request->getVar('inhabitantemployee');
                if($select=='2')
                {
                    $inhabitantmodel=new inhabitantModel();
                    $inhabitantdata=[
                        'userID'=>$id,
                        'arrivalDate'=>$this->request->getVar('arrival_data'),
                        'halfwayDate'=>$this->request->getVar('halfway_assignement'),
                        'godParentID'=>$this->request->getVar('godfather')
                    ];
                    $inhabitantmodel->save($inhabitantdata);

                   $inhabitant = $inhabitantmodel->where('userID', $id)
                        ->first();
                   $inhabitantId=$inhabitant['inhabitantID'];
                   $appointmentmodel=new appointmentModel();
                    $doctorID=$this->request->getVar('doctor');
                   $appointmentdata1=[
                       'inhabitantID'=>$inhabitantId,
                       'doctorID'=>$doctorID,
                       'date'=>$this->request->getVar('docter_appointment1'),
                       'reason'=>'standaard check'
                       ];
                    $appointmentdata2=[
                        'inhabitantID'=>$inhabitantId,
                        'doctorID'=>$doctorID,
                        'date'=>$this->request->getVar('docter_appointment2'),
                        'reason'=>'standaard check'
                        ];
                    $appointmentmodel->save($appointmentdata1);
                    $appointmentmodel->save($appointmentdata2);
                    $customModel->newInhabitantProgress($inhabitantId);

                    $yellowCardModel=new yellowCardModel();
                    $employeemodel=new employeeModel();
                    $admin=$employeemodel->select()->where('userID',session()->get('id'))->first();
                    $yellowCard=[
                        'employeeAdminID'=>$admin['employeeAdminID'],
                        'inhabitantID'=>$inhabitantId,
                        'reason'=>'',
                        'date'=>$this->request->getVar('arrival_data'),
                        'isActive'=>false
                    ];
                    $yellowCardModel->save($yellowCard);
                }
                else {
                    $employeemodel = new employeeModel();
                    if ($select == '3') {
                        $employeedata = [
                            'userID' => $id,
                            'isAdmin' => true
                        ];
                        $employeemodel->save($employeedata);
                    } else {
                        $employeedata = [
                            'userID' => $id,
                            'isAdmin' => false
                        ];
                        $employeemodel->save($employeedata);
                    }
                }
	            $session=session();
	            $session->setFlashdata('succes','Succesful Registration');
	            return redirect()->to('/dashboard');
            }
        }


        echo view('templates/header',$data);
        echo view('register',$data);
        echo view('templates/footer',$data);
    }
    else
        {
        return redirect()->to('/');
        }
}

    }

