<div class="row adminManageStoryEditPage">
	<div class="marginAuto divBtn min-h">
		<p class="text-center text-blue marginT10"><b>STORY</b></p>
		<div class="marginAuto marginB20" style="width:90%; height:auto;">
			<div class="text-center marginAuto" style="width:95%; height:100%; background-color:#bbd3de; border-radius: 5px;">
				
				<label class="marginT20 color-blue" for="Storyname">Story Name</label>
				<input type="text" style="width:90%" class="form-control marginAuto" id="Storyname" aria-describedby="emailHelp" placeholder="">
				
				<label for="exampleFormControlSelect2" class="marginT10 color-blue">Category</label>
				<select style="width:90%" class="form-control marginAuto" id="selectCategory">
					<option value="0">Select Category</option>
				</select>
				
				<label for="description" class="marginT10 color-blue">Short Description</label>
				<textarea style="width:90%" class="form-control marginAuto" id="description" rows="3">  </textarea>
				<span class="text-pink text-12" >use less then 255 characters.</span>
				<br><br>

				<label for="showPic" class="color-blue">Choose a cover photo</label>
				<div class="new_Btn box-90 box-camera" id = "showPic">
					<i class="glyphicon glyphicon-camera"></i>
				</div><br>
				
				<input type="file" name="pic_upload" id="html_btn"  OnChange="Preview(this)"/>
				<div class="row" >
					<div class="col-xs-12">
						<div  class="text-center" >
								<button type="submit" class="btn btn-info" style="" id="CREATEtitel">CREATE</button>
						</div>
						<p class="marginB10"></p>
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
		$(".mainDetail").css('background-color', '#fcf8e3');//C1C319
		
		$("#CREATEtitel").click(function(){
			window.location.href="main.php?page=admin_manageStoryEditAll";
		});
		
	});
	
	
		
	
</script>