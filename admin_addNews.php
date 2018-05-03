<!--
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
-->  

<div class="row adminManageNewsPage">
	<div class="marginAuto divBtn min-h">
		<div class="row marginAuto boxImgLogo">
			<p><b>Manage News</b></p>
		</div>
		<div class="icon64 icon-news2 marginB10"></div>
		<div class="blockAdmin marginAuto marginT20">
			<div style="    width: 90%;
    height: 150px;
    background-color: #FFF;
    margin: 0 auto;
    /* padding-top: 150px; */
    position: relative;
    top: 35px;
    border-radius: 20px;
    box-shadow: -5px 5px 5px #555;">
			<div class="icon24 icon-add " style="position: relative;
    top: 5px;
	left: 5px;"></div>
	<p class="text-blue" style="    position: relative;
    top: -16px;
    left: 35px;margin:0; bottom:0">Add News</p>
	<input type="email" class="" id="email" placeholder="Enter email" name="email" style="width: 90%;
    border-radius: 25px;
    background-color: #085b6b;
    color: #FFF;
    margin: 0 auto;">

	
		</div>

			

		
		</div>
	</div>
</div>
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
<!--
</body>
</html>
-->