<?php

class PCModel extends DB{
    
       function readpc($idtruong){
        $sql = "SELECT mh.IDMON, mh.TEN_MON, gv.IDGV, gv.FULL_NAME, l.IDLOP, l.TEN_LOP
        FROM lop as l, phan_cong as pc, giao_vien as gv, mon_hoc as mh, khoi as k, truong_hoc as tr 
        WHERE l.IDLOP = pc.IDLOP AND pc.IDGV = gv.IDGV AND gv.IDMON = mh.IDMON AND mh.IDKHOI = k.IDKHOI AND tr.IDTRUONG=k.IDTRUONG 
        AND tr.IDTRUONG='$idtruong'";
        
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