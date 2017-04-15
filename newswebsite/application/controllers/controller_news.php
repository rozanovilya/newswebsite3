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

		if ($_POST){
			var_dump($_POST);
			$oComment = new Comment;
			$oComment->CommentText = $_POST['commenttext'];
			$oComment->NewsId = $id;
			$oComment->CommentDate = Date(DATE_RFC822);
			$username = $_POST['username'];
			$passwordHash = password_hash($_POST['password'],PASSWORD_DEFAULT);
			$password = $_POST['password'];
			$oUser = User::getModel($username);
			$oComment->CommentAuthorId = $oUser->UserName;
			$oComment->Moderated = true;
			if (password_verify($password,$oUser->PasswordHash)){ //doesn't work
				Comment::saveModel($oComment); //saving anonymous comments works
			}
			else {
				echo "Пароль неверный";
			}

		}

		$data = $this->menu->getoRubrics(); //using oRubrics doesn't work for unknown reason!!!
		//var_dump($data);
		$this->view->generate('menu_view.php','template_view.php',$data);

		//parent::action_index(); //tried to generate menu in parent class but it failed

		$data = $this->model->getModel($id);	
		//var_dump($data);
		$this->view->generate('news_view.php', 'template_view.php',$data);
	}
}