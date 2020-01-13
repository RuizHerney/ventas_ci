<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class BackendLib
{
    private $CI;

    public function __construct() 
    {
        $this->CI = &get_instance();

    } # End method __construct

    public function control()
    {
        if (!$this->CI->session->userdata('login')) {
            redirect(base_url());
        }

        $url = $this->CI->uri->segment(1);

        if ($this->CI->uri->segment(2)) {
            $url = $this->CI->uri->segment(1) . '/' . $this->CI->uri->segment(2);
        }

        $infoMenu = $this->CI->backendmodel->getId($url);

        $permission = $this->CI->backendmodel->getPermission($infoMenu->id, $this->CI->session->userdata('role'));

        return $permission;

    } # End method controller

    public function checkPermissionRead($permissionRead)
    {
        if ($permissionRead == 0) {
            redirect(base_url() . 'admin');
        }
    } # End method checkPermissionRead

    public function checkPermissionInsert($permissionInsert)
    {
        if ($permissionInsert == 0) {
            redirect(base_url() . 'admin');
        }
    } # End method checkPermissionInsert

    public function checkPermissionUpdate($permissionUpdate)
    {
        if ($permissionUpdate == 0) {
            redirect(base_url() . 'admin');
        }
    } # End method checkPermissionUpdate

    public function checkPermissionDelete($permissionDelete)
    {
        if ($permissionDelete == 0) {
            redirect(base_url() . 'admin');
        }
    } # End method checkPermissionInsert

} # End class BackendLib
