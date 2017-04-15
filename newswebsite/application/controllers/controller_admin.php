<?php
require_once ("/../models/model_menu.php"); 
require_once ("/../models/model_main.php"); 
class Controller_Admin extends Controller
{
	function __construct()
	{
		$this->model = new MainPage();
		$this->view = new View();
	}

	function action_index()
	{	

		$data = $this->model->getoNews();	
		//var_dump($data);
		$this->view->generate('admin_view.php', 'template_view.php',$data);
	}
}