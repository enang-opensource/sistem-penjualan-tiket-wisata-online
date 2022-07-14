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

  public function getDataId($id_wisata)
  {
    return $this->query("SELECT * FROM tb_gambar WHERE id_wisata='$id_wisata'")->getResultArray();
  }

  public function getDataGambar($id_gambar)
  {
    return $this->query("SELECT * FROM tb_gambar WHERE id_gambar='$id_gambar'")->getRowArray();
  }

  #hapus data wisata
  public function delete_data($id_wisata)
  {
    return $this->query("DELETE FROM tb_gambar WHERE id_wisata='$id_wisata'");
  }

  #hapus data wisata
  public function delete_gambar($id_gambar)
  {
    return $this->query("DELETE FROM tb_gambar WHERE id_gambar='$id_gambar'");
  }

}
