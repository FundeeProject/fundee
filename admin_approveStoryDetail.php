<div class="row adminApproveStoryDetailPage">
	<div class="marginAuto divBtn min-h">
		<div style="background-color: #C1C319;height: 100px;">
			<div class="icon32 icon-close" id="closeBtn"></div>
		</div>
		<div id="boxData" data-id='1'><!--get ค่ามาใช้จากหน้าที่ผ่านมาแทนเลข 1-->
			<div class="img" style="background:url(imgStory/56_00.png); top:-80px"></div>
			<div class="divIcon" style="">
				<div class="icon32 icon-delete2 deleteBtn" id=""></div>
				<div class="icon48 icon-play playBtn"></div>
				<div class="icon32 icon-approve approveBtn" >
					<input class="textPopup" type='hidden' value='aaaaaaaaaa'/>
				</div>
			</div>
			<div style="position: relative;top: -30px;">
				<p class="clearMargin text-center text-red"><b>Story Name  : <span id="textStoryName"></span></b></p>
				<p class="clearMargin text-center text-blue"><b>Category : <span class="text-black"  id="textCategory"></span></b></p>
				<p class="clearMargin text-center text-pink"><b>Creator : <span id="textCreate"></span></b></p>
				<p class="text-blue" id="textDetail"> </p>
			</div>
		</div>
		
		<!--
		<div class="icon24 icon-close"></div>
		<div class="img" style="background:url(imgStory/56_00.png)"></div>
		<div class="divIcon" style="height: 40px;">
			<div class="icon32 icon-delete2 deleteBtn"></div>
			<div class="icon48 icon-play playBtn"></div>
			<div class="icon32 icon-approve approveBtn"></div>
		</div>
		<div style="position:rerative">
			<p class="clearMargin text-center text-red"><b>Story Name  : <span id="textStoryName">ddddd</span></b></p>
			<p class="clearMargin text-center text-blue"><b>Category : <span class="text-black"  id="textCategory">ddddd</span></b></p>
			<p class="clearMargin text-center text-pink"><b>Creator : <span id="textCreate">ddddd</span></b></p>
			<p class="text-blue" style=" text-indent:10px; margin:10px; 2px">สุนัขจิ้งจอกตัวหนึ่งกระหายน้ำมาก มันเห็นพวงองุ่น จึงคิดจะกินดับกระหาย มันพยายามกระโดด แต่จนแล้วจนเล่า มันก็ไม่สามารถกระโดดถึงพวงองุ่น </p>
		</div>
		-->
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		//สีฟ้าที่ปุ่ม admin
		$(".adminPage").addClass('active')
		$(".storyPage").hide()
		$(".mainDetail").css('background-color', '#fcf8e3');//C1C319
		
		//$(".img")
		$("#textStoryName").text("Super ทารก")
		$("#textCategory").text("Fantacy")
		$("#textCreate").text("Nan")
		$("#textDetail").text("สุนัขจิ้งจอกตัวหนึ่งกระหายน้ำมาก มันเห็นพวงองุ่น จึงคิดจะกินดับกระหาย มันพยายามกระโดด แต่จนแล้วจนเล่า มันก็ไม่สามารถกระโดดถึงพวงองุ่น")
		
		$("#closeBtn").click(function(){ 
			window.location.href="main.php?page=admin_approveStory"
		});
		$(".deleteBtn").click(function(){ 
			
		});
		$(".playBtn").click(function(){ 
			alert("ทำด้วย")
		});
		$(".approveBtn").click(function(){ 
		
				
				var newId =  $('#boxData').data("id") 
				alert(newId)
				
				// !!!!!!!!!!!!!!!!!!!!!!!!  ถ้า approve สำเร็จถึงเปลี่ยนหน้า !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
				window.location.href="main.php?page=admin_approveStory"
				
			
		});
		
		
		
		
		
		
		
	

		
		
	});
	
	function chk (c){
		alert(c)
		if (c == "del"){
			$(".okBtn").click(function(){
				alert("55555555555555")
				/*
				var newId =  $('#boxData').data("id") 
				alert(newId)
				
				// !!!!!!!!!!!!!!!!!!!!!!!!  ถ้า approve สำเร็จถึงเปลี่ยนหน้า !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
				window.location.href="main.php?page=admin_approveStory"
				*/
			});
		}
		if (c == "apv"){
			
			$(".okBtn").click(function(){
				alert("11111111")
				/*
				var newId =  $('#boxData').data("id") 
				alert(newId)
				
				// !!!!!!!!!!!!!!!!!!!!!!!!  ถ้า approve สำเร็จถึงเปลี่ยนหน้า !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
				window.location.href="main.php?page=admin_approveStory"
				*/
			});
		}
		
	}
</script>