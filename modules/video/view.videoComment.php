<?php

include_once 'blade/view.VideoComment.blade.php';
include_once '/../../common/class.common.php';


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Comment CRUD Operations</title>
		<link rel="stylesheet" href="style.css" type="text/css" />
	</head>

<body>
<center>
	<div id="header">
		<label>By : Kazi Masudul Alam</a></label>
	</div>

	<div id="form1">
		<form method="post">
			<table width="100%" border="1" cellpadding="15" align="center">
			<tr>
				
			</tr>
			<?php
				$id = 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
				$Video2 = substr($id, -38);
				
				$Result1 = $_VideoCommentBAO->readvideo($Video2);
				//if DAO access is successful to load all the comments then show them one by one
				if($Result1->getIsSuccess()){

					$Vedio = $Result1->getResultObject();
				?> 
					    <tr>
						    <td style="color:white;font-size:20px"><?php echo $Vedio->getTitle(); ?></td>
						</tr>
						<tr>
						    <td><?php
						    $front = '<iframe width="560" height="315" src="https://www.youtube.com/embed/' ;
							$back = '" frameborder="0" allowfullscreen></iframe>';
							$link = $Vedio->getLink();
							$link2= substr($link,32);
							$Link=$front.$link2.$back;
						     echo $Link; 
						     ?></td>
					    </tr>
		
				    <?php

					

				}
				else{

					echo $Result->getResultObject(); //giving failure message
				}

				?>
				<?php
				$id = 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
				$Video2 = substr($id, -38);
				//echo $Video2;
			
				$Result1 = $_VideoCommentBAO->readVideoComment($Video2);

				//if DAO access is successful to load all the comments then show them one by one
				if($Result1->getIsSuccess()){

					$VideoList = $Result1->getResultObject();
						?> 
						<table width="100%" border="1" cellpadding="15" align="center">
							<?php
							for($i = 0; $i < sizeof($VideoList); $i++) {
								$Video = $VideoList[$i];
								?>
							    <tr>
							    <tr>
							    	<td>
								    <?php 
									    $id= $Video->getCreator();
									    $Result5 = $_VideoCommentBAO->readCreator($id);
								    	if ($Result5->getIsSuccess()) {
								    		$user = $Result5->getResultObject();

							    			echo $user->getFirstName();
							    		} 

						    		?>
					    		
					    			</td>
							    
								    <td style="color:white;font-size:20px;background-color: #040725;text-align: justify;font-style: italic"><?php echo $Video->getComment(); ?></td>

							    </tr>
						    <?php

							}

				}
				else{

					echo $Result->getResultObject(); //giving failure message
				}

				?>
				</table>
				<table width="100%" border="1" cellpadding="15" align="center">
				</table>
			<table width="100%" border="1" cellpadding="15">
				
				<tr>
					<td><label>Comment : </label></td>
					<td style="background-color: #B4B6B3"><textarea rows="5" cols="50" name="txtAns" placeholder="Comment" value="<?php 
					if(isset($_GET['edit'])) echo $getROW->getComment();  ?>" ></textarea></td>
				</tr>	
				</table>
				<input type='text' name ="txtvideo" value="<?php echo $Video2 ; ?>" placeholder="<?php echo $Video2 ; ?>"" style="display : none" />
				<table width="100%" border="1" cellpadding="15">
				<tr>
					<td style="background-color:#040725">
						<input  type="submit" id="savebutton" style="width:100px;margin-left:550px;height:30px" name="save" value="Submit">
					</td>
				</tr>
			</table>
		</form>

<br />

	
	</div>
</center>
</body>
</html>