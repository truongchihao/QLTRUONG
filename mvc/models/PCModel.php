<?php

class PCModel extends DB{
    
       function readpc(){
        $sql = "SELECT *
        FROM lop as l, phan_cong as pc, giao_vien as gv, mon_hoc as mh
        WHERE l.IDLOP = pc.IDLOP AND pc.IDGV = gv.IDGV AND gv.IDMON = mh.IDMON";
        
        return mysqli_query($this->con, $sql);
       }

       public function InsertPC($idgv, $idlop){
              $sql = "INSERT INTO PHAN_CONG (IDGV, IDLOP)
              VALUES('$idgv', '$idlop')";
      
              $result = false;
              if( mysqli_query($this->con, $sql)) {
                  $result = true;
              }
              return json_encode($result);
       }

}
?>