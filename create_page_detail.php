<?php
session_start();
$_GET['storyid'];
$_GET['pageid'];
?>
<br>

<div id = "showCreateTitle" class = "showCreateTitle" style=""> 
	<form class="marginT20" style="width :90%; margin-left:auto; margin-right:auto; "  method = "post" enctype = "multipart/form-data" id = "createform2">
		<div class="form-group">
			<label for="">Story Name : <span id="showStoryname2"></span></label>
		</div>
		<div class="form-group">
			<label for="">Please add picture, Record and text. </label>
			<div class="box-img" style="width:90%" >
				<div class="box-text-number">
					<p class="text-center">1</p>
				</div>
				<div class="objectCenter new_Btn2 "  id = "showPic_page">
					<!--<i class="fa fa-camera" style="font-size:24px"></i>--> Add Pic
				</div>
				
				<input type="file" name="pic_upload_page" id="html_btn2" OnChange="PreviewPage(this)"/>
				
				<p class="text-center objectCenter" style="top:55%">Add Picture</p>
			</div>
			
			
		</div>
		
		<div class="row marginB20" style="margin-top: -10px;">
			<div class="col-xs-3 col-sm-3">
				<div id="" class="form-group form-group-sm">
					<div class="bg-btn btn-create " style="margin-left:40px;" id="editText">
						<i class="icon-text " >editText</i> 
					</div>
					<input type="hidden" name="editText"  />
					<!--<input type="text" name="editText" id="editText" />-->
				</div>
			</div>
			<div class="col-xs-3 col-sm-3">
				<div id="" class="form-group form-group-sm">
					<div class="bg-btn btn-refresh" style="margin-left:20px;">
						<i class="fa fa-refresh" ></i>
					</div>
				</div>
			</div>
			<div class="col-xs-3 col-sm-3">
				<div id="" class="form-group form-group-sm">
					<div class="bg-btn btn-microphone" id="editSound">
						 <i class="icon-mic" style="">Audio</i> 
					</div>
					<input style="" type="file" name="audio_upload" id="audio_upload" accept="audio/*" />
				</div>
			</div>
			<div class="col-xs-3 col-sm-3">
				<div id="" class="form-group form-group-sm">
					<div class="bg-btn btn-play" style="margin-left:-20px;">
						<i class="fa fa-play-circle" ></i>
					</div>
				</div>
			</div>
			
		</div>
		<div style="display:none;" id = "show_description_page">
			<label for="description_page" class="marginT10 color-blue">เนื้อเรื่อง</label>
			<textarea class="form-control marginB20" id="description_page" rows="3">  </textarea>
		</div>
		<div class="btn-confirm btn-ok">
			<button type="submit" id = "SavePage" class="btn btn-primary wp100">SavePage</button>
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
		
		$("#editText").click(function(){ /// กดเพิ่มเนื้อเรื่องนิทาน
			var show_description_page = document.getElementById("show_description_page");
			show_description_page.style.display = "block";
		});
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
		//------------------------------------------->> แก้ไขหน้าของนิทานเมื่อด Save Page <<---------------------------------------->
		$("#createform2").on("submit",function(e){ 
			e.preventDefault();
			//----------------ข้อมูลที่จะส่งไปอัพเดท
			var  description_page = document.getElementById("description_page");alert($("#description_page").val());
			var formData2 = new FormData($(this)[0]);
			formData2.append("story_id",story_id);
			formData2.append("pageNumber",pageNumber_);
			formData2.append("description_page",description_page.value);
			//-------------------------
			var str = $('#img2').attr('src');
			if (typeof str === "undefined" || $("#description_page").val() == ""  ) {
				alert("กรุณากรอกข้อมูลให้ครบ");
			}
			else{
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
					if(data == "notsuccess"){
						alert("เพิ่มไม่ได้ กรุณากรอกข้อมูลให้ครบแล้วลองใหม่");
					}
					else if(data == "ok"){
						alert("เพิ่มแล้ว");
						window.location.href="main.php?page=create_page&storyid="+story_id+"";
					}
		        });
			}
		});
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
