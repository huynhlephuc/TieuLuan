<?php
// Thư Viện Xử Lý Database
class DB_driver
{
    // Biến lưu trữ kết nối
    private $__conn;
     
    // Hàm Kết Nối
    function connect()
    {
        // Nếu chưa kết nối thì thực hiện kết nối
        if (!$this->__conn){
            // Kết nối
            $this->__conn = mysqli_connect('localhost', 'root', '', 'doan4') or die ('Lỗi kết nối');
 			/* $this->__conn = mysqli_connect('sql312.byethost18.com', 'b18_20134320', '01213452100tl', 'b18_20134320_qlsach') or die ('Lỗi kết nối');*/
            // Xử lý truy vấn UTF8 để tránh lỗi font
            mysqli_query($this->__conn, "SET NAMES 'utf8'");
        }
    }
 
    // Hàm Ngắt Kết Nối
    function dis_connect(){
        // Nếu đang kết nối thì ngắt
        if ($this->__conn){
            mysqli_close($this->__conn);
        }
    }
 
    // Hàm Insert
    function insert($table, $data)
    {
        // Kết nối
        $this->connect();
 
        // Lưu trữ danh sách field
        $field_list = '';
        // Lưu trữ danh sách giá trị tương ứng với field
        $value_list = '';
 
        // Lặp qua data
        foreach ($data as $key => $value){
            $field_list .= ",$key";
            $value_list .= ",'".mysqli_escape_string($this->__conn,$value)."'";
			echo $value_list;
        }
 
        // Vì sau vòng lặp các biến $field_list và $value_list sẽ thừa một dấu , nên ta sẽ dùng hàm trim để xóa đi
        $sql = 'INSERT INTO '.$table. '('.trim($field_list, ',').') VALUES ('.trim($value_list, ',').')';
 
        return mysqli_query($this->__conn, $sql);
		$this->dis_connect();
    }
 
    // Hàm Update
    function update($table, $data, $where)
    {
        // Kết nối
        $this->connect();
        $sql = '';
        // Lặp qua data
        foreach ($data as $key => $value){
            $sql .= "$key = '".mysqli_escape_string($this->__conn ,$value)."',";
        }
 
        // Vì sau vòng lặp biến $sql sẽ thừa một dấu , nên ta sẽ dùng hàm trim để xóa đi
        $sql = 'UPDATE '.$table. ' SET '.trim($sql, ',').' WHERE '.$where;
 
        return mysqli_query($this->__conn, $sql);
		$this->dis_connect();
    }
 
    // Hàm delete
    function remove($table, $where){
        // Kết nối
        $this->connect();
         
        // Delete
        $sql = "DELETE FROM $table WHERE $where";
        return mysqli_query($this->__conn, $sql);
		$this->dis_connect();
    }
 
    // Hàm lấy danh sách
    function get_list($sql)
    {
        // Kết nối
        $this->connect();
         
        $result = mysqli_query($this->__conn, $sql);
 
        if (!$result){
            die ('Câu truy vấn bị sai');
        }
 
		$return = array();
		
		  // Lặp qua kết quả để đưa vào mảng
		  while ($row = mysqli_fetch_assoc($result)){
			  $return[] = $row;
		  }
		
		  // Xóa kết quả khỏi bộ nhớ
		  mysqli_free_result($result);
 
       return $return;
	   /*return $result;*/
	   $this->dis_connect();
    }
 
    // Hàm lấy 1 record dùng trong trường hợp lấy chi tiết tin
    function get_row($sql)
    {
        // Kết nối
        $this->connect();
         
        $result = mysqli_query($this->__conn, $sql);
 
        if (!$result){
            die ('Câu truy vấn bị sai');
        }
 
        $row = mysqli_fetch_assoc($result);
 
        // Xóa kết quả khỏi bộ nhớ
        mysqli_free_result($result);
 
        if ($row){
            return $row;
        }
 
        return false;
		$this->dis_connect();
    }
}

//sử lý phân trang

// Hàm lấy value từ $_GET
function input_get($key){
	return isset($_GET[$key]) ? trim($_GET[$key]) : false;
}
// Hàm phân trang
function paging($link, $total_records, $current_page, $limit)
{    
	// Tính tổng số trang
	$total_page = ceil($total_records / $limit);
	 
	// Giới hạn current_page trong khoảng 1 đến total_page
	if ($current_page > $total_page){
		$current_page = $total_page;
	}
	else if ($current_page < 1){
		$current_page = 1;
	}
	 
	// Tìm Start
	$start = ($current_page - 1) * $limit;
 
	$html = '';
	 
	// nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
	if ($current_page > 1 && $total_page > 1){
		$html .= '<li><a href="'.str_replace('{page}', $current_page-1, $link).'">Prev</a></li>';
	}
 
	// Lặp khoảng giữa
	for ($i = 1; $i <= $total_page; $i++){
		// Nếu là trang hiện tại thì hiển thị thẻ span
		// ngược lại hiển thị thẻ a
		if ($i == $current_page){
			$html .= '<li><span>'.$i.'</span><li>';
		}
		else{
			$html .= '<li><a href="'.str_replace('{page}', $i, $link).'">'.$i.'</a></li>';
		}
	}
 
	// nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
	if ($current_page < $total_page && $total_page > 1){
		$html .= '<li><a href="'.str_replace('{page}', $current_page+1, $link).'">Next</a><li>';
	}
	 
	// Trả kết quả
	return array(
		'start' => $start,
		'limit' => $limit,
		'html' => $html
	);
}
?>