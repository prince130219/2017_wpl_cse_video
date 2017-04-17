<?php
include_once '/../common/class.common.php';
include_once '/../util/class.util.php';

Class VideoCommentDAO{

	private $_DB;
	private $_Cat;

	function VideoCommentDAO(){

		$this->_DB = DBUtil::getInstance();
		$this->_Cat = new VideoComment();

	}

	// get all the VideoComments from the database using the database query
	public function getAllVideoComments(){

		$VideoCommentList = array();

		$this->_DB->doQuery("SELECT * FROM tbl_video_comment");
		$rows = $this->_DB->getAllRows();


		for($i = 0; $i < sizeof($rows); $i++) {
			$row = $rows[$i];
			$this->_VideoComment = new VideoComment();

		    $this->_VideoComment->setCommentID ( $row['CommentID']);
		    $this->_VideoComment->setComment( $row['Comment'] );
		    $this->_VideoComment->setCreator( $row['CreatorID'] );
		    $this->_VideoComment->setVideo( $row['VideoID'] );
		    $this->_VideoComment->setCommentTop($row['CommentIDTop']);


		    $VideoCommentList[]=$this->_VideoComment;
   
		}

		//todo: LOG util with level of log


		$Result = new Result();
		$Result->setIsSuccess(1);
		$Result->setResultObject($VideoCommentList);

		return $Result;
	}

	//create VideoComment funtion with the VideoComment object
	public function createVideoComment($VideoComment){

		$VideoCommentID=$VideoComment->getCommentID();
		$VideoID=$VideoComment->getVideoID();
		$VideoComment=$VideoComment->getComment();
		session_start();
		$Creator=$_SESSION["globalUser"]->getID ();

		$SQL = "INSERT INTO tbl_video_comment(CommentID,Comment,VideoID,CreatorID) 
				VALUES('$VideoCommentID','$VideoComment','$VideoID','$Creator')";

		$SQL = $this->_DB->doQuery($SQL);		
		
	 	$Result = new Result();
		$Result->setIsSuccess(1);
		$Result->setResultObject($SQL);

		return $Result;
	}

	public function readCreator($CreatorID){

		$SQL = "SELECT * FROM tbl_user
				WHERE ID ='".$CreatorID."'";
		$SQL = $this->_DB->doQuery($SQL);

		$row = $this->_DB->getTopRow();

		$this->_useradd = new User();

		$this->_useradd->setID ( $row['ID']);
		$this->_useradd->setUniversityID( $row['UniversityID'] );
		$this->_useradd->setEmail ( $row['Email']);
		$this->_useradd->setPassword( $row['Password'] );
		$this->_useradd->setFirstName ( $row['FirstName']);
		$this->_useradd->setLastName( $row['LastName'] );
		
		
	 	$Result = new Result();
		$Result->setIsSuccess(1);
		$Result->setResultObject($this->_useradd);

		return $Result;
	}
	
	public function readvideo($video){
		
		//$Dis = $video->getID();
		$SQL = "SELECT * FROM tbl_video WHERE ID='".$video."'";
		$this->_DB->doQuery($SQL);

		//reading the top row for this video from the database
		$row = $this->_DB->getTopRow();

		$this->_Video= new Video();

		//preparing the video object
	    $this->_Video->setID ( $row['ID']);
		$this->_Video->setTitle( $row['Title'] );
		$this->_Video->setDescription( $row['Description'] );
	    $this->_Video->setLink( $row['Link'] );
	    $this->_Video->setIsEmbed( $row['IsEmbed'] );
	    $this->_Video->setTag( $row['TagID'] );




	 	$Result = new Result();
		$Result->setIsSuccess(1);
		$Result->setResultObject($this->_Video);

		return $Result;
	}

	//read an VideoComment object based on its id form VideoComment object
	public function readVideoComment($video){
		
		
		$VideoCommentList = array();

		$this->_DB->doQuery("SELECT * FROM tbl_video_comment WHERE VideoID = '".$video."'");

		$rows = $this->_DB->getAllRows();

		for($i = 0; $i < sizeof($rows); $i++) {
			$row = $rows[$i];
			$this->_VideoComment = new VideoComment();

		    $this->_VideoComment->setCommentID ( $row['CommentID']);
		    $this->_VideoComment->setVideoID( $row['VideoID'] );
		    $this->_VideoComment->setComment( $row['Comment'] );
		    $this->_VideoComment->setCreator( $row['CreatorID'] );
		    $this->_VideoComment->setCommentTop($row['CommentIDTop']);


		    $VideoCommentList[]=$this->_VideoComment;
   
		}

		//todo: LOG util with level of log


		$Result = new Result();
		$Result->setIsSuccess(1);
		$Result->setResultObject($VideoCommentList);

		return $Result;
	}

	//update an VideoComment object based on its 
	public function updateVideoComment($VideoComment){

		$SQL = "UPDATE tbl_video_comment SET VideoComment='".$VideoComment->getVideoComment()."'
				WHERE CommentID='".$VideoComment->getCommentID()."'";

		$this->_DB->getConnection()->begin_transaction(MYSQLI_TRANS_START_READ_WRITE);
		$SQL = $this->_DB->doQuery($SQL);

	 	$Result = new Result();
		$Result->setIsSuccess(1);
		$Result->setResultObject($SQL);

		return $Result;

	}

	//delete an VideoComment based on its id of the database
	public function deleteVideoComment($VideoComment){


		$SQL = "DELETE from tbl_video_comment where CommentID ='".$VideoComment->getCommentID()."'";
	
		$SQL = $this->_DB->doQuery($SQL);

	 	$Result = new Result();
		$Result->setIsSuccess(1);
		$Result->setResultObject($SQL);

		return $Result;

	}

}

//echo '<br> log:: exit the class.videoCommentdao.php';

?>