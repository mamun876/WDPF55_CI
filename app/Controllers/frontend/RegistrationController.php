<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\API\ResponseTrait;

class RegistrationController extends BaseController
{
    use ResponseTrait;
    public function registration()
    {
      $userModel = new UserModel();
      $data = [
          'name' => $this->request->getVar('name'),
          'email' => $this->request->getVar('email'),
          'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
      ];

      if ($userModel->insert($data)) {
          $response['msg'] = "success";
          return $this->respond($response);
      } else {
          $response['msg'] = "failed";
          return $this->respond($response);
      }
  }
}