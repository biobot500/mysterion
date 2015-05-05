<?php
include_once 'admin_functions.php';
?>
<?php include 'common/header.php';?>
	<div id="page">
		<div id="page-bgtop">
			<div id="page-bgbtm">
				<div id="content">
                		<h3 class="title">Modules:</h3>                
<table width="100%" border="0">

	<tr>
		<td>&gt;&gt; <a href="install_modules.php"> Install New Module</a> <br />

		<table width="100%" border="0">
			<tr>
				<td><b>Name</b></td>
				<td><b>Folder Name</b></td>
				<td><b>Active</b></td>
				<td><b>Action</b></td>	
			</tr>
			
		
    	<?php
					$modules = get_all_modules ();
					if($modules==false) {
						echo "<br/>no module installed!<br/>";
					} else {
					while ( ! $modules->EOF ) {
						?>
							<tr>
								<td><?php echo $modules->fields['name']?></td>
								<td>/modules/<?php echo $modules->fields['folder_name']?></td>
								<td><?php echo $modules->fields['active']?></td>
								<td><a href="admin_actions.php?action=uninstall_module&id=<?php echo $modules->fields["id"];?>">Uninstall</a></td>	
							</tr>							
						<?php 
						$modules->MoveNext ();
					}
					}
					?>
					</table>
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