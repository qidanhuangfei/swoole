<?php
/**
 * Created by laowang.
 * Date: 2017/5/16
 * Time: 11:04
 */
//创建Server对象，监听 127.0.0.1:9501端口
$server = new swoole_server('127.0.0.1', '9501');
//监听连接进入事件
$server->on('connect', function ($server, $fd) {
    echo 'Client: Connected!\n';
});
//监听数据接收事件
$server->on('receive', function ($server, $fd, $from_id, $data) {
    $server->send($fd, "Server: " . $data);
});

//监听连接关闭事件
$server->on('close', function ($server, $fd) {
    echo "Client: Close.\n";
});

$server->start();