<?php

namespace App\Models;

use CodeIgniter\Model;

class M_image extends Model
{
  protected $table      = 'tb_gambar';
  protected $primaryKey = 'id_gambar';

  protected $returnType     = 'object';

  // useSoftDeletes bernilai true, agar data yang dihapus tidak benar benar dihapus
  // protected $useSoftDeletes = true;

  // set untuk kolom yang dapat di insert atau diupdate
  protected $allowedFields = ['id_wisata', 'path'];

  #mengambil semua data wisata
  public function getData()
  {
    return $this->select('*')->get()->getResultArray();
  }

  public function insert_data($data)
  {
    return $this->insert($data);
  }

}
