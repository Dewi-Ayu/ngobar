<?php

class Home extends Controller{
    public function index($nama="",$umur="",$alamat=""){
        // echo 
        // "
        // Hajimimashite watashi wa 
        // <b>".$nama."</b>
        // dan saya berumur
        // <b>".$umur."</b>
        // alamat saya di
        // <b>".$alamat."</b>
        // ";

         $this->view('header');
         $this->view('home');
         $this->view('footer');
        
    }
    public function page(){
        echo "ini halaman pageku";
    }
}