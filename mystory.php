<style>
	#showStory .col-xs-3 ,
	#showpic_Allpage .col-xs-3{
		padding-left: 0px;
		padding-right: 0px;
		margin-bottom: 10px;
	}
	#Myselect{
		border: 1px solid #31708f;
	}
</style>
 
<body >
<div class="dd">
<center>
<div id = "show1" class = "show_mystory"> <!-- แสดงนิทานทั้งหมดของเรา -->
 <p>My Story</p>
	<form class="form-horizontal" method="post" name="" id="">
		<div class="form-group marginAuto" style="width: 250px;">
			<select name="Myselect" id="Myselect"  class="form-control myselect">
				<option value="1" selected>All</option>
				<option value="0" >My Create</option>
			</select>
		</div> 
		<div id="showStory" class="form-group">
		
		</div> 
	</form>
</div> 
<!-- แสดงหน้าสร้างชื่อนิทานและรูปหน้าปก -->
<!--
<div id = "showCreate" class = "showCreate"> 
	<form class="marginT20" style="width :90%; margin-left:auto; margin-right:auto; " method = "post" enctype = "multipart/form-data" id = "createform1" >
	  <div class="form-group">
		<label for="Storyname">Story Name</label>
		<input type="text" class="form-control" id="Storyname" aria-describedby="emailHelp" placeholder="">
	  </div>
	  <div class="form-group">
		<label for="exampleFormControlSelect2">Category</label>
		<select class="form-control" id="selectCategory">
		  <option value="0">Select Category</option>
		</select>
	  </div>
	  <div class="form-group">
		<label for="description">Short Description</label>
		<textarea class="form-control" id="description" rows="3"> - </textarea>
	  </div>
	  <div class="form-group">
		<label for="showPic">choose a cover photo</label>
		<div id = "showPic" class="box" style="width:90px; height:90px; margin-left:auto; margin-right:auto; border: 1px solid #085b6b;">
			<span class="glyphicon glyphicon-plus" style="margin-left: 35px;margin-top: 30px;"></span>
		</div>
		<input type="file" name="pic_upload" OnChange="Preview(this)"/>
	  </div>
	  <div class="btn-confirm">
			<button type="submit" id = "CREATEtitel" class="btn btn-primary btn-confirm"  >CREATE</button>
	  </div>
	</form>
</div> 
-->
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
						<div class="new_Btn box-90 box-camera" id = "showPic">
							<i class="fa fa-camera"></i>
						</div><br>
						
						<input type="file" name="pic_upload" id="html_btn"  OnChange="Preview(this)"/>
					 </div>	
					 <div class="row" >
						<div class="col-xs-12">
							<div  class="text-center" >
								 <button type="submit" class="btn btn-info" style="" id="CREATEtitel">CREATE</button>
							</div>
							<p class="marginB10"></p>
						</div>
					</div>			
				</div>
			</center>
		  </div>
	</form>
</div>	
<!-- แสดงหน้าเพิ่มรูปนิทานและอัดเสียง 10หน้า-->
<div id = "showAllPage" class = "showAllPage marginAuto myStoryPage"> 
	<form class="marginT20 marginAuto" style="width :90%; ">
		<div class="form-group">
			<label for="">Story Name : <span id="showStoryname"></span></label>
			<input type="hidden" class="form-control" id="showStoryid">
		</div>
	</form>
	<div class="form-group paddingT10 marginAuto divBtn" style="height: 260px;">
		<center>
		<div class="marginAuto marginB20" style="width:90%; height:auto;">
			<div id = "showpic_Allpage"></div>
		</div>
		</center>
	</div>
	<div class="btn-confirm">
		<button type="button" id = "finish" class="btn btn-primary btn-confirm"  >Finish</button>
	</div>
</div>


<!-- แสดงหน้าเพิ่มรูปนิทานและอัดเสียง -->
<div id = "showCreateTitle" class = "showCreateTitle" style="display:none;"> 
	<form class="marginT20" style="width :90%; margin-left:auto; margin-right:auto; "  method = "post" enctype = "multipart/form-data" id = "createform2">
		<div class="form-group">
			<label for="">Story Name : <span id="showStoryname2"></span></label>
			<!--<input type="text" class="form-control" id="showStoryname2"  placeholder="">-->
			<input type="text" class="form-control" id="showStoryid2"  placeholder="">
			<input type="text" class="form-control" id="pageNumber"  placeholder="">
		</div>
		<div class="form-group">
			<label for="">Audio Recording </label>
			<div class="box-img" style="width:90%" >
				<div class="box-text-number">
					<p class="text-center">1</p>
				</div>
				<div class="objectCenter new_Btn2 " style="top:40%" id = "showPic_page">
					<!--<i class="fa fa-camera" style="font-size:24px"></i>--> Add Pic
				</div>
				
				<input type="file" name="pic_upload_page" id="html_btn2" OnChange="PreviewPage(this)"/>
				
				<p class="text-center objectCenter" style="top:55%">Add Picture</p>
			</div>
			<div style="display:none;" id = "show_description_page">
				<label for="description_page" class="marginT10 color-blue">เนื้อเรื่อง</label>
				<textarea class="form-control marginB20" id="description_page" rows="3">  </textarea>
			</div>
			
		</div>
		
		<div class="row marginB20" style="margin-top: -10px;">
			<div class="col-xs-3 col-sm-3">
				<div id="" class="form-group form-group-sm">
					<div class="bg-btn btn-create" style="margin-left:40px;" id="editText">
						<!-- <i class="fa fa-car" ></i> --> Edit
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
						<!-- <i class="fa fa-microphone" style=""></i>--> Audio
					</div>
					<input type="file" name="audio_upload" id="audio_upload" />
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
		<div class="btn-confirm btn-ok">
			<button type="submit" id = "SavePage" class="btn btn-primary wp100">SavePage</button>
		</div>							  
	</form>
</div>
<div style="width:270px" class="objectCenter">
	<div id="btCerate" class="btn btn-warning btn-circle"><i class="fa fa-plus"></i></div>
</div>
<!--<button id="btCerate" class=" w3-button w3-circle w3-yellow pull-right  w3-large fa fa-plus"></button>-->
<br>
<br>
</center>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>    
<script>
$(document).ready(function(){
	
	$(".storyPage").addClass('active')
	$(".adminPage").hide()
	$(".showCreate").hide();
	$(".showAllPage").hide();
	$(".showCreateTitle").hide();
	
	////
	$('.new_Btn').bind("click" , function () {
        $('#html_btn').click();
    });
	
	$('.new_Btn2').bind("click" , function () {
        $('#html_btn2').click();
    });
	
	
	
	add_select_option();
	var Myselect = document.getElementById("Myselect").value;
	$.ajax({ //// เริ่มต้นมาให้ดึงนิทานทั้งหมดที่เป็นของ user มาแสดง
		type:'POST',
		url:'qs/qs_findbook.php',
		dataType: "json",
		data: {Myselect:Myselect},
		success:function( datajson ) { 
			/*		
			if(datajson.length !=0){
				 $.each(datajson, function(i,item){
					var no =i+1;
					if(datajson[i].story_pic == 'NULL' ){
						var img = " <button id = 'pic' value ='"+datajson[i].story_id + "' onClick = 'seeStory(this.value);' > <img src ='imgStory/img_00.png' style=' width: 90px; height: 90px;' />  </button> "; 
					}else{
						var img = " <button id = 'pic' value ='"+datajson[i].story_id + "' onClick = 'seeStory(this.value);' > <img src ='imgStory/"+ datajson[i].story_pic + "'  style=' width: 90px; height: 90px;' />  </button>"; 
					}
					$('#showStory').append(img);	
				});	
			}
			else{
				  alert("ไม่พบข้อมูลผู้ใช้");
				  //window.location.href = "index.php";
			}*/
			var img = "";
			if(datajson.length !=0){
				 $.each(datajson, function(i,item){
					var no =i+1;
					if(datajson[i].story_pic == 'NULL' ){
						//img += "<div class='col-xs-3 col-lg-2'> <button id = 'pic' value ='"+datajson[i].story_id + "' onClick = 'seeStory(this.value);' > <img src ='imgStory/img_00.png' style=' width: 45px; height: 45px;' />  </button> </div>"; 
						//img +="<div class='col-xs-4 col-lg-2  boxImg'><div class='h100 testClick'><img src ='http://d28hgpri8am2if.cloudfront.net/book_images/cvr9780857071934_9780857071934_hr.jpg'/></div></div>"
						img +="<div class='col-xs-4 col-lg-2  boxImg'><div class='h100 testClick'><input type='hidden'  value ='"+datajson[i].story_id+"'><img src ='imgStory/img_00.png'/></div></div>"
					}else{
						img +="<div class='col-xs-4 col-lg-2  boxImg'><div class='h100 testClick'><input type='hidden'  value ='"+datajson[i].story_id+"'><img src ='imgStory/"+ datajson[i].story_pic + "'/></div></div>";
						//img += "<div class='col-xs-3 col-lg-2'> <button id = 'pic' value ='"+datajson[i].story_id + "' onClick = 'seeStory(this.value);' > <img src ='imgStory/"+ datajson[i].story_pic + "'  style=' width: 45px; height: 45px;' />  </button></div>"; 
					}
				});	
				//$('#showStory').append("<div class='row' style='width:95%'>" +img+ "</div>");	
				$('#showStory').append("<div class='row' style='width:95%'>" +img+ "</div>"); 
				$(".testClick").click(function(){ /// กดตกลงหลังจากเพิ่มหน้าหมดแล้ว
				 alert($(this).find("input").val())
				 //seeStory($(this).find("input").val())
				});
			}
			else{
				  //alert("ไม่พบข้อมูลผู้ใช้");
				  //window.location.href = "index.php";
			}
		},
		error:function(jqXHR, textStatus, errorThrown){alert(errorThrown);}		
	});	
	$( "#Myselect" ).change(function() { /// ถ้ามีการเลือก categoyr ให้ไปดึงข้อมูลเฉพาะที่เลือกมาแสดง
		var Myselect = document.getElementById("Myselect").value;
		var showStory =	document.getElementById("showStory");
		$("#showStory").empty(); 
		
		$.ajax({
			type:'POST',
			url:'qs/qs_findbook.php',
			dataType: "json",
			data: {Myselect:Myselect},
			success:function( datajson ) { 
				var img = "";		
				if(datajson.length !=0){
					$.each(datajson, function(i,item){
						var no =i+1;
						if(datajson[i].story_pic == 'NULL' ){
							//var img = " <button id = 'pic' value ='"+datajson[i].story_id+"' onClick = 'seeStory(this.value);' > <img src ='imgStory/img_00.png' style=' width: 45px; height: 45px;' />  </button> "; 
							var	img ="<div class='col-xs-4 col-lg-2  boxImg'><div class = 'h100 testClick'><input type='hidden'  value ='"+datajson[i].story_id+"'><img src ='imgStory/img_00.png'/></div></div>"
						}else{
							//var img = " <button id = 'pic' value ='"+datajson[i].story_id+"' onClick = 'seeStory(this.value);' > <img src ='imgStory/"+ datajson[i].story_pic + "'  style=' width: 45px; height: 45px;' />  </button>"; 
							var img ="<div class='col-xs-4 col-lg-2  boxImg'><div class='h100 testClick'><input type='hidden'  value ='"+datajson[i].story_id+"'><img src ='imgStory/"+ datajson[i].story_pic + "'/></div></div>";						
						}
						$('#showStory').append(img);
					});	
						
					$(".testClick").click(function(){ 
						//alert($(this).find("input").val())
						seeStory($(this).find("input").val())
					});
				}
				else{
					alert("ไม่พบข้อมูลนิทาน ");
					//window.location.href = "index.php";
				}
				
			},
			error:function(jqXHR, textStatus, errorThrown){alert(errorThrown);}		
		});	
	});
	
	$("#btCerate").click(function(){ //// เมื่อกดปุ่มเครื่องหมาย +
		//var show = document.getElementById("show1");
		$(".show_mystory").hide();
		$(".showAllPage").hide();
		$(".showCreateTitle").hide();
		$(".showCreate").show();
		
	});
	$("#createform1").on("submit",function(e){  ///คลิ้กสร้างชื่อนิทาน
		e.preventDefault(); // ปิดการใช้งาน submit ปกติ เพื่อใช้งานผ่าน ajax
		var  Storyname = document.getElementById("Storyname");
		var  selectCategory = document.getElementById("selectCategory");
		var  description = document.getElementById("description");
		var  showStoryname = document.getElementById("showStoryname");
		var  showStoryid = document.getElementById("showStoryid");
		var textToAlert = "";
		var story_id = 0 ;
		if(Storyname.value == '' ){ textToAlert = " - ตั้งชื่อนิทาน \n"; }
		if(selectCategory.value == 0 ){ textToAlert = textToAlert+" - เลือกประเภทนิทาน \n"; }
		if((Storyname.value != '')&&(selectCategory.value != 0 )){
			/*อัพโหลดรูป*/
			var formData = new FormData($(this)[0]);
			formData.append("Storyname",Storyname.value);
			formData.append("selectCategory",selectCategory.value);
			formData.append("description",description.value);
			$.ajax(
			{
	            url: 'qs/qs_uploadPic.php',
	            type: 'POST',
			    data: formData,
	            async: false,
	            cache: false,
	            contentType: false,
	            processData: false
	        }).done(function(data){
	                //alert("-"+data+"-");
				if(data != 0){story_id = data ; }
	        });
			
			$(".show_mystory").hide();
			$(".showCreate").hide();
			$(".showCreateTitle").hide();
			$(".showAllPage").show();
			//showStoryname.value = Storyname.value;
			//alert(Storyname.value)
			$("#showStoryname").html(Storyname.value)
			showStoryid.value = story_id;
			Storyname.value = "";
			description.value = "";
			selectCategory.value = 0 ;
			////// แสดงหน้าทั้งหมด
			//alert("story_id = " + story_id);
			if(story_id != 0){
				$.ajax({
					type:'POST',
					url:'qs/qs_showAllPage.php',
					dataType: "json",
					data: {story_id:story_id},
					success:function( datajson ) {  
						
						var img = "";						
						if(datajson.length !=0){
							$('#showpic_Allpage').empty();
							$.each(datajson, function(i,item){
								var no =i+1;
								if(datajson[i].picture == 'NULL' ){
									img = " <div class='col-xs-3 col-lg-2'><button id = 'pic_' value ='"+no+"' onClick = 'pageAddpicture(this.value);' > <img src ='imgStory/img_00.png' style=' width: 45px; height: 45px;' />  </button> </div> "; 
								}else{
									img = " <div class='col-xs-3 col-lg-2'><button id = 'pic_' value ='"+no+"' onClick = 'pageAddpicture(this.value);' > <img src ='imgStory/"+ datajson[i].picture + "'  style=' width: 45px; height: 45px;' />  </button></div>"; 
								}
								$('#showpic_Allpage').append(img);	
							});	
						}
						else{
							  alert("ไม่พบข้อมูลหน้านิทาน");
						}
					},
					error:function(jqXHR, textStatus, errorThrown){alert(errorThrown);}		
				});
			}
			
		}
		else{ 
			alert("ข้อมูลไม่ครบ \n"+textToAlert); 
		}
	});
	$("#createform2").on("submit",function(e){  ///คลิ้กสร้างหน้านิทาน
		e.preventDefault();
		var  showStoryid2 = document.getElementById("showStoryid2");
		var  pageNumber_ = document.getElementById("pageNumber");
		var  description_page = document.getElementById("description_page");
		var story_id = 0 ;
		var formData2 = new FormData($(this)[0]);
		formData2.append("story_id",showStoryid2.value);
		formData2.append("pageNumber",pageNumber_.value);
		formData2.append("description_page",description_page.value);
		$.ajax({
            url: 'qs/qs_uploadPic_to_page.php',
            type: 'POST',
		    data: formData2,
            async: false,
            cache: false,
            contentType: false,
            processData: false
        }).done(function(data){
                alert("-"+data+"-");
			if(data != 0){
				story_id = data ; 
				$(".show_mystory").hide();
				$(".showCreate").hide();
				$(".showCreateTitle").hide();
				description_page.value = "";
				//// เรียกให้อัพเดทข้อมูล หน้า นิทานอีกครั้ง
				$.ajax({
					type:'POST',
					url:'qs/qs_showAllPage.php',
					dataType: "json",
					data: {story_id:story_id},
					success:function( datajson ) {     
						if(datajson.length !=0){
							$('#showpic_Allpage').empty();
							$.each(datajson, function(i,item){
							 var no =i+1;
							 if(datajson[i].picture == 'NULL' ){
								var img = " <button id = 'pic_' value ='"+no+"' onClick = 'pageAddpicture(this.value);' > <img src ='imgStory/img_00.png' style=' width: 45px; height: 45px;' />  </button> "; 
							 }else{
								var img = " <button id = 'pic_' value ='"+no+"' onClick = 'pageAddpicture(this.value);' > <img src ='imgStory/"+ datajson[i].picture + "'  style=' width: 45px; height: 45px;' />  </button>"; 
							 }
								//var img = $('<tr><td align="center">'+datajson[i].date_borrow+'</td><td align="center">'+datajson[i].date_rent+'</td><td align="center">'+datajson[i].user_id+'</td><td align="center">'+datajson[i].tec_give_id+'</td><td align="center">'+ datajson[i].tec_rent_id+'</td></tr>');
								$('#showpic_Allpage').append(img);	
							});	
						}
						else{
							  alert("ไม่พบข้อมูลหน้านิทาน");
						}
					},
					error:function(jqXHR, textStatus, errorThrown){alert(errorThrown);}		
				});
				$(".showAllPage").show();
			}
        });
		
	});
	
	$("#finish").click(function(){ /// กดตกลงหลังจากเพิ่มหน้าหมดแล้ว
		$(".showCreate").hide();
		$(".showAllPage").hide();
		$(".showCreateTitle").hide();
		$(".show_mystory").show();
		
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
	
	$("#editText").click(function(){ /// กดเพิ่มเนื้อเรื่องนิทาน
		var show_description_page = document.getElementById("show_description_page");
		show_description_page.style.display = "block";
	});
	
});
function Preview(ele) {  // แสดงรูปที่เลือก
	var showPic = document.getElementById("showPic");
	showPic.innerHTML = "<img id='img' src='' alt='' style=' width: 90px; height: 90px;' />";
	$('#img').attr('src', ele.value);
	if (ele.files && ele.files[0]) 
	{
		var reader = new FileReader();
		reader.onload = function (e) 
		{
			$('#img').attr('src', e.target.result);
		}
		reader.readAsDataURL(ele.files[0]);
	}
}
function PreviewPage(ele) {  // แสดงรูปที่เลือก เพจ
	var showPic_page = document.getElementById("showPic_page");
	showPic_page.innerHTML = "<img id='img2' src='' alt='' style=' width: 220px; height: 100%;' />";
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
function pageAddpicture(pageNumber) { // กดปุ่มเลือกหน้าที่จะเพิ่ม เนื้อเรื่องกับภาพ
	alert(pageNumber);
	$(".show_mystory").hide();
	$(".showCreate").hide();
	$(".showCreateTitle").show();
	var  showStoryname = document.getElementById("showStoryname");
	var  showStoryname2 = document.getElementById("showStoryname2");
	var  pageNumber_ = document.getElementById("pageNumber");
	var  showStoryid = document.getElementById("showStoryid");
	var  showStoryid2 = document.getElementById("showStoryid2");
	pageNumber_.value = pageNumber;
	showStoryname2.value = showStoryname.value ;
	//showStoryname2.value = showStoryname.text() ;
	showStoryid2.value = showStoryid.value ;
	$(".showAllPage").hide();
}
function seeStory(pageNumber) { /// กดเลือกเพื่อดู / แก้ไข นิทาน
	alert(pageNumber);
	
}
</script>
</body>

