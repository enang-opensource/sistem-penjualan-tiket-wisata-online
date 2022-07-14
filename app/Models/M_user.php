<?php

namespace App\Models;

use CodeIgniter\Model;

class M_user extends Model
{
  protected $table      = 'tb_user';
  protected $primaryKey = 'id_user';

  protected $returnType     = 'object';

  // useSoftDeletes bernilai true, agar data yang dihapus tidak benar benar dihapus
  // protected $useSoftDeletes = true;

  // set untuk kolom yang dapat di insert atau diupdate
  protected $allowedFields = ['fname','lname','email','telephone','status', 'password'];

  #mengambil semua data tiket
  public function getData()
  {
    return $this->select('*')->get()->getResultArray();
  }

  #mengambil semua data tiket
  public function insert_data($data)
  {
    return $this->insert($data);
  }

  public function getDetail($id_user)
  {
    return $this->query("SELECT * FROM tb_user WHERE id_user='$id_user'")->getRowArray();
  }
}
