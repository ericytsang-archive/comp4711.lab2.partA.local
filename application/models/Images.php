<?php

class Images extends CI_Model
{

    function __constructor()
    {
        parent::__constructor();
    }

    // returns an array of all the images in the database
    function all()
    {
        $this->db->order_by('id','desc');
        $query = $this->db->get('images');
        return $query->result_array();
    }

    // returns an array of the 3 newest images in the database
    function newest()
    {
        $this->db->order_by('id','desc');
        $this->db->limit(3);
        $query = $this->db->get('images');
        return $query->result_array();
    }

}

?>
