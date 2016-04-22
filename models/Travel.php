<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Travel extends CI_Model {
  public function index_joined(){
    $query = "SELECT * FROM trips LEFT JOIN users ON trips.users_id = users.id LEFT JOIN     users_has_trips on users_has_trips.user_id = users.id WHERE 	users_has_trips.user_id = ? or trips.users_id = ?";
    $values = array($this->session->userdata['user_id'],$this->session->userdata['user_id']);
    return $this->db->query($query,$values)->result_array();


  }
  public function index_other(){
    $query = "SELECT      * FROM     trips         LEFT JOIN   users as creators      ON trips.users_id = creators.id     LEFT JOIN      users_has_trips     ON users_has_trips.trip_id = trips.id     LEFT JOIN     users as travelers     ON users_has_trips.user_id = travelers.id     where not trips.users_id = ? or not users_has_trips.user_id = ?";

    $values = array($this->session->userdata['user_id'],$this->session->userdata['user_id']);
    return $this->db->query($query,$values)->result_array();

  }
}
