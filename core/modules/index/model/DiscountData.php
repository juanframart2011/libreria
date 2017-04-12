<?php
class DiscountData {
	public static $tablename = "discount";


	public function DiscountData(){
		$this->name = "";
		$this->lastname = "";
		$this->email = "";
		$this->password = "";
		$this->created_at = "NOW()";
	}

	public function getItem(){ return ItemData::getById($this->book_id); }
	public function getClient(){ return ClientData::getById($this->client_id); }

	public function Discount_add(){
		$sql = "insert into ".self::$tablename." (client_id,discount_valor,discount_date) ";
		$sql .= "value (\"client_id\",\"discount_valor\",\"discount_date\")";
		return Executor::doit($sql);
	}

	public static function Discount_delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	public static function Discount_list($id){
		$sql = "select * from ".self::$tablename." where client_id=$id";
		Executor::doit($sql);
	}
}
?>