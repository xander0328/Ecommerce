<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class MainController extends BaseController
{
    public $product, $category, $userModel, $session;
    public function __construct()
    {
        $this->product = new \App\Models\Product();
        $this->category = new \App\Models\Category();
        $this->userModel = new \App\Models\UserModel();
        $this->session = \Config\Services::session();
    }
    public function index()
    {
        $data['product'] = $this->product->findAll();
        $data['category'] = $this->category->findAll();
        $data['new_arrival'] = $this->product->select('*')->orderBy('product_id', 'DESC')->limit(5)->find();
        $data['menu_category'] = $this->product->distinct()->select('category.*')->join('category', 'product.category_id = category.category_id')->findAll();
        // session_unset();
        return view('index', $data);
    }
    
    public function admin(){
            $data['category'] = $this->category->findAll();
            $data['product'] = $this->product->findAll();

            $data['catItems'] = $this->product->select('category_id, COUNT(*) as count')->groupBy('category_id')->findAll();
            return view('admin', $data);
        
        
        // else {
        //     $session->setFlashdata('msg', 'Invalid account!');
        //     return redirect()->to('/login_form');
        // }
        
    }

    public function save_profile($id) {
        $session = session();
        $username = $this->request->getPost('username');
        $sex = $this->request->getPost('sex');
        $birthday = $this->request->getPost('birthday');
        $phone = $this->request->getPost('phone');

        // Create an associative array with the data
        $data = [
            'username' => $username,
            'sex' => $sex,
            'birthday' => $birthday,
            'phone' => $phone
        ];
        $this->userModel->set($data)->update($id);
         $data = $this->userModel->where('user_id', $id)->first();
        $role = $this->userModel->select('type')->find($id);
        
        $ses_data = [
                'id' => $data['user_id'],
                'username' => $data['username'],
                'role' => $data['type'],
                'sex' => $data['sex'],
                'birthday' => $data['birthday'],
                'phone' => $data['phone'],
                'isLoggedin' => TRUE

                ];
                
                $session->set($ses_data);
        if($role == 'admin')
            return redirect()->to('admin');
        else
            return redirect()->to(previous_url());
    }

    public function change_password(){
        $userId = session()->get('id');
        
        $data = $this->userModel->find($userId);
        
        $oldPassword = $this->request->getPost('old_password');
        $newPassword = $this->request->getPost('new_password');
        $confirmPassword = $this->request->getPost('confirm_password');

        $authenticatePassword = password_verify($oldPassword, $data['password']);
        if($authenticatePassword){
            if ($newPassword === $confirmPassword) {
                $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);

                $this->userModel->update($userId, ['password' => $hashedPassword]);

                $this->session->set('alert','Password successfully updated');
                if($data['type'] == 'admin')
                return redirect()->to('/admin');

                else
                return redirect()->to(previous_url());
            }
        }else{
            $this->session->set('alert', 'Old Password incorrect');
            return redirect()->to(previous_url());
            
        }
        
    }

    public function update_admin(){
        $userId = session()->get('id');
        $oldUsername = session()->get('username');
        
        $newUsername = $this->request->getPost('new_username');
        $oldPassword = $this->request->getPost('old_password');
        $newPassword = $this->request->getPost('new_password');
        $confirmPassword = $this->request->getPost('confirm_password');
        $data = $this->userModel->find($userId);
        
        if (!empty($newUsername)) {
            $this->userModel->update($userId, ['username' => $newUsername]);
            session()->set('username',$newUsername ) ;
        }

        if (!empty($newPassword) && $newPassword == $confirmPassword) {
             $authenticatePassword = password_verify($oldPassword, $data['password']);
             
             if($authenticatePassword){
                $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);
                $this->userModel->update($userId, ['password' => $hashedPassword]);
                $this->session->setFlashdata('success', 'Credential Updated');
             }
             else {
                $this->session->setFlashdata('alert', 'Old Password incorrect.');
             }
        }
    return redirect()->to('admin');
        
    }
    
    public function logout() {
        session_unset();
        return redirect()->to(base_url());
    }
    
    public function login_form() {
        return view('login');
    }

    public function signup_form() {
        return view('signup');
    }
    
    public function register(){
       helper(['form']);

        $rules = [
            'username' => 'required|min_length[4]|max_length[100]|is_unique[user.username]',
            'password' => 'required|min_length[4]|max_length[50]',
            'confirm_password' => 'matches[password]'
        ];
        
        if($this->validate($rules)){
            
            $data =[
                'username' => $this->request->getVar('username'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];
            
            $this->userModel->save($data);
            return redirect()->to('/login_form');
        }else{
            $data['validation'] = $this->validator;
            echo view('signup', $data);
        }
    }

    public function login()
    {
        $session = session();

        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $data = $this->userModel->where('username', $username)->first();

        if($data){
            $pass = $data['password'];
            $authenticatePassword = password_verify($password, $pass);
            
            if($authenticatePassword){
                $ses_data = [
                'id' => $data['user_id'],
                'username' => $data['username'],
                'role' => $data['type'],
                'sex' => $data['sex'],
                'birthday' => $data['birthday'],
                'phone' => $data['phone'],
                'isLoggedin' => TRUE

                ];
                
                $session->set($ses_data);
                if($data['type'] == 'user')
                return redirect()->to(base_url());  

                else
                return redirect()->to('/admin');  
                
                
            }else{
                $session->setFlashdata('msg', 'Password is incorrect.');
                return redirect()->to('/login_form');

            }

        }else{
        $session->setFlashdata('msg', 'Username does not exist.');
        return redirect()->to('/login_form');

        }
    }

    public function add_product(){
            $image = $this->request->getFile('image');
          
            $imageContent = file_get_contents($image->getTempName()); 
        $data = [
            'name' => $this->request->getVar('name'),
            'description' =>$this->request->getVar('description'),
            'price' => $this->request->getVar('price'), 
            'image' => $imageContent,
            'category_id' => $this->request->getVar('category_id'),
            'quantity' => $this->request->getVar('quantity'),
        ];

        $this->product->save($data);
     $this->session->setFlashdata('success', 'Product "'.$data['name'].'" successfully added');

        return redirect()->to('/admin');
    
    }
    
    public function add_category()
    {
        
        $categ = $this->category->findAll();
     $data = ['name' => $this->request->getVar('name')];
     $exist = false;
     foreach ($categ as $cat) {
        foreach ($data as $value) {
            if($cat['name'] == $value)
            $exist = true;
            break;
        }
        if($exist)
        break;
     }
     if($exist)
     $this->session->setFlashdata('alert', 'Category already exist!');
    //  echo(getType($categ));
    // echo(getType($data));
    else
     $this->category->save($data);
            $this->session->setFlashdata('success', 'Category "'.$data['name'].'" successfully added');

     return redirect()->to("/admin");
    }

    public function del_category($id){
        $products = $this->product->select('product_id')->where('category_id', $id)->findAll();
        foreach($products as $prod){
            $this->product->set('category_id', 1)->where('product_id', $prod['product_id'])->update();            
        }
        // echo '<pre>';
        // print_r($products);
        $toDelete = $this->category->select('name')->find($id);
        foreach ($toDelete as $value) {
            $this->session->setFlashdata('success', 'Category "'.$value.'" successfully deleted');
        }
        $this->category->delete($id);

        return redirect()->to('/admin');
    }

    public function edit_product($id){
        $data = $this->product->select('product_id,name,description,price,category_id,quantity')->find($id);
       echo json_encode($data);
    }

    public function update_product($id){
        $data = [
            'name' => $this->request->getVar('name'),
            'description' =>$this->request->getVar('description'),
            'price' => $this->request->getVar('price'), 
            'category_id' => $this->request->getVar('category_id'),
            'quantity' => $this->request->getVar('quantity'),
        ];
       
        if (isset($_FILES['image'])) { 
            $image = $this->request->getFile('image'); 
            if ($_FILES['image']['name'] != null){
                 $imageContent = file_get_contents($image->getTempName()); 
             $data['image'] = $imageContent;
            }
        }
        $toUpdate = $this->product->select('name')->find($id);
        foreach ($toUpdate as $value) {
            $this->session->setFlashdata('success', 'Product "'.$value.'" successfully updated');
        }
            $this->product->update($id, $data);
            return redirect()->to('/admin');
    }

    public function delete_product($id){
        $toDelete = $this->product->select('name')->find($id);
        foreach ($toDelete as $value) {
            $this->session->setFlashdata('success', 'Product "'.$value.'" successfully deleted');
        }
        $this->product->delete($id);
        return redirect()->to('/admin');  
    }

    public function view_product($id){
        $data['product'] = $this->product->find($id);
        $data['prod_list'] = $this->product->findAll();
        $data['category'] = $this->category->findAll();
        return view('product-detail', $data);
    }

    public function category($cat){
         $data['product'] = $this->product->where('category_id', $cat)->findAll();
        $data['category'] = $this->category->findAll();
        $data['selected_category'] = $this->category->find($cat);
        $data['menu_category'] = $this->product->distinct()->select('category.*')->join('category', 'product.category_id = category.category_id')->findAll();
        $data['new_arrival'] = $this->product->select('*')->orderBy('product_id', 'DESC')->limit(5)->find();
       
        return view('category', $data); 
    }

}