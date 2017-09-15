<?php namespace App;

use Intervention\Image\ImageManager;
use Silex\Application;

class AppController
{

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function index()
    {
        return $this->app['twig']->render('index.twig');
    }
    
    public function api()
    {
        $icon = new Icon();
        $icon->randomise();

        $manager = new ImageManager();
        $img = $manager->canvas(512, 512, $icon->getBackgroundColour());
        $img->text($icon->getIcon(), 216, 256, function ($font) use ($icon) {
            $font->file($icon->getFontPath());
            $font->size($icon->getFontSize());
            $font->color($icon->getFontColour());
            $font->align('center');
            $font->valign('center');
        });

        header('Content-Type: image/png');
        die($img->response('image/png', 100));
    }
}
