<?php

class TLModel extends DB{
    
       function readpc(){
        $sql = "SELECT *
        FROM lop as l, phan_cong as pc, giao_vien as gv, mon_hoc as mh
        WHERE l.IDLOP = pc.IDLOP AND pc.IDGV = gv.IDGV AND gv.IDMON = mh.IDMON";
        
        return mysqli_query($this->con, $sql);
       }

       public function InsertTL($name, $ngay, $file, $idgv, $idlop){

              $sql = "INSERT INTO TAI_LIEU(LOAI, NGAY_UPLOAD, IDGV, NAME_FILE, IDLOP) 
              VALUES('$name', '$ngay', '$idgv', '$file', '$idlop')";
      
              $result = false;
              if( mysqli_query($this->con, $sql)) {
                  $result = true;
              }
              return json_encode($result);
       }

       function dslop($idgv){
              $sql = "SELECT *
              FROM lop as l, phan_cong as pc, giao_vien as gv
              WHERE l.IDLOP = pc.IDLOP AND pc.IDGV = gv.IDGV and gv.IDGV ='$idgv'";
              
              return mysqli_query($this->con, $sql);
       }

       function lopday($idgv){
              $sql = "SELECT *
              FROM lop as l, phan_cong as pc, giao_vien as gv
              WHERE l.IDLOP = pc.IDLOP AND pc.IDGV = gv.IDGV and gv.IDGV ='$idgv'";
              
              return mysqli_query($this->con, $sql);
       }

}
?>