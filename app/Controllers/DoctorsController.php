<?php

namespace App\Controllers;

class DoctorsController extends BaseController
{

    public function index() {

        if(session()->get('role')=='inhabitant') {
            return redirect()->to('/');
        } else {
            echo view('templates/header');
            echo view('doctors');
            echo view('templates/footer');
        }
    }
}