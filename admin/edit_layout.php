<?php
include_once 'admin_functions.php';
if (count ( $_POST )) {
	if (update_layout ( $_POST )) {
		header("Location: pages.php");
	}
}
$link_info = get_link($_GET['id']);
$layout = get_layout($_GET['id']);

?>
<?php include 'common/header.php';?>
	<div id="page">
		<div id="page-bgtop">
			<div id="page-bgbtm">
				<div id="content">
                                		<h3 class="title">Edit Layout:</h3>                
<table width="100%">

	<tr>
		<td>&lt;&lt;<a href="pages.php"> Go back</a> <br />
		<br />
		</td>

	</tr>
	<tr>
		<td>

          <form method="post" action="">        
            <table width="100%" border="0">
              <tr>
                <td width="117">Name</td>
                <td width="8">:</td>
                <td width="371"><label>
                  <input type="text" name="name" id="textfield" value="<?php echo $link_info->fields['name']?>"/>
                </label></td>
              </tr>
              <tr>
                <td>Title</td>
                <td>:</td>
                <td><input type="text" name="title" id="textfield2" value="<?php echo $link_info->fields['title']?>"/></td>
              </tr>
              <tr>
                <td>URI</td>
                <td>:</td>
                <td><input type="text" name="uri" id="textfield3" value="<?php echo $link_info->fields['uri']?>"/></td>
              </tr>
              <tr>
                <td>Route to</td>
                <td>:</td>
                <td><input type="text" name="route" id="textfield4" value="<?php echo $link_info->fields['route']?>"/> [eg: (controller name) / (method name{inside controller}) OR <b>system</b> for default]</td>
              </tr>
            </table>

		<table width="100%">

			<tr>

				<td colspan="3">
                	<textarea style="width:100%;height:300px" name="layout"><?php echo $layout->fields['layouts']?></textarea>
				</td>
			</tr>
			<tr>
				<td><input type="submit" value="update" /></td>
			</tr>
		</table>
		<input type="hidden" name="link_id" value="<?php echo $link_info->fields['id']?>" />
		<input type="hidden" name="layout_id" value="<?php echo $layout->fields['id']?>" />"
		</form>
		</td>
  </tr>
</table>
</div>
</div>
</div>
</div>
</div>