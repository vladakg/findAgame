<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class GeoAndSportsModel extends CI_Model {

    public function addCountry($country)
    {
        $data = array(
            'state' => $country['state']
        );

        $this->db->insert('country',$data);
    }

    public function addCity($city)
    {
        $data = array(
            'id_coun' => $city['id_coun'],
            'town' => $city['town']
        );

        $this->db->insert('city',$data);
    }

    public function addSport($sport)
    {
        $data = array(
            'sport' => $sport['sport']
        );

        $this->db->insert('sports',$data);
    }
}