<?php
namespace Mpm\Core;

class Request {
    private $method;
    private $uri;
    private $headers;
    private $body;
    public $POST;
    public $GET;

    public function __construct($method, $uri, $headers, $body) {
        $this->method = $method;
        $this->uri = $uri;
        $this->headers = $headers;
        $this->body = $body;
        $this->POST = $_POST;
        $this->GET = $_GET;
    }

    public function getMethod() {
        return $this->method;
    }

    public function getUri() {
        return $this->uri;
    }

    public function getHeaders() {
        return $this->headers;
    }

    public function getBody() {
        return $this->body;
    }

    public function isAjax() {
        return isset($this->headers['X-Requested-With']) && $this->headers['X-Requested-With'] === 'XMLHttpRequest';
    }
    
    public static function captureUri(){
      return $_SERVER["REQUEST_URI"];
    }
}