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
        if (session()->get('role') == 'inhabitant') {
            return redirect()->to('/');
        } else {
            $quotemodel = new dailyQuote();
            $date = date('Y-m-d');
            $result = $quotemodel->where('date >=', $date)->orderBy('date', 'ASC')->get()->getResultArray();
            $data = array('quotes' => $result);
            echo view('templates/header', $data);
            echo view('quote');
            //echo '<pre>'; print_r($data); echo '</pre>';

            echo view('templates/footer');

        }
    }

    public function edit()
    {
        if (session()->get('role') == 'inhabitant') {
            return redirect()->to('/');
        } else {
            if (isset($_POST['id'])) {
                $time = strtotime($_POST['date']);

                $newformat = date('Y-m-d', $time);
                $data = array(
                    'date' => $newformat,
                    'description' => $_POST['description'],
                );
                $quotemodel = new dailyQuote();
                $quotemodel->where('dailyQuoteID', $_POST['id'])->set($data)->update();

            }

        }
    }

    public function insert()
    {
        if (session()->get('role') == 'inhabitant') {
            return redirect()->to('/');
        } else {
            $data = array(
                'date' => $this->request->getVar('date'),
                'description' => $this->request->getVar('description'),
            );
            $quotemodel = new dailyQuote();
            $quotemodel->save($data);

            return redirect()->to('/quote');
        }
    }

    public function delete()
    {
        if (session()->get('role') == 'inhabitant') {
            return redirect()->to('/');
        } else {
            if (isset($_POST['id'])) {
                $quotemodel = new dailyQuote();
                $id = $_POST['id'];
                $quotemodel->where('dailyQuoteID', $id)->delete();
            }

        }
    }

}

