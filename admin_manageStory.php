<div class="row adminManageStoryPage">
	<div class="marginAuto divBtn min-h">
		<div class="row marginAuto boxImgLogo">
			<p><b>Manage Story</b></p>
		</div>
		<div class="iconApproveHead icon64 icon-manage marginB10"></div>
		<div class="blockAdmin marginAuto marginT20" style=" margin-bottom: 0px;">
		
			<div class="" style="padding-top:50px;">
				<select name="Myselect" id="Myselect"  class="form-control myselect">
					<option style="width:50px;"  value="0">All</option>
                </select>
                <div class="icon36 icon-add" id="addBtn"></div>
			</div>
			
			<div class="imgApporve">
				<div id="approveStory" class="form-group">
					<div class='row marginAuto marginT10'  style="width:95%" id="showHomeStory"  >
						<!-- <div class="col-xs-4 col-lg-2 boxImg"> 
							<div class="h100 viewDetail" data-img='1'> 
								<div class="img"  style="background:url(imgStory/56_00.png)"></div> 
								<div class="homeIcon icon-edit"></div>
							</div>
							<p class="text-center text-blue">การะต่ายน้อย</p>
                        </div>
                        
						<div class="col-xs-4 col-lg-2 boxImg"> 
							<div class="h100 viewDetail" data-img='1'> 
								<div class="img"  style="background:url(imgStory/56_00.png)"></div> 
								<div class="homeIcon icon-edit"></div>
							</div>
							<p class="text-center text-blue">การะต่ายน้อย</p>
                        </div>
                        <div class="col-xs-4 col-lg-2 boxImg"> 
							<div class="h100 viewDetail" data-img='1'> 
								<div class="img"  style="background:url(imgStory/56_00.png)"></div> 
								<div class="homeIcon icon-edit"></div>
							</div>
							<p class="text-center text-blue">การะต่ายน้อย</p>
                        </div>
                        <div class="col-xs-4 col-lg-2 boxImg"> 
							<div class="h100 viewDetail" data-img='1'> 
								<div class="img"  style="background:url(imgStory/56_00.png)"></div> 
								<div class="homeIcon icon-edit"></div>
							</div>
							<p class="text-center text-blue">การะต่ายน้อย</p>
                        </div>
                        <div class="col-xs-4 col-lg-2 boxImg"> 
							<div class="h100 viewDetail" data-img='1'> 
								<div class="img"  style="background:url(imgStory/56_00.png)"></div> 
								<div class="homeIcon icon-edit"></div>
							</div>
							<p class="text-center text-blue">การะต่ายน้อย</p>
						</div>-->
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
		$(".storyPage").hide()
		$(".mainDetail").css('background-color', '#FFF');
		add_select_option();
		var categoryid = $("#Myselect").val();
		loadStory(categoryid);
		/*$(".viewDetail").click(function(){ 
			var thisId = $(this).data('img');
			alert(thisId+"------>2. ทำต่อ")	
			window.location.href="main.php?page=admin_manageStoryDetail";
		});
        $("#addBtn").click(function(){ 
			
			window.location.href="main.php?page=admin_manageStoryEdit";
		});*/
        /// ---------------------------------ถ้ามีการเลือก categoyr ให้ไปดึงข้อมูลเฉพาะที่เลือกมาแสดง------------------------------
		$( "#Myselect" ).change(function() { 
			var categoryid = $("#Myselect").val();
			alert(categoryid);
			loadStory(categoryid);
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
					var imgStory = "<div > ไม่พบนิทาน </div>";
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
					alert("ไม่พบข้อมูล Category");
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