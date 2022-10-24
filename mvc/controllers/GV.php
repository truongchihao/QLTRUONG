<?php
class GV extends Controller{

    public function __construct(){

        $this->PCModel = $this->model("PCModel");
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

            $this->view("GV", [
            "Page"=>"LOPDAY",
            "LOPDAY"=>$row,
            ]);
        }
        else
        {
            header("location: http://localhost/quanly/Home/Login");
        }

        
    }
}
?>