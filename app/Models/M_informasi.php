<?php

namespace App\Models;

use CodeIgniter\Model;

class M_informasi extends Model
{
  protected $table      = 'tb_informasi';
  protected $primaryKey = 'id_informasi';

  protected $returnType     = 'object';

  // useSoftDeletes bernilai true, agar data yang dihapus tidak benar benar dihapus
  // protected $useSoftDeletes = true;

  // set untuk kolom yang dapat di insert atau diupdate
  protected $allowedFields = ['id_user',	'tanggal_upload',	'kontent_informasi',	'judul_informasi',	'gambar_informasi'];

  #mengambil semua data desa
  public function getData()
  {
    return $this->select('*')->get()->getResultArray();
  }

  #mengambil semua data desa
  public function insert_data($data)
  {
    return $this->insert($data);
  }

  public function getDataId($id_informasi)
  {
    return $this->query("SELECT * FROM tb_informasi WHERE id_informasi='$id_informasi'")->getRowArray();
  }

  #update data pembayaran
  public function update_data($id, $data)
  {
    return $this->set($data)->where('id_informasi', $id)->update();
  }

  #hapus data wisata
  public function delete_data($id_informasi)
  {
    return $this->query("DELETE FROM tb_informasi WHERE id_informasi='$id_informasi'");
  }

}
