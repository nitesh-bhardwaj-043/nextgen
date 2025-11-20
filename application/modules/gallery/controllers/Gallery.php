<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Gallery extends MX_Controller {
    

    function photo_gallery()
    {
        $data['title']="";
        $data['description']="";
        $data['module']="gallery";
        $data['view_file']="photo-gallery";
        echo Modules::run('template/layout2',$data);
    }
    

}