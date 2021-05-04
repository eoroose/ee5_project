<?php

namespace App\Controllers;

class BackupController extends BaseController
{

    public function index() {

        if(session()->get('role')=='admin') {
            echo view('templates/header');
            echo view('backup');
            echo view('templates/footer');
        } else {
            return redirect()->to('/');
        }
    }
}