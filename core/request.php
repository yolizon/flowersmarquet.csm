<?php
class Request {
    public function uri():string{
        $uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
        //debug_print_backtrace();
        return trim($uri, '/') ?? '';
    }
}