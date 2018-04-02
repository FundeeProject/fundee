<?php
//session_start();
//$_SESSION['mystoryPage']='showmystory';
//$_GET['page'];
?>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="css/ytLoad.jquery.css" rel="stylesheet" type="text/css">
    
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="js/ytLoad.jquery.js"></script>
	
</head>
<style>

</style>
<body class="bgHome container">

	<div class="row adminPage">
		<!--<div class="col-xs-12 col-lg-offset-3 col-lg-6">-->
		<!--
		<div class="col-xs-12 col-lg-offset-3 col-lg-6">
			<div class="w100 logoHome login marginT10" style="position:retative"></div>
		</div>
    
		<div class="row">
		<div class="col-xs-12 col-lg-offset-3 col-lg-6">
				<div class="bgW_login contentStory marginB10">
			<div class="marginAuto wp100" style="padding-top:60px;">
				<section class="area">
						 <div class="row">
							<div class="col-md-12">
								<ul class="nav nav-tabs">
									<li><a data-toggle="tab" href="">HOME</a></li>
									<li><a data-toggle="tab" href="">CATEGORY</a></li>
									<li class="active"><a data-toggle="tab" href="#tab3">ADMIN</a></li>
								</ul>
							</div>
							<div id="myTabContent1" class="tab-content mystory-create-m" style="">
								<div class="tab-pane fade" id="tab1"></div>
								<div class="tab-pane fade" id="tab2"></div>
								<div class="tab-pane fade active in" id="tab3">
									<div class="marginT20"></div><br></br>
									<div class="marginAuto box-80 marginT20"></div>
									
									<p class="text-center marginT20 textName"></p>
									<div class="marginT20 marginAuto" style="width :70%;">
										  <div class="form-group" >
											<center>
											<button type="button" class="btn btn-warning" style="margin-bottom:8px; width:150px;">Approve Story</button><br/>
											<button type="button" class="btn btn-warning" style="margin-bottom:8px; width:150px;">Create Story</button><br/>
											<button type="button" class="btn btn-warning" style="margin-bottom:8px; width:150px;">Manage Story</button><br/>
											<button type="button" class="btn btn-warning" style="margin-bottom:8px; width:150px;">Approve Story</button><br/>
											<button type="button" class="btn btn-warning" style="margin-bottom:8px; width:150px;">Approve Story</button>

											</center>
										  </div>
										
									</div>		
								</div>
							</div>
						</div>
				</section>
			</div>
		</div>-->	
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
		<!--</div>-->	
	</div>
	

  
    <script>
		$(document).ready(function(){
			//สีฟ้าที่ปุ่ม admin
			$(".adminPage").addClass('active')
			$(".storyPage").hide()
			
			$(".textName").text("Joy!")
			
			//------------------->>> btn  <<--------------------
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
</html>