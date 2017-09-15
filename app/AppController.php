<?php namespace App;

use Intervention\Image\ImageManager;
use Silex\Application;

class AppController
{

    public function __construct(Application $app)
    {
        $this->app = $app;
        $this->icon = new Icon();
    }

    public function index()
    {
        return $this->app['twig']->render('index.twig');
    }
    
    public function api()
    {
        $manager = new ImageManager();
        $img = $manager->canvas(512, 512, '#ffaaaa');
        $img->text($this->icon->randomIcon(), 216, 256, function ($font) {
            $font->file(__DIR__ . '/../resources/fonts/MaterialIcons-Regular.ttf');
            $font->size(500);
            $font->color('#ffffff');
            $font->align('center');
            $font->valign('center');
        });

        header('Content-Type: image/png');
        die($img->response('image/png', 100));
    }
}
