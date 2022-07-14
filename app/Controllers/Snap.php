<?php
namespace App\Controllers;

use App\Libraries\Midtrans;
use App\Models\M_tiket;
use App\Models\M_user;
use App\Models\M_transaksi;

class Snap extends BaseController {

	/**
	* Index Page for this controller.
	*
	* Maps to the following URL
	* 		http://example.com/index.php/welcome
	*	- or -
	* 		http://example.com/index.php/welcome/index
	*	- or -
	* Since this controller is set as the default controller in
	* config/routes.php, it's displayed at http://example.com/
	*
	* So any other public methods not prefixed with an underscore will
	* map to /index.php/welcome/<method_name>
	* @see http://codeigniter.com/user_guide/general/urls.html
	*/


	public function __construct()
	{
		$params = array('server_key' => 'SB-Mid-server-tOlW-am9ofI5KR3yTxhplLnB', 'production' => false);
		#load modul
		$this->m_tiket = new M_tiket;
		$this->m_user = new M_user;
		$this->m_transaksi = new M_transaksi;

		#load library
		$this->midtrans = new Midtrans;
		$this->midtrans->config($params);
		base_url('url');
	}

	public function index()
	{
		$this->load->view('checkout_snap');
	}

	public function token()
	{

		$nama = $this->request->getVar('nama');
		$jumlah = $this->request->getVar('jumlah');
		$id_tiket = $this->request->getVar('id_tiket');
		$id_user = $this->request->getVar('id_user');

		$data_tiket = $this->m_tiket->getDetail($id_tiket);

		// Required
		$transaction_details = array(
			'order_id' => rand(),
			'gross_amount' => $jumlah*$data_tiket['harga_tiket'] // no decimal allowed for creditcard
		);

		// Optional
		$item1_details = array(
			'id' => 'a1',
			'price' => $data_tiket['harga_tiket'],
			'quantity' => $jumlah,
			'name' => "Tiket ".$nama,
		);

		// Optional
		$item_details = array ($item1_details);

		$data_user = $this->m_user->getDetail($id_user);

		// Optional
		$billing_address = array(
			'first_name'    => $data_user['fname'],
			'last_name'     => $data_user['lname'],
			'address'       => "",
			'city'          => "",
			'postal_code'   => "",
			'phone'         =>  $data_user['telephone'],
			'country_code'  => 'IDN'
		);

		// Optional
		$shipping_address = array(
			'first_name'    => "Wisata",
			'last_name'     => "Balong",
			'address'       => "",
			'city'          => "",
			'postal_code'   => "",
			'phone'         => "",
			'country_code'  => 'IDN'
		);

		// Optional
		$customer_details = array(
			'first_name'    => $data_user['fname'],
			'last_name'     => $data_user['lname'],
			'email'         => $data_user['email'],
			'phone'         => $data_user['telephone'],
			'billing_address'  => $billing_address,
			'shipping_address' => $shipping_address
		);

		// Data yang akan dikirim untuk request redirect_url.
		$credit_card['secure'] = true;
		//ser save_card true to enable oneclick or 2click
		//$credit_card['save_card'] = true;

		$time = time();
		$custom_expiry = array(
			'start_time' => date("Y-m-d H:i:s O",$time),
			'unit' => 'minute',
			'duration'  => 1440
		);

		$enable_payments = array('bank_transfer');

		$transaction_data = array(
			'enabled_payments'		 => $enable_payments,
			'transaction_details'=> $transaction_details,
			'item_details'       => $item_details,
			'customer_details'   => $customer_details,
			'credit_card'        => $credit_card,
			'expiry'             => $custom_expiry
		);

		error_log(json_encode($transaction_data));
		$snapToken = $this->midtrans->getSnapToken($transaction_data);
		error_log($snapToken);
		echo $snapToken;
	}

	public function finish()
	{
		#setting midtrans
		$result = json_decode($this->request->getVar('result_data'));

		#mengambil data midtrans
		#get number
		$vas_number = $result->va_numbers;
		$order_id = $result->order_id;

		#get
		$va_number = $vas_number[0]->va_number;
		$bank = $vas_number[0]->bank;

		#data post
		$jumlah = $this->request->getVar('jumlah');
		$id_tiket = $this->request->getVar('id_tiket');

		$data_tiket = $this->m_tiket->getDetail($id_tiket);

		$transaksi = [
			'id_tiket' => $id_tiket,
			'id_user' => session()->get('id_user'),
			'jumlah_beli' => $jumlah,
			'total_harga' => $jumlah*$data_tiket['harga_tiket'],
			'bank' => $bank,
			'no_virtual' => $va_number,
			'no_order' => $order_id,
			'status' => '0',
			'tanggal_transaksi' => date("Y-m-d")
		];

		if ($this->m_transaksi->insert_data($transaksi)) {
			session()->setFlashdata('auth-success', 'Success, berhasil melakukan transaksi!');
		} else {
			session()->setFlashdata('auth-failed', 'Gagal, gagal melakukan transaksi!');
		}

		return redirect()->to('/');
		echo 'RESULT <br><pre>';
		var_dump($result);
		echo '</pre>' ;

	}
}
