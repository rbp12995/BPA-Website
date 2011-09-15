<?
class Register extends CI_Controller {
  
  public $formRules = array(
               array(
                     'field'   => 'firstname', 
                     'label'   => 'First Name', 
                     'rules'   => 'required'
                  ),
               array(
                     'field'   => 'lastname', 
                     'label'   => 'Last Name', 
                     'rules'   => 'required'
                  ),
               array(
                     'field'   => 'email', 
                     'label'   => 'Email Address', 
                     'rules'   => 'required|valid_email'
                  ),   
               array(
                     'field'   => 'studentid', 
                     'label'   => 'Student ID', 
                     'rules'   => 'required|exact_length[6]|integer'
                  ),
               array(
                     'field'   => 'cellph', 
                     'label'   => 'Cell Phone', 
                     'rules'   => 'required'
                  ),
               array(
                     'field'   => 'studentid', 
                     'label'   => 'Student ID', 
                     'rules'   => 'required|exact_length[6]|integer'
                  )
            );
  
  public function index(){
    $this->load->library('form_validation');
    $this->form_validation->set_rules($this->formRules);
    
    $options = array();
    // Assuming that no one is signed in yet.
    $options['signedin'] = FALSE;
    
    // Retrieve data for events from database.
    $events = $this->db->get_where('events','open = 0')->result_array();
    $opens = $this->db->get_where('events','open = 1')->result_array();
    $options['events'] = $events;
    $options['opens'] = $opens;
    
    // Display the registration form.
    $this->load->view('regform',$options);
  }
  public function thanks(){
    $options = array();
    $options['signedin'] = FALSE;
    $this->load->view("regthanks", $options);
  }
  
  public function submit(){
   $this->load->library('form_validation');
   $this->form_validation->set_rules($this->formRules);

   if ($this->form_validation->run() == FALSE){
    $this->index();
   }
   else{
    $this->load->helper('url');
    $this->redirect('thanks');
   }
   

    
  }
}