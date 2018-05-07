<?php
$_GET['storyID'];
$_GET['formPage'];
?>
<div class="row adminApproveStoryDetailPage">
	<div class="marginAuto divBtn min-h">
		<div style="background-color: #C1C319;height: 100px;">
			<div class="icon32 icon-close" id="closeBtn"></div>
		</div>
		<div id="boxData" data-id='<?php echo $_GET['storyID']; ?>'><!--get ค่ามาใช้จากหน้าที่ผ่านมาแทนเลข 1-->
			<div class="img" id="showImg" style="background:url(imgStory/56_00.png); top:-80px"></div>
			<div class="divIcon" style="">
				<div class="icon32 icon-delete2 deleteBtn" id=""></div>
				<div class="icon48 icon-play playBtn"></div>
				<div class="icon32 icon-edit approveBtn" >
					<input class="textPopup" type='hidden' value='aaaaaaaaaa'/>
				</div>
			</div>
			<div style="position: relative;top: -30px;">
				<p class="clearMargin text-center text-red"><b>Story Name  : <span id="textStoryName"></span></b></p>
				<p class="clearMargin text-center text-blue"><b>Category : <span class="text-black"  id="textCategory"></span></b></p>
				<p class="clearMargin text-center text-pink"><b>Creator : <span id="textCreate"></span></b></p>
				<p class="text-blue" id="textDetail"></p>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		var storyid = <?php echo $_GET['storyID'];?>;
		var formPage = "<?php echo $_GET['formPage'];?>";
		var statusid ;
		//สีฟ้าที่ปุ่ม admin
		
		
			<?php 
			if($_GET['formPage'] == "admin_manageStory"){
				echo "$('.storyPage').hide(); ";
				echo " $('.adminPage').addClass('active'); ";
				//echo " $('.categoryPage').addClass('active'); ";
			}else if($_GET['formPage'] == "mystory"){
				echo "$('.adminPage').hide(); ";
				echo " $('.storyPage').addClass('active'); ";
			}
			
			/*if($_GET['pagename'] == "category"){
				echo " $('.categoryPage').addClass('active'); ";
			}else if($_GET['pagename'] == "home"){
				echo " $('.homePage').addClass('active'); ";
			}*/
		?>
		//$(".storyPage").addClass('active')
		//$(".adminPage").hide()
		$(".mainDetail").css('background-color', '#fcf8e3');//C1C319
		
		/*-------------------กดกากบาท----------------------*/
		$("#closeBtn").click(function(){ 
			//window.location.href="main.php?page=mystory";
			window.history.back();
		});
		
		/*-------------------กดลบนิทาน----------------------*/
		$(".deleteBtn").click(function(){ 
			var pop = confirm("ต้องการลบนิทานหรือไม่ ?");
			if (pop == true) {
				$.ajax({
					type:'POST',
					url:'qs/qs_admin_deleteStory.php',
					dataType: "text",
					data: {storyid:storyid},
					success:function( datajson ) {  
						/*-----------ลบแล้วกลับไปหน้ามายสตอรี่------------*/
						if(datajson == "ok"){ 
							alert( "ลบแล้ว" );
							window.location.href="main.php?page=mystory";
						}
						else{
							  alert("ลบผิดพลาด กรุณาลองใหม่");
						}
					},
					error:function(jqXHR, textStatus, errorThrown){alert("การส่งข้อมูลผิดพลาด"+errorThrown);}		
				});
			} 
			else {}//"ยกเลิก";
			
		});
		/*-------------------กดเล่นนิทาน----------------------*/
		$(".playBtn").click(function(){ 
			window.location.href = "full_page.php?storyid="+storyid+"";
		});
		/*-------------------กดแก้ไข----------------------*/
		$(".approveBtn").click(function(){ 
			var newId =  $('#boxData').data("id") ;
			//alert("***********ทำต่อด้วย***");
			if(statusid == 2 && formPage == "mystory"){alert("อนุมัติแล้ว แก้ไขไม่ได้");}
			else{
				window.location.href="main.php?page=uesr_edit_story&storyidToEdit="+newId;
			}
			
			
		});
		
		/*--------------ดึงข้อมูลจาก DB มาแสดง ตอนโหลดหน้านี้มา-------*/
		$.ajax({ 
			type:'POST',
			url:'qs/qs_findbookby_id.php',
			dataType: "json",
			data: {storyid:storyid},
			success:function( datajson ) { 
				var img = "";
				if(datajson.length !=0){
					//$(".img")
					$("#textStoryName").text(datajson[0].story_name);
					$("#textCategory").text(datajson[0].category_name);
					$("#textCreate").text(datajson[0].username);
					$("#textDetail").text(""+datajson[0].story_description+"");
					document.getElementById("showImg").style.background = "url('imgStory/"+datajson[0].story_pic+"')";
					statusid = datajson[0].status_id;
				}
				else{
					  alert("ไม่พบนิทาน");
					  //window.location.href = "index.php";
				}
				
				
		
			},
			error:function(jqXHR, textStatus, errorThrown){alert(errorThrown);}		
		});
		
	});
</script>