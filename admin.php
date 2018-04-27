<!--
<body class="bgHome container">

	<div class="row adminPage">
	
			<div class="marginAuto" >
				  <p class="textName"></p>
				  <div class="form-group paddingT10 marginAuto divBtn">
					<center>
					<button type="button" class="btn btn-warning adminBtn marginT20" id="approveBtn">Approve Story</button><br/>
					<button type="button" class="btn btn-warning adminBtn" id="createStoryBtn">Create Story</button><br/>
					<button type="button" class="btn btn-warning adminBtn" id="manageStoryBtn">Manage Story</button><br/>
					<button type="button" class="btn btn-warning adminBtn" id="manageCateBtn">Manage Category</button><br/>
					<button type="button" class="btn btn-warning adminBtn" id="editNewsBtn">Edit News</button>
					
					</center>
					<div class="btn btn-warning btn-circle" id="createBtn" ><i class="fa fa-plus"></i></div>
				  </div>
			</div>	
	</div>
    <script>
		$(document).ready(function(){
			//สีฟ้าที่ปุ่ม admin
			$(".adminPage").addClass('active')
			$(".storyPage").hide()
			
			$(".textName").text("Joy!")
			
			
			$('#approveBtn').click(function() {
				
				alert("Approve Story")
			});
			
			$('#createStoryBtn').click(function() {
				alert("Create Story")
				
			});
			
			$('#manageStoryBtn').click(function() {
				alert("Manage Story")
				
			});
			
			$('#manageCateBtn').click(function() {
				alert("Manage Category")
				window.location.href="main.php?page=admin_manageCategory";
				
			});
			
			$('#editNewsBtn').click(function() {
				alert("Edit News")
				window.location.href="main.php?page=admin_manageNews";
				
				
			});
			
			$('#createBtn').click(function() {
				alert("create")
				
			});
			
			
			
			
			
			  
			$('ul li').click(function() {
				$('ul.nav-tabs li.active').removeClass('active');
				$(this).closest('li').addClass('active');
			});
			
			
		});
			
	</script>

</body>
</html>-->


<div class="row adminPage">
	<div class="marginAuto divBtn min-h">
		<div class="row marginAuto"  style="width:95%;">
			<div class="imgAdmin marginAuto marginB10" ></div>
			<div class="blockAdmin marginAuto">
				<div class="blockAdminInner" >
					<div class="blockAdminBtn" id="approveBtn">
						<div class="icon40 icon-check marginAuto"></div>
						<p class="text-center"><b>Approve Story</b></p>
					</div>
				</div>
				<div class="blockAdminInner">
					<div class="blockAdminBtn"  id="manageStoryBtn">
						<div class="icon40 icon-book marginAuto"></div>
						<p class="text-center"><b >Manage Story</b></p>
					</div>
				</div>
				<div class="blockAdminInner">
					<div class="blockAdminBtn" id="manageNewsBtn">
						<div class="icon40 icon-news2 marginAuto"></div>
						<p class="text-center"><b >Manage News</b></p>
					</div>
				</div>
				<div class="blockAdminInner">
					<div class="blockAdminBtn" id="manageCateBtn">
						<div class="icon40 icon-folder marginAuto"></div>
						<p class="text-center"><b >Manage Category</b></p>
					</div>
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
		$(".mainDetail").css('background-color', '#dddddd');
		
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