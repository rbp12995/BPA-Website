<?
class Home extends CI_Controller {
  public function index(){
    $options = array();
    $options['signedin'] = FALSE;
    $this->load->view("index",$options);
  }
}