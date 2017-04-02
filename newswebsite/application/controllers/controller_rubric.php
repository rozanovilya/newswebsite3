<?php
require_once ("/../models/model_menu.php"); 
class Controller_Rubric extends Controller
{
	function __construct()
	{
		$this->model = new Rubric();
		$this->view = new View();
		$this->menu = new Menu();
	}
	function action_index($id)
	{	
		$data = $this->menu->getoRubrics(); //using oRubrics doesn't work for unknown reason!!!
		//var_dump($data);
		$this->view->generate('menu_view.php','template_view.php',$data);
		$data = $this->model->getModel($id);
		$this->view->generate('rubric_view.php', 'template_view.php',$data);
	}
}