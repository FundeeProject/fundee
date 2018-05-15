<?php
//session_start();
$_GET['storyid'];
$_GET['pageid'];
?>
<br>

<div id = "showCreateTitle" class = "showCreateTitle" style=""> 
	<form class="" style="width :90%; margin-left:auto; margin-right:auto; "  method = "post" enctype = "multipart/form-data" id = "createform2">
		<div class="form-group">
			<label class="text-blue">Story Name : <span style="color:#3a3837" id="showStoryname2"></span></label>
		</div>
		<div class="form-group">
			<!--<label for="">Please add picture, Record and text. </label>-->
			<div class="box-img" style="margin: 0 auto;width: 100%; background-color: #fff;" >
				<div class="box-text-number">
					<p class="text-center"><?php echo $_GET['pageid'];?></p>
				</div>
				<div class="objectCenter new_Btn2 "  id = "showPic_page">
					<i class="glyphicon glyphicon-camera" style="left: 43%;top: 43;"></i>
				</div>
				
				<input type="file" name="pic_upload_page" id="html_btn2" OnChange="PreviewPage(this)" style="display:none"/>
				<div style="position: relative;top: 130px;">
					<textarea class="form-control" id="description_page" rows="3" placeholder="Storyline : " style="border-radius: 10px;background-color: #085b6b;color: #FFF;"></textarea>
				</div>
				
			</div>
			
			
			
			
		</div>
		
		<!--nan new-->
		<div class="row" style="margin-top: -10px;">
			<div id="" class="form-group form-group-sm">
				<div class="icon48 icon-mic" id="editSound" style="margin: 0 auto;margin-top: 90;"></div>
				<input style="display: none;" type="file" name="audio_upload" id="audio_upload" accept="audio/*"  />
			</div>
		</div>
		
		<div style="display:none;" id = "show_description_page">
			<label for="description_page" class="marginT10 color-blue">เนื้อเรื่อง</label>
			<textarea class="form-control" id="description_page" rows="3">  </textarea>
		</div>
			
		
		<div class="row " >
			<div class="col-xs-12">
				<div  class="text-center" >
					 <button type="button" class="btn btn-back" style="width:80px" id="backBtn">Back</button>
					 <button type="submit" class="btn btn-info" style="width:80px" id="SavePage">Add</button>
				</div>
				<p class="marginB10"></p>
			</div>
		</div>	
	</form>
</div>
<script>
	$(document).ready(function(){
		//$(".storyPage").addClass('active');
		//$(".adminPage").hide();
		<?php 
			if($_SESSION["role_id"]== 0 ){ ///admin
				echo "$('.storyPage').hide(); ";
				echo " $('.adminPage').addClass('active'); ";
			}
			else if($_SESSION["role_id"]== 1 ){
				echo "$('.adminPage').hide(); ";
				echo " $('.storyPage').addClass('active'); ";
			}
			
		?>
		var story_id = <?php echo $_GET['storyid'];?> ;
		var  pageNumber_ = <?php echo $_GET['pageid'];?>;
		$('.new_Btn2').bind("click" , function () {
			$('#html_btn2').click();
		});
		
		
		//สั่งให้ปุ่ม อัดเสียงทำงาน
		$('#editSound').bind("click" , function () {
			$('#audio_upload').click();
			
			
		});
		
		//เปลี่ยนสีปุ่ม
		$("#audio_upload").change(function(){
			///adfile name 
			$('#audio_upload').attr('src', this.value);
			if (this.files && this.files[0]) 
			{
				var reader = new FileReader();
				reader.onload = function (e) 
				{
					$('#audio_upload').attr('src', e.target.result);
				}
				reader.readAsDataURL(this.files[0]);
			}
			////เปลี่ยนสีไอคอนไมค์
			if( document.getElementById("audio_upload").files.length == 0 ){
				$("#editSound").addClass("icon-mic")
				$("#editSound").removeClass("icon-mic-recond")
			}else{
				$("#editSound").removeClass("icon-mic")
				$("#editSound").addClass("icon-mic-recond")
			}
		});
		
		
		
		$("#backBtn").click(function(){ 
			//alert("back")
			window.location.href="main.php?page=user_edit_story_page&storyid="+story_id+"";
		});
		
		
		
		$(".mainDetail").css('background-color', '#fcf8e3');//C1C319
		/*$("#editText").click(function(){ /// กดเพิ่มเนื้อเรื่องนิทาน
			var show_description_page = document.getElementById("show_description_page");
			show_description_page.style.display = "block";
		});*/
		//------------------------------------------->> แสดงชื่อเรื่อง <<---------------------------------------->
		$.ajax({
			type:'POST',
			url:'qs/qs_findbookby_id.php',
			dataType: "json",
			data: {storyid:story_id},
			success:function( datajson ) {  
				if(datajson.length !=0){ 
					var showStoryname2 = document.getElementById("showStoryname2");
					showStoryname2.innerHTML = ""+datajson[0].story_name+"" ;
				}
				else{
					  alert("ไม่พบข้อมูลหน้านิทาน");
				}
			},
			error:function(jqXHR, textStatus, errorThrown){alert(errorThrown);}		
		});
		//------------------------------------------->> แสดงรายละเอียดของหน้า<<---------------------------------------->
		$.ajax({
			type:'POST',
			url:'qs/qs_showPageDetil.php',
			dataType: "json",
			data: {storyid:story_id,pageNumber_:pageNumber_},
			success:function( datajson ) {  
				if(datajson.length !=0){ 
					//check icon audio
					$('#audio_upload').attr('src', datajson[0].voice);
					var audio = $('#audio_upload').attr('src');
					if (typeof audio == "undefined" || audio == "NULL" ){
						$("#editSound").addClass("icon-mic")
						$("#editSound").removeClass("icon-mic-recond")
						
					}else{
						
						$("#editSound").removeClass("icon-mic")
						$("#editSound").addClass("icon-mic-recond")//icon มีไฟล์ 
						
					}
					if(datajson[0].text == "NULL"){
						
					}else{
						document.getElementById("description_page").value = datajson[0].text;
					}
					
					var showPic_page = document.getElementById("showPic_page");
					//<i class="fa fa-camera" style="font-size:24px"></i>
					if(datajson[0].picture == "NULL"){
						//showPic_page.innerHTML = "<i class='fa fa-camera' style='font-size:24px'></i>";
					}else{
						showPic_page.innerHTML = "<img id='img2' src='imgStory/"+datajson[0].picture+"' alt='' style=' width: 100%; height: 120px;' />";
					}
					
				}
				else{
					  alert("ไม่พบข้อมูลหน้านิทาน");
				}
			},
			error:function(jqXHR, textStatus, errorThrown){alert(errorThrown);}		
		});
		//------------------------------------------->> แก้ไขหน้าของนิทานเมื่อด Save Page <<---------------------------------------->
		//$("#SavePage").click(function(e){ 
		
		$("#createform2").on("submit",function(e){ 
			e.preventDefault();
			//----------------ข้อมูลที่จะส่งไปอัพเดท
			var  description_page = document.getElementById("description_page");
			//alert($("#description_page").val());
			var formData2 = new FormData($(this)[0]);
			formData2.append("story_id",story_id);
			formData2.append("pageNumber",pageNumber_);
			formData2.append("description_page",description_page.value);
		//	var fileAudio = document.getElementById("audio_upload").files.length;
			var IsPicChange = 0;  ////0 = ใช้รูปเดิมจากฐานข้อมูล - 1 = รูปใหม่
			var IsSoundChange = 0;  ////0 = ใช้เสียงเดิมจากฐานข้อมูล - 1 = เสียงใหม่
			
			//-------------------------
			var audio = $('#audio_upload').attr('src');
			var str = $('#img2').attr('src');
			//alert("str = -"+str+"-");
			//alert("audio = -"+audio+"-");
			if (typeof str === "undefined"  ||(str == "")   ) {
				//popup for alert
				$("#exampleModal").modal()// เปิดใช้ popup
				$("#okModalBtn").remove();//ลบปุ่ม ok ออกใหเหลือแต่ปุ่ม cancel
				$(".modal-footer").css("width","110px")//จัดปุ่ม cancel ให้อยู่กึ่งกลาง
				$(".modal-body").html("กรุณากรอกข้อมูลให้ครบ")  //ใส่ข้อความที่ต้องการ alert
			}
			else{
				//alert(str.substring(0,8));
				
				///เช็คว่ามีการเปลี่ยนรูปปหรือไม่
				if(str.substring(0,8) == "imgStory"){IsPicChange = 0;}
				else{IsPicChange = 1 ;}
				
				// เช็คว่ามีการเปลี่ยนเสียงหรือไม่
				if(audio.substring(0,1) == "s" || (audio == "") || (audio == "NULL")){IsSoundChange = 0;}
				else{IsSoundChange = 1 ;}
				
				//alert("pic= "+IsPicChange+"\nsound= "+IsSoundChange);
				
				formData2.append("IsPicChange",IsPicChange);
				formData2.append("IsSoundChange",IsSoundChange);
				//alert("ครบ"+pageNumber_);
				///////อัพเดทลงฐานข้อมูล
				$.ajax({
		            url: 'qs/qs_uploadPic_to_page.php',
		            type: 'POST',
				    data: formData2,
		            async: false,
		            cache: false,
		            contentType: false,
		            processData: false
		        }).done(function(data){
		              //  alert("-"+data+"-");
					if(data == "notsuccessP"){
						alert("เพิ่มรูปไม่ได้ กรุณากรอกข้อมูลให้ครบแล้วลองใหม่");
					}
					else if(data == "notsuccessS"){
						alert("เพิ่มเสียงไม่ได้ กรุณากรอกข้อมูลให้ครบแล้วลองใหม่");
					}
					else if(data == "ok"){
						//alert("เพิ่มแล้ว");
						//window.location.href="main.php?page=create_page&storyid="+story_id+"";
						<?php 
							if($_SESSION["role_id"]== 0 ){ ///admin
								echo 'window.location.href="main.php?page=user_edit_story_page&storyid='.$_GET['storyid'].'";';
							}
							else if($_SESSION["role_id"]== 1 ){
								echo 'window.location.href="main.php?page=user_edit_story_page&storyid='.$_GET['storyid'].'";';
							}
						?>
					}
		        });
			}
		});
	
		//-----------เช็คจำนวนตัวอักษร เนื้อเรื่องนิทาน------//
		$('#description_page').keyup(function(){
			var x = document.getElementById("description_page").value.length ;
			if(x > 255){
				alert("คำอธิบายต้องมีความยาวระหว่าง 1-255 ตัวอักษร");
				var newstring = document.getElementById("description_page").value.substring(0,255);
				document.getElementById("description_page").value = newstring;
			}
		})
	});
	function PreviewPage(ele) {  // แสดงรูปที่เลือก เพจ
		var showPic_page = document.getElementById("showPic_page");
		showPic_page.innerHTML = "<img id='img2' src='' alt='' style=' width: 100%; height: 120px;' />";
		$('#img2').attr('src', ele.value);
		if (ele.files && ele.files[0]) 
		{
			var reader = new FileReader();
			reader.onload = function (e) 
			{
				$('#img2').attr('src', e.target.result);
			}
			reader.readAsDataURL(ele.files[0]);
		}
	}
</script>
