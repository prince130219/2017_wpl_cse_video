<?php
//session_start();
include_once 'blade/view.videoinfo.blade.php';
include_once '/../../common/class.common.php';
//include_once 'blade/view.video.blade.php';


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Comment CRUD Operations</title>
		<link rel="stylesheet" href="style.css" type="text/css"/>
	</head>

<body>
<center>
	<div id="header">
		<label>By : Kazi Masudul Alam</label>
	</div>

	<div id="form2">
		<form method="post">
				<table width="100%" border="1" cellpadding="15">
				
				<tr>
					<td style="width:80%"><input style="width:98%" type="text"  name="txtsearch" placeholder="Search video"></input></td>
					<td>
						<input  type="submit" id="savebutton" style="width:100px" name="search" value="Search">
					</td>
				</tr>

				</table>
				
		</form>
		<br><br>
		<form method="post" style="background-color:#040725">
	<table width="100%" border="1" cellpadding="15" align="center" >
	<?php
	
	$tag = null;
				
	if(isset($_GET["tag"]))
	{
		$tag = $_GET["tag"];
	}

	
	$Result = $_VideoBAO->searchVideo($tag);

	//if DAO access is successful to load all the Terms then show them one by one
	if($Result->getIsSuccess()){

		$VideoList = $Result->getResultObject();
	?>
		<?php
		for($i = 0; $i < sizeof($VideoList); $i++) {
			$Video = $VideoList[$i];
			?>
		    <tr>
			    <td style="color:white;font-size:20px;width:80%"><?php echo $Video->getTitle(); ?></td>
			    
			    <td><a href="view.videoComment.php?view=<?php echo $Video->getID(); ?>" onclick="return ; " >view</a></td>
			    
		    </tr>
	    <?php

		}

	}
	else{

		echo $Result->getResultObject(); //giving failure message
	}

	?>
	</table>
	</form>

<br />

	
	</div>
</center>
</body>
</html>