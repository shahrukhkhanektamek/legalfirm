<?php

namespace App\Controllers\User;
use App\Controllers\BaseController;
use CodeIgniter\Database\Database;


class UserDashboardController extends BaseController
{
    protected $db;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->pager = \Config\Services::pager();
    }
    public function index()
    {



        $data = [];
        $table_name = '';
        $p_id = '';
        $meta_image = '';

        // Get the full base URL
        $request = service('request');
        $base = base_url();
        $slug = $url = $request->getUri()->getSegment(1); // Get the path from URL
        $stateCity = '';
        if(!empty($url))
        {
            $checkStateCity = explode('-in-',$url);
            if(count($checkStateCity)>1)
            {
                $stateCity = decodeSlug($checkStateCity[1]);
                $emptyCehck1 = $this->db->table('state')->where("name", $stateCity)->get()->getRow();
                $emptyCehck2 = $this->db->table('city')->where("name", $stateCity)->get()->getRow();
                if(!empty($emptyCehck1) || !empty($emptyCehck2))
                {
                    $url = $checkStateCity[0];
                }
            }
        }

        
        if(empty($page))
        {
            $url = 'home';
            $page = 'dashboard.php';
        }

        // Check if the slug exists in the database
        $slug_data = $this->db->table("slugs")
            ->where("slug", $url)
            ->get()
            ->getResultObject();

        if (!empty($slug_data)) {
            $slug_data = $slug_data[0];
            $page = $slug_data->page_name;
            $table_name = $slug_data->table_name;
            $p_id = $slug_data->p_id;
        } else {
            $count = explode(".", $page);
            if (count($count) == 1) {
                $page = $count[0] . '.php';
            } else {
                $page = $count[0] . '.' . $count[1];
            }
        }


        
        $check_page = ROOTPATH . 'app/Views/web/account/dashboard.php';
        


        $data['contact_detail'] = json_decode($this->db->table('setting')->getWhere(["name"=>'main',])->getRow()->data);
        $data['policy'] = json_decode($this->db->table('setting')->getWhere(["name"=>'policy',])->getRow()->data);
        $data['logo'] = json_decode($this->db->table('setting')->getWhere(["name"=>'logo',])->getRow()->data);
        $data['db'] = $this->db;
        $data['request'] = $this->request;
        $data['pager'] = $this->pager;
        $data['slug'] = $slug;
        $data['id'] = 0;
        $data['stateCity'] = $stateCity ? ' In '.$stateCity : $stateCity;
        $data['script'] = $this->db->table('script')->get()->getRow();


        $num1 = rand(1, 10);
        $num2 = rand(1, 10);
        session()->set('captcha_answer', $num1 + $num2);
        $data['captcha_num1'] = $num1;
        $data['captcha_num2'] = $num2;



        
        $meta_select = "page_name, meta_title, meta_keywords, meta_description, meta_author";
        $meta_data = $this->db->table("meta_tags")->select($meta_select)->where("slug", $url)->get()->getResultObject();
        $meta_title = '';
        $meta_keyword = '';
        $meta_description = '';
        $meta_auther = '';
        if (!empty($meta_data)) {
            $meta_data = $meta_data[0];
            $meta_title = $meta_data->meta_title;
            $meta_keyword = $meta_data->meta_keywords;
            $meta_description = $meta_data->meta_description;
            $meta_auther = $meta_data->meta_author;
        } else {
            $meta_data = $this->db->table("meta_tags")->select($meta_select)->where(["slug" => 'home', "is_delete" => 0, "status" => 1])->limit(1)->get()->getResultObject();
            if (!empty($meta_data)) {
                $meta_data = $meta_data[0];
                $meta_title = $meta_data->meta_title;
                $meta_keyword = $meta_data->meta_keywords;
                $meta_description = $meta_data->meta_description;
                $meta_auther = $meta_data->meta_author;
            }
        }
        $data['meta_data'] = $meta_data;
        

        if (file_exists($check_page)) {

            if (!empty($table_name)) {
                $data['row_data'] = $this->db->table($table_name)
                    ->where("id", $p_id)
                    ->get()
                    ->getRow();
                if(!empty($data['row_data']))
                {
                    $data['id'] = $data['row_data']->id;
                }
                $data['row'] = $data['row_data'];

            }
            
            return view('web/account/dashboard.php' , $data);

        } else {
            return view('web/404', $data);
        }

        diel;


        $data = [];
        $leads_count = [];
        $db = $this->db;
        return view('web/account/dashboard',compact('leads_count','data','db'));
    }
}