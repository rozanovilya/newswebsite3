<?php
require_once ("/../models/model_menu.php"); 
require_once ("/../models/model_main.php"); 
class Controller_Main extends Controller
{
	function __construct()
	{
		$this->model = new MainPage();
		$this->view = new View();
		$this->menu = new Menu();
	}

	function action_index()
	{	
		$data = $this->menu->getoRubrics(); //using oRubrics doesn't work for unknown reason!!!
		//var_dump($data);
		$this->view->generate('menu_view.php','template_view.php',$data);

		//parent::action_index(); //tried to generate menu in parent class but it failed

		$data = $this->model->getoNews();	
		//var_dump($data);
		$this->view->generate('main_view.php', 'template_view.php',$data);
	}
}