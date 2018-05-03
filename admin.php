<?php
//session_start();

?>
<div class="row adminPage">
	<div class="marginAuto divBtn min-h">
		<div class="row marginAuto"  style="width:95%;">
			<div class="imgAdmin marginAuto marginB10" ></div>
			<div class="blockAdmin marginAuto">
				<div class="marginAuto" style="width:240px;padding-top:5px;">
					<div class="blockAdminInner marginT20" >
						<div class="blockAdminBtn" id="approveBtn">
							<div class="icon48 icon-check marginAuto"></div>
							<p class="text-center"><b>Approve Story</b></p>
						</div>
					</div>
					<div class="blockAdminInner marginT20">
						<div class="blockAdminBtn"  id="manageStoryBtn">
							<div class="icon48 icon-book marginAuto"></div>
							<p class="text-center"><b >Manage Story</b></p>
						</div>
					</div>
					<div class="blockAdminInner">
						<div class="blockAdminBtn" id="manageNewsBtn">
							<div class="icon48 icon-news2 marginAuto"></div>
							<p class="text-center"><b >Manage News</b></p>
						</div>
					</div>
					<div class="blockAdminInner">
						<div class="blockAdminBtn" id="manageCateBtn">
							<div class="icon48 icon-folder marginAuto"></div>
							<p class="text-center"><b >Manage Category</b></p>
						</div>
					</div>
					<p></p>
				</div>
			</div>
			
			
		</div>
	</div>
</div>


<script type="text/javascript">
	$(document).ready(function(){
		//สีฟ้าที่ปุ่ม admin
		$(".adminPage").addClass('active')
		$(".storyPage").hide()
		$(".mainDetail").css('background-color', '#FFF');
		
		$('#approveBtn').click(function() {
				alert("Approve Story : ======> ทำต่อด้วย")
		});
		
		$('#manageStoryBtn').click(function() {
			alert("Create Story : ======> ทำต่อด้วย")
			
		});
		
	
			

		$('#manageCateBtn').click(function() {
				alert("Manage Category")
				window.location.href="main.php?page=admin_manageCategory";
		});
		
		$('#manageNewsBtn').click(function() {
			alert("Edit News")
			window.location.href="main.php?page=admin_manageNews";
			
			
		});
	});
</script>