<?php

namespace Nadav;

abstract class AjaxRequestHandler
{
  protected static $instance = null;

  abstract protected function handleRequest();
  abstract protected function __construct();

  protected function handleIllegalRequest($msg)
  {
    http_response_code(400);
    echo json_encode($msg);
  }
}