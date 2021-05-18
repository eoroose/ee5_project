<?php

namespace App\Controllers;

use App\Models\appointmentModel;
use App\Models\avatarModel;
use App\Models\doctorModel;
use App\Models\inhabitantModel;
use App\Models\UserModel;

class ProfileController extends BaseController
{
	public function index()
	{
        $id = session()->get('id');
        $data=$this->getData($id);
        echo view('templates/header', $data);
        echo view('profile');
        echo view('templates/footer');
    }

    private function getData($id){
        $user=$this->getInfo($id);
        $avatar=$this->getAvatar($user['avatar']);
        $avatars=$this->getAvatars();
        if(session()->get('role')=='inhabitant'){
        $godparent=$this->getGodparent($id);
        $godchilds=$this->getGodChilds($id);
        if($godchilds==null)
        {
            $data['godchilds']=null;
        }
        else
        {
            $data['godchilds']=$godchilds;
        }
        $appointments=$this->getAppointments($id);
        $data=array(
            'user'=>$user,
            'avatar'=>$avatar,
            'avatars'=>$avatars,
            'godparent'=>$godparent,
            'godchilds'=>$godchilds,
            'appointments'=>$appointments
        );}
        else{
            $data=array(
                'user'=>$user,
                'avatar'=>$avatar,
                'avatars'=>$avatars);
        }

        return $data;

    }
    private function getInfo($id){
        $userModel=new UserModel();
        return $userModel->where('userId',$id)->select()->first();

    }

    private function getAvatar($id)
    {
        $avatarModel= new avatarModel();
        return $avatarModel->where('id',$id)->first();
    }
    private function getAvatars(){
            $avatarModel=new avatarModel();
            $data=$avatarModel->select()->get()->getResultArray();
            return $data;
    }
    public function changePassword(){
        helper(['form']);
        if($this->request->getMethod()=='post'){
            $rules =[
                'old-password'=>'required|validate[email,old-password]',
                'new-password' => 'required|min_length[4]|max_length[255]',
                'confirm-password' => 'matches[new-password]',
            ];
            $errors =[
                'old-password'=>['validate' => 'Kies een unieke username']
            ];
            if (!$this->validate($rules,$errors)) {

                $validation = $this->validator;
            }
            else{
                $model = new UserModel();
                $user=$model->where('userId',session()->get('id'))->first();
                $correct= password_verify($this->request->getVar('old-password'),$user['password']);
                echo $correct;
                if($correct==true){
                    $model->where('userId', session()->get('id'))->set('password',$this->request->getVar('new-password'))->update();
                    $session=session();
                    $session->setFlashdata('succes','Changed Password');
                    return redirect()->to('/profile');
                }
                else{
                    $data['validation'] = "Passwords don't match";
                }
            }
        }

        $id = session()->get('id');
        $data=$this->getData($id);
        if($validation==null){}else {$data["validation"]=$validation;}
        echo view('templates/header', $data);
        echo view('profile');
        echo view('templates/footer');
    }
    public function changeAvatar(){
        if(isset($_POST['id'])) {

            $usermodel = new UserModel();
            $usermodel->where('userID', session()->get('id'))->set('avatar', $_POST['id'])->update();
        }}
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

    private function getAppointments($userID){
	    $id=$this->getInhabitantid($userID);
        //echo '<pre>'; print_r($id ); echo '</pre>';

	    $appointmentModel=new appointmentModel();
	    $apoint=$appointmentModel->where('inhabitantId',$id)->get()->getResultArray();
        //echo '<pre>'; print_r($apoint ); echo '</pre>';
        $doctorModel=new doctorModel();
        $data=[];
        foreach ($apoint as $apppointment){
            $doctor=$doctorModel->select('firstname, lastname')->where('doctorID',$apppointment['doctorID'])->first();
            //echo '<pre>'; print_r($doctor ); echo '</pre>';
            $testData=array(
                'doctorFirstname'=>$doctor['firstname'],
                'doctorLasttname'=>$doctor['lastname'],
                'dateAppointment'=>$apppointment['date'],
                'reason'=>$apppointment['reason']
            );
            //echo '<pre>'; print_r($testData ); echo '</pre>';
            array_push($data,$testData);
        }
        //echo '<pre>'; print_r($data ); echo '</pre>';
        return $data;
    }
}