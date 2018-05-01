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
    <link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/ytLoad.jquery.js"></script>
	
</head>
<style>

</style>
<body class="bgHome container">
	<form class="marginT20" style="width :90%; margin-left:auto; margin-right:auto; "  method = "post" enctype = "multipart/form-data" id = "createform3">
	<div class="marginAuto admin-addNewsPage" >
		  <p class="text-center textName"></p>
		  <div class="form-group paddingT10 marginAuto divBtn">
			<center>
				<div class="marginAuto marginB20" style="width:90%; height:auto;">
					<div class="form-group">
						<label class="marginT20 color-blue" >Topic</label>
						<input type="text" class="form-control" id=""  placeholder="Type Category">
					 
					  
						<label class="color-blue marginT10">Detail</label>
						<textarea class="form-control" id="Detail" rows="3"></textarea>
					 
					  
					 
						<label class="color-blue marginT10">Add Picture</label>
						<!--- <div class="box-camera">
							<i class="fa fa-camera"></i>
						</div> --->
						
						<div class="box-camera  " style="" id = "showPic_news">
							<i class="fa fa-camera" style="font-size:24px"></i>
						</div>
						<input type="file" name="news_pic_upload" id="add_pic" OnChange="addPic(this)"/>
						
					</div>
				
					<div class="row">
						<div class="col-xs-12">
							<div  class="text-center" >
								 <button type="submit" class="btn btn-info" style="" id="addNewsBtn">Add News</button>
							</div>
							<p class="marginB10"></p>
						</div>
					</div>			
				</div>
			</center>
		  </div>
	</div>	
	</form>
  
    <script type="text/javascript">
		$(document).ready(function(){
			  $(".adminPage").addClass('active')
			  $(".textName").text("Add News")
			  $(".storyPage").hide()
			  
			  
			$("#createform3").on("submit",function(e){
				 // alert("Add News");
				 e.preventDefault();
				var  Detail = document.getElementById("Detail");
				var formData2 = new FormData($(this)[0]);
				formData2.append("Detail",Detail.value);
				$.ajax({
		            url: 'qs/qs_add_news.php',
		            type: 'POST',
				    data: formData2,
		            async: false,
		            cache: false,
		            contentType: false,
		            processData: false
		        }).done(function(data){
		                alert("-"+data+"-");
		   		});
				window.location.href="main.php?page=admin_manageNews";
			});
		});
		function addPic(ele) {  // แสดงรูปที่เลือก
		alert("addPic");
			var showPic_news = document.getElementById("showPic_news");
			showPic_news.innerHTML = "<img id='img3' src='' alt='' style=' width: 50 px; height: 50px;' />";
			$('#img3').attr('src', ele.value);
			if (ele.files && ele.files[0]) 
			{
				var reader = new FileReader();
				reader.onload = function (e) 
				{
					$('#img3').attr('src', e.target.result);
				}
				reader.readAsDataURL(ele.files[0]);
			}
		}	
	</script>

</body>
</html>