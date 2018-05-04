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
<form class=""   method = "post" enctype = "multipart/form-data" id = "createform3">
	<div class="row adminAddNewsPage">
		<div class="marginAuto divBtn min-h">
			<div class="row marginAuto boxImgLogo">
				<p><b>Manage News</b></p>
			</div>
			<div class="icon64 icon-news2 marginB10"></div>
			<div class="blockAdmin marginAuto marginT20">
				<div class="divTextDetail">
				<div class="icon24 icon-add"></div>
				<p class="text-blue"><b>Add News</b></p>
			
					<input type="text" class="form-control" id="Detail" placeholder="Topic ...." name="" >
					<div class="borderBlue" id="showPic_news">
						<div class="boxIconCamera">
							<i class="glyphicon glyphicon-plus"></i>
						</div>
						<p class="color-blue text-center" style="margin:0">Add Picture News</p>
					</div>
					<input style="display:none" type="file" name="news_pic_upload" id="add_pic" OnChange="addPic(this)"/>
					<div class="row marginT20">
						<div class="col-xs-12">
							<div  class="text-center sizeBtn " >
								<button type="button" class="btn btn-back" style="" id="backBtn">Back</button>
								<button type="submit" class="btn btn-info" style="" id="">Add</button>
							</div>
							<p class="marginB10"></p>
						</div>
					</div>
			</div>
		</div>
	</div>
</form>





<script type="text/javascript">
	$(document).ready(function(){
		$(".adminPage").addClass('active')
		$(".textName").text("Add News")
		$(".storyPage").hide()

		//---------->> เลือกภาพ
		$('#showPic_news').bind("click" , function () {
			$('#add_pic').click();
		})
		//---------->> back
		$('#backBtn').click(function(){
			window.location.href="main.php?page=admin_manageNews";
		})
		
		$("#createform3").on("submit",function(e){
			var str = $('#img3').attr('src');
			if (typeof str === "undefined" || $("#Detail").val() == "") {
				alert("กรุณากรอกข้อมูลให้ครบ")
			}else{
				e.preventDefault();
				var  Detail = document.getElementById("Detail");
				var formData3 = new FormData($(this)[0]);
				formData3.append("Detail",Detail.value);
				$.ajax({
		            url: 'qs/qs_add_news.php',
		            type: 'POST',
				    data: formData3,
		            async: false,
		            cache: false,
		            contentType: false,
		            processData: false
		        }).done(function(data){
		               //alert("-"+data+"-");
					if(data == "success"){
						window.location.href="main.php?page=admin_manageNews";
					}
					else if(data == "notsuccess"){
						alert("ไม่สามารถอัพโหลดได้ กรุณาลองใหม่");
					}
		   		});
			}
		});
	});
	function addPic(ele) {  // แสดงรูปที่เลือก
		var showPic_news = document.getElementById("showPic_news");
		showPic_news.innerHTML = "<img id='img3' src='' alt='' style='width: 100%;height: 120px;' />";
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


<!-- 
admin_addNews.php
*************************************************
1. เช็ค กรณีไม่ใส่ค่าให้แจ้งเตือน
2. ถ้าทำไม่สำเร็จไม่ต้องเปลี่ยนหน้า
3. ถ้าใส่แต่ภาพ ไม่ใส่รูปต้องดักด้วยตอนนี้ใส่แต่ภาพก็ save ผ่าน
*************************************************
-->