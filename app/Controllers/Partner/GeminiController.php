<?php
namespace App\Controllers\Partner;
use App\Controllers\BaseController;
use CodeIgniter\Database\Database;
use CodeIgniter\Config\Services;
use App\Models\ImageModel;

class GeminiController extends BaseController
{
     protected $arr_values = array(
        'routename'=>'partner.package.', 
        'title'=>'Gemini', 
        'table_name'=>'package',
        'page_title'=>'Gemini',
        "folder_name"=>'partner/gemini',
        "upload_path"=>'upload/',
        "page_name"=>'package-single.php',
       );

      public function __construct()
      {
        create_importent_columns($this->arr_values['table_name']);
        $this->db = \Config\Database::connect();
      }

    public function index()
    {
        $session = session()->get('user');
        $vendor_id = $session['id'];

        $data['title'] = "".$this->arr_values['title'];
        $data['page_title'] = "Manage ".$this->arr_values['page_title'];
        $data['upload_path'] = $this->arr_values['upload_path'];
        $data['route'] = base_url(route_to($this->arr_values['routename'].'list'));      
        $data['pagenation'] = array($this->arr_values['title']);

        $db = $this->db;

        $row = [];

        return view($this->arr_values['folder_name'].'/index',compact('data','db','row'));
    }
   
    
    

}