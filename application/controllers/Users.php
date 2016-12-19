<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Users extends REST_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('UsersModel');
        $this->load->library('bcrypt');
    }

	public function createUser_post()
	{
        $user = $this->input->post('user');

        $_POST['name'] = $user['name']; //prepare input fields for codeigniter Form validation library
        $_POST['lastname'] = $user['lastname']; //prepare input fields for codeigniter Form validation library
        $_POST['email'] = $user['email']; //prepare input fields for codeigniter Form validation library
        $_POST['password'] = $user['password']; //prepare input fields for codeigniter Form validation library

        $this->form_validation->set_rules('name', 'Name', 'trim|required|strip_tags|max_length[45]');
        $this->form_validation->set_rules('lastname', 'Lastname', 'trim|required|strip_tags|max_length[45]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|strip_tags|max_length[80]|is_unique[user.email]');
        $this->form_validation->set_rules('password', 'password', 'trim|required|strip_tags|min_length[5]|max_length[12]');

        if ($this->form_validation->run() === FALSE) {
            $error = array(
                'name' => $this->form_validation->error('name'),
                'lastname' => $this->form_validation->error('lastname'),
                'email' => $this->form_validation->error('email'),
                'password' => $this->form_validation->error('password'),
                'success' => false
            );
            $this->response($error, REST_Controller::HTTP_FORBIDDEN); //send response back with all errors
        } else {
            $this->UsersModel->createUser($user);
            $response = array(
                'success' => true
            );
            $this->response($response, REST_Controller::HTTP_OK); //send response back with success message
        }
	}

	public function deleteUser_delete($id=0)
    {
        $_POST['idUser'] = $id; //prepare input fields for codeigniter Form validation library
        $this->form_validation->set_rules('idUser', 'idUser', 'required');
        var_dump($this->form_validation->run());exit;
        if ($this->form_validation->run() === FALSE) {
            $error = array(
                'idUser' => $this->form_validation->error('idUser'),
                'success' => false
            );
            print_r($this->validation_errors());exit;
            $this->response($error, REST_Controller::HTTP_FORBIDDEN); //send response back with all errors
        } else {
            $db = $this->UsersModel->deleteUser($id);
            $response = array(
                'db' => $db,
                'success' => true
            );
            $this->response($response, REST_Controller::HTTP_OK); //send response back with success message
        }

    }

}
