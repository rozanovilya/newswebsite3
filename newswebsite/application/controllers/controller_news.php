<?php

class Controller_News extends Controller
{
	function __construct()
	{
		$this->model = new News();
		$this->view = new View();
	}
	function action_index($id)
	{	$data = $this->model->getModel($id);	
		$this->view->generate('news_view.php', 'template_view.php',$data);
	}
}