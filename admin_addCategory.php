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
    <script type="text/javascript" src="js/ytLoad.jquery.js"></script>
	<link rel="stylesheet" href="css/style.css">
</head>
<style>

</style>
<body class="bgHome container">
	<!--
	<div class="row">
		<div class="col-xs-12 col-lg-offset-3 col-lg-6">
			<div class="w100 logoHome login marginT10" style="position:retative"></div>
		</div>
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
							<p class="text-center marginT20">Manage Category</p>
							<div class="marginT20 marginAuto" style="width :90%;background-color:#ccc;  ">
								  
								  <div class="marginAuto marginB20" style="width:90%; height:150px;">
									  <div class="form-group" style=" ">
										<label class="marginT20" for="">Add Category</label>
										<input type="text" class="form-control" id=""  placeholder="Type Category">
									  </div>
								
									 <div class="row">
										<div class="col-xs-12">
											<div  class="text-center sizeBtn" >
												 <button type="submit" class="btn btn-secondary" style="" id="regis">Cancel</button>
												 <button type="button" class="btn btn-success" style="" id="back">Add</button>
											</div>
											<p class="marginB10"></p>
										</div>
									</div>
									
								</div>
								<p class="marginT10 "></p>
							</div>		
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
		</div>
	</div>
	-->
	<div class="marginAuto admin-addCategoryPage" >
		  <p class="text-center textName"></p>
		  <div class="form-group paddingT10 marginAuto divBtn">
			<center>
				<div class="marginAuto marginB20" style="width:90%; height:auto;">
					  <div class="form-group">
						<label class="color-blue" for="">Add Category</label>
						<input type="text" class="form-control" id="textCategory"  placeholder="Type Category">
					 <div class="row marginT20">
						<div class="col-xs-12">
							<div  class="text-center sizeBtn" >
								 <button type="submit" class="btn btn-secondary" style="" id="cancelBtn">Cancel</button>
								 <button type="button" class="btn btn-info" style="" id="addBtn">Add</button>
							</div>
							<p class="marginB10"></p>
						</div>
					</div>			
				</div>
			</center>
		  </div>
	</div>	
	
  
    <script type="text/javascript">
		$(document).ready(function(){
			  $(".adminPage").addClass('active')
			 
			  
			  $("#addBtn").click(function(){
				  alert($("#textCategory").val())
				  window.location.href="main.php?page=admin_manageCategory";
			  });
			  
			   $("#cancelBtn").click(function(){
				  alert("create")
				  window.location.href="main.php?page=admin_manageCategory";
			  });
			  
			
			  
			
		});
			
	</script>

</body>
</html>