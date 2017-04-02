<?php
error_reporting(-1);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

class Model
{

	static $oDbConnection;

	function __construct($args = [])
	{
		foreach ( $args as $key => $value)
			$this->$key = $value;
	}

	public function __get($property)
	{

		$functionname = 'get'.$property;
			return $this->$functionname();	
	}
	public function __set($property, $value)
	{
			$functionname = 'set'.$property;
			$this->$functionname($value);
	}


	static function getModel($id)
	{
		$Class = get_called_class();
		$table = $Class::$table;
		$idname =$Class::$id;
		//if (empty($table))
		//	return null;
		$query = self::$oDbConnection->prepare("SELECT * FROM $table WHERE $idname=:id");
		$query->execute(['id'=>$id]);
		$res = $query->fetch(PDO::FETCH_ASSOC);
		return ($res) ? new $Class($res) : null;
	}

	static function isSaved($id)
	{
		$Class = get_called_class();
		$table = $Class::$table;
		$idname =$Class::$id;
		$queryIfExists = self::$oDbConnection->prepare("SELECT * FROM $table WHERE $idname=:id");
		$queryIfExists->execute(['id'=>$id]);
		$res = $queryIfExists->fetch(PDO::FETCH_ASSOC);
		return $res;
	}
}

class News extends Model
{
	private $NewsId;
	private $NewsDate;
	private $NewsRubric;
	private $SeoH1;
	private $SeoTitle;
	private $SeoDescription;
	private $PreviewPhoto;
	private $NewsText;
	private $NewsSource;
	private $NewsAuthorId;
	public $oNewsAuthor;

	protected static $table ='News';
	protected static $id = 'NewsId';

	static function saveModel($obj)
	{
		$isSaved = parent::isSaved($obj->NewsId);
		if ($isSaved){
			$query = self::$oDbConnection->prepare("UPDATE $table 
				SET NewsId=:NewsId, NewsDate =:NewsDate, NewsRubric = :NewsRubric, SeoH1 = :SeoH1,SeoTitle =:SeoTitle,
					SeoDescription = :SeoDescription, PreviewPhoto = :PreviewPhoto, NewsText = :NewsText
					NewsSource = :NewsSource, NewsAuthorId = :NewsAuthorId
					WHERE NewsId = :NewsId");
		}
		else{
			$query = self::$oDbConnection->prepare("INSERT INTO $table (NewsId,NewsDate,NewsRubric,SeoH1,SeoTitle,SeoDescription,PreviewPhoto,NewsText,NewsSource,NewsAuthorId)
				VALUES (:NewsId,:NewsDate,:NewsRubric,:SeoH1,:SeoTitle,:SeoDescription,:PreviewPhoto,:NewsText,:NewsSource,:NewsAuthorId)");
		}
		$query->bindParam('NewsId',$obj->NewsId);
		$query->bindParam('NewsDate',$obj->NewsDate);
		$query->bindParam('NewsRubric',$obj->NewsRubric);
		$query->bindParam('SeoH1',$obj->SeoH1);
		$query->bindParam('SeoTitle',$obj->SeoTitle);
		$query->bindParam('SeoDescription',$obj->SeoDescription);
		$query->bindParam('PreviewPhoto',$obj->PreviewPhoto);
		$query->bindParam('NewsText',$obj->NewsText);
		$query->bindParam('NewsSource',$obj->NewsSource);
		$query->bindParam('NewsAuthorId',$obj->NewsAuthorId);
		$query->execute();
	}
	function setNewsId($NewsId)
	{
    	$this->NewsId = $NewsId;
	}
	function getNewsId()
	{
   	 	return $this->NewsId;
	}
	function setNewsDate($NewsDate)
	{
   		$this->NewsDate = $NewsDate;
	}
	function getNewsDate()
	{
    	return $this->NewsDate;
	}
	function setNewsRubric($NewsRubric)
	{
    	$this->NewsRubric = $NewsRubric;
	}
	function getNewsRubric()
	{
    	return $this->NewsRubric;
	}
	function setSeoH1($SeoH1)
	{
    	$this->seoH1 = $SeoH1;
	}
	function getSeoH1()
	{
    	return $this->SeoH1;
	}
	function setSeoTitle($SeoTitle)
	{
		$this->SeoTitle = $SeoTitle;
	}
	function getSeoTitle()
	{
		return $this->SeoTitle;
	}
	function setSeoDescription($SeoDescription)
	{
		$this->SeoDescription = $SeoDescription;
	}
	function getSeoDescription()
	{
		return $this->SeoDescription;
	}
	function setPreviewPhoto($PreviewPhoto)
	{
		$this->PreviewPhoto = $PreviewPhoto;
	}
	function getPreviewPhoto()
	{
		return $this->PreviewPhoto;
	}
	function setNewsText($NewsText)
	{
		$this->NewsText = $NewsText;
	}
	function getNewsText()
	{
		return $this->NewsText;
	}
	function setNewsSource($NewsSource)
	{
		$this->NewsSource = $NewsSource;
	}
	function getNewsSource()
	{
		return $this->NewsSource;
	}
	function setNewsAuthorId($NewsAuthorId)
	{
		$this->NewsAuthorId = $NewsAuthorId;
	}
	function getNewsAuthorId()
	{
		return $this->NewsAuthorId;
	}
	function getoNewsAuthor()
	{
		if ($this->oNewsAuthor){
			//getting the object from the database
		$Class = 'User';
		$table = 'Users';
		$idname ='UserId';
		$query = self::$oDbConnection->prepare("SELECT * FROM $table WHERE $idname=:id");
		$query->execute(['id'=>$this->NewsAuthorId]);
		$res = $query->fetch(PDO::FETCH_ASSOC);
		return ($res) ? new $Class($res) : null;
		}
	}
	function setoNewsAuthor($oNewsAuthor)
	{
		$this->oNewsAuthor = $oNewsAuthor;
	}
	


}

class Comment extends Model
{
	private $NewsId;
	private $CommentId;
	private $CommentDate;
	private $CommentAuthorId;
	public $oCommentAuthor;
	private $CommentText;
	private $Moderated;

	protected static $table ='Comments';
	protected static $id = 'CommentId';

		static function saveModel($obj)
	{
		$isSaved = parent::isSaved($obj->CommentId);
		if ($isSaved){
			$query = self::$oDbConnection->prepare("UPDATE $table 
				SET NewsId=:NewsId, CommentId=:CommentId,CommentDate=:CommentDate,CommentAuthorId=:CommentAuthorId,CommentText=:CommentText,Moderated=:Moderated
					WHERE CommentId = :CommentId");
		}
		else{
			$query = self::$oDbConnection->prepare("INSERT INTO $table (NewsId,CommentId,CommentDate,CommentAuthorId,CommentText,Moderated)
				VALUES (:NewsId,:CommentId,:CommentDate,:CommentAuthorId,:CommentText,:Moderated)");
		}
		$query->bindParam('NewsId',$obj->NewsId);
		$query->bindParam('CommentId',$obj->CommentId);
		$query->bindParam('CommentDate',$obj->CommentDate);
		$query->bindParam('CommentAuthorId',$obj->CommentAuthorId);
		$query->bindParam('CommentText',$obj->CommentText);
		$query->bindParam('Moderated',$obj->Moderated);
		$query->execute();
	}

	function setNewsId($NewsId)
	{
		$this->NewsId = $NewsId;
	}
	function getNewsId()
	{
		return $this->NewsId;
	}
	function setCommentId($CommentId)
	{
		$this->CommentId = $CommentId;
	}
	function getCommentId()
	{
		return $this->CommentId;
	}
	function setCommentDate($CommentDate)
	{
		$this->CommentDate = $CommentDate;
	}
	function getCommentDate()
	{
		return $this->CommentDate;
	}
	function setCCommentAuthorId($CommentAuthor)
	{
		$this->CommentAuthor = $CommentAuthor;
	}
	function getCCommentAuthorId()
	{
		return $this->CommentAuthor;
	}
	function setoCommentAuthor($oCommentAuthor)
	{
		$this->oCommentAuthor = $oCommentAuthor;
	}
	function getoCommentAuthor()
	{
		if ($this->oCommentAuthor){
			//get the object from the database
			$Class = 'User';
			$table = 'Users';
			$idname ='UserId';
			$query = self::$oDbConnection->prepare("SELECT * FROM $table WHERE $idname=:id");
			$query->execute(['id'=>$this->CommentAuthorId]);
			$res = $query->fetch(PDO::FETCH_ASSOC);
			return ($res) ? new $Class($res) : null;
		}
	}
	function setCommentText($CommentText)
	{
		$this->CommentText = $CommentText;
	}
	function getCommentText()
	{
		return $this->CommentText;
	}
	function setModerated($Moderated)
	{
		$this->Moderated = $Moderated;
	}
	function getModerated()
	{
		return $this->Moderated;
	}

}
class User extends Model
{
	private $UserId;
	private $UserName;
	private $PasswordHash;
	private $Administrator;
	private $Journalist;
	private $Editor;
	private $Moderator;
	public $oNews = array();
	public $oComments = array();

	protected static $table ='Users';
	protected static $id = 'UserId';

	static function saveModel($obj)
	{
		$isSaved = parent::isSaved($obj->UserId);
		if ($isSaved){
			$query = self::$oDbConnection->prepare("UPDATE $table 
				SET UserId=:UserId,UserName=:UserName,PasswordHash=:PasswordHash,Administrator=:Administrator,Journalist=:Journalist,Editor=:Editor,Moderator=:Moderator
					WHERE UserId = :UserId");
		}
		else{
			$query = self::$oDbConnection->prepare("INSERT INTO $table (UserId,UserName,PasswordHash,Administrator,Journalist,Editor,Moderator)
				VALUES (:UserId,:UserName,:PasswordHash,:Administrator,:Journalist,:Editor,:Moderator)");
		}
		$query->bindParam('UserId',$obj->UserId);
		$query->bindParam('UserName',$obj->UserName);
		$query->bindParam('PasswordHash',$obj->PasswordHash);
		$query->bindParam('Administrator',$obj->Administrator);
		$query->bindParam('Journalist',$obj->Journalist);
		$query->bindParam('Editor',$obj->Editor);
		$query->bindParam('Moderator',$obj->Moderator);
		$query->execute();
	}

	function setUserId($UserId)
	{
		$this->UserId = $UserId;
	}
	function getUserId()
	{
		return $this->UserId;
	}
	function setUserName($UserName)
	{
		$this->UserName = $UserName;
	}
	function getUserName()
	{
		return $this->UserName;
	}
	function setPasswordHash($PasswordHash)
	{
		$this->PasswordHash = $PasswordHash;
	}
	function getPasswordHash()
	{
		return $this->PasswordHash;
	}
	function setAdministrator($Administrator)
	{
		$this->Administrator = $Administrator;
	}
	function getAdministrator()
	{
		return $this->Administrator;
	}
	function setJournalist($Journalist)
	{
		$this->Journalist = $Journalist;
	}
	function getJournalist()
	{
		return $this->Journalist;
	}
	function setEditor($Editor)
	{
		$this->Editor = $Editor;
	}
	function getEditor()
	{
		return $this->Editor;
	}
	function setModerator($Moderator)
	{
		$this->Moderator = $Moderator;
	}
	function getModerator()
	{
		return $this->Moderator;
	}
	function setoNews($oNews)
	{
		$this->oNews = $oNews;
	}
	function getoNews()
	{
		if ($this->oNews){
		//get the array of objects from the database
			$Class = 'News';
			$table = 'News';
			$idname ='NewsAuthorId';
			$query = self::$oDbConnection->prepare("SELECT * FROM $table WHERE $idname=:id");
			$query->execute(['id'=>$this->UserId]);
			$res = $query->fetchAll(PDO::FETCH_CLASS, "News");
			return ($res) ? new $Class($res) : null;			
		}

	}
	function setoComments($oComments)
	{
		$this->oComments = $oComments;
	}
	function getoComments()
	{
		if ($this->oComments){
		//get the array of objects from the database
			$Class = 'Comment';
			$table = 'Comments';
			$idname ='CommentAuthorId';
			$query = self::$oDbConnection->prepare("SELECT * FROM $table WHERE $idname=:id");
			$query->execute(['id'=>$this->UserId]);
			$res = $query->fetchAll(PDO::FETCH_CLASS, "Comments");
			return ($res) ? new $Class($res) : null;				
		}

	}

}

class Rubric extends Model
{
	private $RubricId;
	private $RubricName;
	public $oNews = array();

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
		if ($this->oNews){
		//get the array of objects from the database
			$Class = 'News';
			$table = 'News';
			$idname ='NewsRubric';
			$query = self::$oDbConnection->prepare("SELECT * FROM $table WHERE $idname=:id");
			$query->execute(['id'=>$this->RubricId]);
			$res = $query->fetchAll(PDO::FETCH_CLASS, "News");
			return ($res) ? new $Class($res) : null;				
		}

	}

}