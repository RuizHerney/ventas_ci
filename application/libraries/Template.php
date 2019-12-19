<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Template
{
    var $ci;

    function __construct()
    {
        $this->ci = &get_instance();
    }

    public function load($layout, $view = null, $data = null)
    {
        if (! is_null($view)){

            if(file_exists( APPPATH . '/views/modules/' . $layout . '/' .$view . '.php')) {
                $view_path = 'modules/' . $layout . '/' . $view . '.php'; 
            }else{
                show_error('Unable to load the requested file: ' . APPPATH . 'views/modules/' . $layout . '/' .$view);
            }

            if ( is_null($data) ) 
            {
                $data = array('body' => $view_path);
            }
            else if ( is_array($data) )
            {
                $data['body'] = $view_path;
            }
            else if ( is_object($view_path) )
            {
                $data->body = $view_path;
            }

            $this->ci->load->view('layouts/' . $layout, $data);
        }
    }
} # End class Template
