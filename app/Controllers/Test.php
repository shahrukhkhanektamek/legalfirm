<?php

namespace App\Controllers;
use CodeIgniter\Database\Database;
use CodeIgniter\HTTP\RequestInterface;

class Test extends BaseController
{

    protected $db;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }
    public function index()
    {
        $table_name = 'service';
        $page_name = 'single-service.php';
        $main_menus = $this->db->table($table_name)->getWhere(["status"=>1,])->getResultObject();
        // die;
        foreach ($main_menus as $key => $value)
        {
            $name = $value->name;
            $slug = $value->slug;
            $id = $value->id;
            if(empty($slug)) $slug = slug($name);
            else $slug = slug($slug);
            $p_id = $id;
            $table_name = $table_name;
            $new_slug = insert_slug($slug,$p_id,$table_name,$page_name);
            insert_meta_tag($new_slug,$name);
        }

    }
    
}
