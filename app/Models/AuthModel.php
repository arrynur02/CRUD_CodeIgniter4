<?php namespace App\Models;

use CodeIgniter\Model;

Class AuthModel extends Model
{
	public function __construct()
	{
		parent::__construct();
		$this->builder = db_connect();
	}
	public function getAlldata()
	{
		$response = $this->builder->table('user');
		$response->select('*');
		$response->orderBy('userId','desc');
		return $response->get();
	}
	public function SaveData($data)
	{
		$query = $this->builder->table('user');
		return $query->insert($data);
	}
	public function DeleteRecords($userId)
	{
		$query = $this->builder->table('user');
		return $query->delete(['userId' => $userId]);
	}
	public function getdataByFields($userId)
	{
		return $this->builder->table('user')->getWhere(['userId' => $userId]);
	}
	public function UpdateData($data , $userId)
	{
		$query = $this->builder->table('user');
		return $query->update($data , ['userId' => $userId]);
	}
}
