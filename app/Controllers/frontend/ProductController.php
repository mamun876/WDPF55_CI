<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;


class ProductController extends BaseController
{
    use ResponseTrait;
    public function index()
    {
       $model= new ProductModel();
       $data= $model->findAll();
       return $this->respond($data);
    }
    public function show($id = null)
    {
        $model = new ProductModel();
        $data = $model->getWhere(['id' => $id])->getResult();
        if($data){
            return $this->respond($data);
        }else{
            return $this->failNotFound('No Data Found with id '.$id);
        }
    }
}
