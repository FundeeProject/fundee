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
	<div class="row admin-manageNewsPage">	
		<div class="col-xs-12 col-lg-offset-3 col-lg-6">
			<div id="myTabContent1" class="tab-content mystory-create-m">
				<div class="marginT20 marginAuto" style="width :300px">
					  <p class="text-center">Manage Category</p>
					  <div class="form-group">
						<ul class="list-group">
						  <li class="list-group-item">10 Mar 2017 Sale 20%</li>
						  <li class="list-group-item">15 Mar 2017 Sale 15%</li>
						  <li class="list-group-item">25 Mar 2018 New Category</li>
						  <li class="list-group-item">30 Mar 2018 New Story garfield</li>
						</ul>
					  </div>
					 <div class="row">
						<div class="col-xs-12">
							<div  class="text-center sizeBtn" >
								 <button type="submit" class="btn btn-info" style="" id="addBtn">Add New </button>
								 <button type="button" class="btn btn-danger" style="" id="delBtn">Delete</button>
							</div>
							<p class="marginB10"></p>
						</div>
					</div>
				</div>	
			</div>
		</div>
	</div>
	-->
	
	<div class="marginAuto admin-manageNewsPage" >
		  <p class="text-center textName"></p>
		  <div class="form-group paddingT10 marginAuto divBtn">
			<center>
				<div class="form-group" >
					<ul class="list-group" id = "textNews">
					  <li class="list-group-item">10 Mar 2017 Sale 20%</li>
					  <li class="list-group-item">15 Mar 2017 Sale 15%</li>
					  <li class="list-group-item">25 Mar 2018 New Category</li>
					  <li class="list-group-item">30 Mar 2018 New Story garfield</li>
					</ul>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<div  class="text-center sizeBtn" >
							 <button type="submit" class="btn btn-info" style="" id="addBtn">Add New </button>
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
		$(".textName").text("Manage News")
		$(".storyPage").hide()
		///DB
		$.ajax({
			type:'POST',
			url:'qs/qs_showNews.php',
			dataType: "json",
			data: {},
			success:function( datajson ) {     
				if(datajson.length !=0){
					$('#textNews').empty();
					$.each(datajson, function(i,item){
						//var no = i;
						var textNews = '<li class="list-group-item">'+datajson[i].description+'</li>';
						
						$('#textNews').append(textNews);
					});	
				}
				else{
				}
				
				$('.list-group-item:first').addClass('active');
	
				$('ul li').click(function() {
					$('ul.list-group li.active').removeClass('active');
					$(this).closest('li').addClass('active');
					$(".adminPage").addClass('active');
				});
			},
			error:function(jqXHR, textStatus, errorThrown){alert(errorThrown);}		
		});
		
		//
		
		
		  
		$("#addBtn").click(function(){
			//window.location.href='addmin_addNews.php';
			//window.location.href="main.php?page=addmin_addNews";
			window.location.href="main.php?page=admin_addNews";
		});
		  
		$("#delBtn").click(function(){
			var text = $('#textNews li.active').text();
			alert("del : " +text);
			$.ajax({
				type:'POST',
				url:'qs/qs_deleteNews.php',
				dataType: "text",
				data: {text:text},
				success:function( datajson ) {     
					if(datajson == 'ok'){
						alert("ลบแล้ว");
						window.location.href="main.php?page=admin_manageNews";
					}
					else{ alert("no ok");
					}
				},
				error:function(jqXHR, textStatus, errorThrown){alert(errorThrown);}		
			});
		});
	});
</script>

</body>
</html>