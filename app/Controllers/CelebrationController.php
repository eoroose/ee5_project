<?php

namespace App\Controllers;

class CelebrationController extends BaseController
{

    public function index() {

        if(session()->get('role')=='inhabitant') {
            return redirect()->to('/');
        } else {
            echo view('templates/header');
            echo view('celebration');
            echo view('templates/footer');
        }
    }
}