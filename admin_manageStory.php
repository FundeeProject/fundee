<div class="row adminManageStoryPage">
	<div class="marginAuto divBtn min-h">
		<div class="icon24 icon-back" id="closeBtn" style="position: absolute;z-index: 999;"></div>
		<div class="row marginAuto boxImgLogo">
			<p><b>Manage Story</b></p>
		</div>
		<div class="iconApproveHead icon48 icon-manage marginB10"></div>
		<div class="blockAdmin marginAuto marginT20" style=" margin-bottom: 0px;">
		
			<div class="" style="padding-top:30px;">
				<select name="Myselect" id="Myselect"  class="form-control myselect text-blue" style="border-radius: 0px;    background-color: #fff;">
					<option style="width:50px;"  value="0">All</option>
                </select>
                <div class="icon36 icon-add" id="addBtn"></div>
			</div>
			
			<div class="imgApporve">
				<div id="approveStory" class="form-group">
					<div class='row marginAuto marginT10'  style="width:95%" id="showHomeStory"  >
						
                    </div>
                   
				</div> 
			</div>
		</div>
	</div>
</div>


<script type="text/javascript">
	$(document).ready(function(){
		//สีฟ้าที่ปุ่ม admin
		$(".adminPage").addClass('active')
		$(".adminPage").prop('disabled', true);//สั่งให้ปุ่ม disabled คือกดไม่ได้
		$(".storyPage").hide()
		$(".mainDetail").css('background-color', '#FFF');
		add_select_option();
		var categoryid = $("#Myselect").val();
		loadStory(categoryid);
		/*$(".viewDetail").click(function(){ 
			var thisId = $(this).data('img');
			alert(thisId+"------>2. ทำต่อ")	
			window.location.href="main.php?page=admin_manageStoryDetail";
		});*/
        //=======================>>>>> กดบวก สร้างนิทาน <<<<<==================
		$("#addBtn").click(function(){ 
			window.location.href="main.php?page=create_story";
			//window.location.href="main.php?page=admin_manageStoryEdit";
		});
		
        /// ---------------------------------ถ้ามีการเลือก categoyr ให้ไปดึงข้อมูลเฉพาะที่เลือกมาแสดง------------------------------
		$( "#Myselect" ).change(function() { 
			var categoryid = $("#Myselect").val();
			//alert(categoryid);
			loadStory(categoryid);
		});
		$( "#closeBtn" ).click(function() { 
			
			//alert(categoryid);
			window.location.href="main.php?page=admin";
		});
		
	});
	
	//////////////////////////////////////////////////////////////////-------------โหลดนิทาน มาแสดง-------------------------//
	function loadStory(categoryid){
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
											'<p class="text-blue text-center">'+cutStoryName(datajson[i].story_name) + '</p>'+
										'</div>';
						}
						else{
							imgStory= '<div class="col-xs-4 col-lg-2  boxImg"> '+
											'<div class="h100 viewDetail" data-img='+datajson[i].story_id+'> '+
												'<div class="img"  style="background:url(imgStory/'+ datajson[i].story_pic+')"></div> '+
												'<div class="homeIcon icon-play"></div>'+
												<!--1. ปุ่มที่แสดงบนหนังสือ ทำต่อด้วย!!!!!!!!!!!!!!!!-->
											'</div>'+
											'<p class="text-blue text-center">'+cutStoryName(datajson[i].story_name) + '</p>'+
										'</div>';
						}
						$('#showHomeStory').append(imgStory);
					});	
				}
				else{
					$('#showHomeStory').empty();
					var imgStory = "<div class='text-center text-blue' > The story not found </div>";
					$('#showHomeStory').append(imgStory);
				}
				
				$(".viewDetail").click(function(){ 
					var thisId = $(this).data('img');
				//	alert(thisId+"------>2. ทำต่อด้วย!!!!!!!!!!!!!!!!")	
					//window.location.href="main.php?page=admin_approveStoryDetail&storyid="+thisId+"";
					//window.location.href="main.php?page=play_storydetail_formystory&storyID="+thisId+"";
					window.location.href="main.php?page=play_storydetail_formystory&storyID="+thisId+"&formPage=admin_manageStory";
				});
			},
			error:function(jqXHR, textStatus, errorThrown){alert(errorThrown);}		
		});
		
	} 
	function add_select_option(){ 
		$.ajax({
			type:'POST',
			url:'qs/qs_selectCategory.php',
			dataType: "json",
			data: {},
			success:function( datajson ) {   
				if(datajson.length !=0){
					$.each(datajson, function(i,item){
						var selectCategory = document.getElementById("Myselect");
						var option = document.createElement("option");
						option.text = datajson[i].category_name;
						option.value = datajson[i].category_id;
						selectCategory.add(option);
					});	
				}
				else{
					//alert("ไม่พบข้อมูล Category");
					$("#exampleModal").modal()// เปิดใช้ popup
					$("#okModalBtn").remove();//ลบปุ่ม ok ออกใหเหลือแต่ปุ่ม cancel
					$(".modal-footer").css("width","110px")//จัดปุ่ม cancel ให้อยู่กึ่งกลาง
					$(".modal-body").html("The story not found")  //ใส่ข้อความที่ต้องการ alert
				}
			},
			error:function(jqXHR, textStatus, errorThrown){alert(errorThrown);}		
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