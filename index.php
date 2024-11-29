<?php

ini_set("date.timezone", "Europe/Paris");
require_once "./utils/Defines.php";
require_once "./models/Autoloader.php";

use Models\Autoloader;
use Models\Router;
use Controllers\ErrorsController;
use Controllers\MachineController;
use Controllers\HomeController;

Autoloader::register();

$router = new Router();

$uri = $_SERVER["REQUEST_URI"];

switch (true) {
  case ($uri === "/"):
    $router->get("/", HomeController::index());
    break;
  case ($uri === "/slot-machine"):
    $router->get("/slot-machine", MachineController::index());
    break;
  case ($uri === "/play"):
    $router->get("/play", MachineController::play());
    break;
  default:
    $router->get("/error", ErrorsController::launchError(404));
    break;
}

$router->run();
