<?php
require_once ("/../models/model_news.php"); 
require_once ("/../models/model_menu.php"); 
class Controller_Adminnews extends Controller
{
	function __construct()
	{
		$this->model = new News();
		$this->view = new View();
		$this->menu = new Menu();
	}
	function action_index($id=null)
	{	
		$data = $this->menu->getoRubrics();
		$oNews = New News;
		if ($id){
			$oNews = $this->model->getModel($id);
			//$data=$oNews;
			//var_dump($oNews);
			if ($oNews){
				if(!isset($_POST['NewsRubric'])){
					$_POST['NewsRubric'] = $oNews->oNewsRubric->RubricName;
				}
				if(!isset($_POST['NewsRubricId'])){ 
					$_POST['NewsRubricId'] = $oNews->NewsRubric;
				}
				if(!isset($_POST['SeoH1'])){ 
					$_POST['SeoH1'] = $oNews->SeoH1;
				}
				if(!isset($_POST['SeoTitle'])){ 	
					$_POST['SeoTitle'] = $oNews->SeoTitle;
				}
				if(!isset($_POST['SeoDescription'])){ 
					$_POST['SeoDescription'] = $oNews->SeoDescription;
				}
				if(!isset($_POST['NewsText'])){ 
					$_POST['NewsText'] = $oNews->NewsText;
				}
				//var_dump($_POST);

			}
		}
		if ($id){
			$oNews->NewsId = $id;
		}
		$oNews->NewsDate = Date(DATE_RFC822);
		$oNews->NewsRubric = $_POST['NewsRubricId'];
		$oNews->SeoH1 = $_POST['SeoH1'];
		$oNews->SeoTitle = $_POST['SeoTitle'];
		$oNews->SeoDescription = $_POST['SeoDescription'];
		$oNews->NewsText = $_POST['NewsText'];
		//var_dump($oNews);
		News::saveModel($oNews);

		$this->view->generate('adminnews_view.php','template_view.php',$data);
	}
}