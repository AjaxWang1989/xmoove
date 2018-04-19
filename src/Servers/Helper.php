<?php
/**
 * Created by PhpStorm.
 * User: wang
 * Date: 2018/4/19
 * Time: 下午4:06
 */

namespace Zoran\Xmoov\Servers;


class Helper extends StreamServer
{
    public function init()
    {

        return [
            'file' => 'powerd-by-xmoovstream.gif',
            'file_path' => $this->config['file_path'] . '/images/',
            'show_errors' => false
        ]; // TODO: Change the autogenerated stub
    }
}