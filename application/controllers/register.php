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
                     'field'   => 'event1', 
                     'label'   => 'Event 1', 
                     'rules'   => 'alpha'
                  ),
               array(
                     'field'   => 'event2', 
                     'label'   => 'Event 2', 
                     'rules'   => 'alpha'
                  ),
               array(
                     'field'   => 'event3', 
                     'label'   => 'Event 3', 
                     'rules'   => 'alpha'
                  ),
               array(
                     'field'   => 'event4', 
                     'label'   => 'Event 4', 
                     'rules'   => 'alpha'
                  ),
               array(
                     'field'   => 'event5', 
                     'label'   => 'Event 5', 
                     'rules'   => 'alpha'
                  ),
               array(
                     'field'   => 'area1', 
                     'label'   => 'Area 1', 
                     'rules'   => 'alpha'
                  ),
               array(
                     'field'   => 'area2', 
                     'label'   => 'Area 2', 
                     'rules'   => 'alpha'
                  ),
               array(
                     'field'   => 'open1', 
                     'label'   => 'Open Event 1', 
                     'rules'   => 'alpha'
                  ),
               array(
                     'field'   => 'open2', 
                     'label'   => 'Open Event 2', 
                     'rules'   => 'alpha'
                  ),
            );
  
  public function index(){
    // Set form validation rules.
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
    // Create and insert a member record into the database.
    $member = array(
     'sid'      => $_POST["studentid"],
     'first'    => $_POST["firstname"],
     'last'     => $_POST["lastname"],
     'firstLast'=> $_POST["firstname"] . $_POST["lastname"],
     'email'    => $_POST["email"],
     'gender'   => $_POST["gender"],
     'cellPhone'=> $_POST["cellph"],
     'homePhone'=> $_POST["homeph"],
     'grade'    => $_POST["grade"],
     'returning'=> ($_POST['returning'] == 'yes'),
     'businessNow'=> $_POST['businessnow'],
     'businessPast'=> $_POST['businesspast']
     );
    $firstLast = $_POST["firstname"] . $_POST["lastname"];
    $this->db->insert('members',$member);
    
    // Insert events, areas of interest, and open events.
    for($i = 1;$i<=5;$i++){
      $event = array(
       'member' => $firstLast,
       'event'  => $_POST['event'.$i],
       'type'   => 'event'
      );
      $this->db->insert('members_events',$event);
    }
    for($i = 1;$i<=2;$i++){
      $event = array(
       'member' => $firstLast,
       'event'  => $_POST['area'.$i],
       'type'   => 'area'
      );
      $this->db->insert('members_events',$event);
    }
    for($i = 1;$i<=2;$i++){
      $event = array(
       'member' => $firstLast,
       'event'  => $_POST['open'.$i],
       'type'   => 'open'
      );
      $this->db->insert('members_events',$event);
    }
    
    // Insert schedule information.
    for($i = 1;$i<=7;$i++){
      $class = array(
       'member' => $firstLast,
       'hour'   => $i,
       'class'  => $_POST[$i .'course'],
       'teacher'=> $_POST[$i .'teacher'],
       'room'   => $_POST[$i .'room']
      );
      $this->db->insert('members_classes',$class);
    }
    
    // And we're done! ^.^
    $this->load->helper('url');
    $this->url->redirect('thanks');
   }
   

    
  }
}