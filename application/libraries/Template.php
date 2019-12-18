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
                $view_path = 'modules/' . $layout . '/' . $view; 
            }else{
                show_error('Unable to load the requested file: ' . APPPATH . 'views/modules/' . $layout . '/' .$view);
            }

            $body = $this->ci->load->view($view_path, $data, TRUE);

            if ( is_null($data) ) 
            {
                $data = array('body' => $body);
            }
            else if ( is_array($data) )
            {
                $data['body'] = $body;
            }
            else if ( is_object($data) )
            {
                $data->body = $body;
            }

            $this->ci->load->view('layouts/' . $layout, $data);
        }
    }
} # End class Template
