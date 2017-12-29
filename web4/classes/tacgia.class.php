<?php 
class tacgia extends DB{
	function getAll_TG(){
		return $this->query("select * from tacgia");
	}
	function getAll_TGPT($start,$limit){
		$sql="select * from tacgia limit $start,$limit";
		
		return $this->query($sql);
	}
	function getTacGia($matacgia){
		$arr = array(":T"=> "$matacgia");
		$sql ="select * from tacgia where matacgia = :T ";
		return $this->query($sql, $arr);
	}
	function gettentg($matg){
		$arr = array(":M"=> "$matg");
		$sql="select tentacgia from tacgia where matacgia = :M ";
		return $this->query($sql, $arr);
	}
	function search($ten,$start,$limit)
	{
		$arr = array(":T"=> "%$ten%");
		$sql ="select * from tacgia where tentacgia like :T limit $start,$limit";
		
		return $this->query($sql, $arr);	
	}
	function timtg($ten)
	{
		$arr = array(":T"=> "%$ten%");
		$sql ="select * from tacgia where tentacgia like :T ";
		
		return $this->query($sql, $arr);	
	}
	function insertTacGia($tentacgia){
		$arr = array(":T"=>"$tentacgia");
		$sql="insert into tacgia( tentacgia) ";
		$sql .=" values(:T)";
		$stm = $this->query($sql, $arr);
		//$stm->execute($arr);

		//return 
	}
		function updateTacGia($matacgia,$tentacgia){
		$arr = array(":T"=>"$tentacgia",":M"=>"$matacgia");
		$sql="update tacgia set tentacgia= :T where matacgia=:M";
		$stm = $this->query($sql, $arr);
		//$stm->execute($arr);

		//return 
	}
	function delTacGia($matacgia){
		$sql="delete from tacgia where matacgia='$matacgia'";
		$stm = $this->query($sql, $arr);
		header("location:dmtacgia.php");
	}
}
?>