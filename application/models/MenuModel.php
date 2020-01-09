<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MenuModel extends CI_Model
{

    public function getMenus()
    {
        $menus = $this->db->get('menus');

        return $menus->result();
    } # End method getMenus

    public function saveMenu($data)
    {
        //
    } # End method saveMenu

    public function getMenuById($id)
    {
        //
    } # End method getMenuById

    public function updateMenu($id, $data)
    {
        //
    } # End method updateMenu

    public function deleteMenu($id)
    {
        //
    } # End method deleteMenu

} # End class MenuModel
