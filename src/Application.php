<?php
/**
 * Created by PhpStorm.
 * User: wang
 * Date: 2018/4/19
 * Time: 下午4:21
 */

namespace Zoran\Xmoov;


use Zoran\Xmoov\Servers\StreamServer;
use Zoran\Xmoov\Stream\XmoovStream;

class Application
{
    /**
     * @var array|null
     * */
    protected $config = null;

    /**
     * @var StreamServer
     * */
    protected $server = null;

    protected $handler = null;

    /**
     * 构造函数
     * @param array $config
     * @param StreamServer|null $server
     * @param StreamHandler|null $handler
     * */
    public function __construct(array $config,  $server = null,  $handler = null) {
        $this->server = $server;
        $this->config = $config;
        $this->handler = $handler;
    }

    public function setServer(StreamServer $server) {
        return ($this->server = $server) ? $this : null;
    }

    public function run(){
        ob_start();
        $serverConfig = $this->server->init();
        if($serverConfig){
            if($this->config){
                $stream = new XmoovStream($this->handler, $this->config, $serverConfig);
                ob_end_clean();
                ignore_user_abort(false);
                if ($stream->init(true)) {
                    return $stream;
                }
                return false;
            }else{
                echo "xmoovStream fatal error: defaults not found";

                exit(0);
            }
        }
        return false;
    }
}