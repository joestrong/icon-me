<?php namespace App;

class Icon
{
    public function __construct()
    {
        $this->config = require('config.php');
    }

    public function randomIcon()
    {
        $key = array_rand($this->config['icons'], 1);
        return '&#x' . $this->config['icons'][$key] . ';';
    }
}
