<?php
include_once 'admin_functions.php';
?>
<?php include 'common/header.php';?>
	<div id="page">
		<div id="page-bgtop">
			<div id="page-bgbtm">
				<div id="content">
                		<h3 class="title">Install New Module:</h3>
<table width="100%" border="0">
	<tr>
		<td><?php
		
		if (count ( $_FILES ['module'] ) > 0) {
			$target_path = "../modules/";
			
			$target_path = $target_path . basename ( $_FILES ['module'] ['name'] );
			
			if (move_uploaded_file ( $_FILES ['module'] ['tmp_name'], $target_path )) {
			
			} else {
				echo "<br/>There was an error uploading the file, please try again!";
			}
			
			//unzip and copy to module folder

			install_module($target_path); 

			/*$zip = zip_open ( "../modules/" . basename ( $_FILES ['module'] ['name'] ) );
			if ($zip) {
				while ( $zip_entry = zip_read ( $zip ) ) {
					
					var_dump($zip_entry);
					$fp = fopen ( "../modules/" . zip_entry_name ( $zip_entry ), "w" );
					if (zip_entry_open ( $zip, $zip_entry, "r" )) {
						$buf = zip_entry_read ( $zip_entry, zip_entry_filesize ( $zip_entry ) );
						fwrite ( $fp, "$buf" );
						zip_entry_close ( $zip_entry );
						fclose ( $fp );
					}
				}
				zip_close ( $zip );
			} else {
				echo "Install failed!";
			}
			*/
		//read install.xml file
		//update database
		}
		//}
		?></td>
	</tr>
	<tr>
		<td>&lt;&lt;<a href="modules.php"> Go back</a> <br />
		<br />
		
		<form action="install_modules.php" method="post"
			enctype="multipart/form-data">Module path ( *zip file ) : <input
			type="file" name="module" /> <input type="submit" value="Install" />
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