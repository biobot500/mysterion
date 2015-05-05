<?php
include_once 'admin_functions.php';
?>
<?php include 'common/header.php';?>
	<div id="page">
		<div id="page-bgtop">
			<div id="page-bgbtm">
				<div id="content">
                                		<h3 class="title">Templates:</h3>                
<table width="100%" border="0">
	<tr>
		<td>&gt;&gt; <a href="install_temp.php"> Install New Templates</a> <br /><br />


			
		
    	<?php
					$temp = get_all_templates ();
					if($temp==false) {
						echo "<br/>no templates installed!<br/>";
					} else {
						?>
		<table width="100%" border="0">
			<tr>
				<td><b>Name</b></td>
				<td><b>Status</b></td>
				<td><b>Action</b></td>
					
			</tr>
						<?php 
					while ( ! $temp->EOF ) {
						?>
							<tr>
								<td><?php echo $temp->fields['name']?></td>
								<td><?php echo $temp->fields['default']=="1"?'Active':'<a href="">Default</a>'?></td>
								<td><a href="admin_actions.php?action=uninstall_temp&id=<?php echo $temp->fields["id"];?>">Uninstall</a></td>
							</tr>							
						<?php 
						$temp->MoveNext ();
					}
					?>
					</table>
    	<br />
		<br />

		</td>
	</tr>
</table>					
<?php 
	}
?>

</div>
</div>
</div>
</div>
</div>