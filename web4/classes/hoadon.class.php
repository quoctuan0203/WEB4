<?php 
class hoadon extends DB{
	function getAll_HD(){
		return $this->query("select * from hoadon");
	}
	function getHoaDon($mahd){
		$arr = array(":T"=> "$mahd");
		$sql ="select * from hoadon where mahoadon = :T ";
		return $this->query($sql, $arr);
	}
	function insertHoaDon($ngaylaphd,$ten,$diachi,$sdt,$ngaydathang,$ngaynhanhang,$email){
		$arr = array(":NLHD"=>"$ngaylaphd", ":T"=>"$ten",":DC"=>"$diachi",  ":SDT"=>"$sdt", ":NDH"=>"$ngaydathang",":NNH"=>"$ngaynhanhang",":E"=>"$email");
		$sql="insert into hoadon(ngaylaphoadon, tennguoinhan, diachinguoinhan, sdtnguoinhan, ngaydathang,ngaynhanhang,email) ";
		$sql .=" values(:NLHD,:T,:DC,:SDT,:NDH,:NNH,:E)";
		$stm = $this->query($sql, $arr);
	}
	function delHoaDon($mahd){
		$sql="delete from hoadon where mahoadon='$mahd'";
		$stm = $this->query($sql);
		header("location:dmhoadon.php");
	}
	function updateHD($mahd,$ngaylaphd,$ten,$diachi,$sdt,$ngaydathang,$ngaynhanhang,$email){
		$arr = array(":M"=> "$mahd", ":NLHD"=>"$ngaylaphd", ":T"=>"$ten",":DC"=>"$diachi",  ":SDT"=>"$sdt", ":NDH"=>"$ngaydathang",":NNH"=>"$ngaynhanhang",":E"=>"$email");
		$sql="update hoadon set ngaylaphoadon= :NLHD,tennguoinhan= :T,diachinguoinhan= :DC,sdtnguoinhan= :SDT,ngaydathang=:NDH,ngaynhanhang=:NNH,email=:E where mahoadon=:M";
		$stm = $this->query($sql, $arr);
	}
}
?>