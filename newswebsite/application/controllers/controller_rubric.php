<?php

class Controller_Rubric extends Controller
{
	function __construct()
	{
		$this->model = new Rubric();
		$this->view = new View();
	}
	function action_index($id)
	{	
		$data = $this->model->getModel($id);
		$this->view->generate('rubric_view.php', 'template_view.php',$data);
	}
}