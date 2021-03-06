<?php defined( 'SYSPATH' ) or die( 'No direct script access.' );

class Controller_API_Sheduler extends Controller_System_Api {
	
	public function before() 
	{
		define('REST_BACKEND', TRUE);
		parent::before();
	}
	
	public function rest_get()
	{
		$from = (int) $this->param('from', NULL, TRUE);
		$to = (int) $this->param('to', NULL, TRUE);

		$this->response(Sheduler::get($from, $to));
	}
}