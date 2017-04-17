<?php

include_once '/../../../util/class.util.php';
include_once '/../../../bao/class.videoCommentbao.php';

$_VideoCommentBAO = new VideoCommentBAO();
$_DB = DBUtil::getInstance();

/* saving a new VideoComment account*/
if(isset($_POST['save']))
{
	 $VideoComment = new VideoComment();	
	 $VideoComment->setCommentID(Util::getGUID());
     $VideoComment->setComment($_DB->secureInput($_POST['txtAns']));
     $VideoComment->setVideoID($_DB->secureInput($_POST['txtvideo']));
     
	 $_VideoCommentBAO->createVideoComment($VideoComment);		 
}


/* deleting an existing VideoComment */
if(isset($_GET['del']))
{

	$VideoComment = new VideoComment();	
	$VideoComment->setCommentID($_GET['del']);	
	$_VideoCommentBAO->deleteVideoComment($VideoComment); //reading the VideoComment object from the result object

	header("Location: view.videoComment.php");
}

/* reading an existing VideoComment information */
if(isset($_GET['edit']))
{
	$VideoComment = new VideoComment();	
	$VideoComment->setCommentID($_GET['edit']);	
	$getROW = $_VideoCommentBAO->readVideoComment($VideoComment)->getResultObject(); //reading the VideoComment object from the result object
}

/*updating an existing VideoComment information*/
if(isset($_POST['update']))
{
	$VideoComment = new VideoComment();	

    $VideoComment->setCommentID ($_GET['edit']);
    $VideoComment->setComment( $_POST['txtAns'] );
	
	$_VideoCommentBAO->updateVideoComment($VideoComment);

	header("Location: view.videoComment.php");
}



//echo '<br> log:: exit blade.videoComment.php';

?>