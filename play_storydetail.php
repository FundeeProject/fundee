<?php
$_GET['storyID'];
$_GET['pagename'];
?>
<div class="row adminApproveStoryDetailPage">
	<div class="marginAuto divBtn min-h">
		<div style="background-color: #C1C319;height: 100px;">
			<div class="icon32 icon-close" id="closeBtn"></div>
		</div>
		<div id="boxData" data-id='<?php echo $_GET['storyID']; ?>'><!--get ค่ามาใช้จากหน้าที่ผ่านมาแทนเลข 1-->
			<div class="img" id="showImg" style="background:url(imgStory/56_00.png); top:-80px"></div>
			<div class="divIcon" style="">
				<!-- <div class="icon32 icon-delete2 deleteBtn" id=""></div>-->
				<div class="icon48 icon-play playBtn"></div>
				<!-- <div class="icon32 icon-edit approveBtn" >
					<input class="textPopup" type='hidden' value='aaaaaaaaaa'/>
				</div>-->
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
		var formpagename = "<?php echo $_GET['pagename'];?>";
		<?php 
			if($_SESSION["role_id"]== 0 ){
				echo "$('.storyPage').hide(); ";
			}
			else if($_SESSION["role_id"]== 1 ){
				echo "$('.adminPage').hide(); ";
			}
			if($_GET['pagename'] == "category"){
				echo " $('.categoryPage').addClass('active'); ";
			}else if($_GET['pagename'] == "home"){
				echo " $('.homePage').addClass('active'); ";
			}
		?>
		$(".mainDetail").css('background-color', '#fcf8e3');//C1C319
		
		/*-------------------กดกากบาท----------------------*/
		$("#closeBtn").click(function(){ 
			//window.location.href="main.php?page=home";
			window.history.back();
		});
		
		
		/*-------------------กดเล่นนิทาน----------------------*/
		$(".playBtn").click(function(){ 
			window.location.href = "full_page.php?storyid="+storyid+"";
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