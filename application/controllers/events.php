<?
class Events extends CI_Controller {
public function index(){
	$options = array();
	$options['signedin'] = FALSE;
	$events = $this->db->get('events')->result_array();
	$options['events'] = $events;
	$this->load->view('events', $options);
}
}