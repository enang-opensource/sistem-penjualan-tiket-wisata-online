<?php

namespace App\Models;

use CodeIgniter\Model;

class M_transaksi extends Model
{
  protected $table      = 'tb_transaksi';
  protected $primaryKey = 'id_transaksi';

  protected $returnType     = 'object';

  // useSoftDeletes bernilai true, agar data yang dihapus tidak benar benar dihapus
  // protected $useSoftDeletes = true;

  // set untuk kolom yang dapat di insert atau diupdate
  protected $allowedFields = ['id_tiket', 'id_user', 'jumlah_beli', 'total_harga', 'bank', 'no_virtual', 'no_order', 'status'];

  #mengambil semua data tiket
  public function insert_data($data)
  {
    return $this->insert($data);
  }

  #mengambil semua data tiket dan wisata
  public function getTransaksi()
  {
    return $this->select(['tb_user.fname', 'tb_user.lname', 'tb_wisata.wisata_name', 'tb_tiket.tanggal_buka', 'tb_transaksi.jumlah_beli', 'tb_transaksi.total_harga', 'tb_transaksi.bank', 'tb_transaksi.no_virtual', 'tb_transaksi.no_order', 'tb_transaksi.status'])
    ->join('tb_tiket', 'tb_tiket.id_tiket = tb_transaksi.id_tiket')
    ->join('tb_wisata', 'tb_wisata.id_wisata = tb_tiket.id_wisata')
    ->join('tb_user', 'tb_user.id_user = tb_transaksi.id_user')
    ->get()
    ->getResultArray();
  }

}
