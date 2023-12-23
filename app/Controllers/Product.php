<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoryModel;
use App\Models\ProductModel;



class Product extends BaseController
{
    private $products;
    private $category;
    protected $helpers = ["form"];
    public function __construct(){
      
        $this->products = new ProductModel();   
        $this->category = new CategoryModel();    
    }
    public function index()
    {
        $this->products->join('category', 'category.id= products.category_id');
       $data['items']= $this->products->findAll();
       $data['title']="Display all products";
    //    print_r($data);
       return view("products/index", $data);
    }
    public function create(){
       
       $data['cats']= $this->category->findAll();
       return view("products/create", $data);
        // return" Hello";
    }
    public function store(){
        // return "Yes, I can hear you";
       $data=[
       'product'=>$this->request->getVar('product'),
       'category'=>$this->request->getVar('category'),
       'price'=>$this->request->getVar('price'),
       'sku'=>$this->request->getVar('sku'),
       'model'=>$this->request->getVar('model'),
       'photo'=>$this->request->getFile('photo')->getName(),
       
       ];
       $rules= [
        'product'     => 'required|max_length[30]|min_length[4]',
        // 'category'     => 'required|max_length[30]|min_length[6]',
        // 'model'     => 'required|max_length[30]|min_length[2]',
        // 'price'     => 'required|numeric]|min_length[7]',
        // 'sku'     => 'required|max_length[30]|min_length[3]',
       'photo'=>'uploaded[photo]|max_size[photo,1024]|ext_in[photo,jpg,png,jpeg,svg]'
        
       ];
    //    $input = $this->validate([
    //     'file'=> 'uploaded[file]|max_size[file,1024]|ext'
    //    ])
       if(! $this->validate($rules)){
        return view("products/create");
       }else{
       $img= $this->request->getFile('photo');
       $img->move(WRITEPATH.'uploads');
       $this->products->insert($data);
        $session = session();
        $session->setFlashdata("msg", "Product inserted and updated Successfully");
         $this->response->redirect('/products');
       };   
      
    }
    public function edit($id){
        $data = $this->products->find($id);
        // print_r($data);
        return view('products/edit', $data);

    }
    public function update($id){
        // echo $id;
        $data=[
            'product'=>$this->request->getVar('product'),
            'category'=>$this->request->getVar('category'),
            'price'=>$this->request->getVar('price'),
            'sku'=>$this->request->getVar('sku'),
            'model'=>$this->request->getVar('model'),
            
            ];
            $this->products->update($id, $data);
            $session = session();
            $session->setFlashdata("msg", "update Successfully");
            $this->response->redirect('/products');

    }
    public function delete($id){
        $this->products->where('product_id', $id);
        // $this->products->delete($id);
        $this->products->delete();
        // $this->response->redirect('/products');
        // return redirect('products');
        $session = session();
        $session->setFlashdata("msg", "Deleted Successfully");
         $this->response->redirect('/products');
       
       }
}
