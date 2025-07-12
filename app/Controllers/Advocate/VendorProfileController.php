<?php
namespace App\Controllers\Vendor;
use App\Controllers\BaseController;
use CodeIgniter\Database\Database;
use CodeIgniter\Config\Services;
use App\Models\ImageModel;
 
class VendorProfileController extends BaseController
{
     protected $arr_values = array(
        'routename'=>'vendor.profile.', 
        'title'=>'Profile', 
        'table_name'=>'users',
        'page_title'=>'Profile',
        "folder_name"=>'backend/vendor/profile',
        "upload_path"=>'upload/',
        "page_name"=>'profile.php',
       );

      public function __construct()
      {
        create_importent_columns($this->arr_values['table_name']);
        $this->db = \Config\Database::connect();
      }

    public function index()
    {
        $session = session()->get('user');
        $id = $session['id'];

        $data['title'] = "".$this->arr_values['title'];
        $data['page_title'] = "Manage ".$this->arr_values['page_title'];
        $data['upload_path'] = $this->arr_values['upload_path'];
        $data['route'] = base_url(route_to($this->arr_values['routename'].'index'));      
        $data['pagenation'] = array($this->arr_values['title']);
        $row = $this->db->table($this->arr_values['table_name'])->where(["id"=>$id,])->get()->getFirstRow();
        $db=$this->db;
        return view($this->arr_values['folder_name'].'/form',compact('data','row','db'));
    }
    public function update()
    {
        $session = session()->get('user');
        $add_by = $session['id'];
        $id = $add_by;

        $data = [
            "name"=>$this->request->getPost('name'),
            "gender"=>$this->request->getPost('gender'),
            "age"=>$this->request->getPost('age'),
            "phone"=>$this->request->getPost('mobile'),
            "email"=>$this->request->getPost('email'),
            "area"=>$this->request->getPost('area'),
            "city"=>$this->request->getPost('city'),
            "brand"=>json_encode($this->request->getPost('brand')),


            "company_name"=>$this->request->getPost('company_name'),
            "sales_contact"=>$this->request->getPost('sales_contact'),
            "authorized_person"=>$this->request->getPost('authorized_person'),
            "person_contact"=>$this->request->getPost('person_contact'),
            "gst"=>$this->request->getPost('gst'),
            "pan"=>$this->request->getPost('pan'),
            "udyam"=>$this->request->getPost('udyam'),
            "workshop_address"=>$this->request->getPost('workshop_address'),
            "service_contact"=>$this->request->getPost('service_contact'),
            "spares_accessories_contact"=>$this->request->getPost('spares_accessories_contact'),


            "status"=>1,
        ];

        $entryStatus = false;
        
        if($this->db->table($this->arr_values['table_name'])->where('id', $id)->update($data)) $entryStatus = true;
        else $entryStatus = false;        


        if($entryStatus)
        {
            $action = 'edit';
            $responseCode = 200;
            $result['status'] = $responseCode;
            $result['message'] = 'Success';
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
    public function update_profile_image()
    {
        $session = session()->get('user');
        $add_by = $session['id'];
        $id = $add_by;

        $data = [
            "status"=>1,
        ];

        $ImageModel = new ImageModel();
        $image = $ImageModel->upload_image('image', $this->request);
        if(!empty($image)) $data['image'] = $image;


        $entryStatus = false;        
        if($this->db->table($this->arr_values['table_name'])->where('id', $id)->update($data)) $entryStatus = true;
        else $entryStatus = false;        

        if($entryStatus)
        {
            $action = 'edit';
            $responseCode = 200;
            $result['status'] = $responseCode;
            $result['message'] = 'Success';
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
}