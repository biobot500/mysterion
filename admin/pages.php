<?php
include_once 'admin_functions.php';
?>
<?php include 'common/header.php';?>
	<div id="page">
		<div id="page-bgtop">
			<div id="page-bgbtm">
				<div id="content">
                                		<h3 class="title">Pages & Layouts:</h3>                
<table width="100%" border="0">
  <tr>
    <td>

    	
    	&gt;&gt; <a href="create_page.php"> Create New Page</a>
    	<br/><br/>

    	<table width="100%">
    		<tr>
    			<td>Title</td>
    			<td>URI</td>
    			<td>Route</td>
    			<td>Action</td>
    		</tr>    	
		<?php
			$links = get_all_links();
			if($links) {
				while ( ! $links->EOF ) {
					?>
    		<tr>
    			<td><?php echo $links->fields['title']?></td>
    			<td><?php echo $links->fields['uri']?></td>
    			<td><?php echo $links->fields['route']?></td>
    			<td><a href="edit_layout.php?id=<?php  echo $links->fields['id']?>">edit layout</a> | <a href="admin_actions.php?action=delete_page&id=<?php  echo $links->fields['id']?>">delete</a></td>
    		</tr>
    							
					<?php 	
					$links->MoveNext (); 
				}
			}
		?>	 
		</table>   	
    </td>
  </tr>  
</table>
</div>
</div>
</div>
</div>
</div>