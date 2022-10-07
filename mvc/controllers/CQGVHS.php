<?php
class CQGVHS extends Controller{

    public function __construct(){

        $this->LSModel = $this->model("LSModel");
        $this->ACModel = $this->model("ACModel");
    }

    public function formCQ(){

        $this->view("NQL", [
            "Page"=>"formCQ",
        ]);
        
    }

    public function CAPTK(){

        // 1. Get data NQL nhap

        if(isset($_POST["save"])){
            
            $optradio = $_POST["optradio"];
            $maso = $_POST["maso"];
            $soluong = $_POST["soluong"];
            $password = $_POST["password"];
            $idnql = $_POST["idnql"];
        
        // 2. insert database bang lscq gv hs

        $idls = $this->LSModel->InsertLS($optradio, $maso, $soluong, $password, $idnql);
        $kq = $this->ACModel->InsertAC($optradio, $maso, $soluong, $password);

        // 3. show chu thanh cong hay that bai

        $this->view("NQL", [
            "Page"=>"formCQ",
            "result" => $kq
        ]);

        }
 
    }
}
?>
