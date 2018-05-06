<?php
session_start();
//$_SESSION['user_id'];
$_GET['storyidToEdit'];
?>
<br>
<div class="marginAuto myStoryPage showCreate" id = "showCreate" >
	<form class="marginT20 marginAuto" style="width :90%;" method = "post" enctype = "multipart/form-data" id = "createform1" >
		  <p class="text-center textName"></p>
		  <div class="form-group paddingT10 marginAuto divBtn">
			<center>
				<div class="marginAuto marginB20" style="width:90%; height:auto;">
					  <div class="">
					
						<label class="marginT20 color-blue" for="Storyname">Story Name</label>
						<input type="text" class="form-control" id="Storyname" aria-describedby="emailHelp" placeholder="">
						
						<label for="exampleFormControlSelect2" class="marginT10 color-blue">Category</label>
						<select class="form-control" id="selectCategory">
						  <option value="0">Select Category</option>
						</select>
						<label for="description" class="marginT10 color-blue">Short Description</label>
						<textarea class="form-control marginB20" id="description" rows="3">  </textarea>
					
						<label for="showPic" class="color-blue">Choose a cover photo</label>
						<div class="boxImg box-90 box-camera " id="showPic">
							<div class="boxIconCamera">
								<i class="glyphicon glyphicon-plus"></i>
							</div>
							<p class="color-blue text-center" style="margin:0"></p>
						</div>
						<input style="display:none" type="file" name="pic_upload" id="add_pic" OnChange="addPic(this)" accept="image/*"/>
						<br>	
					 </div>	
					 <div class="row" >
						<div class="col-xs-12">
							
							<div  class="text-center" >
								<button type="button" class="btn " style="" id="cancelBtn">CANCEL</button>
								 <button type="submit" class="btn btn-info" style="" id="CREATEtitel">UPDATE</button>
							</div>
							<p class="marginB10"></p>
						</div>
					</div>			
				</div>
			</center>
		  </div>
	</form>
</div>
 <br>
    <script>
	var isEditPic = 0;
	$(document).ready(function(){
		var storyid = <?php echo $_GET['storyidToEdit'];?> ;
		$(".storyPage").addClass('active');
		$(".adminPage").hide();
		add_select_option();
		
		
		/*--------------ดึงข้อมูลจาก DB มาแสดง ตอนโหลดหน้านี้มา-------*/
		$.ajax({ 
			type:'POST',
			url:'qs/qs_findbookby_id.php',
			dataType: "json",
			data: {storyid:storyid},
			success:function( datajson ) { 
				var img = "";
				if(datajson.length !=0){
					document.getElementById("Storyname").value = datajson[0].story_name ;
					document.getElementById("description").value = datajson[0].story_description ;
					$("#selectCategory").val(''+datajson[0].category_id+'');
					var showPic = document.getElementById("showPic");
					showPic.innerHTML = "<img id='img3' src='imgStory/"+datajson[0].story_pic+"' alt='' style='width: 100%;height: 120px;' />";
					
				}
				else{
					  alert("ไม่พบนิทาน");
				}
				
			},
			error:function(jqXHR, textStatus, errorThrown){alert(errorThrown);}		
		});
		
		//-------------------------->> ยกเลิกการแก้ไข <<---------------------------
		$('#cancelBtn').bind("click" , function () {
			//alert("ยกเลิกการแก้ไข");
			window.location.href="main.php?page=play_storydetail_formystory&storyID="+storyid+"";
		})
		//-------------------------->> เลือกภาพ <<---------------------------
		$('#showPic').bind("click" , function () {
			$('#add_pic').click();
		})
		//-------------------------->> แก้ไขชื่อนิทาน <<---------------------------
		$("#createform1").on("submit",function(e){  
			e.preventDefault(); // ปิดการใช้งาน submit ปกติ เพื่อใช้งานผ่าน ajax
			var  Storyname = document.getElementById("Storyname");
			var  selectCategory = document.getElementById("selectCategory");
			var  description = document.getElementById("description");
			var  showStoryname = document.getElementById("showStoryname");
			var  showStoryid = document.getElementById("showStoryid");
			var textToAlert = "";
			var story_id = 0 ;
			////---------------------->> เช็คการกรอกข้อมูล <<---------------------------
			if(Storyname.value == '' ){ textToAlert = " - ตั้งชื่อนิทาน \n"; }
			if(selectCategory.value == 0 ){ textToAlert = textToAlert+" - เลือกประเภทนิทาน \n"; }
			
			if((Storyname.value != '')&&(selectCategory.value != 0 )){
				/*อัพโหลดรูป*/
				//alert("Storyname - "+Storyname.value+"\ndescription - "+description.value+"\nuser_id - "+user_id);
				var formData = new FormData($(this)[0]);
				formData.append("Storyname",Storyname.value);
				formData.append("selectCategory",selectCategory.value);
				formData.append("description",description.value);
				formData.append("story_id",storyid);
				formData.append("isEditPic",isEditPic);
				$.ajax({
		            url: 'qs/qs_user_updateStory.php',
		            type: 'POST',
				    data: formData,
		            async: false,
		            cache: false,
		            contentType: false,
		            processData: false
		        }).done(function(data){
		               // alert("-"+data+"-");
					if(data == "notsuccess"){
						alert("อัพโหลดรูปไม่สำเร็จ");
					}
					else if(data == "failed"){
						alert("อัพเดทข้อมูลไม่สำเร็จ");
					}else if(data == "ok"){
						alert("อัพเดทสำเร็จ");
						window.location.href="main.php?page=user_edit_story_page&storyid="+storyid+"";
					}
		        });
//img = " <div class='col-xs-3 col-lg-2'><button id = 'pic_' value ='"+no+"' onClick = 'pageAddpicture(this.value);' > <img src ='imgStory/img_00.png' style=' width: 45px; height: 45px;' />  </button> </div> "; 
					
			}
			else{ 
				alert("ข้อมูลไม่ครบ \n"+textToAlert); 
			}
		});
	});
	function add_select_option(){ // ดัง category ทั้งหมดมาแสดงให้เลือก
		$.ajax({
			type:'POST',
			url:'qs/qs_selectCategory.php',
			dataType: "json",
			data: {},
			success:function( datajson ) {   
				if(datajson.length !=0){
					$.each(datajson, function(i,item){
						var selectCategory = document.getElementById("selectCategory");
						var option = document.createElement("option");
						option.text = datajson[i].category_name;
						option.value = datajson[i].category_id;
						selectCategory.add(option);
					});	
				}
				else{
					alert("ไม่พบข้อมูล Category");
				}
			},
			error:function(jqXHR, textStatus, errorThrown){alert(errorThrown);}		
		});
	}
	
	function addPic(ele) {  // แสดงรูปที่เลือก
		isEditPic = 1;
		var showPic = document.getElementById("showPic");
		showPic.innerHTML = "<img id='img3' src='' alt='' style='width: 100%;height: 120px;' />";
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