<div class="row homePage">
	<div class="marginAuto divBtn">
		<center>
		<div class="marginAuto" style="height:auto;">
			<!----><br>
			<form class="form-horizontal" method="post" name="" id="">
				<div class="form-group marginAuto" style="width: 250px;">
					<select name="Myselect" id="Myselect"  class="form-control myselect">
						<option value="9" selected>ทั้งหมด</option>
						<option value="0" >ยังไม่แชร์</option>
						<option value="1" >รออนุมัติ</option>
						<option value="2" >อนุมัติแล้ว</option>
					</select>
				</div>  
				<p class="marginT20" style="">All Story</p>
				<div id="homeStory" class="form-group">
					<div class='row'  style="width:95%" id="showHomeStory" ></div>
				</div> 
				<div style="width:270px;"  class="objectCenter">
					<div id="btCerate" class="btn icon-add btn-circle"><i class="icon-new"></i></div>
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
		alert("create");
		window.location.href="main.php?page=create_story";
		//var show = document.getElementById("show1");
		//$(".show_mystory").hide();
		//$(".showAllPage").hide();
		//$(".showCreateTitle").hide();
		//$(".showCreate").show();
		
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
				$.each(datajson, function(i,item){
					var iconShare ='<div class="homeIcon icon-folder shareStory" data-img='+datajson[i].story_id+' ></div>';
					if(datajson[i].story_pic == 'NULL' ){
						img = '<div class="col-xs-4 col-lg-2  boxImg"> '+
										'<div class="h100 "> '+
											'<div class="img" style="background:url(imgStory/img_00)"></div> '+iconShare+
											'<div class="homeIcon icon-play viewDetail" data-img='+datajson[i].story_id+'></div>'+
											<!--1. ปุ่มที่แสดงบนหนังสือ ทำต่อด้วย!!!!!!!!!!!!!!!!-->
										'</div>'+
										'<p>'+datajson[i].story_name + '</p>'+
									'</div>';
					}else{
						img = '<div class="col-xs-4 col-lg-2  boxImg"> '+
										'<div class="h100 " data-img='+datajson[i].story_id+'> '+
											'<div class="img"  style="background:url(imgStory/'+ datajson[i].story_pic+')"></div> '+iconShare+
											'<div class="homeIcon icon-play viewDetail" data-img='+datajson[i].story_id+'></div>'+
										'</div>'+
										'<p>'+datajson[i].story_name + '</p>'+
									'</div>';
					}
					$('#showHomeStory').append(img);
				});	
					
				$(".viewDetail").click(function(){ 
					var thisId = $(this).data('img');
					//alert(thisId);
					window.location.href="main.php?page=play_storydetail_formystory&storyID="+thisId+"";
				});	
				$(".shareStory").click(function(){ 
					var thisId = $(this).data('img');
					alert(thisId+"------กดแชร์")	
					//window.location.href="main.php?page=play_storydetail_formystory&storyID="+thisId+"";
				});	
			}
			else{
				alert("ไม่พบข้อมูลนิทาน ");
			}
			
		},
		error:function(jqXHR, textStatus, errorThrown){alert(errorThrown);}		
	});
}
	
</script>


<!--
1. ปุ่มที่แสดงบนหนังสือ มีปุ่ม play : <div class="homeIcon icon-play"></div> และ buy : <div class="homeIcon icon-buy"></div> ตอนนี้ขาดการเช็คสถานะปุุ่ม ()
2. $(".viewDetail") ทำต่อว่ากดแล้วไปหน้า story ยังไม่ได้ทำรอมิ้นทำหน้า story ครบ
3. ปุ่มแสดง เงิน
4. ออกจากระบบ
-->