<?php
class GV extends Controller{
    function SayHi(){

        //View

        $this->view("GV", [
            "Page"=>"rong",
        ]);
    }

    function Home(){

        //View

        $this->view("GV", [
            "Page"=>"rong",
        ]);
    }
}
?>