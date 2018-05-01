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
								<div class="marginT20 marginAuto" style="width :90%;">
									  <p class="text-center">Manage Category</p>
									  <div class="form-group">
										<ul class="list-group">
										  <li class="list-group-item active">Fantacy</li>
										  <li class="list-group-item">Aesop's Fables</li>
										  <li class="list-group-item">Funny Tales</li>
										  <li class="list-group-item">Folk tale</li>
										</ul>
									  </div>
									 <div class="row">
										<div class="col-xs-12">
											<div  class="text-center sizeBtn" >
												 <button type="submit" class="btn btn-secondary" style="width:120px;" id="addBtn">Add Category </button>
												 <button type="button" class="btn btn-success" style="" id="delBtn">Delete</button>
											</div>
											<p class="marginB10"></p>
										</div>
									</div>
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
	
	<div class="marginAuto admin-manageNewsPage" >
		  <p class="text-center textName"></p>
		  <div class="form-group paddingT10 marginAuto divBtn">
			<center>
				<div class="form-group">
					<ul class="list-group" id = "textCategory">
					  <li class="list-group-item">Fantacy</li>
					  <li class="list-group-item">Aesop's Fables</li>
					  <li class="list-group-item">Funny Tales</li>
					  <li class="list-group-item">Folk tale</li>
					</ul>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<div  class="text-center" >
							 <button type="button" class="btn btn-info" style="" id="addBtn">Add Category </button>
							 <button type="button" class="btn btn-danger" style="" id="delBtn">Delete</button>
						</div>
						<p class="marginB10"></p>
					</div>
				</div>
			</center>
		  </div>
	</div>	
	
  
   
    <script type="text/javascript">
		$(document).ready(function(){
			$(".adminPage").addClass('active')
			$(".textName").text("Manage Category")
			$(".storyPage").hide() ///ซ่อนมายสตอรี่
			
			
			//////เมื่อโหลดหน้านี้มาให้ดึง category มาจาก Db ก่อน
			$.ajax({
				type:'POST',
				url:'qs/qs_showCategory.php',
				dataType: "json",
				data: {},
				success:function( datajson ) {      ///ถ้ามีข้อมูลกลับมา
					if(datajson.length !=0){ 
						$('#textCategory').empty();
						$.each(datajson, function(i,item){
							//var no = i;
							var textCategory = '<li class="list-group-item">'+datajson[i].category_name+'</li>';
							
							$('#textCategory').append(textCategory);
						});	
					}
					else{ alert("มีปัญหาในการเชื่อมต่อฐานข้อมูล");
					}
					$('.list-group-item:first').addClass('active'); ///ทำให้อันแรกของลิสเป็นสีฟ้า
					$('ul li').click(function() {
						$('ul.list-group li.active').removeClass('active');
						$(this).closest('li').addClass('active');
						$(".adminPage").addClass('active');
					});
				},
				error:function(jqXHR, textStatus, errorThrown){alert(errorThrown);}		
			});
			
			
			//////////////// เพิ่ม Category
			$("#addBtn").click(function(){
				window.location.href="main.php?page=admin_addCategory";
			});
			/////////ลบ Category  
			$("#delBtn").click(function(){
				//var text = $('ul li.active').text();
				var text = $('#textCategory li.active').text();
				alert("del : " +text);
				$.ajax({
					type:'POST',
					url:'qs/qs_deleteCategory.php',
					dataType: "text",
					data: {text:text},
					success:function( datajson ) {     
						if(datajson == 'ok'){
							alert("ลบแล้ว");
							window.location.href="main.php?page=admin_manageCategory";
						}
						else{ alert("ลบไม่สำเร็จ");
						}
					},
					error:function(jqXHR, textStatus, errorThrown){alert(errorThrown);}		
				});
			});
		});
			
	</script>

</body>
</html>