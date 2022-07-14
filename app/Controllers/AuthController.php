<?php

namespace App\Controllers;

use App\Models\M_auth;

class AuthController extends BaseController
{
  private $authModel;

  public function __construct()
  {
    $this->authModel = new M_auth();
  }

  public function login()
  {
    $data = [
      'title' => 'Login',
    ];

    if (session()->get('id_user')!==null) {
      if (session()->get('roles')=='0') {
        return redirect()->to('admin/index');
      } else {
        return redirect()->to('/');
      }
    }

    if (url_is('admin*')) {
      return view('admin/auth/v_login', $data);
    } else {
      return view('guest/auth/v_login', $data);
    }
  }

  public function register()
  {
    $data = [
      'title' => 'Register',
    ];

    return view('guest/auth/v_register', $data);
  }

  public function loginProcess()
  {
    #get data input login
    $username = $this->request->getVar('email');
    $password = $this->request->getVar('password');

    if ($validation = $this->authModel->login($username, $password)) {
      session()->set([
        'id_user'   => $validation->id_user,
        'roles'     => $validation->status,
        'nama'      => $validation->fname." ".$validation->lname
      ]);

      if ($validation->status=='0') {
        return redirect()->to('admin/index');
      } else {
        session()->setFlashdata('error', 'Berhasil, login!');
        return redirect()->to('/');
      }
    } else {
      echo "<script>alert('Gagal Login!')</script>";
      return redirect()->back();
    }
  }

  public function registerProcess()
  {
    $data = [
      'fname'         => $this->request->getVar('fname'),
      'lname'         => $this->request->getVar('lname'),
      'email'         => $this->request->getVar('email'),
      'telephone'     => $this->request->getVar('telephone'),
      'password'      => $this->request->getVar('password'),
      'status'        => $this->request->getVar('status'),
    ];
    if ($this->authModel->insert($data)) {
      return redirect()->to('login');
    }
  }

  public function logout()
  {
    session()->destroy();
    return redirect()->to('/');
  }
}
