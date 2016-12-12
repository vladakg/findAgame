<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class EventsModel extends CI_Model {

    public function listEvents()
    {
        $this->db->select('lat,lng');
        $query = $this->db->get('location');
        return $query->result();
    }

}