<?php
session_start();

?>


<body >
<div class="dd">
<center>
 <p>Category</p>

</center>
<div>
<script type="text/javascript">
	$(document).ready(function(){
		<?php 
			if($_SESSION["role_id"]== 0 ){
				echo " $('.categoryPage').addClass('active'); ";
				echo "$('.storyPage').hide(); ";
			}
			else if($_SESSION["role_id"]== 1 ){
				echo " $('.categoryPage').addClass('active'); ";
				echo "$('.adminPage').hide(); ";
			}
		?>
		
	});
			
</script>
</body>