<?php
//session_start();
$_SESSION['user_id'];
//$_GET['page'];
?>
<br>
<div class="marginAuto myStoryPage showCreate" id = "showCreate" >
	<p class="text-center text-blue marginT10"><b>CREATE STORY</b></p>
	<form class="marginT20 marginAuto" style="width :90%;" method = "post" enctype = "multipart/form-data" id = "createform1" >
		  <p class="text-center textName"></p>
		  <div class="form-group paddingT10 marginAuto divBtn">
			<center>
				<div class="marginAuto marginB20" style="width:90%; height:auto;">
					  <div class="">
					
						<!--<label class="marginT20 color-blue" for="Storyname">Story Name</label>-->
						<input type="text" class="form-control boxInputBlue marginT20" id="Storyname" aria-describedby="emailHelp" placeholder="Story Name">
						
						<!--<label for="exampleFormControlSelect2" class="marginT10 color-blue">Category</label>-->
						<!--<select class="form-control boxInputBlue marginT20" id="selectCategory">-->
						<select class="form-control marginT20 borderBlue text-blue" style=" background-color: #fcf8e3;;" id="selectCategory">
						  <option value="0">Select Category</option>
						</select>
						<!--<label for="description" class="marginT10 color-blue">Short Description</label>-->
						
						<textarea class="form-control boxInputBlue boxTextarea marginT20" id="description" rows="3" placeholder="Short Description"></textarea>
						<span class="text-pink text-12" >use less then 255 characters.</span>
						<br><br>

					
						<label for="showPic" class="color-blue">Choose a cover photo</label>
						<div class="boxImg box-90 box-camera " id="showPic">
							<div class="boxIconCamera">
								<i class="glyphicon glyphicon-camera"></i>
							</div>
							<p class="color-blue text-center" style="margin:0"></p>
						</div>
						<input style="display:none" type="file" name="pic_upload" id="add_pic" OnChange="addPic(this)" accept="image/*"/>
						<br>	
					 </div>	
					 <div class="row" >
						<div class="col-xs-12">
							<div  class="text-center" >
								 <button type="button" class="btn btn-back" style="width:80px" id="backBtn">Back</button>
								 <button type="submit" class="btn btn-info" style="width:80px" id="CREATEtitel">Create</button>
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
	$(document).ready(function(){
		$(".mainDetail").css('background-color', '#fcf8e3');//C1C319
		var user_id = <?php echo $_SESSION['user_id'];?> ;
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
		add_select_option();
		//-------------------------->> เลือกภาพ <<---------------------------
		$('#showPic').bind("click" , function () {
			$('#add_pic').click();
		})
		//-------------------------->> สร้างชื่อนิทาน <<---------------------------
		$("#createform1").on("submit",function(e){  //alert("submit");
			e.preventDefault(); // ปิดการใช้งาน submit ปกติ เพื่อใช้งานผ่าน ajax
			var  Storyname = document.getElementById("Storyname");
			var  selectCategory = document.getElementById("selectCategory");
			var  description = document.getElementById("description");
			var  showStoryname = document.getElementById("showStoryname");
			var  showStoryid = document.getElementById("showStoryid");
			var textToAlert = "";
			var story_id = 0 ;
			////---------------------->> เช็คการกรอกข้อมูล <<---------------------------
			if(Storyname.value == '' ){ textToAlert = " - Create story \n"; }
			if(selectCategory.value == 0 ){ textToAlert = textToAlert+" - Choose category \n"; }
			var str = $('#img3').attr('src');
			if(typeof str === "undefined" ){ textToAlert = textToAlert+" - Choose Picture \n"; }
			if((Storyname.value != '')&&(selectCategory.value != 0 )){
				/*อัพโหลดรูป*/
				//alert("Storyname - "+Storyname.value+"\ndescription - "+description.value+"\nuser_id - "+user_id);
				var formData = new FormData($(this)[0]);
				formData.append("Storyname",Storyname.value);
				formData.append("selectCategory",selectCategory.value);
				formData.append("description",description.value);
				$.ajax({
		            url: 'qs/qs_uploadPic.php',
		            type: 'POST',
				    data: formData,
		            async: false,
		            cache: false,
		            contentType: false,
		            processData: false
		        }).done(function(data){
		               // alert("-"+data+"-");
					if(data == "notsuccess"){
						//alert("");
						$("#exampleModal").modal()// เปิดใช้ popup
						$("#okModalBtn").remove();//ลบปุ่ม ok ออกใหเหลือแต่ปุ่ม cancel
						$(".modal-footer").css("width","110px")//จัดปุ่ม cancel ให้อยู่กึ่งกลาง
						$(".modal-body").html("Failed to create stories, please try again.")  //ใส่ข้อความที่ต้องการ alert
					}
					else if(data != 0){
						story_id = data ; 
						window.location.href="main.php?page=create_page&storyid="+story_id+"";
					}
		        });
				//img = " <div class='col-xs-3 col-lg-2'><button id = 'pic_' value ='"+no+"' onClick = 'pageAddpicture(this.value);' > <img src ='imgStory/img_00.png' style=' width: 45px; height: 45px;' />  </button> </div> "; 
					
			}
			else{ 
				//alert("ข้อมูลไม่ครบ \n"+textToAlert); 
				$("#exampleModal").modal()// เปิดใช้ popup
				$("#okModalBtn").remove();//ลบปุ่ม ok ออกใหเหลือแต่ปุ่ม cancel
				$(".modal-footer").css("width","110px")//จัดปุ่ม cancel ให้อยู่กึ่งกลาง
				$(".modal-body").html(textToAlert)  //ใส่ข้อความที่ต้องการ alert
			}
		});
		
		$("#backBtn").click(function(){
			/*window.location.href="main.php?page=mystory";*/
			<?php 
				if($_SESSION["role_id"]== 0 ){ ///admin
					echo 'window.location.href="main.php?page=admin_manageStory";';
				}
				else if($_SESSION["role_id"]== 1 ){
					echo 'window.location.href="main.php?page=mystory";';
				}
			?>
			//window.location.href="main.php?page=admin_manageStoryEdit";
		});
		
		//-----------เช็คจำนวนตัวอักษร ตอนกรอกชื่อนิทาน------//
		$('#Storyname').keyup(function(){
			var x = document.getElementById("Storyname").value.length ;
			if(x > 25){
				//alert("หัวข้อข่าวต้องมีความยาวระหว่าง 1-25 ตัวอักษร");
				var newstring = document.getElementById("Storyname").value.substring(0,25);
				document.getElementById("Storyname").value = newstring;
			}
		})
		//-----------เช็คจำนวนตัวอักษร คำอธิบายนิทาน------//
		$('#description').keyup(function(){
			var x = document.getElementById("description").value.length ;
			if(x > 180){
				//alert("คำอธิบายต้องมีความยาวระหว่าง 1-180 ตัวอักษร");
				var newstring = document.getElementById("description").value.substring(0,180);
				document.getElementById("description").value = newstring;
			}
		})
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
					//alert("ไม่พบข้อมูล Category");
					$("#exampleModal").modal()// เปิดใช้ popup
					$("#okModalBtn").remove();//ลบปุ่ม ok ออกใหเหลือแต่ปุ่ม cancel
					$(".modal-footer").css("width","110px")//จัดปุ่ม cancel ให้อยู่กึ่งกลาง
					$(".modal-body").html("The Category not found")  //ใส่ข้อความที่ต้องการ alert
				}
			},
			error:function(jqXHR, textStatus, errorThrown){alert(errorThrown);}		
		});
	}
	function addPic(ele) {  // แสดงรูปที่เลือก
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
