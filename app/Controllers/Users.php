<?php

namespace App\Controllers;

use App\Models\appointmentModel;
use App\Models\employeeModel;
use App\Models\godchildModel;
use App\Models\godparentModel;
use App\Models\inhabitantModel;
use App\Models\JournalModel;
use App\Models\UserModel;
use App\Models\customModel;

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
				'password' => 'required|min_length[8]|max_length[255]|validateUser[email,password]',
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
    public  function getWeek(){
        $date=date('Y-m-d');

        $journalmodel=new JournalModel();
        $data=$journalmodel->getWeekappoint($date,23);
        echo '<pre>'; print_r($data); echo '</pre>';
    }

    public function getMonth(){
        $date=date('Y-m-d');
        $journalmodel=new JournalModel();
        $data=$journalmodel->getMonthappoint($date,23);
        echo '<pre>'; print_r($data); echo '</pre>';
    }
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
    public function splashscreen()
    {
        echo view('templates/header');
        echo view('splashscreen');
        echo view('templates/footer');
    }

    public function logout(){
	    session()->destroy();
	    return redirect()->to('/');
    }

    public function register(){

	    helper(['form']);

        $db=db_connect();
        $customModel=new customModel($db);
        $result=$customModel->getActiveInhabitants();
        $doctor=$customModel->getDoctors();
        $data=array('godfathers'=> $result,'doctors'=>$doctor);
	    if($this->request->getMethod()=='post'){
	        $rules =[
	            'firstname' => 'required|min_length[3]|max_length[50]',
                'lastname' => 'required|min_length[3]|max_length[50]',
                'username' => 'required|min_length[3]|max_length[50]',
                'password' => 'required|min_length[8]|max_length[255]',
                'password_confirm' => 'matches[password]',
                'birthday' =>'required'
            ];
	        if(!$this->validate($rules)){
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
                    'gender'=>$this->request->getVar('gender')
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

                    $godparentUserID=$this->request->getVar('godfather');
                    $customModel->insert_godparent($godparentUserID);


                    $godparentmodel=new godparentModel();
                    $godparent = $godparentmodel->where('inhabitantID', $godparentUserID)
                        ->first();
                    $godparentID=$godparent['godParentID'];
                    $godchildmodel= new godchildModel();
                    $godchilddata=[
                        'inhabitantID'=>$inhabitantId,
                        'godParentID'=>$godparentID,
                        'isActive'=>true
                    ];
                    $godchildmodel->save($godchilddata);
                }
                else{
                    $employeemodel = new employeeModel();
                    if($select=='3')
                    {
                        $employeedata=[
                            'userID'=>$id,
                            'isAdmin'=>true
                        ];
                        $employeemodel->save($employeedata);
                    }
                    else{
                        $employeedata=[
                            'userID'=>$id,
                            'isAdmin'=>false
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

    }

