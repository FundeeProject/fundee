<?php
//session_start();
//$_SESSION['mystoryPage']='showmystory';
//$_GET['page'];
?>
<!--
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

</style>-->
<!--
<body class="bgHome container">
	
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
-->


<div class="row adminAddCategoryPage">
	<div class="marginAuto divBtn min-h">
		<div class="row marginAuto boxImgLogo">
			<p><b>Manage Category</b></p>
		</div>
		<div class="icon64 icon-folder marginB10"></div>
		<div class="blockAdmin marginAuto marginT20">
			<div class="divTextDetail">
			<div class="icon24 icon-add"></div>
			<p class="text-blue"><b>Add Category</b></p>
		
				<input type="text" class="form-control" id="textCategory" placeholder="Type Category name" name="" >
				
				<div class="row marginT20">
					<div class="col-xs-12">
						<div  class="text-center sizeBtn " >
							<button type="button" class="btn btn-back" style="" id="backBtn">Back</button>
							<button type="button" class="btn btn-info" style="" id="addBtn">Add</button>
						</div>
						<p class="marginB10"></p>
					</div>
				</div>
		</div>
	</div>
</div>

  
<script type="text/javascript">
	$(document).ready(function(){
		$(".adminPage").addClass('active')
		$(".storyPage").hide()
			
		$("#addBtn").click(function(){
			var Categoryname = $("#textCategory").val();
			alert(Categoryname)
			
			$.ajax({
				type:'POST',
				url:'qs/qs_add_Category.php',
				dataType: "text",
				data: {Categoryname:Categoryname},
				success:function( datajson ) {     
					if(datajson == 'ok'){
						//alert("เพิ่มแล้ว");
						window.location.href="main.php?page=admin_manageCategory";
					}
					else{ alert("เพิ่มไม่สำเร็จ");
					}
				},
				error:function(jqXHR, textStatus, errorThrown){alert(errorThrown);}		
			});
				window.location.href="main.php?page=admin_manageCategory";
		});
			
		$("#backBtn").click(function(){
			window.location.href="main.php?page=admin_manageCategory";
		});
	});
			
</script>
<!--
</body>
</html>
-->