<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TypeDocumentModel extends CI_Model
{

    public function getDocuments()
    {

        $documents = $this->db->get('types_documents');

        return $documents->result();
    } # End method getDocuments

} # End class TypeDocumentModel
