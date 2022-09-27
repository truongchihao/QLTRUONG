<?php
class CQGVHS extends Controller{

    public function __construct(){

        $this->LSModel = $this->model("LSModel");
        $this->ACModel = $this->model("ACModel");
    }

    public function SayHi(){

        $this->view("CQ", [
            "CQ"=>"formCQ",
        ]);
    }

    public function formCQ(){

        $this->view("NQL", [
            "Page"=>"formCQ",
        ]);
        
    }

    public function CQ(){

        // 1. Get data NQL nhap

        if(isset($_POST["save"])){
            
            $optradio = $_POST["optradio"];
            $maso = $_POST["maso"];
            $soluong = $_POST["soluong"];
            $password = $_POST["password"];
            $idtruong = $_POST["idtruong"];
        
        // 2. insert database bang lscq gv hs

        $idls = $this->LSModel->InsertLS($optradio, $maso, $soluong, $password, $idtruong);
        $kq = $this->ACModel->InsertAC($optradio, $maso, $soluong, $password, $idtruong);

        // 3. show chu thanh cong hay that bai

        $this->view("CQ", [
            "CQ"=>"formCQ",
            "result" => $kq
        ]);

        }
 
    }
}
?>
