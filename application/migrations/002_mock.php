<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_mock extends CI_Migration
{
    public function up()
    {
        $this->db->query("SET FOREIGN_KEY_CHECKS = 0");
        $this->db->query("TRUNCATE TABLE  country");
        $this->db->query("TRUNCATE TABLE  city");
        $this->db->query("TRUNCATE TABLE  sports");
        $this->db->query("TRUNCATE TABLE  location");
        $this->db->query("TRUNCATE TABLE  adresses");
        $this->db->query("TRUNCATE TABLE  events");
        $this->db->query("INSERT INTO country (state) VALUES ('Serbia')");
        $this->db->query("INSERT INTO city (id_coun, town) VALUES (1,'Kragujevac')");
        $this->db->query("INSERT INTO city (id_coun, town) VALUES (1,'Beograd')");
        $this->db->query("INSERT INTO city (id_coun, town) VALUES (1,'Kraljevo')");
        $this->db->query("INSERT INTO sports (sport) VALUES ('Fudbal')");
        $this->db->query("INSERT INTO sports (sport) VALUES ('Košarka')");
        $this->db->query("INSERT INTO sports (sport) VALUES ('Odbojka')");
        $this->db->query("INSERT INTO sports (sport) VALUES ('Tenis')");
        $this->db->query("INSERT INTO adresses (id_city,street) VALUES (1,'Lovačka')");
        $this->db->query("INSERT INTO location (id_city,id_adr,number,lat,lng) VALUES (1,1,3,44.019572, 20.874197)");
        $this->db->query("INSERT INTO events (id_loc,id_spo,id_user,number,price,additional,events_date,events_time) VALUES (1,1,1,12,2500,'Nemoj da neko nije dosao','2016-12-12','21:00')");
        $this->db->query("SET FOREIGN_KEY_CHECKS = 1");
    }

    public function down()
    {
        $this->db->query("SET FOREIGN_KEY_CHECKS = 0");
        $this->db->query("TRUNCATE TABLE  country");
        $this->db->query("TRUNCATE TABLE  city");
        $this->db->query("TRUNCATE TABLE  sports");
        $this->db->query("TRUNCATE TABLE  location");
        $this->db->query("TRUNCATE TABLE  adresses");
        $this->db->query("TRUNCATE TABLE  events");
        $this->db->query("SET FOREIGN_KEY_CHECKS = 1");
    }
}