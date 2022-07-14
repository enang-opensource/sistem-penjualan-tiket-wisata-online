<?php

namespace App\Models;

use CodeIgniter\Model;

class M_auth extends Model
{
    protected $table = 'tb_user';
    protected $primaryKey = 'id_user';
    protected $useAutoIncrement = true;
    protected $returnType     = 'object';

    protected $allowedFields = ['fname', 'lname', 'email', 'telephone', 'password', 'status'];



  #melakukan verifikasi login
  public function login($email, $password)
  {
    return $this->where(['email' => $email, 'password' => $password])->first();
  }
}
