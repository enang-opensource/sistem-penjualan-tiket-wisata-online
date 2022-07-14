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

  public function getConcat()
  {
    return $this->select(['GROUP_CONCAT(tb_gambar.path) image', 'tb_wisata.id_wisata', 'tb_wisata.wisata_name', 'tb_wisata.alamat_wisata', 'tb_wisata.longtitude', 'tb_wisata.lattitude'])
    ->join('tb_gambar', 'tb_gambar.id_wisata = tb_wisata.id_wisata')
    ->groupBy('tb_wisata.id_wisata')
    ->get()
    ->getResultArray();
  }

  public function getDetail($id_wisata)
  {
    return $this->query("SELECT GROUP_CONCAT(tbg.path) as image, tbw.*, tbd.desa_name FROM tb_wisata as tbw JOIN tb_gambar as tbg ON tbg.id_wisata=tbw.id_wisata JOIN tb_desa as tbd ON tbd.id_desa=tbw.id_desa WHERE tbw.id_wisata='$id_wisata'")->getRowArray();
  }

  public function getTiket($id_wisata)
  {
    $date = date('Y-m-d');

    return $this->query("SELECT * FROM tb_tiket WHERE id_wisata='$id_wisata' AND tanggal_buka >= '$date'")->getResultArray();
  }

  public function getDataId($id_wisata)
  {
    return $this->query("SELECT * FROM tb_wisata WHERE id_wisata='$id_wisata'")->getRowArray();
  }

  #update data pembayaran
  public function update_data($id, $data)
  {
    return $this->set($data)->where('id_wisata', $id)->update();
  }

  #hapus data wisata
  public function delete_data($id_wisata)
  {
    return $this->query("DELETE FROM tb_wisata WHERE id_wisata='$id_wisata'");
  }
}
