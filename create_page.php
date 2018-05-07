<?php
session_start();
$_GET['storyid'];
?>
<br>
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
	<br>
</div>
<script>
	var story_id = <?php echo $_GET['storyid'];?> ;
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
		//alert(story_id);
		//------------------------------------------->> แสดงหน้าเปล่า 10 หน้า <<----------------------------------------
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
		//------------------------------------------->> แสดงชื่อเรื่อง <<----------------------------------------
		$.ajax({
			type:'POST',
			url:'qs/qs_findbookby_id.php',
			dataType: "json",
			data: {storyid:story_id},
			success:function( datajson ) {  
				if(datajson.length !=0){ 
					var showStoryname = document.getElementById("showStoryname");
					showStoryname.innerHTML = ""+datajson[0].story_name+"" ;
				}
				else{
					  alert("ไม่พบข้อมูลหน้านิทาน");
				}
			},
			error:function(jqXHR, textStatus, errorThrown){alert(errorThrown);}		
		});
		///---------------------------- กดตกลงหลังจากเพิ่มหน้าหมดแล้ว---------------------
		$("#finish").click(function(){ 
			//window.location.href="main.php?page=mystory";
			 <?php 
				if($_SESSION["role_id"]== 0 ){ ///admin
					echo 'window.location.href="main.php?page=admin_manageStory";';
				}
				else if($_SESSION["role_id"]== 1 ){
					echo 'window.location.href="main.php?page=mystory";';
				}
			?>
		});
	});
	function pageAddpicture(pageNumber) { // กดปุ่มเลือกหน้าที่จะเพิ่ม เนื้อเรื่องกับภาพ
		alert(story_id+"+"+pageNumber);
		window.location.href="main.php?page=create_page_detail&storyid="+story_id+"&pageid="+pageNumber+"";
		
		/*$(".showCreateTitle").show();
		var  showStoryname = document.getElementById("showStoryname");
		var  showStoryname2 = document.getElementById("showStoryname2");
		var  pageNumber_ = document.getElementById("pageNumber");
		var  showStoryid = document.getElementById("showStoryid");
		var  showStoryid2 = document.getElementById("showStoryid2");
		pageNumber_.value = pageNumber;
		showStoryname2.value = showStoryname.value ;
		//showStoryname2.value = showStoryname.text() ;
		showStoryid2.value = showStoryid.value ;
		$(".showAllPage").hide();*/
	}
</script>
