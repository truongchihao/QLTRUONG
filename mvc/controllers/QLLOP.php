<?php
class QLLOP extends Controller{

    public function __construct(){

        $this->LOPModel = $this->model("LOPModel");
        $this->KHOIModel = $this->model("KHOIModel");
    }

    public function fetchlop(){

        $result = $this->LOPModel->read();
        $rowcount=mysqli_num_rows($result);

        //View

        $this->view("fetchlop", [
            "rowcount" => $rowcount,
            "readlop" => $result,
        ]);
    }

    public function insert(){

        //View

        $this->view("NQL", [
            "LOP"=>"insert",
            "khoi" => $this->KHOIModel->KHOI(),
        ]);
    }

    public function InsertLOP(){

        // 1. Get data NQL nhap

        if(isset($_POST["save"])){
            
            $tenlop = $_POST["tenlop"];
            $soluong = $_POST["soluong"];
            $idkhoi = $_POST["idkhoi"];
            
        
        // 2. 

        $kq = $this->LOPModel->InsertLOP($tenlop, $soluong, $idkhoi);

        // 3. show chu thanh cong hay that bai

        $this->view("NQL", [
            "LOP"=>"insert",
            "khoi" => $this->KHOIModel->KHOI(),
            "result" => $kq,
        ]);

        }
 
    }

    public function read($idgv){

        //View

        $this->view("GV", [
            "GV"=>"read",
            "readgv" => $this->GVModel->ReadGV($idgv),
        ]);
    }

    public function update($idlop){

        $row = $this->LOPModel->READLOP($idlop);
        if($row != "loi")
        {
            if($idlop!=1)
            {
                $this->view("NQL", [
                    "LOP"=>"update",
                    "updatelop" => $this->LOPModel->ReadLOP($idlop),
                    "khoi" => $this->KHOIModel->KHOI(),
                ]);
            }
            else
            {
                $this->view("NQL", [
                    "Page"=>"TABLELOP",
                    "thongbao"=>'macdinh',
                ]);
            }
        
        }else{

            $this->view("NQL", [
                "Page"=>"TABLELOP",
                "thongbao"=>'loi',
            ]);

        }
        
    }

    public function UpdateLOP(){

        // 1. Get data NQL nhap

        if(isset($_POST["save"])){
            
            $tenlop = $_POST["tenlop"];
            $soluong = $_POST["soluong"];
            $idkhoi = $_POST["idkhoi"];
            $idlop = $_POST["idlop"];
        
        // 2. update database bang gv

        $kq = $this->LOPModel->UpdateLOP($tenlop, $soluong, $idkhoi, $idlop);

        // 3. show chu thanh cong hay that bai

        $this->view("NQL", [
            "LOP"=>"update",
            "updatelop" => $this->LOPModel->ReadLOP($idlop),
            "khoi" => $this->KHOIModel->KHOI(),
            "result" => $kq,
        ]);

        }
 
    }

    public function delete($idlop){

        $row = $this->LOPModel->READLOP($idlop);
        if($row != "loi")
        {
            if($idlop!=1)
            {
                $this->view("NQL", [
                    "LOP"=>"delete",
                    "ttlop" => $this->LOPModel->TTLOP($idlop),
                ]);
            }
            else
            {
                $this->view("NQL", [
                    "Page"=>"TABLELOP",
                    "thongbao"=>'xoamacdinh',
                ]);
            }
        }else{

            $this->view("NQL", [
                "Page"=>"TABLELOP",
                "thongbao"=>'loixoa',
            ]);

        }

        
    }

    public function DeleteLOP(){

        // 1. Get data NQL nhap

        if(isset($_POST["save"])){
            
            $idlop = $_POST["idlop"];
        
        // 2. update database bang gv

        $kq = $this->LOPModel->DeleteLOP($idlop);

        // 3. show chu thanh cong hay that bai

        $this->view("NQL", [
            "LOP"=>"delete",
            "ttlop" => $this->LOPModel->TTLOP($idlop),
            "result" => $kq,
        ]);

        }
 
    }
}
?>
