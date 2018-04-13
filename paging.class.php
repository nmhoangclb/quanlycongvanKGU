<?php
class Paging{
protected $_total;
protected $_pages;

// Phương thức tìm tổng số mẫu tin
public function findTotal($db, $table){
  if(isset($_GET['total'])){
   $this->_total = $_GET['total'];
  }else{
   $sql= 'SELECT COUNT(*) FROM '.$table;
   $result = $db->query($sql);
   $row = $db->fetch_array($result);
   $this ->_total = $row[0];
  }
}

// Phương thức tính số trang
public function findPages($limit){
  $this->_pages = ceil($this->_total / $limit);
}

// Phương thức tính vị trí mẫu tin bắt đầu từ vị trí trang
function rowStart($limit){
  return (!isset($_GET['page'])) ? 0 :  ($_GET['page']-1) * $limit;
}

public function pagesList($curpage){
  $total = $this->_total;
  $pages = $this->_pages;
  if($pages <=1){return '';}
  $page_list="";

  // Tạo liên kết tới trang đầu và trang trang trước
  if($curpage!=1){
   $page_list .= '<a href="'.$_SERVER['PHP_SELF'].'?page=1&total='.$total.'" title="trang đầu">First </a>';
  }
  if($curpage  > 1){
   $page_list .= '<a href="'.$_SERVER['PHP_SELF'] .'?page='.($curpage-1).'&total='.$total.'" title="trang trước">< </a>';
  }

  // Tạo liên kết tới các trang
  for($i=1; $i<=$pages; $i++){
   if($i == $curpage){
    $page_list .= "<b>".$i."</b>";
   }
   else{
    $page_list .= '<a href="'.$_SERVER['PHP_SELF'].'?page='.$i.'&total='.$total.'" title="Trang '.$i.'">'.$i.'</a>';
   }
   $page_list .= " ";
  }

  // Tạo liên kết tới trang sau và trang cuối
  if(($curpage+1)<=$pages){
   $page_list .= '<a href="'.$_SERVER['PHP_SELF'].'?page='.($curpage+1).'&total='.$total.'" title="Đến trang sau"> > </a>';
  }
  if(($curpage != $pages) && ($pages != 0)){
   $page_list .= '<a href="'.$_SERVER['PHP_SELF'].'?page='.$pages.'&total='.$total.'" title="trang cuối"> Last</a>';
  }
  return $page_list;
}// end pagesList
}// end class
?>