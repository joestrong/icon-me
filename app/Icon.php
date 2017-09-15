<?php namespace App;

use MikeAlmond\Color\Color;
use MikeAlmond\Color\PaletteGenerator;

class Icon
{

    protected $backgroundColour = '#000000';
    protected $fontColour = '#ffffff';
    protected $icon = '';
    protected $fontSize = 500;
    protected $fontPath = __DIR__ . '/../resources/fonts/MaterialIcons-Regular.ttf';

    public function __construct()
    {
        $this->config = require('config.php');
    }

    public function randomise()
    {
        $r = $this->randomRgb();
        $colour = Color::fromRgb($r[0], $r[1], $r[2]);

        $this->backgroundColour = $colour->getHex();
        $this->fontColour = $colour->getMatchingTextColor()->getHex();
        $iconKey = array_rand($this->config['icons'], 1);
        $this->icon = '&#x' . $this->config['icons'][$iconKey] . ';';
    }

    public function getIcon()
    {
        return $this->icon;
    }

    public function getFontPath()
    {
        return $this->fontPath;
    }

    public function getBackgroundColour()
    {
        return $this->backgroundColour;
    }

    public function getFontSize()
    {
        return $this->fontSize;
    }

    public function getFontColour()
    {
        return $this->fontColour;
    }

    protected function randomRgb()
    {
        return array_map(function () {
            return rand(0, 255);
        }, [1, 2, 3]);
    }
}
