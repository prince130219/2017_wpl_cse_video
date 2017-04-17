<?php

include_once '/../util/class.util.php';
include_once '/../dao/class.videoinfodao.php';


/*
	Term Business Object 
*/
Class VideoBAO{

	private $_DB;
	private $_VideoDAO;

	function VideoBAO(){

		$this->_VideoDAO = new VideoDAO();

	}

	//get all Terms value
	public function getAllVideos(){

		$Result = new Result();	
		$Result = $this->_VideoDAO->getAllVideos();
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in VideoDAO.getAllVideos()");		

		return $Result;
	}

	//create Term funtion with the Term object
	public function searchVideo($Video){

		$Result = new Result();	
		$Result = $this->_VideoDAO->searchVideo($Video);
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in VideoDAO.searchVideo()");		

		return $Result;

	
	}

	//read an Term object based on its id form Term object
	public function readVideo($Video){


		$Result = new Result();	
		$Result = $this->_VideoDAO->readVideo($Video);
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in VideoDAO.readVideo()");		

		return $Result;


	}

	//update an Term object based on its current information
	public function updateVideo($Video){

		$Result = new Result();	
		$Result = $this->_VideoDAO->updateVideo($Video);
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in VideoDAO.updateVideo()");		

		return $Result;
	}

	//delete an existing Term
	public function deleteVideo($Video){

		$Result = new Result();	
		$Result = $this->_VideoDAO->deleteVideo($Video);
		
		if(!$Result->getIsSuccess())
			$Result->setResultObject("Database failure in VideoDAO.deleteVideo()");		

		return $Result;

	}

}

//echo '<br> log:: exit the class.videobao.php';

?>