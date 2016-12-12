<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Events extends REST_Controller {

	public function __construct()
    {
        parent::__construct();

        $this->load->model('EventsModel');
    }

    public function listEvents_get()
	{
        $events = $this->EventsModel->listEvents();

        $response = array(
            'success' => true,
            'response' => $events
        );
        $this->response($response, REST_Controller::HTTP_OK); //send response back with success message
	}


}
