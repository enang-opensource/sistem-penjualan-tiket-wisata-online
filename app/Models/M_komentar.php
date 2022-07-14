<?php

namespace App\Models;

use CodeIgniter\Model;

class M_komentar extends Model
{
  protected $table      = 'tb_komentar';
  protected $primaryKey = 'id_komentar';

  protected $returnType     = 'object';

  // useSoftDeletes bernilai true, agar data yang dihapus tidak benar benar dihapus
  // protected $useSoftDeletes = true;

  // set untuk kolom yang dapat di insert atau diupdate
  protected $allowedFields = ['id_user', 'id_informasi','text_komentar','tanggal_komentar'];

  #mengambil semua data tiket
  public function getData()
  {
    return $this->select('*')
    ->get()
    ->getResultArray();
  }

  #mengambil semua data tiket
  public function insert_data($data)
  {
    return $this->insert($data);
  }

  public function getDataId($id_informasi)
  {
    return $this->query("SELECT * FROM tb_komentar as tbk JOIN tb_user as tbu ON tbu.id_user=tbk.id_user WHERE tbk.id_informasi='$id_informasi'")->getResultArray();
  }

}
