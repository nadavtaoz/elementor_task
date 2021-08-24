<?php

namespace Nadav;

include './AjaxRequestHandler.php';
include './GetAjaxRequestHandler.php';

use \Nadav\GetAjaxRequestHandler;

header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Content-Type: application/json');

$getAjaxRequestHandler = \Nadav\GetAjaxRequestHandler::getInstance();
$getAjaxRequestHandler->handleRequest();

