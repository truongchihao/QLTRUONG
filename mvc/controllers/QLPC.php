<?php
class QLPC extends Controller{

    public function __construct(){

        $this->MHModel = $this->model("MHModel");
        $this->LOPModel = $this->model("LOPModel");
        $this->KHOIModel = $this->model("KHOIModel");
        $this->PCModel = $this->model("PCModel");
    }

    public function SayHi(){

        $this->view("GV", [
            "GV"=>"read",
        ]);
    }

    public function fetchpc($idtruong){

        $result = $this->PCModel->readpc($idtruong);

        $rowcount=mysqli_num_rows($result);

        //View

        $this->view("fetchpc", [
            "idtruong" => $idtruong,
            "rowcount" => $rowcount,
            "readpc" => $result,
        ]);
    }

    public function insert($idtruong){

        //View

        $this->view("PC", [
            "PC"=>"insert",
            "lop" => $this->LOPModel->LOP($idtruong),
        ]);
    }

    public function InsertPC(){

        // 1. Get data NQL nhap

        if(isset($_POST["save"])){
            
            $idgv = $_POST["idgv"];
            $idlop = $_POST["idlop"];
            $idtruong = $_POST["idtruong"];
        
        // 2. update database bang gv

        $kq = $this->PCModel->InsertPC($idgv, $idlop);

        // 3. show chu thanh cong hay that bai

        $this->view("PC", [
            "PC"=>"insert",
            "lop" => $this->LOPModel->LOP($idtruong),
            "result" => $kq,
        ]);

        }
 
    }

}
?>
