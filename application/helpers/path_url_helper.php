<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('path_img'))
{
    function path_img()
    {
        //$url = base_url('img');
        //$url = $_SERVER["SERVER_NAME"];
        //$url = $_SERVER["DOCUMENT_ROOT"] . '/project/kinuro_surat/img';
        $url = '/var/www/html/project/kinuro_surat/img/';
        return $url;
    }   
}