<?php
//session_start();

?>




<center>
	<label class="marginT20 color-blue" for="Storyname">CATEGORY</label>
	<form class="form-horizontal" method="post" name="" id="">
		<div class="form-group marginAuto marginT10" style="width: 250px;">
			<select class="form-control borderBlue text-blue" id="selectCategory">
				<option value="0">Select Category</option>
			</select>
		</div> 
		<div id="homeStory" class="form-group">
			<div class='row'  style="width:95%" id="showHomeStory" ></div>
		</div> 
	</form>
</center>

<script type="text/javascript">
$(document).ready(function(){
		<?php 
		
			if($_SESSION["role_id"]== 0 ){
				echo " $('.categoryPage').addClass('active'); ";
				echo "$('.storyPage').hide(); ";
			}
			else if($_SESSION["role_id"]== 1 ){
				echo " $('.categoryPage').addClass('active'); ";
				echo "$('.adminPage').hide(); ";
			}
		?>
	$(".mainDetail").css('background-color', '#fcf8e3');//C1C319
	//=======================>>>>> นิทาน <<<<<=======================
	add_select_option();
	//------------------------------ แสดงนิทานตอนโหลดหน้า------------------------//
	$.ajax({
		type:'POST',
		url:'qs/qs_findStory.php',
		dataType: "json",
		data: {searchName:"all"},
		success:function( datajson ) {     
			if(datajson.length !=0){
				$('#showHomeStory').empty();
				$.each(datajson, function(i,item){
					var no = i;
					var imgStory;
					if(datajson[i].story_pic != '' ){
					 		imgStory= '<div class="col-xs-4 col-lg-2  boxImg"> '+
											'<div class="h100 viewDetail" data-img='+datajson[i].story_id+'> '+
												/*'<img src ="imgStory/'+ datajson[i].story_pic+'"/>'+*/
												'<div class="img"  style="background:url(imgStory/'+ datajson[i].story_pic+')"></div> '+
												'<div class="homeIcon icon-play"></div>'+
												<!--1. ปุ่มที่แสดงบนหนังสือ ทำต่อด้วย!!!!!!!!!!!!!!!!-->
											'</div>'+
											'<p class="text-blue">'+cutStoryName(datajson[i].story_name) + '</p>'+
										'</div>';
					}
					else{
							imgStory = '<div class="col-xs-4 col-lg-2  boxImg"> '+
											'<div class="h100 viewDetail"> '+
												'<div class="img" style="background:url(imgStory/img_00)"></div> '+
												'<div class="homeIcon icon-play"></div>'+
												<!--1. ปุ่มที่แสดงบนหนังสือ ทำต่อด้วย!!!!!!!!!!!!!!!!-->
											'</div>'+
											'<p class="text-blue">'+cutStoryName(datajson[i].story_name) + '</p>'+
										'</div>';
					}
					$('#showHomeStory').append(imgStory);
				});
				$(".viewDetail").click(function(){ 
					var thisId = $(this).data('img');
					//alert(thisId+"------>2. ทำต่อด้วย!!!!!!!!!!!!!!!!")	
					window.location.href="main.php?page=play_storydetail&storyID="+thisId+"&pagename=category";
				});				
			}
			else{
				//alert("ไม่พบข้อมูลหน้านิทาน");
			}
		},
		error:function(jqXHR, textStatus, errorThrown){alert(errorThrown);}		
	});
	//////////////////////////////////////////////////////////////////-------------ดึง Category มาแสดง-------------------------//
	function add_select_option(){ 
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
				}
			},
			error:function(jqXHR, textStatus, errorThrown){alert(errorThrown);}		
		});
	}
	/// ---------------------------------ถ้ามีการเลือก categoyr ให้ไปดึงข้อมูลเฉพาะที่เลือกมาแสดง------------------------------
	$( "#selectCategory" ).change(function() { 
		var categoryid = $("#selectCategory").val();
		//alert(categoryid);
		$.ajax({
			type:'POST',
			url:'qs/qs_findbookby_category.php',
			dataType: "json",
			data: {categoryid:categoryid},
			success:function( datajson ) {     
				if(datajson.length !=0){
					$('#showHomeStory').empty();
					$.each(datajson, function(i,item){
						var no = i;
						var imgStory;
						if(datajson[i].story_pic != '' ){
							imgStory= '<div class="col-xs-4 col-lg-2  boxImg"> '+
											'<div class="h100 viewDetail" data-img='+datajson[i].story_id+'> '+
												'<div class="img"  style="background:url(imgStory/'+ datajson[i].story_pic+')"></div> '+
												'<div class="homeIcon icon-play"></div>'+
												<!--1. ปุ่มที่แสดงบนหนังสือ ทำต่อด้วย!!!!!!!!!!!!!!!!-->
											'</div>'+
											'<p class="text-blue">'+cutStoryName(datajson[i].story_name) + '</p>'+
										'</div>';
						}
						else{
							imgStory= '<div class="col-xs-4 col-lg-2  boxImg"> '+
											'<div class="h100 viewDetail" data-img='+datajson[i].story_id+'> '+
												'<div class="img"  style="background:url(imgStory/'+ datajson[i].story_pic+')"></div> '+
												'<div class="homeIcon icon-play"></div>'+
												<!--1. ปุ่มที่แสดงบนหนังสือ ทำต่อด้วย!!!!!!!!!!!!!!!!-->
											'</div>'+
											'<p class="text-blue">'+cutStoryName(datajson[i].story_name) + '</p>'+
										'</div>';
						}
						$('#showHomeStory').append(imgStory);
					});	
				}
				else{
					$('#showHomeStory').empty();
					var imgStory = "<div ><p class='text-blue text-center'> ไม่พบนิทาน </p></div>";
					$('#showHomeStory').append(imgStory);
				}
				
				$(".viewDetail").click(function(){ 
					var thisId = $(this).data('img');
				//	alert(thisId+"------>2. ทำต่อด้วย!!!!!!!!!!!!!!!!")	
				//	window.location.href="main.php?page=play_storydetail&storyID="+thisId+"";
					window.location.href="main.php?page=play_storydetail&storyID="+thisId+"&pagename=category";
				});
			},
			error:function(jqXHR, textStatus, errorThrown){alert(errorThrown);}		
		});
	});
});
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
