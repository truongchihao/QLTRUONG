<?php
class HS extends Controller{
    function SayHi(){

        //View

        $this->view("HS", [
            "Page"=>"rong",
        ]);
    }

    function Home(){

        //View

        $this->view("HS", [
            "Page"=>"rong",
        ]);
    }
}
?>