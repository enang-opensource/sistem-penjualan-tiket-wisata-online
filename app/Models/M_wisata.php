<?php

namespace App\Models;

use CodeIgniter\Model;

class M_wisata extends Model
{
  protected $table      = 'tb_wisata';
  protected $primaryKey = 'id_desa';

  protected $returnType     = 'object';

  // useSoftDeletes bernilai true, agar data yang dihapus tidak benar benar dihapus
  // protected $useSoftDeletes = true;

  // set untuk kolom yang dapat di insert atau diupdate
  protected $allowedFields = ['id_desa', 'wisata_name', 'longtitude', 'lattitude', 'alamat_wisata', 'keterangan'];

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
