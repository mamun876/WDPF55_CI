<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoryModel;


class CategoryController extends BaseController
{
    private $category;
    // protected $helpers= ['form'];
    public function __construct(){
        $this->category= new CategoryModel();
    }
    public function index()
    {
        $category = new CategoryModel();
        $data['items']= $category->findAll();
        $data['title']="Display all  Caregory";
        return view('category/index', $data);
    }
 
    public function create()
    {
       return view ('category/create');
    //    return "Hello";
    }
    public function store()
    {
        $data=[
           
            'category'=>$this->request->getVar('category'),

        ];
        $this->category->insert($data);
        $this->response->redirect('/category');
        //    return "Hello";
            
          
            // $rules= [
            //  'category'     => 'required|max_length[30]|min_length[6]',
            // ];
    }
    public function edit($id)
    {
      $data = $this->category->find($id);
      return view('category/edit', $data);
    }
   
    public function update($id)
    {
        $data=[
           
           'category'=>$this->request->getVar('category')
           
            
            ];
            $this->category->update($id, $data);
            $session = session();
            $session->setFlashdata("msg", "update Successfully");
           $this->response->redirect('/category');
    }
    public function delete($id)
    {
        $this->category->where('id', $id);
        // $this->products->delete($id);
        $this->category->delete();
        // $this->response->redirect('/products');
        // return redirect('products');
        $session = session();
        $session->setFlashdata("msg", "Deleted Successfully");
         $this->response->redirect('/category');
    }
}
