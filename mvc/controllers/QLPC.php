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

    public function fetchpc(){

        $result = $this->PCModel->readpc();

        $rowcount=mysqli_num_rows($result);

        //View

        $this->view("fetchpc", [
            "rowcount" => $rowcount,
            "readpc" => $result,
        ]);
    }

    public function insert(){

        //View

        $this->view("NQL", [
            "PC"=>"insert",
            "lop" => $this->LOPModel->LOP(),
        ]);
    }

    public function InsertPC(){

        // 1. Get data NQL nhap

        if(isset($_POST["save"])){
            
            $idgv = $_POST["idgv"];
            $idlop = $_POST["idlop"];
        
        // 2. update database bang gv

        $kq = $this->PCModel->InsertPC($idgv, $idlop);

        // 3. show chu thanh cong hay that bai

        $this->view("NQL", [
            "PC"=>"insert",
            "lop" => $this->LOPModel->LOP(),
            "result" => $kq,
        ]);

        }
 
    }

}
?>
