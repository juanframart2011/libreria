<?php
class OperationData {
	public static $tablename = "operation";


	public function OperationData(){
		$this->name = "";
		$this->lastname = "";
		$this->email = "";
		$this->password = "";
		$this->created_at = "NOW()";
		$this->discount = "";
		$this->client = "";
		$this->discount_date = "NOW()";
	}

	public function getItem(){ return ItemData::getById($this->book_id); }
	public function getClient(){ return ClientData::getById($this->client_id); }

	public function add( $cantidad ){
		$sql = "insert into ".self::$tablename." (book_id,client_id,start_at,finish_at,user_id, cantidad) ";
		$sql .= "value (\"$this->book_id\",\"$this->client_id\",\"$this->start_at\",\"9999-12-30\",\"$this->user_id\",\"$cantidad\")";

		echo $sql;
		
		return Executor::doit($sql);
	}
	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "update ".self::$tablename." set estatus_id = 3 where id=$this->id";

		echo $sql;
		Executor::doit($sql);
	}
	// partiendo de que ya tenemos creado un objecto OperationData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set name=\"$this->name\" where id=$this->id";
		Executor::doit($sql);
	}
	public function finalize(){
		$sql = "update ".self::$tablename." set returned_at=NOW() where id=$this->id";
		Executor::doit($sql);
	}
	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new OperationData());
	}
	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new OperationData());
	}
	public static function getRentsByRange($start,$finish){
		$sql = "select * from ".self::$tablename." where (  (\"$start\">=start_at and \"$finish\"<=finish_at) or (start_at>=\"$start\" and finish_at<=\"$finish\") ) and returned_at is NULL ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new OperationData());
	}
	public static function getRentsByRangeId($start,$finish, $id){
		$sql = "select * from ".self::$tablename." as o where (  (\"$start\">=start_at and \"$finish\"<=finish_at) or (start_at>=\"$start\" and finish_at<=\"$finish\") ) and user_id = ".$id." and returned_at is NULL ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new OperationData());
	}
	public static function getRentsByRangeCanceled($start,$finish){
		$sql = "select * from ".self::$tablename." where (  (\"$start\">=start_at and \"$finish\"<=finish_at) or (start_at>=\"$start\" and finish_at<=\"$finish\") )  and estatus_id = 3";
		$query = Executor::doit($sql);
		return Model::many($query[0],new OperationData());
	}
	public static function getRentsByRangeCompleted($start,$finish){
		$sql = "select * from ".self::$tablename." where (  (\"$start\">=start_at and \"$finish\"<=finish_at) or (start_at>=\"$start\" and finish_at<=\"$finish\") )  and  returned_at is not NULL";
		$query = Executor::doit($sql);
		return Model::many($query[0],new OperationData());
	}
	public static function getByRange($start,$finish){
		$sql = "select * from ".self::$tablename." where returned_at>=\"$start\" and returned_at<=\"$finish\" and estatus_id = 1 and returned_at is not NULL ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new OperationData());
	}
	public static function getRents(){
		$sql = "select * from ".self::$tablename." where estatus_id = 1 and returned_at is NULL";
		$query = Executor::doit($sql);
		return Model::many($query[0],new OperationData());
	}
	public static function getRentsId( $id ){
		$sql = "select * from ".self::$tablename." where estatus_id = 1 and user_id = ".$id." and returned_at is NULL";
		$query = Executor::doit($sql);
		return Model::many($query[0],new OperationData());
	}
	public static function getRentsCanceled(){
		$sql = "select * from ".self::$tablename." where estatus_id = 3";
		$query = Executor::doit($sql);
		return Model::many($query[0],new OperationData());
	}
	public static function getRentsCompleted(){
		$sql = "select * from ".self::$tablename." where returned_at is not NULL";
		$query = Executor::doit($sql);
		return Model::many($query[0],new OperationData());
	}

	public static function getAllByItemId($id){
		$sql = "select * from ".self::$tablename." where book_id=$id";
		$query = Executor::doit($sql);
		return Model::many($query[0],new OperationData());
	}

	public static function getAllByItemIdAndRange($id,$start,$finish){
		$sql = "select * from ".self::$tablename." where book_id=$id and ((returned_at>=\"$start\" and returned_at<=\"$finish\") or (start_at>=\"$start\" and start_at<=\"$finish\") or (finish_at>=\"$start\" and finish_at<=\"$finish\")) ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new OperationData());
	}
	public static function getAllByClientId($id){
		$sql = "select * from ".self::$tablename." where client_id=$id and returned_at is not NULL";
		$query = Executor::doit($sql);
		return Model::many($query[0],new OperationData());
	}

	public static function getAllByClientIdAndRange($id,$start,$finish){
		$sql = "select * from ".self::$tablename." where client_id=$id and ((returned_at>=\"$start\" and returned_at<=\"$finish\") or (start_at>=\"$start\" and start_at<=\"$finish\") or (finish_at>=\"$start\" and finish_at<=\"$finish\")) ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new OperationData());
	}

	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where name like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new OperationData());
	}

	public static function getInventory( $id ){

		$sql = "select sum(b.cantidad) as total from ".self::$tablename." as o 
				Inner Join book as b on b.id = o.book_id where o.client_id=$id and o.returned_at is not NULL and estatus_id = 1";

		$query = Executor::doit($sql);
		return Model::many($query[0],new OperationData());
	}

	#Descuentos
	public function Discount_add( $cliente ){
		$sql = "insert into discount (client_id,discount_valor) ";
		$sql .= "value ( \"$cliente\",\"$this->discount\")";
		Executor::doit($sql);
	}

	public static function Discount_delById($id){
		$sql = "delete from discount where id=$id";
		Executor::doit($sql);
	}
	public static function Discount_list($id){
		$sql = "select * from discount where client_id=$id";
		$query = Executor::doit($sql);
		return Model::many($query[0],new OperationData());
	}

	public static function Discount_sum($id){
		$sql = "select sum( discount_valor ) as total from discount where client_id=$id";
		$query = Executor::doit($sql);
		return Model::many($query[0],new OperationData());
	}
}

?>