<?php

namespace App\Controllers;
use CodeIgniter\Database\Database;
use CodeIgniter\HTTP\RequestInterface;

class Enquiry extends BaseController
{
    protected $db;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }
    public function contact_enquiry()
    {
        $table_name = 'enquiry_contact';
        $data['name'] = $this->request->getPost('name');
        $data['email'] = $this->request->getPost('email');
        $data['phone'] = $this->request->getPost('phone');
        $data['subject'] = $this->request->getPost('subject');
        $data['coment'] = $this->request->getPost('message');
        

        $data['url'] = $this->request->getPost('url');
        $data['status'] = 1;
        $data['is_delete'] = 0;
        $data['add_date_time'] = date("Y-m-d H:i:s");
        $data['update_date_time'] = date("Y-m-d H:i:s");


        if ($this->request->getPost('captcha') != session()->get('captcha_answer'))
        {
            $action = 'modalsubmitadd';
            $responseCode = 400;
            $result['status'] = $responseCode;
            $result['message'] = 'Wrong Captcha!';
            $result['modalid'] = 'enquiryModal';
            $result['action'] = $action;
            $result['data'] = [];
            return $this->response->setStatusCode($responseCode)->setJSON($result);
        }



        $entryStatus = false;
        if($this->db->table($table_name)->insert($data)) $entryStatus = true;
        else $entryStatus = false;
        $id = $insertId = $this->db->insertID();

        if($entryStatus)
        {
            $action = 'modalsubmitadd';
            $responseCode = 200;
            $result['status'] = $responseCode;
            $result['message'] = 'Success';
            $result['modalid'] = 'enquiryModal';
            $result['action'] = $action;
            $result['data'] = [];
            return $this->response->setStatusCode($responseCode)->setJSON($result);
        }
        else
        {
            $action = 'add';
            $responseCode = 400;
            $result['status'] = $responseCode;
            $result['message'] = $this->db->error()['message'];
            $result['action'] = $action;
            $result['data'] = [];
            return $this->response->setStatusCode($responseCode)->setJSON($result);
        }
    }
    public function bike_enquiry()
    {
        $session = session()->get('user');
        $user_id = @$session['id'];


        $table_name = 'enquiry_lead';
        $data['name'] = $this->request->getPost('name');
        $data['email'] = $this->request->getPost('email');
        $data['phone'] = $this->request->getPost('phone');
        $data['bike_id'] = $this->request->getPost('bike_id');
        $data['bike_name'] = $this->request->getPost('bike_name');
        $data['color'] = $this->request->getPost('color');
        $data['user_id'] = $user_id;
        
        $data['url'] = $this->request->getPost('url');
        $data['status'] = 1;
        $data['is_delete'] = 0;
        $data['add_date_time'] = date("Y-m-d H:i:s");
        $data['update_date_time'] = date("Y-m-d H:i:s");

        // if ($this->request->getPost('captcha') != session()->get('captcha_answer'))
        // {
        //     $action = 'modalsubmitadd';
        //     $responseCode = 400;
        //     $result['status'] = $responseCode;
        //     $result['message'] = 'Wrong Captcha!';
        //     $result['modalid'] = 'enquiryModal';
        //     $result['action'] = $action;
        //     $result['data'] = [];
        //     return $this->response->setStatusCode($responseCode)->setJSON($result);
        // }


        $entryStatus = false;
        if($this->db->table($table_name)->insert($data)) $entryStatus = true;
        else $entryStatus = false;
        $id = $insertId = $this->db->insertID();

        if($entryStatus)
        {
            $action = 'modalsubmitadd';
            $responseCode = 200;
            $result['status'] = $responseCode;
            $result['message'] = 'Success';
            $result['modalid'] = 'InquiryModal';
            $result['action'] = $action;
            $result['data'] = [];
            return $this->response->setStatusCode($responseCode)->setJSON($result);            
        }
        else
        {
            $action = 'add';
            $responseCode = 400;
            $result['status'] = $responseCode;
            $result['message'] = $this->db->error()['message'];
            $result['action'] = $action;
            $result['data'] = [];
            return $this->response->setStatusCode($responseCode)->setJSON($result);
        }
    }
    public function bike_booking_enquiry()
    {

        $session = session()->get('user');
        $user_id = @$session['id'];

        $table_name = 'enquiry_booking';
        $data['name'] = $this->request->getPost('name');
        $data['email'] = $this->request->getPost('email');
        $data['phone'] = $this->request->getPost('phone');
        $data['bike_id'] = $this->request->getPost('bike_id');
        $data['bike_name'] = $this->request->getPost('bike_name');
        $data['color'] = $this->request->getPost('color');
        $data['amount'] = $this->request->getPost('booking_amount');
        $data['user_id'] = $user_id;
        
        $data['url'] = $this->request->getPost('url');
        $data['status'] = 0;
        $data['is_delete'] = 0;
        $data['add_date_time'] = date("Y-m-d H:i:s");
        $data['update_date_time'] = date("Y-m-d H:i:s");

        // if ($this->request->getPost('captcha') != session()->get('captcha_answer'))
        // {
        //     $action = 'modalsubmitadd';
        //     $responseCode = 400;
        //     $result['status'] = $responseCode;
        //     $result['message'] = 'Wrong Captcha!';
        //     $result['modalid'] = 'enquiryModal';
        //     $result['action'] = $action;
        //     $result['data'] = [];
        //     return $this->response->setStatusCode($responseCode)->setJSON($result);
        // }


        $entryStatus = false;
        if($this->db->table($table_name)->insert($data)) $entryStatus = true;
        else $entryStatus = false;
        $id = $insertId = $this->db->insertID();

        if($entryStatus)
        {
            $action = 'modalsubmitadd';
            $action = 'redirect';
            $responseCode = 200;
            $result['status'] = $responseCode;
            $result['message'] = 'Success';
            $result['modalid'] = 'bookingModal';
            $result['action'] = $action;
            $result['url'] = base_url('payment/create-transaction?insertId='.$insertId.'&p_id='.encript($data['bike_id']).'&type=2&user_id='.encript(session()->get('user')['id']));
            $result['data'] = [];
            return $this->response->setStatusCode($responseCode)->setJSON($result);            
        }
        else
        {
            $action = 'add';
            $responseCode = 400;
            $result['status'] = $responseCode;
            $result['message'] = $this->db->error()['message'];
            $result['action'] = $action;
            $result['data'] = [];
            return $this->response->setStatusCode($responseCode)->setJSON($result);
        }
    }
   
}
