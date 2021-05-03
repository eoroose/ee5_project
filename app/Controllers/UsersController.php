<?php

namespace App\Controllers;

class UsersController extends BaseController
{

    public function index() {

        if(session()->get('role')=='admin') {
            echo view('templates/header');
            echo view('users');
            echo view('templates/footer');
        } else {
            return redirect()->to('/');
        }
    }

    public function inhabitantsPage() {

        if(session()->get('role')=='employee') {
            echo view('templates/header');
            echo view('inhabitants');
            echo view('templates/footer');
        } else {
            return redirect()->to('/');
        }
    }
}