<?php 

namespace MBS\Models;

abstract class BaseModel
{
	protected $table;
	protected $column;
	protected $db;

	public function __construct($db)
	{
		$this->db = $db;
	}

	public function getAll()
	{
		$this->db
			 ->select($this->column)
			 ->from($this->table);

		$result = $this->db->execute();
		return $result->fetchAll();
	}

	//conditional find
	public function find($column, $value)
	{
		$param = ':'.$column;
		$this->db
			 ->select($this->column)
			 ->from($this->table)
			 ->where($column . ' = '. $param)
			 ->setParameter($param, $value);
		$result = $this->db->execute();
		return $result->fetch();
	}

	public function create(array $data)
	{
		$column = [];
		$paramData = [];
		foreach ($data as $key => $value) {
			$column[$key] = ':'.$key;
			$paramData[$key] = $value;
		}
		$this->db->insert($this->table)
				->values($column)
				->setParameters($paramData)
				->execute();
	}

	//conditional edit
	public function update(array $data, $column, $value)
	{
	    $columns = [];
	    $paramData = [];
	    $this->db->update($this->table);
	    foreach ($data as $key => $values) {
	    	$columns[$key] = ':'.$key;
	    	$paramData[$key] = $values;
	    	$this->db->set($key, $columns[$key]);
	    }
	    $this->db->where( $column.'='. $value)
	         ->setParameters($paramData);
	    return $this->db->execute();
	}

	// public function __destruct()
	// {
	// 	$this->db = null;
	// }
}