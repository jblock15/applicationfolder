<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model {

  public function show_username($post_data){

    $query = "select * from users where username = ?";
    $values = array($post_data['login_username']);
    $possible_user = $this->db->query($query,$values)->row_array();
    if ($possible_user){

      if (!password_verify($post_data['login_password'], $possible_user['password'])){
        return false;
      }
      return array($possible_user['id'], $possible_user['name']);
    }
    return false;
  }
  public function register($post_data){
    $password = password_hash($post_data['password'], PASSWORD_DEFAULT);
    $query = "insert into users (name, username, password, created_at, updated_at) values (?, ?, ?, now(), now())";
    $values = array($post_data['name'], $post_data['username'], $password);
    $this->db->query($query,$values);
    $post_data['login_username'] = $post_data['username'];
    $post_data['login_password'] = $post_data['password'];
    return $this->show_username($post_data);

  }
}
