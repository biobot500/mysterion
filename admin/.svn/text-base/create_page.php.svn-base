<?php
include_once 'admin_functions.php';
if (count ( $_POST )) {
	if (create_page ( $_POST )) {
		header("Location: pages.php");
	}
}
?>
<?php include 'common/header.php';?>
	<div id="page">
		<div id="page-bgtop">
			<div id="page-bgbtm">
				<div id="content">
                                		<h3 class="title">Create New Page:</h3>
<table>
	<tr>
		<td>&lt;&lt;<a href="pages.php"> Go back</a> <br />
		<br />
		</td>

	</tr>
	<tr>
		<td>

        	<?php
									
									?>
            <form method="post" action="">
		<table>
			<tr>
				<Td>Name</Td>
				<Td>:</Td>
				<td><input type="text" name="name" /></td>
			</tr>
			<tr>
				<Td>Title</Td>
				<Td>:</Td>
				<td><input type="text" name="title" /></td>
			</tr>
			<tr>
				<Td>URI</Td>
				<Td>:</Td>
				<td><input type="text" name="uri" /></td>
			</tr>
			<tr>
				<Td>Route To</Td>
				<Td>:</Td>
				<td><input type="text" name="route" value="system"/> [eg: (controller name) / (method name{inside controller}) OR <b>system</b> for default]</td>
			</tr>

			<tr>
				<td><input type="submit" value="Create" /></td>
			</tr>
		</table>
		</form>
		</td>
	</tr>
</table>
</div>
</div>
</div>
</div>
</div>