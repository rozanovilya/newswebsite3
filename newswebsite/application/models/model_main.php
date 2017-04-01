<?php
class MainPage extends Model
{
	public $oNews;
	function setoNews($oNews)
	{
		$this->oNews = $oNews;
	}
	function getoNews()
	{
		if ($this->oNews){
			$query = self::$oDbConnection->prepare("SELECT * FROM News ORDER BY NewsDate");
			$query->execute();
			$res = $query->fetchAll(PDO::FETCH_CLASS, "News");
			return $res;
		}
	}

}