<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class GeoAndSportsModel extends CI_Model {

    public function createCountry($country)
    {
        $data = array(
            'state' => $country['state']
        );

        $this->db->insert('country',$data);
    }

    public function createCity($city)
    {
        $data = array(
            'id_coun' => $city['id_coun'],
            'town' => $city['town']
        );

        $this->db->insert('city',$data);
    }

    public function createSport($sport)
    {
        $data = array(
            'sport' => $sport['sport']
        );

        $this->db->insert('sports',$data);
    }
}