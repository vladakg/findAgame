<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_initial extends CI_Migration
{
    public function up()
    {
        //create table "country"
        $sqlCountry = "CREATE TABLE IF NOT EXISTS country (
  			id_coun tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  			state varchar(45) DEFAULT NULL COMMENT 'country name',
  			created_at timestamp DEFAULT CURRENT_TIMESTAMP,
  			PRIMARY KEY (id_coun),
  			UNIQUE KEY state (state)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='List of available countries' AUTO_INCREMENT=1";

        $this->db->query($sqlCountry);

        //create table "city"
        $sqlCountry = "CREATE TABLE IF NOT EXISTS city (
  			id_city smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  			id_coun tinyint(3) unsigned DEFAULT NULL COMMENT 'which country belongs to',
  			town varchar(45) DEFAULT NULL COMMENT 'city name',
  			created_at timestamp DEFAULT CURRENT_TIMESTAMP,
  			PRIMARY KEY (id_city),
  			FOREIGN KEY (id_coun) REFERENCES country(id_coun),
  			UNIQUE KEY town (town)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='List of available cities' AUTO_INCREMENT=1";

        $this->db->query($sqlCountry);

        //create table "sports"
        $sqlCountry = "CREATE TABLE IF NOT EXISTS sports (
  			id_spo tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  			sport varchar(45) DEFAULT NULL COMMENT 'sport name',
  			created_at timestamp DEFAULT CURRENT_TIMESTAMP,
  			PRIMARY KEY (id_spo),
  			UNIQUE KEY sport (sport)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='List of available sports' AUTO_INCREMENT=1";

        $this->db->query($sqlCountry);

        //create table "adresses"
        $sqlCountry = "CREATE TABLE IF NOT EXISTS adresses (
  			id_adr int(10) unsigned NOT NULL AUTO_INCREMENT,
  			id_city smallint(5) unsigned DEFAULT NULL COMMENT 'which city belongs to',
  			street varchar(100) DEFAULT NULL COMMENT 'street name',
  			created_at timestamp DEFAULT CURRENT_TIMESTAMP,
  			PRIMARY KEY (id_adr),
  			FOREIGN KEY (id_city) REFERENCES city(id_city),
  			UNIQUE KEY street (street)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='List of all adresses' AUTO_INCREMENT=1";

        $this->db->query($sqlCountry);

        //create table "user"
        $sqlCountry = "CREATE TABLE IF NOT EXISTS user (
  			id_user int(10) unsigned NOT NULL AUTO_INCREMENT,
  			id_city smallint(5) unsigned DEFAULT NULL COMMENT 'which city belongs to',
  			name varchar(45) DEFAULT NULL COMMENT 'user name',
  			lastname varchar(45) DEFAULT NULL COMMENT 'user lastname',
  			email varchar(80) DEFAULT NULL COMMENT 'user email',
  			password varchar(100) DEFAULT NULL COMMENT 'user password',
  			birth datetime DEFAULT NULL COMMENT 'user birth date',
  			picture varchar(45) DEFAULT NULL COMMENT 'user picture',
  			mobile varchar(45) DEFAULT NULL COMMENT 'user cell phone number',
  			gender enum('male','female') NOT NULL DEFAULT 'male',
  			created_at timestamp DEFAULT CURRENT_TIMESTAMP,
  			PRIMARY KEY (id_user),
  			FOREIGN KEY (id_city) REFERENCES city(id_city),
  			UNIQUE KEY email (email)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='List of all users' AUTO_INCREMENT=1";

        $this->db->query($sqlCountry);

        //create table "friendship"
        $sqlCountry = "CREATE TABLE IF NOT EXISTS friendship (
  			id_first int(10) unsigned DEFAULT NULL,
  			id_second int(10) unsigned DEFAULT NULL,
  			status enum('accepted','block','pending','decline') NOT NULL DEFAULT 'accepted',
  			request timestamp DEFAULT CURRENT_TIMESTAMP COMMENT 'Time when friendship request has been sent',
  			acknowledge datetime DEFAULT NULL COMMENT 'Time of response',
  			PRIMARY KEY (id_first,id_second)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='friendship between users' AUTO_INCREMENT=1";

        $this->db->query($sqlCountry);

        //create table "location"
        $sqlCountry = "CREATE TABLE IF NOT EXISTS location (
  			id_loc int(10) unsigned NOT NULL AUTO_INCREMENT,
  			id_city smallint(5) unsigned DEFAULT NULL COMMENT 'which city belongs to',
  			id_adr int(10) unsigned DEFAULT NULL COMMENT 'location for place',
  			number varchar(10) DEFAULT NULL COMMENT 'number of place in street',
  			lat FLOAT(10,6) NOT NULL,
  			lng FLOAT(10,6) NOT NULL,
  			website varchar(45) DEFAULT NULL COMMENT 'external link',
  			working varchar(45) DEFAULT NULL COMMENT 'working time',
            created_at timestamp DEFAULT CURRENT_TIMESTAMP,
  			PRIMARY KEY (id_loc),
  			FOREIGN KEY (id_city) REFERENCES city(id_city),
  			FOREIGN KEY (id_adr) REFERENCES adresses(id_adr)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='All available location for playing a game' AUTO_INCREMENT=1";

        $this->db->query($sqlCountry);

        //create table "gallery"
        $sqlCountry = "CREATE TABLE IF NOT EXISTS gallery (
  			id_gal int(10) unsigned NOT NULL AUTO_INCREMENT,
  			id_loc int(10) unsigned DEFAULT NULL COMMENT 'which location belongs to',
  			image varchar(45) DEFAULT NULL COMMENT 'location image',
            created_at timestamp DEFAULT CURRENT_TIMESTAMP,
  			PRIMARY KEY (id_gal),
  			FOREIGN KEY (id_loc) REFERENCES location(id_loc)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='All pictures of location' AUTO_INCREMENT=1";

        $this->db->query($sqlCountry);

        //create table "offer"
        $sqlCountry = "CREATE TABLE IF NOT EXISTS offer (
  			id_off tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  			supply varchar(30) DEFAULT NULL COMMENT 'shower, locker room, wifi, ...',
            created_at timestamp DEFAULT CURRENT_TIMESTAMP,
  			PRIMARY KEY (id_off)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Extras, like shower, caffe, wifi, ...' AUTO_INCREMENT=1";

        $this->db->query($sqlCountry);

        //create table "proffer"
        $sqlCountry = "CREATE TABLE IF NOT EXISTS proffer (
  			id_loc int(10) unsigned DEFAULT NULL,
  			id_off tinyint(10) unsigned DEFAULT NULL,
            created_at timestamp DEFAULT CURRENT_TIMESTAMP,
  			PRIMARY KEY (id_loc,id_off)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Relation between location and offer' AUTO_INCREMENT=1";

        $this->db->query($sqlCountry);

        //create table "events"
        $sqlCountry = "CREATE TABLE IF NOT EXISTS events (
  			id_eve int(10) unsigned NOT NULL AUTO_INCREMENT,
  			id_loc int(10) unsigned DEFAULT NULL COMMENT 'which location belongs to',
  			id_spo tinyint(3) unsigned DEFAULT NULL COMMENT 'which sport',
  			id_user int(10) unsigned DEFAULT NULL COMMENT 'who created event',
  			number tinyint(3) DEFAULT NULL COMMENT 'number of players',
  			price varchar(10) DEFAULT NULL COMMENT 'total price of event',
  			additional varchar(255) DEFAULT NULL COMMENT 'some additional information',
  			events_date date DEFAULT NULL COMMENT 'date of event',
  			events_time time DEFAULT NULL COMMENT 'time of event',
            created_at timestamp DEFAULT CURRENT_TIMESTAMP,
  			PRIMARY KEY (id_eve),
  			FOREIGN KEY (id_loc) REFERENCES location(id_loc),
  			FOREIGN KEY (id_spo) REFERENCES sports(id_spo),
  			FOREIGN KEY (id_user) REFERENCES user(id_user)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='All created events' AUTO_INCREMENT=1";

        $this->db->query($sqlCountry);

        //create table "participants"
        $sqlCountry = "CREATE TABLE IF NOT EXISTS participants (
  			id_eve int(10) unsigned DEFAULT NULL,
  			id_user int(10) unsigned DEFAULT NULL,
            created_at timestamp DEFAULT CURRENT_TIMESTAMP,
  			FOREIGN KEY (id_eve) REFERENCES events(id_eve),
  			FOREIGN KEY (id_user) REFERENCES user(id_user)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Participants of some event' AUTO_INCREMENT=1";

        $this->db->query($sqlCountry);

        //create table "evaluations"
        $sqlCountry = "CREATE TABLE IF NOT EXISTS evaluations (
  			id_eva int(10) unsigned NOT NULL AUTO_INCREMENT,
  			id_user int(10) unsigned DEFAULT NULL COMMENT 'user who have been evaluated',
  			evaluator int(10) unsigned DEFAULT NULL COMMENT 'user who giving an evaluation',
  			id_spo tinyint(3) unsigned DEFAULT NULL COMMENT 'which sport',
  			reliability tinyint(3) unsigned DEFAULT NULL,
  			fitness tinyint(3) unsigned DEFAULT NULL,
  			skills tinyint(3) unsigned DEFAULT NULL,
  			created_at timestamp DEFAULT CURRENT_TIMESTAMP,
  			PRIMARY KEY (id_eva),
  			FOREIGN KEY (id_user) REFERENCES user(id_user),
  			FOREIGN KEY (evaluator) REFERENCES user(id_user),
  			FOREIGN KEY (id_spo) REFERENCES sports(id_spo)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Evaluations of players' AUTO_INCREMENT=1";

        $this->db->query($sqlCountry);
    }

    public function down()
    {
        $this->dbforge->drop_table('evaluations');
        $this->dbforge->drop_table('participants');
        $this->dbforge->drop_table('events');
        $this->dbforge->drop_table('proffer');
        $this->dbforge->drop_table('offer');
        $this->dbforge->drop_table('gallery');
        $this->dbforge->drop_table('location');
        $this->dbforge->drop_table('adresses');
        $this->dbforge->drop_table('friendship');
        $this->dbforge->drop_table('user');
        $this->dbforge->drop_table('city');
        $this->dbforge->drop_table('country');
        $this->dbforge->drop_table('sports');
    }
}