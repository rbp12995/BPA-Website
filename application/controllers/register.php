<?
class Register extends CI_Controller {

  public function index(){
    $this->load->library('form_validation');
    $options = array();
    // Assuming that no one is signed in yet.
    $options['signedin'] = FALSE;
    
    $events = $this->db->get_where('events','open = 0')->result_array();
    $opens = $this->db->get_where('events','open = 1')->result_array();
    $options['events'] = $events;
    $options['opens'] = $opens;
    $this->load->view('regform',$options);
  }
  
  public function submit(){
   $this->load->library('form_validation');
   if ($this->form_validation->run() == FALSE){
    index();
   }
   

    
  }
}