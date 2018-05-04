<div class="row adminManageStoryPage">
	<div class="marginAuto divBtn min-h">
		<div class="row marginAuto boxImgLogo">
			<p><b>Manage Story</b></p>
		</div>
		<div class="iconApproveHead icon64 icon-manage marginB10"></div>
		<div class="blockAdmin marginAuto marginT20" style=" margin-bottom: 0px;">
		
			<div class="" style="padding-top:50px;">
				<select name="Myselect" id="Myselect"  class="form-control myselect">
					<option style="width:50px;"  value="1">All</option>
					<option value="0" >My Create</option>
                </select>
                <div class="icon36 icon-add" id="addBtn"></div>
			</div>
			
			<div class="imgApporve">
				<div id="approveStory" class="form-group">
					<div class='row marginAuto marginT10'  style="width:95%" id="showHomeStory"  >
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
                        </div>
                        <div class="col-xs-4 col-lg-2 boxImg"> 
							<div class="h100 viewDetail" data-img='1'> 
								<div class="img"  style="background:url(imgStory/56_00.png)"></div> 
								<div class="homeIcon icon-edit"></div>
							</div>
							<p class="text-center text-blue">การะต่ายน้อย</p>
						</div>
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
		
		$(".viewDetail").click(function(){ 
			var thisId = $(this).data('img');
			alert(thisId+"------>2. ทำต่อ")	
			//window.location.href="main.php?page=play_story&storyID="+thisId+"";
			window.location.href="main.php?page=admin_approveStoryDetail";
		});
        $("#addBtn").click(function(){ 
			
			window.location.href="main.php?page=admin_manageStoryDetail";
		});
        
	});
</script>