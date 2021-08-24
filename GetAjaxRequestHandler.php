<?php


namespace Nadav;

use \Nadav\AjaxRequestHandler;

class GetAjaxRequestHandler extends AjaxRequestHandler
{

  private $responses = [
    'This is the response for id 1',
    'This is the response for id 2',
    'This is the response for id 3'
  ];

  /**
   * @return GetAjaxRequestHandler|null
   */
  public static function getInstance()
  {
    if ( is_null( self::$instance ) ) {
      self::$instance = new self();
    }

    return self::$instance;
  }

  /**
   * Check if the request is valid and handle it
   */
  public function handleRequest()
  {
    if ($_SERVER['REQUEST_METHOD'] != 'GET') {
      $this->handleIllegalRequest('Only GET method allowed');
    } else if(!isset($_GET['id'])) {
      $this->handleIllegalRequest('id param should be provided');
    } else {
      $res = $this->getResponse(intval($_GET['id']) - 1);
      if(!$res) {
        $this->handleIllegalRequest('id does not exists');
      }
      echo json_encode($res);
    }
  }

  /**
   * Return the text according to id or false if not exists
   * @param $id
   * @return false|string
   */
  private function getResponse($id)
  {
    if(isset($this->responses[$id])) {
      return $this->responses[$id];
    }
    return false;
  }

  protected function __construct(){}
}