<?php
/**
 * Created by laowang.
 * Date: 2017/5/15
 * Time: 15:07
 */

$http = new \swoole_http_server("0.0.0.0");

$http->on('request', function ($request, $response) {
    $response->header("Content-Type", "text/html; charset=utf-8");
    $response->end("<h1>Hello Swoole. #" . rand(1000, 9999) . "</h1>");
});

$http->start();