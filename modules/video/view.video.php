<?php

include_once 'blade/view.video.blade.php';
include_once '/../../common/class.common.php';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Video CRUD Operations</title>
		<link rel="stylesheet" href="style.css" type="text/css" />
	</head>

<body >
<ul>
	<li><a href="view.video.php">Home</a></li>
	<li><a href="view.videoComment.php">VideoComment</a></li>
	<li><a href="view.videoInfo.php">VideoSearch</a></li>
</ul>
<center>
	<div id="header" style="margin-top:50px">
		<label >By : Kazi Masudul Alam</a></label>
	</div>

	<div id="form">
		<form method="post">
			<table width="100%" border="1" cellpadding="15">
				<tr>
					<td><input type="text" name="txtName" placeholder="Video Title" value="<?php 
					if(isset($_GET['edit'])) echo $getROW->getTitle();  ?>" /></td>
				</tr>
				<tr>
					<td><input type="text" name="txtdes" placeholder="Video Description" value="<?php 
					if(isset($_GET['edit'])) echo $getROW->getDescription();  ?>" /></td>
				</tr>
				<tr>
					<td><input type="text" name="txtlink" placeholder="Link" value="<?php
					
					if(isset($_GET['edit'])){
						$link = $getROW->getLink();
						echo $link;
						//$link1 = substr($link,72,-46); 
						//echo "https://www.youtube.com/watch?v=".$link1  ;
						} ?>" /></td>
				</tr>
				<tr>
					<td><input type="text" name="txttag" placeholder="TagName" value="<?php 
					if(isset($_GET['edit'])) echo $getROW->getTag();  ?>" /></td>
				</tr>
				<tr>
					<td id="embed">IsEmbed: &nbsp;&nbsp;&nbsp;
						<select name="txtembed">
							<option>0</option>
							<option>1</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>
						<?php
						if(isset($_GET['edit']))
						{
							?>
							<input  type="submit" id="savebutton" style="width:100px;margin-left:550px" name="update" value="Update">
							<?php
						}
						else
						{
							?>
							<input type="submit" style="width:100px;margin-left:550px" id="savebutton" name="save" value="Save">
							<?php
						}
						?>
					</td>
				</tr>

			</table>
		</form>
<br><br>
<label style="margin-left:-480px; font-size:20px; color:#69baac;text-transform: uppercase; text-shadow: none">Video Title</label>
<form method="post" style="background-color:#040725">
	<table width="100%" border="1" cellpadding="15" align="center" >
	<?php
	
	$Result = $_VideoBAO->getAllVideos();

	//if DAO access is successful to load all the Terms then show them one by one
	if($Result->getIsSuccess()){

		$VideoList = $Result->getResultObject();
	?>
		<?php
		for($i = 0; $i < sizeof($VideoList); $i++) {
			$Video = $VideoList[$i];
			?>
		    <tr>
			    <td style="color:white;font-size:20px"><?php echo $Video->getTitle(); ?></td>
			    
			    <td><a href="view.videoComment.php?view=<?php echo $Video->getID(); ?>" onclick="return ; " >view</a></td>
			    <td><a href="?edit=<?php echo $Video->getID(); ?>" onclick="return confirm('sure to edit !'); " >edit</a></td>
			    <td><a href="?del=<?php echo $Video->getID(); ?>" onclick="return confirm('sure to delete !'); " >delete</a></td>
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
	</div>
</center>
</body>
</html>