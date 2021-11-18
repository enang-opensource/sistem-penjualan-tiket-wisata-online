<?php

namespace App\Controllers;


use App\Models\M_desa;
use App\Models\M_wisata;
use App\Models\M_image;
use App\Models\M_informasi;
use App\Models\M_tiket;
use App\Models\M_user;
use App\Models\M_transaksi;

class AdminController extends BaseController
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
  }

  public function index()
  {
    $data = [
      'tittle' => 'Home'
    ];

    return view('admin/wisata/v_add', $data);
  }

  #################################################################################
  #add wisata
  public function add_wisata()
  {
    $data = [
      'tittle' => 'Tambah Wisata',
      'desas' => $this->m_desa->getData(),
    ];

    return view('admin/wisata/v_add', $data);
  }

  #add wisata proses
  public function add_wisata_proses()
  {

    $data = [
      'id_desa' => $this->request->getVar('id_desa'),
      'wisata_name' => $this->request->getVar('n_wisata'),
      'longtitude' => $this->request->getVar('long'),
      'lattitude' => $this->request->getVar('lat'),
      'alamat_wisata' => $this->request->getVar('alamat'),
      'keterangan' => $this->request->getVar('keterangan'),
    ];

    if ($this->m_wisata->insert_data($data)) {
      foreach($this->request->getFileMultiple('image') as $file)
      {
        #upload to folder
        $file->move(ROOTPATH . 'public/image_wisata');
        #set data
        $image = [
          'id_wisata' => $this->m_wisata->getInsertID(),
          'path'    => 'image_wisata/'.$file->getClientName(),
        ];
        #set to database
        $this->m_image->insert_data($image);
      }
      session()->setFlashdata('msg', 'Success, berhasil menambah data!');
      return redirect()->to('admin/wisata');
    } else {
      session()->setFlashdata('error', 'Error, gagal menambah data!');
      return redirect()->back();
    }
  }

  #add wisata proses
  public function list_wisata()
  {
    $data = [
      'tittle' => 'Daftar Wisata',
      'wisatas' => $this->m_wisata->getData(),
    ];

    return view('admin/wisata/v_list', $data);
  }
  #################################################################################

  #add informasi
  public function add_informasi()
  {
    $data = [
      'tittle' => 'Tambah Informasi',
    ];

    return view('admin/informasi/v_add', $data);
  }

  #add informasi proses
  public function add_informasi_proses()
  {

    $file = $this->request->getFile('image');

    #memindahkan gambar informasi ke dalam foldder
    $file->move(ROOTPATH . 'public/image_informasi');

    $data = [
      'id_user' => 1,
      'tanggal_upload' => date("y-m-d"),
      'kontent_informasi' => $this->request->getVar('c_budaya'),
      'judul_informasi' => $this->request->getVar('n_budaya'),
      'gambar_informasi' => 'image_informasi/'.$file->getClientName(),
    ];

    if ($this->m_informasi->insert_data($data)) {

      session()->setFlashdata('msg', 'Success, berhasil menambah data!');
      return redirect()->to('admin/informasi');
    } else {
      session()->setFlashdata('error', 'Error, gagal menambah data!');
      return redirect()->back();
    }
  }

  #list informasi proses
  public function list_informasi()
  {
    $data = [
      'tittle' => 'Daftar Informasi',
      'wisatas' => $this->m_informasi->getData(),
    ];

    return view('admin/informasi/v_list', $data);
  }
  #################################################################################

  #add tiket
  public function add_tiket()
  {
    $data = [
      'tittle' => 'Tambah Tiket',
      'wisatas' => $this->m_wisata->getData(),
    ];

    return view('admin/tiket/v_add', $data);
  }

  #add tiket proses
  public function add_tiket_proses()
  {

    $data = [
      'id_wisata' => $this->request->getVar('id_wisata'),
      'tanggal_buka' => $this->request->getVar('t_jual'),
      'jumlah_tiket' => $this->request->getVar('j_jual'),
      'harga_tiket' => $this->request->getVar('h_jual'),
      'keterangan' => $this->request->getVar('keterangan')
    ];

    if ($this->m_tiket->insert_data($data)) {
      session()->setFlashdata('msg', 'Success, berhasil menambah data!');
      return redirect()->to('admin/tiket');
    } else {
      session()->setFlashdata('error', 'Error, gagal menambah data!');
      return redirect()->back();
    }
  }

  #add tiket proses
  public function list_tiket()
  {
    $data = [
      'tittle' => 'Daftar Tiket',
      'tikets' => $this->m_tiket->getTiketFull(),
    ];

    return view('admin/tiket/v_list', $data);
  }
  #################################################################################

  #add user proses
  public function list_user()
  {
    $data = [
      'tittle' => 'Daftar User',
      'users' => $this->m_user->getData(),
    ];

    return view('admin/user/v_list', $data);
  }
  #################################################################################

  #add transaksi proses
  public function list_transaksi()
  {
    $data = [
      'tittle' => 'Daftar Transaksi',
      'transaksis' => $this->m_transaksi->getTransaksi(),
    ];

    return view('admin/transaksi/v_list', $data);
  }
  #################################################################################



}
