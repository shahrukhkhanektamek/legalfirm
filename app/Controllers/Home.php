<?php

namespace App\Controllers;
use CodeIgniter\Database\Database;
use CodeIgniter\HTTP\RequestInterface;

class Home extends BaseController
{

    protected $db;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->pager = \Config\Services::pager();
    }
    public function index()
    {
        return view('web/index');
    }
    public function all($page = null)
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
            $page = 'index.php';
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


        // Check if the page file exists
        if($page=='user.php')
        {
            $session = session()->get('user');
            $role = @$session['role'];
            if($role!=2) return redirect()->to(base_url('login'));
            $check_page = ROOTPATH . 'app/Views/web/account/dashboard.php';
        }
        else
        {
            $check_page = ROOTPATH . 'app/Views/web/' . $page;
        }


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
            if($page=='user.php')
            return view('web/account/dashboard.php' , $data);
            else
            return view('web/' . $page, $data);

        } else {
            return view('web/404', $data);
        }
    }
    public function bike_modal()
    {
        $return_data = [];
        $id = decript($this->request->getPost('id'));
        $type = (int) $this->request->getPost('type');

        $session = session()->get('user');
        $user_id = @$session['id'];
        $role = @$session['role'];

        $data['is_logedin'] = 0;
        $data['type'] = $type;

        if($role==2)
        {
            $data['user'] = get_user();
            $data['is_logedin'] = 1;
        }

        $table_name = 'product';
        $row = $this->db->table("product")
        ->join('product_top_speed', 'product_top_speed.id = '.$table_name.'.speed', 'left')
        ->select("{$table_name}.*, product_top_speed.name as speed_name")
        ->where([$table_name.".id"=>$id,])->get()->getFirstRow();        
        $row->price = price_formate($row->price);
        $row->image = image_check($row->images);

        if($type==1 || $type==2)
        {
            if($data['is_logedin']==1)
            {
                $colors = [];
                if(json_decode($row->color))
                {
                    $colorId = json_decode($row->color);
                    $colors = $this->db->table("color")->whereIn("id", $colorId)->get()->getResultObject();
                }

                $responseCode = 200;
                $result['status'] = $responseCode;
                $result['message'] = 'Fetch Successfuly';
                $result['action'] = 'search';
                $result['data'] = ["row"=>$row,"data"=>$data,"colors"=>$colors,];
                return $this->response->setStatusCode(200)->setJSON($result);                
            }
            else
            {
                $responseCode = 400;
                $result['status'] = $responseCode;
                $result['message'] = 'Login First!';
                $result['action'] = 'search';
                $result['data'] = ["row"=>$row,"data"=>$data,];
                return $this->response->setStatusCode(200)->setJSON($result);                
            }
        }
        else
        {
            $responseCode = 200;
            $result['status'] = $responseCode;
            $result['message'] = 'Fetch Successfuly';
            $result['action'] = 'search';
            $result['data'] = ["row"=>$row,"data"=>$data,];
            return $this->response->setStatusCode(200)->setJSON($result); 
        }
    }

    public function search_vendor($value='')
    {        
        $search = $this->request->getVar('search');
        $table_name = 'users';
        $package_table = 'vendor_package';
        $builder = $this->db->table($table_name)

            ->select("{$table_name}.*, city.name as city_name")
            ->join('city', 'city.id = '.$table_name.'.city', 'left')
            ->join($package_table, "{$package_table}.vendor_id = {$table_name}.id", 'left')
            ->where("{$table_name}.status", 1)
            ->where("{$table_name}.role", 3)
            ->where("{$package_table}.is_delete", 0)
            ->where("{$package_table}.plan_end_date_time >=", date('Y-m-d H:i:s'));
        if (!empty($search)) {
            $builder->groupStart()
                ->like("{$table_name}.name", $search)
                ->groupEnd();
        }
        $builder->groupBy("{$table_name}.id");
        $data_list = $builder
            ->orderBy("{$table_name}.id", 'desc')
            ->limit(50, 0)
            ->get()
            ->getResult();
        $return_data = [];
        foreach ($data_list as $key => $value) {
            $return_data[] = [
                "id" => $value->id,
                "text" => $value->company_name.' ('.$value->name.', '.$value->area.', '.$value->city_name.')',
            ];
        }
        $data['results'] = $return_data;
        return $this->response->setStatusCode(200)->setJSON($data);       
    }
    public function search_city($value='')
    {        
        $search = $this->request->getVar('search');
        $table_name = 'city';
        $builder = $this->db->table($table_name)->where("{$table_name}.status", 1);
        if (!empty($search)) {
            $builder->groupStart()->like("{$table_name}.name", $search)->groupEnd();
        }
        $data_list = $builder->orderBy("{$table_name}.id", 'desc')->limit(50, 0)->get()->getResult();
        $return_data = [];
        foreach ($data_list as $key => $value) {
            $return_data[] = [
                "id" => $value->id,
                "text" => $value->name,
            ];
        }
        $data['results'] = $return_data;
        return $this->response->setStatusCode(200)->setJSON($data);       
    }
}
