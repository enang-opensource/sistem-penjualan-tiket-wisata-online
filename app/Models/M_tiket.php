<?php

namespace App\Models;

use CodeIgniter\Model;

class M_tiket extends Model
{
  protected $table      = 'tb_tiket';
  protected $primaryKey = 'id_tiket';

  protected $returnType     = 'object';

  // useSoftDeletes bernilai true, agar data yang dihapus tidak benar benar dihapus
  // protected $useSoftDeletes = true;

  // set untuk kolom yang dapat di insert atau diupdate
  protected $allowedFields = ['id_wisata','tanggal_buka','jumlah_tiket','harga_tiket','keterangan'];

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

  #mengambil semua data tiket dan wisata
  public function getTiketFull()
  {
      return $this->select(['tb_wisata.wisata_name', 'tb_tiket.tanggal_buka','tb_tiket.jumlah_tiket','tb_tiket.harga_tiket','tb_tiket.keterangan'])
      ->join('tb_wisata', 'tb_wisata.id_wisata = tb_tiket.id_wisata')
      ->get()
      ->getResultArray();
  }

}
