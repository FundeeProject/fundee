<div class="row storyPage">
	<div class="marginAuto divBtn">
		<center>
		<div class="marginAuto" style="height:auto;">
			<!----><br>
			<form class="form-horizontal" method="post" name="" id="">
				<p class="text-blue"><b>MY STORY</b></p>
				<div id="btCerate" class="btn icon-add btn-circle" style="top:47px;width:40px;height:40px;"><i class="icon-new"></i></div>
				<select name="Myselect" id="Myselect"  class="form-control myselect text-blue" style="width: 240px; margin-left: -20;">
					<option value="9" selected>All my stories</option>
					<option value="0" >Private story</option>
					<option value="1" >waiting for approve</option>
					<option value="2" >Public story</option>
				</select>
				</br>
				
				<div id="homeStory" class="form-group">
					<div class='row'  style="width:95%" id="showHomeStory" ></div>
				</div> 
				<div style="width:270px;"  class="objectCenter">
					
				</div>
			</form>
			<br>
			
		</div>
		</center>
		
	</div>	
</div>

<script type="text/javascript">
$(document).ready(function(){
	
	$(".storyPage").addClass('active');
	$(".adminPage").hide();
	$(".mainDetail").css('background-color', '#fcf8e3');//C1C319
	//=======================>>>>> โหลดนิทานทั้งหมดของ user <<<<<=======================
	var Myselect = document.getElementById("Myselect").value;
		callStoryByStatus(Myselect);
	//=======================>>>>> โหลดนิทานเมื่อมีการเลือกดูตามสถานะ <<<<<======================
	$( "#Myselect" ).change(function() {  
		$("#showHomeStory").empty(); 
		callStoryByStatus(Myselect);
	});
	//=======================>>>>> กดบวก สร้างนิทาน <<<<<==================
	$("#btCerate").click(function(){ //// เมื่อกดปุ่มเครื่องหมาย +
		//alert("create");
		window.location.href="main.php?page=create_story";
	});
});
	//=======================>>>>> ฟังชัน โหลดนิทานตามสถานะ <<<<<======================
function callStoryByStatus(status_id) { 
	//alert(pageNumber);
	var Myselect = document.getElementById("Myselect").value;
	var showHomeStory =	document.getElementById("showHomeStory");
		
	$.ajax({
		type:'POST',
		url:'qs/qs_findbook.php',
		dataType: "json",
		data: {Myselect:Myselect},
		success:function( datajson ) { 
			var img = "";		
			if(datajson.length !=0){
				$('#showHomeStory').empty();
				$.each(datajson, function(i,item){
					var iconShare = "";
					if(datajson[i].status_id == 0){ /*----------ยังไม่กดแชร์-----------*/
						iconShare ='<div class="typeIcon icon-share1 shareStory" data-img='+datajson[i].story_id+' style="top:-50px;right:-26px;" data-toggle="modal" data-target="#modalApprove"></div>';
					}else if(datajson[i].status_id == 1){ /*----------กดแชร์แล้วรออนุมัติ-----------*/
						iconShare ='<div class="typeIcon icon-wait " data-img='+datajson[i].story_id+' ></div>';
					}else if(datajson[i].status_id == 2){ /*----------อนุมัติแล้ว-----------*/
						iconShare ='<div class="typeIcon icon-share2 " data-img='+datajson[i].story_id+' ></div>';
					}
					if(datajson[i].story_pic == 'NULL' ){
						img = '<div class="col-xs-4 col-lg-2  boxImg"> '+
										'<div class="h100 "> '+
											'<div class="img" style="background:url(imgStory/img_00)"></div> '+iconShare+
											'<div class="homeIcon icon-play viewDetail" data-img='+datajson[i].story_id+'></div>'+
											<!--1. ปุ่มที่แสดงบนหนังสือ ทำต่อด้วย!!!!!!!!!!!!!!!!-->
										'</div>'+
										'<p class="text-blue">'+cutStoryName(datajson[i].story_name) + '</p>'+
									'</div>';
					}else{
						img = '<div class="col-xs-4 col-lg-2  boxImg"> '+
										'<div class="h100 " data-img='+datajson[i].story_id+'> '+
											'<div class="img"  style="background:url(imgStory/'+ datajson[i].story_pic+')"></div> '+iconShare+
											'<div class="homeIcon icon-play viewDetail" data-img='+datajson[i].story_id+'></div>'+
										'</div>'+
										'<p class="text-blue">'+cutStoryName(datajson[i].story_name) + '</p>'+
									'</div>';
					}
					$('#showHomeStory').append(img);
				});	
				
				
				$(".viewDetail").click(function(){ 
					var thisId = $(this).data('img');
					//alert(thisId);
					window.location.href="main.php?page=play_storydetail_formystory&storyID="+thisId+"&formPage=mystory";
				});	
				
				
				
				$(".shareStory").click(function(){  
				
					var thisId = $(this).data('img'); //alert(thisId);
					$(".modal-body").html("Do you want to publish this story?");
					$("#okBtn").click(function(){
						//alert(thisId+"------กดแชร์")	
						
							$.ajax({
								type:'POST',
								url:'qs/qs_user_shareStory.php',
								dataType: "text",
								data: {storyid:thisId},
								success:function( datajson ) {  
								// $('#exampleModal').modal('hide');
								 //$('#myModal').modal('hide')
									/*$("#exampleModal").modal()// เปิดใช้ popup
									$("#okModalBtn").remove();//ลบปุ่ม ok ออกใหเหลือแต่ปุ่ม cancel
									$(".modal-footer").css("width","110px")//จัดปุ่ม cancel ให้อยู่กึ่งกลาง
									$(".modal-body").html("The Category not found")  //ใส่ข้อความที่ต้องการ alert*/
								
									//----------ลบแล้วกลับไปหน้าแอดมินแอพพรูพ------------
									if(datajson == "ok"){ 
										window.location.href="main.php?page=mystory";

									}
									else{
										alert("แชร์ผิดพลาด กรุณาลองใหม่");
									}
								},
								error:function(jqXHR, textStatus, errorThrown){
									//alert("การส่งข้อมูลผิดพลาด1"+errorThrown);
								}		
							});
							
						
					});
				
				});	
				
				
			}
			else{
				$('#showHomeStory').append("<p class='text-blue text-center'>Not have story in this status </p>");
			}
			
		},
		error:function(jqXHR, textStatus, errorThrown){alert("การส่งข้อมูลผิดพลาด2"+errorThrown);}		
	});
}
/*-----------------------ฟังชันตัดชื่อนิทาน-----------------*/
	function cutStoryName (storyname){
		var nameLength = storyname.length;
		var newString = storyname;
		if(nameLength >= 7 ){
			newString = storyname.substring(0, 11)+"..";
		}
		return newString;
	}
	
</script>


<!--
1. ปุ่มที่แสดงบนหนังสือ มีปุ่ม play : <div class="homeIcon icon-play"></div> และ buy : <div class="homeIcon icon-buy"></div> ตอนนี้ขาดการเช็คสถานะปุุ่ม ()
2. $(".viewDetail") ทำต่อว่ากดแล้วไปหน้า story ยังไม่ได้ทำรอมิ้นทำหน้า story ครบ
3. ปุ่มแสดง เงิน
4. ออกจากระบบ
-->