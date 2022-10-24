<?php
class NQL extends Controller{
    
    function Home(){

        //View

        $this->view("NQL", [
            "Page"=>"rong",
        ]);
    }

    function MON(){
        //View

        $this->view("NQL", [
            "Page"=>"TABLEMON",
        ]);
    }

    function GV($idmon){

        //$idmon=preg_quote($idmon);

        if(is_numeric($idmon))
        {
            $this->MHModel = $this->model("MHModel");
            $ttmon=$this->MHModel->readmh($idmon);

            //View

            $this->view("NQL", [
                "Page"=>"TABLEGV",
                "ttmon"=>$ttmon,

            ]);
        }
        else
        {
            header("location: http://localhost/quanly/Home/Login");
        }

        
    }

    function CQ(){

        //Model
        $ls = $this->model("LSModel");
        //View

        if(isset($_POST["save"])){

            $this->view("NQL", [
                "Page"=>"TABLECQ",
                "LS" => $ls->LichSu()
            ]);
        }
        
        //View

        $this->view("NQL", [
            "Page"=>"TABLECQ",
        ]);
        
    }

    function LOP(){
        //View

        $this->view("NQL", [
            "Page"=>"TABLELOP",
        ]);
    }

    function HS($idlop){

        //model
        //$idlop=preg_quote($idlop);

        if(is_numeric($idlop))
        {
            $this->LOPModel = $this->model("LOPModel");
            $kq= $this->LOPModel->TTLOP($idlop);
            $this->view("NQL", [
                "Page"=>"TABLEHS",
                "ttlop" => $kq,
            ]);
        }
        else
        {
            header("location: http://localhost/quanly/Home/Login");
        }

        
    }

    function PC(){

        //View

        $this->view("NQL", [
            "Page"=>"TABLEPC",
        ]);
    }

}
?>