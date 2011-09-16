<?
class Home extends CI_Controller {
  public function index(){
    $options['signedin'] = FALSE;
    $this->load->view("index");
  }
}