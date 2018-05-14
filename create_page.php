<?php
//session_start();
$_GET['storyid'];
?>
<div class="row createPage"> <!-- adminManageStoryEditAllPage-->
	<div class="marginAuto divBtn min-h">
		<p class="text-center text-blue marginT10" ><b>Story Name : <span class="text-orenge" id="textStory"></span> </b></p>
		<div class="marginAuto marginB20" style="width:90%; height:auto;">
			<p style="text-align:  left; font-style:italic; padding-left: 10px;    margin-bottom: 0px;">
				<i class="glyphicon glyphicon-triangle-bottom text-14 text-blue"></i>
				Click button for Add picture and Record
			</p>
			<div class="text-center marginAuto" style="width:95%; height:100%; background-color:#bbd3de; border-radius: 5px;">
			
				<div id="" class="form-group">
					<div class='row marginAuto'  style="width:95%" id="showStory" >
						<!--
					    <div class="col-xs-4 col-lg-2 boxImg"> 
							<div class="viewDetail" > 
								<div class="imgbox icon-page1">
									<div class="iconNbr"><span class="text-white">1<span></div>
								</div> 
							</div>
						</div>
						-->
					</div>
				</div> 
			</div>
			<div class="row marginT20">
				<div class="col-xs-12">
					<div  class="text-center sizeBtn " >
						<button type="button" class="btn btn-back" style="" id="backBtn">Back</button>
						<button type="button" class="btn btn-info" style="" id="updateBtn">Finish</button>
					</div>
					<p class="marginB10"></p>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	var story_id = <?php echo $_GET['storyid'];?> ;
	$(document).ready(function(){
		
		//สีฟ้าที่ปุ่ม admin
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
		//สี bg
		$(".mainDetail").css('background-color', '#fcf8e3');
		
		$("#textStory").text("TEST..........")
		//------------------------------------------->> แสดงชื่อเรื่อง <<----------------------------------------
		$.ajax({
			type:'POST',
			url:'qs/qs_findbookby_id.php',
			dataType: "json",
			data: {storyid:story_id},
			success:function( datajson ) {  
				if(datajson.length !=0){ 
					//var showStoryname = document.getElementById("showStoryname");
					//showStoryname.innerHTML = ""+datajson[0].story_name+"" ;
					$("#textStory").text(datajson[0].story_name)
				}
				else{
					  alert("ไม่พบข้อมูลหน้านิทาน");
				}
			},
			error:function(jqXHR, textStatus, errorThrown){alert(errorThrown);}		
		});
		//วนสร้าง กรอบ img 
	/*	for (i = 1; i < 10; i++) { 
			var div = '<div class="col-xs-4 col-lg-2 boxImg"> '+
							'<div class="viewDetail" >'+
								'<div class="imgbox icon-page1">'+
									'<div class="iconNbr"><span class="text-white">'+i+'<span></div>'+
								'</div>'+
							'</div>'+
					  '</div>'
			$('#showStory').append(div);	
		}*/
		//------------------------------------------->> แสดงหน้าเปล่า 10 หน้า <<----------------------------------------
		$.ajax({
			type:'POST',
			url:'qs/qs_showAllPage.php',
			dataType: "json",
			data: {story_id:story_id},
			success:function( datajson ) {  
				
				var img = "";						
				if(datajson.length !=0){
					$('#showStory').empty();
					$.each(datajson, function(i,item){
						var no =i+1;
						if(datajson[i].picture == 'NULL' ){ 
							var div = '<div class="col-xs-4 col-lg-2 boxImg"> '+
										'<div class="viewDetail"  data-img='+datajson[i].page_number+'>'+
											'<div class="imgbox icon-page1">'+
												'<div class="iconNbr"><span class="text-white">'+no+'<span></div>'+
											'</div>'+
										'</div>'+
								  '</div>'
						}else{
							var div = '<div class="col-xs-4 col-lg-2 boxImg"> '+
										'<div class="viewDetail"  data-img='+datajson[i].page_number+'>'+
											'<div class="imgbox " style = "background-image: url(imgStory/'+datajson[i].picture+');">'+
												'<div class="iconNbr"><span class="text-white">'+no+'<span></div>'+
											'</div>'+
										'</div>'+
								  '</div>'
						}
						$('#showStory').append(div);
					});	
					/*-----------------------เมื่อคลิ้กหน้าแต่ละหน้า-----------------*/
					$(".viewDetail").click(function(){ 
						var thisId = $(this).data('img');
						//alert(story_id+"-"+thisId);
						window.location.href="main.php?page=create_page_detail&storyid="+story_id+"&pageid="+thisId+"";
						//window.location.href="main.php?page=admin_approveStoryDetail&storyid="+thisId+"";
					});
				}
				else{
					  alert("ไม่พบข้อมูลหน้านิทาน");
				}
			},
			error:function(jqXHR, textStatus, errorThrown){alert(errorThrown);}		
		});
		
		$("#backBtn").click(function(){
			window.location.href="main.php?page=uesr_edit_story&storyidToEdit="+story_id;
		});
		
		  ///---------------------------- กดตกลงหลังจากเพิ่มหน้าหมดแล้ว---------------------
		$("#updateBtn").click(function(){
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
	
	
		
	
</script>