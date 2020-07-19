<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\AuthModel;

class Auth extends Controller{

	public function index()
	{
		echo view('Auth/Auth_view');
	}
	public function tampilalldata()
	{
		$mymodel = new AuthModel;
		$send = $mymodel->getAlldata()->getResult();
		echo json_encode($send);
	}
	public function ProcessInsert()
	{
		$mymodel = new AuthModel;
		$data = [
			'nama' => $this->request->getpost('nama'),
			'username' => $this->request->getpost('username'),
			'telp' => $this->request->getpost('telp'),
			'alamat' => $this->request->getpost('alamat'),
		];
		$cek = $mymodel->SaveData($data);
		if ($cek == TRUE) {
			echo 'success';
		}else{
			echo 'error';
		}
	}
	public function DeleteAuth($userId=NULL)
	{
		$mymodel = new AuthModel;
		$cekResponse = $mymodel->DeleteRecords($userId);
		if ($cekResponse == TRUE) {
			echo 'success';
		}else{
			echo 'error';
		}
	}
	public function GetByUserId($userId=NULL)
	{
		$mymodel = new AuthModel;
		$user = $mymodel->getdataByFields($userId)->getResult();
		foreach ($user as $key) {
			$send['nama'] = $key->nama;
			$send['username'] = $key->username;
			$send['telp'] = $key->telp;
			$send['alamat'] = $key->alamat;
		}
		echo json_encode($send);
	}
	public function ProcessUpdate($userId=NULL)
	{
		$mymodel = new AuthModel;
		$data = [
			'nama' => $this->request->getpost('nama'),
			'username' => $this->request->getpost('username'),
			'telp' => $this->request->getpost('telp'),
			'alamat' => $this->request->getpost('alamat'),
		];
		$cek = $mymodel->UpdateData($data , $userId);
		if ($cek == TRUE) {
			echo 'success';
		}else{
			echo 'error';
		}
	}
}
