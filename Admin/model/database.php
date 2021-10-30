<?php
/**
 * 
 */
class database 
{
	protected $host ='localhost:3306';
	protected $user ='root';
	protected $pass ='';
	protected $name ='btl1';
	protected $conn =null;
	function __construct()
	{
		$this->connect();
	}
	//tạo hàm kết nối
        public function connect(){
        	$this->conn = new mysqli
        	($this->host,$this->user,$this->pass,$this->name);
        	if(!$this->conn)
        	{
        		echo "Lỗi kết nối";
        		exit();
        	}
        
        }

         public function get($table ,$condition= array()){
        	//Bước 1:Khởi tạo câu lệnh truy vấn
        	$sql="SELECT*FROM $table";
        	//Bước 2:kiểm tra xem có điều kiện hay không?
        	// !empty kiểm tra biến $condition có rỗng hay ko?
        	if(!empty($condition)){
        		// nối chuối,cách where
        		$sql.=" WHERE";
        		//lưu mảng phải lặp
        		foreach ($condition as $key => $value) {
        			$sql.=" $key='$value'AND";
        			
        		}
        		// hàm trim là hàm cắt, cắt từ khóa AND nằm ở cuối chuỗi
        		$sql= trim( $sql ,"AND");


        	}
        	// bước 3: chạy câu lệnh
        	// thực hiện lệnh
        	$query = mysqli_query($this->conn,$sql);
        	// bước 4
        	// khởi tạo 1 mảng và lặp để lấy dữ liệu
        	$result =array();
        	if($query){
        		// lấy giá trọ của 1 dòng
        		while ($row =mysqli_fetch_assoc($query)) {
        			$result[]=$row;
        			
        		}
        	}
        	// bước 5: hàm trả về giá trị
        	return $result;

        }
         public function insert($table,$data=array()){
  	$keys = array_keys($data);
  	$fiels = implode(",", $keys);
  	$value_str ='';
  	foreach ($data as $key => $value) {
  		$value_str .="'$value',";
  		
  	}
  	$value_str = trim($value_str,",");

  	$sql="INSERT INTO $table($fiels) VALUES ($value_str)";

  	$query = mysqli_query($this->conn,$sql);
  	return $query;
  }

  // hàm lấy dữ liệu theo đk nào đó(sử dụng câu lệnh like)
        public function get_like($table,$column,$value){
        	// tạo truy vấn sql
        	$sql="SELECT *FROM $table";
        	// nối chuỗi
        	$sql.=" WHERE $column LIKE'%$value%'";
        	// chạy câu lệnh
        	$query = mysqli_query($this->conn , $sql);
        	$result =array();
        	if($query){
        		// lấy giá trọ của 1 dòng
        		while ($row =mysqli_fetch_assoc($query)) {
        			$result[]=$row;
        			
        		}
        	}
        	// bước 5: hàm trả về giá trị
        	return $result;
        	
}
// hàm update dữ liệu vào 1 bảng theo đk
 public function update($table,$data=array(),$condition=array())
{
	// bước 1: xử lý chuỗi giá trị
	$str='';
	foreach ($data as $key => $value) {
		$str.="$key ='$value',";
		}
		// bước 2 xóa dấu phẩy ở cuối
		$str= trim($str,",");

		// bước 3 viết câu lệnh sql
		$sql="UPDATE $table SET $str WHERE ";
		foreach ($condition as $key => $value) {
			$sql.="$key ='$value' AND";
		}
		$sql= trim($sql,'AND');
		// bước 4 chạy câu lênh
		$query=mysqli_query($this->conn,$sql);
		// bước 5 : trả về giá trị boolean true/false
		return $query;
	

}
// hàm xóa dữ liệu
public function delete($table,$condition=array()){
	// bước 1 viết câu lệnh sql
	$sql=" DELETE FROM $table WHERE ";
	// bước 2 nối chuỗi theo đk
	foreach ($condition as $key => $value) {
		$sql.="$key = '$value' AND";
	}
	// cắt từ AND
$sql= trim($sql,'AND');
// bước 3 chạy lệnh
$query=mysqli_query($this->conn,$sql);
// bước 4 trả về giá trị boolean
return $query;
}
// hàm lấy dữ liệu kết hợp nhiều bảng
public function get_limit($table,$condition=array(),$limit){
	
	$sql="SELECT *FROM $table ";


	if(!empty($condition)){
        		// nối chuối,cách where
        		$sql.=" WHERE";
        		//lưu mảng phải lặp
        		foreach ($condition as $key => $value) {
        			$sql.= " $key =  '$value'
        			 AND ";
        			
        		}

        		$sql.=" LIMIT $limit";
        		$query=mysqli_query($this->conn,$sql);
        		$result =array();


        	if($query){
        		// lấy giá trọ của 1 dòng
        		while ($row =mysqli_fetch_assoc($query)) {
        			$result[]=$row;
        			
        		}
        	}
        	return $result;
        	

}

  }


}



?>