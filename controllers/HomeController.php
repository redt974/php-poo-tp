<?php
namespace Controllers;

class HomeController{

  public static function index(){
    $headTitle = "Accueil";
    require_once ROOT."/views/home.php";
    require_once ROOT."/templates/global.php";
  }

}