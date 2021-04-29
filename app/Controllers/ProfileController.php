<?php

namespace App\Controllers;

use App\Models\UserModel;

class ProfileController extends BaseController
{
	public function index()
	{

        $data=[];
        $username = session()->get('username');
        $userModel=new UserModel();
        $user=$userModel->where('username',$username)->select('userID, username, firstname, lastname, birthday')->first();
        $data['userID'] = $user['userID'];
        $data['username'] = $user['username'];
        $data['firstname'] = $user['firstname'];
        $data['lastname'] = $user['lastname'];
        $data['birthday'] = $user['birthday'];

        echo view('templates/header', $data);
        echo view('profile');
        echo view('templates/footer');
    }
}