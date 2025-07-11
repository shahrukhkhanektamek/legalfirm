<?php

namespace App\Controllers\Vendor;
use App\Controllers\BaseController;
use CodeIgniter\Database\Database;


class VendorDashboardController extends BaseController
{
    protected $db;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }
    public function index()
    {
        $data = [];
        $leads_count = [];
        $db = $this->db;
        return view('backend/vendor/dashboard/index',compact('leads_count','data','db'));
    }
}