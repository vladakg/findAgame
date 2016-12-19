<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UsersModel extends CI_Model {

    public function addCountry($country)
    {
        $data = array(
            'state' => $country['state']
        );

        $this->db->insert('country',$data);
    }

    public function createUser($user)
    {
        $data = array(
            'name' => $user['name'],
            'lastname' => $user['lastname'],
            'email' => $user['email'],
            'password' => $this->bcrypt->hash_password($user['password']),
        );

        $this->db->insert('user',$data);
    }

    public function deleteUser($user)
    {
        $this->db->where('id_user',$user['idUser']);
        $this->db->delete('user');
//        if ($this->db->_error_message()) {
//            $result = 'Error! ['.$this->db->_error_message().']';
//        } else if (!$this->db->affected_rows()) {
//            $result = 'Error! ID ['.$id.'] not found';
//        } else {
//            $result = 'Success';
//        }
    }


}