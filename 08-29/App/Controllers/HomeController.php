<?php
namespace App\Controllers;
use App\App;
use App\DB\Json;

class HomeController{
    public function home(){
        $title = 'H-O-M-E';
        $welcome = 'Hello from Zoo';
        new Json;
        return App::view('home',['title'=>$title,'welcome' => $welcome]);
    }
}