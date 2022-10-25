<?php
class GV extends Controller{

    public function __construct(){

        $this->PCModel = $this->model("PCModel");
        $this->TLModel = $this->model("TLModel");
    }


    function Home(){

        //View

        $this->view("GV", [
            "Page"=>"rong",
        ]);
    }

    function LOP($idgv){

        //View
        //$idgv=preg_quote($idgv);
        if(is_numeric($idgv))
        {
            $this->view("GV", [
                "Page"=>"TABLEGVLOP",
                "GVLOP" => $this->PCModel->dslop($idgv),
            ]);
        }
        else
        {
            header("location: http://localhost/quanly/Home/Login");
        }
        
    }

    function LOPDAY($idgv, $idlop){

        //View
        // $idgv=preg_quote($idgv);
        // $idlop=preg_quote($idlop);

        if(is_numeric($idgv) AND is_numeric($idlop))
        {
            $result = $this->PCModel->LOPDAY($idgv, $idlop);
            $row = mysqli_fetch_array($result);

            $result1 = $this->TLModel->readtl($idgv, $idlop);
            $result2 = $this->TLModel->readbt($idgv, $idlop);


            $this->view("GV", [
            "Page"=>"LOPDAY",
            "LOPDAY"=>$row,
            "TL"=>$result1,
            "BT"=>$result2,
            ]);
        }
        else
        {
            header("location: http://localhost/quanly/Home/Login");
        }   
    }

    function xoafile($idgv, $idlop, $file){

        // $idgv=preg_quote($idgv);
        // $idlop=preg_quote($idlop);

        if(is_numeric($idgv) AND is_numeric($idlop))
        {
        //View]
        $file = strip_tags($file);
        $file=preg_quote($file, '/');
            $folder = "../quanly/mvc/models/TAILIEU/";
            $result = $this->TLModel->xoafile($idgv, $idlop, $file);

            unlink("$folder$file");

            $this->view("GV", [
                "Page"=>"xoafile",
                "IDGV"=>$idgv,
                "IDLOP"=>$idlop,
                "ketqua"=>$result,
            ]);
        }
    }
}
?>