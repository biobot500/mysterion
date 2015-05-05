<?php
include_once 'admin_functions.php';
?>
<?php include 'common/header.php';?>

	<div id="page">

		<div id="page-bgtop">

			<div id="page-bgbtm">
				<div id="content">
                                		<h3 class="title">Install New Templates:</h3>                
<table width="100%" border="0">
	<tr>
    
		<td><?php		
		if (count ( $_FILES ['temp'] ) > 0) {
			$target_path = "../templates/";
			
			$target_path = $target_path . basename ( $_FILES ['temp'] ['name'] );
			
			if (move_uploaded_file ( $_FILES ['temp'] ['tmp_name'], $target_path )) {
			
			} else {
				echo "<br/>There was an error uploading the file, please try again!";
			}
			
			//unzip and copy to module folder
			install_temp($target_path); 
		}
		//}
		?></td>
	</tr>
	<tr>
		<td>&lt;&lt;<a href="templates.php"> Go back</a> <br />
		<br />

		<form action="install_temp.php" method="post"
			enctype="multipart/form-data">Template path ( *zip file ) : <input
			type="file" name="temp" /> <input type="submit" value="Install" />
		</form>

		<br />
		<br />

		</td>
	</tr>
</table>

</div>
</div>
</div>
</div>
</div>