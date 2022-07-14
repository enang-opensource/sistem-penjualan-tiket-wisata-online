<?php

namespace App\Controllers;

use App\Models\M_desa;
use App\Models\M_wisata;
use App\Models\M_image;
use App\Models\M_informasi;
use App\Models\M_tiket;
use App\Models\M_user;
use App\Models\M_transaksi;
use App\Models\M_komentar;

class GuestController extends BaseController
{
  public function __construct()
  {
    #model admin
    $this->m_desa = new M_desa;
    $this->m_wisata = new M_wisata;
    $this->m_image = new M_image;
    $this->m_informasi = new M_informasi;
    $this->m_tiket = new M_tiket;
    $this->m_user = new M_user;
    $this->m_transaksi = new M_transaksi;
    $this->m_komentar = new M_komentar;
  }

  public function about()
  {
    $data = [
      'title' => 'Tentang Kami',
    ];

    return view('guest/pages/v_about', $data);
  }

  public function wisata()
  {
    $data = [
      'title' => 'Destinasi Wisata',
      'wisata' => $this->m_wisata->getConcat()
    ];

    return view('guest/pages/v_wisata', $data);
  }

  public function detail($id_wisata)
  {
    $data = [
      'title' => 'Detail Wisata',
      'wisata' => $this->m_wisata->getDetail($id_wisata),
      'tiket' =>  $this->m_wisata->getTiket($id_wisata)
    ];

    return view('guest/pages/v_detail', $data);
  }

  public function kontak()
  {
    $data = [
      'title' => 'Kontak',
    ];

    return view('guest/pages/v_kontak', $data);
  }

  public function transaksi()
  {
    $data = [
      'title' => 'Riwayat Transaksi',
      'transaksi' => $this->m_transaksi->getTransaksiWhere(session()->get('id_user')),
    ];

    return view('guest/pages/v_riwayat_beli', $data);
  }


  #guest informasi
  public function informasi()
  {
    $data = [
      'title' => 'Informasi Budaya',
      'informasi' => $this->m_informasi->getData()
    ];

    return view('guest/pages/v_informasi', $data);
  }

  public function informasi_detail($id_informasi)
  {
    $data = [
      'title' => 'Detail Budaya',
      'informasi' => $this->m_informasi->getDataId($id_informasi),
      'komentars' => $this->m_komentar->getDataId($id_informasi),
      'id_informasi' => $id_informasi,
    ];

    return view('guest/pages/v_detail_informasi', $data);
  }

  #Add Komentar
  public function add_komentar()
  {
    $text = $this->request->getVar('komentar');
    $id_informasi = $this->request->getVar('id_informasi');

    $data = [
      'id_user' => session()->get('id_user'),
      'id_informasi' => $id_informasi,
      'text_komentar' => $text,
      'tanggal_komentar' => date('Y-m-d')
    ];

    if ($this->m_komentar->insert_data($data)) {
      return redirect()->to('guest/informasi/informasi_detail/'.$id_informasi);
    }
  }

}
