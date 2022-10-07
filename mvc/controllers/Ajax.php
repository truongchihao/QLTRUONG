<?php
class Ajax extends Controller{

    public function __construct(){

        $this->LOPModel = $this->model("LOPModel");
        $this->GVModel = $this->model("GVModel");
    }

    public function CheckTENLOP(){

        $tenlop = $_POST["tenlop"];

        $kq = $this->LOPModel->CheckTENLOP($tenlop);
        if($kq=='true'){
            echo 'Đã có tên lớp';
        }
        
    }

    public function CheckIDGV(){

        $idgv = $_POST["idgv"];

        $kq = $this->GVModel->CheckIDGV($idgv);
        if($kq=='false'){
            echo 'IDGV không tồn tại';
        }
        
    }

    public function CheckMAGV(){

        $magv = $_POST["magv"];

        $kq = $this->GVModel->CheckMAGV($magv);
        if($kq=='false'){
            echo 'Mã GV không tồn tại';
        }
        else
        {
            echo 'IDGV cần tìm là '.$kq;
        }
        
    }

    public function CheckTENGV(){

        $tengv = $_POST["tengv"];

        $kq = $this->GVModel->CheckTENGV($tengv);
        if($kq=='false'){
            echo 'Tên GV không tồn tại';
        }
        else
        {
            echo 'IDGV cần tìm là '.$kq;
        }
        
    }

}
?>
