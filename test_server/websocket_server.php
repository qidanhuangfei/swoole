<?php
/**
 * Created by laowang.
 * Date: 2017/5/16
 * Time: 13:48
 */

//创建websocket服务器对象，监听0.0.0.0:9502端口
$ws = new swoole_websocket_server('192.168.10.24', '9503');

//监听WebSocket连接打开事件

$ws->on('open', function ($ws, $request) {
    var_dump($request->fd);
    $ws->push($request->fd, "hello, welcome\n");
});

//监听WebSocket消息事件
$ws->on('message', function ($ws, $frame) {
    echo "Message: {$frame->data}\n";
    $ws->push($frame->fd, "server: {$frame->data}");
});

//监听WebSocket连接关闭事件
$ws->on('close', function ($ws, $fd) {
    echo "client-{$fd} is closed\n";
});

$ws->start();