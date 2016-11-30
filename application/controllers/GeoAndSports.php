<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class GeoAndSports extends REST_Controller {

	public function __construct()
    {
        parent::__construct();

        $this->load->model('GeoAndSportsModel');
    }

    public function createCountry_post()
	{
        $country = $this->input->post('country');

        $_POST['state'] = $country['state']; //prepare input fields for codeigniter Form validation library
        $this->form_validation->set_rules('state', 'State', 'trim|required|strip_tags|max_length[45]|is_unique[country.state]');

        if ($this->form_validation->run() === FALSE) {
            $error = array(
                'country' => $this->form_validation->error('state'),
                'success' => false
            );
            $this->response($error, REST_Controller::HTTP_NON_AUTHORITATIVE_INFORMATION); //send response back with all errors
        } else {
            $this->GeoAndSportsModel->addCountry($country);
            $response = array(
                'success' => true,
                'response' => $country
            );
            $this->response($response, REST_Controller::HTTP_OK); //send response back with success message
        }
	}

    public function createCity_post()
    {
        $city = $this->input->post('city');

        $_POST['id_coun'] = $city['id_coun']; //prepare input fields for codeigniter Form validation library
        $_POST['town'] = $city['town']; //prepare input fields for codeigniter Form validation library
        $this->form_validation->set_rules('id_coun', 'Country', 'trim|required|strip_tags');
        $this->form_validation->set_rules('town', 'City', 'trim|required|strip_tags|max_length[45]|is_unique[city.town]');

        if ($this->form_validation->run() === FALSE) {
            $error = array(
                'country' => $this->form_validation->error('id_coun'),
                'city' => $this->form_validation->error('town'),
                'success' => false
            );
            $this->response($error, REST_Controller::HTTP_NON_AUTHORITATIVE_INFORMATION); //send response back with all errors
        } else {
            $this->GeoAndSportsModel->addCity($city);
            $response = array(
                'success' => true,
                'response' => $city
            );
            $this->response($response, REST_Controller::HTTP_OK); //send response back with success message
        }
    }

    public function createSport_post()
    {
        $sport = $this->input->post('sports');

        $_POST['sport'] = $sport['sport']; //prepare input fields for codeigniter Form validation library
        $this->form_validation->set_rules('sport', 'Sport', 'trim|required|strip_tags|max_length[45]|is_unique[sports.sport]');

        if ($this->form_validation->run() === FALSE) {
            $error = array(
                'sport' => $this->form_validation->error('sport'),
                'success' => false
            );
            $this->response($error, REST_Controller::HTTP_NON_AUTHORITATIVE_INFORMATION); //send response back with all errors
        } else {
            $this->GeoAndSportsModel->addSport($sport);
            $response = array(
                'success' => true,
                'response' => $sport
            );
            $this->response($response, REST_Controller::HTTP_OK); //send response back with success message
        }
    }
}
