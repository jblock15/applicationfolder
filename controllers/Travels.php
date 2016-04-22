<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Travels extends CI_Controller {



  public function __construct(){
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->model('User');
    $this->load->model('Travel');
    $this->load->helper('url');

  }

  public function index()
  {
    $this->load->view('login_registration');
  }

  public function indexm(){
    $on_trips = $this->Travel->index_joined();
    $join_trips = $this->Travel->index_other();
    $this->load->view('travels', array('on_trips'=>$on_trips, 'join_trips'=>$join_trips));
  }

  public function login(){
    $this->form_validation->set_rules('login_username', 'Username', 'required');

    if ($this->form_validation->run()){
      $possible_user = $this->User->show_username($this->input->post());
      if ($possible_user){
        $this->session->set_userdata('user_id',$possible_user[0]);
        $this->session->set_userdata('user_name',$possible_user[1]);
        redirect('/travels');
        return;

      }
      $this->load->view('login_registration');
      return;
    }
    else{
      $this->load->view('login_registration');
      return;
    }
      $this->load->view('login_registration');
      return;
  }
  public function register(){
    $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[2]||is_unique[users.username]');
    $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[2]');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|matches[confirm_password]');
    if ($this->form_validation->run()){

      $possible_user = $this->User->register($this->input->post());


      if ($possible_user){
        $this->session->set_userdata('user_id',$possible_user[0]);
        $this->session->set_userdata('user_name',$possible_user[1]);

        redirect('/travels');
        return;
      }
      $this->load->view('login_registration');
      return;
    }

    else{
      $this->load->view('login_registration');
    return;
    }
    $this->load->view('login_registration');
    return;
  }
  public function newt(){
    $this->load->view("newtravel");
  }
  public function createtravel(){
    var_dump($this->input->post());
    // echo ($this->input->post('tripsto'));
    $date1=date_create($this->input->post('tripsto'));
    $date2=date_create($this->input->post('tripsfrom'));
    $diff=date_diff($date2,$date1);
    $today=date_create(date("Y-m-d"));
    echo $diff->format("%a");
    $diff2=date_diff($today,$date2);
    echo ($diff2->format("%a"));
    $this->form_validation->set_rules();
    if ((int)$diff->format("%a") > 0){
      echo "date to later than date from";
    }
    if ((int)$diff->format("%a") > 0){
      echo "date from later than today";
    }

    die();

  }
}
