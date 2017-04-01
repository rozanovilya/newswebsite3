<?php
require_once ("model_news.php");  
class Rubric extends Model
{
	private $RubricId;
	private $RubricName;
	private $oNews = array();

	protected static $table ='rubrics';
	protected static $id = 'RubricId';

	static function saveModel($obj)
	{
		$isSaved = parent::isSaved($obj->RubricId);
		$table = Rubric::$table;
		if ($isSaved){
			$query = self::$oDbConnection->prepare("UPDATE $table 
				SET RubricId=:RubricId,RubricName=:RubricName
					WHERE RubricId = :RubricId");
		}
		else{
			$query = self::$oDbConnection->prepare("INSERT INTO $table (RubricId,RubricName)
				VALUES (:RubricId,:RubricName)");
		}
		$query->bindParam('RubricId',$obj->RubricId);
		$query->bindParam('RubricName',$obj->RubricName);
		$query->execute();
	}

	function setRubricId($RubricId)
	{
		$this->RubricId = $RubricId;
	}
	function getRubricId()
	{
		return $this->RubricId;
	}
	function setRubricName($RubricName)
	{
		$this->RubricName = $RubricName;
	}
	function getRubricName()
	{
		return $this->RubricName;
	}
		function setoNews($oNews)
	{
		$this->oNews = $oNews;
	}
	function getoNews()
	{
		//if ($this->oNews){
		//get the array of objects from the database
			$Class = 'News';
			$table = 'News';
			$idname ='NewsRubric';
			$query = self::$oDbConnection->prepare("SELECT * FROM $table WHERE $idname=:id");
			$query->execute(['id'=>$this->RubricId]);
			$res = $query->fetchAll(PDO::FETCH_CLASS, "News");
			//return ($res) ? new $Class($res) : null;
			return $res;				
		//}

	}

}