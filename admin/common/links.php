<ul>

<li><a href="pages.php" <?php echo strstr($_SERVER['REQUEST_URI'],"pages.php")==true?'class="current_page_item"':''?>>Pages & Layouts</a></li>
<li><a href="modules.php" <?php echo strstr($_SERVER['REQUEST_URI'],"modules.php")==true?'class="current_page_item"':''?>>Modules</a></li>
<li><a href="templates.php" <?php echo strstr($_SERVER['REQUEST_URI'],"templates.php")==true?'class="current_page_item"':''?>>Templates</a> </li>
<li><a href="admin_actions.php?action=logout" >Logout</a></li>
</ul>