<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class RenderImage extends BaseController
{
    protected $helpers = ['StaticData', 'session'];

    public function index($imageName)
    {
        $routes = \Config\Services::routes();

        // if(!session()->has('userLoggedin')){
        //     $routes->set404Override('App\Errors::show404');
        // }




        if(($image = file_get_contents(WRITEPATH.'uploads/'.$imageName)) === FALSE)
            show_404();

        // choose the right mime type
        // $mimeType = 'image/png';
        $mimeType = get_mime_type($imageName);


        $this->response
            ->setStatusCode(200)
            ->setContentType($mimeType)
            ->setBody($image)
            ->send();

    }
}
