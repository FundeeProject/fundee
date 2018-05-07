<?php
$_GET['storyid'];
?>
<div class="row adminApproveStoryDetailPage">
	<div class="marginAuto divBtn min-h">
		<div style="background-color: #C1C319;height: 100px;">
			<div class="icon32 icon-close" id="closeBtn"></div>
		</div>
		<div id="boxData" data-id='<?php echo $_GET['storyid']; ?>'><!--get ค่ามาใช้จากหน้าที่ผ่านมาแทนเลข 1-->
			<div class="img" id="showImg" style="background:url(imgStory/56_00.png); top:-80px"></div>
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
				<p class="text-blue" id="textDetail"></p>
			</div>
		</div>
	</div>
	
	
	
</div>





<script type="text/javascript">
	$(document).ready(function(){
		var storyid = <?php echo $_GET['storyid'];?>;
		//สีฟ้าที่ปุ่ม admin
		$(".adminPage").addClass('active')
		$(".storyPage").hide()
		$(".mainDetail").css('background-color', '#fcf8e3');//C1C319
		
		//alert($(".textPopup").val())
		
		$("#closeBtn").click(function(){ 
			window.location.href="main.php?page=admin_approveStory";
		});
		/*$(".deleteBtn").click(function(){ 
		
			//alert("del");
			var txt ="" ;
			var pop = confirm("ต้องการลบนิทานหรือไม่ ?");
			
			if (pop == true) {
				$.ajax({
					type:'POST',
					url:'qs/qs_admin_deleteStory.php',
					dataType: "text",
					data: {storyid:storyid},
					success:function( datajson ) {  
						//-----------ลบแล้วกลับไปหน้าแอดมินแอพพรูพ------------//
						if(datajson == "ok"){ 
							alert( "ลบแล้ว" );
							window.location.href="main.php?page=admin_approveStory";
						}
						else{
							  alert("ลบผิดพลาด กรุณาลองใหม่");
						}
					},
					error:function(jqXHR, textStatus, errorThrown){alert("การส่งข้อมูลผิดพลาด"+errorThrown);}		
				});
			} 
			else {
				//"ยกเลิก";
			}
		});*/
		$(".playBtn").click(function(){ 
			//alert("ทำด้วย");
			window.location.href = "full_page.php?storyid="+storyid+"";
		});
		/*$(".approveBtn").click(function(){ 
		
			var newId =  $('#boxData').data("id") ;
			var pop = confirm("อนุมัตินิทานหรือไม่ ?");
			
			if (pop == true) {
				$.ajax({
					type:'POST',
					url:'qs/qs_admin_approveStory.php',
					dataType: "text",
					data: {storyid:newId},
					success:function( datajson ) {  
						//--------------อนุมัติสำเร็จแล้วถึงเปลี่ยนหน้า--------------
						if(datajson == "ok"){ 
							alert( "อนุมัติแล้ว" );
							window.location.href="main.php?page=admin_approveStory";
						}
						else{
							alert("ผิดพลาด กรุณาลองใหม่");
						}
					},
					error:function(jqXHR, textStatus, errorThrown){alert("การส่งข้อมูลผิดพลาด"+errorThrown);}		
				});
			}else{
				//------กดยกเลิกก็อยู่ที่เดิมไม่ต้องทำไร-----------
			}
		});
		*/
		
		
		/////////////////////////////////
		$(".approveBtn").click(function(){
			$('.exampleModal').modal('show');
			$(".modal-body").html("Approve!!")
			apv ()
		})
		
		
		$(".deleteBtn").click(function(){
			$('.exampleModal').modal('show');
			$(".modal-body").html("ยืนยันการลบข้อมูล")
			aa ()
		})
		
		
		
		
		
		/////////////////////////////////
		/*--------------ดึงข้อมูลจาก DB มาแสดง ตอนโหลดหน้านี้มา-------*/
		var storyid = <?php echo $_GET['storyid']; ?>;
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
	
	
	
	function apv (){
		alert("1")
		//
		
		$(".okBtn").click(function(e){
			
			//$("#okModalBtn").hide()
			/*
			var newId =  $('#boxData').data("id") ;
			var pop = confirm("อนุมัตินิทานหรือไม่ ?");
			
			if (pop == true) {
				$.ajax({
					type:'POST',
					url:'qs/qs_admin_approveStory.php',
					dataType: "text",
					data: {storyid:newId},
					success:function( datajson ) {  
						//--------------อนุมัติสำเร็จแล้วถึงเปลี่ยนหน้า--------------
						if(datajson == "ok"){ 
							alert( "อนุมัติแล้ว" );
							window.location.href="main.php?page=admin_approveStory";
						}
						else{
							alert("ผิดพลาด กรุณาลองใหม่");
						}
					},
					error:function(jqXHR, textStatus, errorThrown){alert("การส่งข้อมูลผิดพลาด"+errorThrown);}		
				});
			}else{
				//------กดยกเลิกก็อยู่ที่เดิมไม่ต้องทำไร-----------
				$('.exampleModal').modal('hide');
			}*/
			
			
			
		})
	}
	
</script>