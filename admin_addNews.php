
<form class=""   method = "post" enctype = "multipart/form-data" id = "createform3">
	<div class="row adminAddNewsPage">
		<div class="marginAuto divBtn min-h">
			<div class="row marginAuto boxImgLogo">
				<p><b>Manage News</b></p>
			</div>
			<div class="icon48 icon-news2 marginB10"></div>
			<div class="blockAdmin marginAuto marginT20">
				<div class="divTextDetail">
				<div class="icon24 icon-add"></div>
				<p class="text-blue"><b>Add News</b></p>
			
					<input type="text" class="form-control" id="Detail" placeholder="Topic ...." name="" >
					<div class="borderBlue" id="showPic_news">
						<div class="boxIconCamera">
							<i class="glyphicon glyphicon-camera"></i>
						</div>
						<p class="color-blue text-center" style="margin:0">Add Picture News</p>
					</div>
					<input style="display:none" type="file" name="news_pic_upload" id="add_pic" OnChange="addPic(this)" accept="image/*"/>
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
			//-----------เช็คจำนวนตัวอักษร ตอนกดแอดข่าว------//
			var x = document.getElementById("Detail").value.length ;
			if(x > 30){
				alert("หัวข้อข่าวต้องมีความยาว 1-30 ตัวอักษร");
			}else{
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
							//alert("เพิ่มข่าวสำเร็จ");
							window.location.href="main.php?page=admin_manageNews";
						}
						else if(data == "notsuccess"){
							alert("ไม่สามารถอัพโหลดได้ กรุณาลองใหม่");
						}
			   		});
				}
			}
			
			
			
		});
		
		//-----------เช็คจำนวนตัวอักษร ตอนกรอก------//
			$('#Detail').keyup(function(){
				var x = document.getElementById("Detail").value.length ;
				if(x > 30){
					alert("หัวข้อข่าวต้องมีความยาว 1-30 ตัวอักษร");
					var newstring = document.getElementById("Detail").value.substring(0,30);
					document.getElementById("Detail").value = newstring;
				}
				
			})
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