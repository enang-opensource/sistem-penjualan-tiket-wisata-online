<?php

namespace App\Models;

use CodeIgniter\Model;

class M_desa extends Model
{
  protected $table      = 'tb_desa';
  protected $primaryKey = 'id_desa';

  protected $returnType     = 'object';

  // useSoftDeletes bernilai true, agar data yang dihapus tidak benar benar dihapus
  // protected $useSoftDeletes = true;

  // set untuk kolom yang dapat di insert atau diupdate
  protected $allowedFields = ['desa_name'];

  #mengambil semua data desa
  public function getData()
  {
    return $this->select('*')->get()->getResultArray();
  }

}
