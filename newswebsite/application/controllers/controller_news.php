<?php
require_once ("/../models/model_menu.php"); 
//require_once ("controller_pages.php"); 
class Controller_News extends Controller
{
	function __construct()
	{
		$this->model = new News();
		$this->view = new View();
		$this->menu = new Menu();
	}
	function action_index($id = null)
	{
		$data = $this->menu->getoRubrics(); //using oRubrics doesn't work for unknown reason!!!
		//var_dump($data);
		$this->view->generate('menu_view.php','template_view.php',$data);

		//parent::action_index(); //tried to generate menu in parent class but it failed

		$data = $this->model->getModel($id);	
		//var_dump($data);
		$this->view->generate('news_view.php', 'template_view.php',$data);
	}
}