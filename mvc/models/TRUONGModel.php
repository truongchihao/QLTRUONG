<?php

class TRUONGModel extends DB{

    public function TTTRUONG($idtruong){
        $sql = "SELECT * FROM TRUONG_HOC WHERE IDTRUONG = '$idtruong' ";

        if($stmt = mysqli_prepare($this->con, $sql)) {

            if(mysqli_stmt_execute($stmt)) {
                $result = mysqli_stmt_get_result($stmt);

                if(mysqli_num_rows($result) == 1) {

                    return mysqli_fetch_array($result, MYSQLI_ASSOC);

                }else{
                    return 'khongco';
                }
            }else{
                return 'loi';
            }
        }
    }

    public function GETIDTRUONG($idgv){
        $sql = "SELECT tr.IDTRUONG FROM giao_vien as gv, mon_hoc as mh, khoi as k, truong_hoc as tr 
        WHERE gv.IDMON = mh.IDMON AND mh.IDKHOI = k.IDKHOI AND tr.IDTRUONG=k.IDTRUONG AND IDGV='$idgv' ";

        if($stmt = mysqli_prepare($this->con, $sql)) {

            if(mysqli_stmt_execute($stmt)) {
                $result = mysqli_stmt_get_result($stmt);

                if(mysqli_num_rows($result) == 1) {

                    return mysqli_fetch_array($result, MYSQLI_ASSOC);

                }else{
                    return 'khongco';
                }
            }else{
                return 'loi';
            }
        }
    }

    public function IDTRUONGLOP($idlop){
        $sql = "SELECT tr.IDTRUONG FROM lop as l, khoi as k, truong_hoc as tr 
        WHERE l.IDKHOI= k.IDKHOI AND tr.IDTRUONG=k.IDTRUONG AND IDLOP='$idlop' ";

        if($stmt = mysqli_prepare($this->con, $sql)) {

            if(mysqli_stmt_execute($stmt)) {
                $result = mysqli_stmt_get_result($stmt);

                if(mysqli_num_rows($result) == 1) {

                    return mysqli_fetch_array($result, MYSQLI_ASSOC);

                }else{
                    return 'khongco';
                }
            }else{
                return 'loi';
            }
        }
    }

    public function IDTRUONGHS($idhs){
        $sql = "SELECT tr.IDTRUONG FROM hoc_sinh as hs, lop as l, khoi as k, truong_hoc as tr 
        WHERE hs.IDLOP=l.IDLOP AND l.IDKHOI= k.IDKHOI AND tr.IDTRUONG=k.IDTRUONG AND IDHS='$idhs' ";

        if($stmt = mysqli_prepare($this->con, $sql)) {

            if(mysqli_stmt_execute($stmt)) {
                $result = mysqli_stmt_get_result($stmt);

                if(mysqli_num_rows($result) == 1) {

                    return mysqli_fetch_array($result, MYSQLI_ASSOC);

                }else{
                    return 'khongco';
                }
            }else{
                return 'loi';
            }
        }
    }
}
?>