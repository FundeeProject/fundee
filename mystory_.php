<?php 
session_start();
//$_SESSION['mystoryPage']='showmystory';
//$_GET['page'];
?>
	
<script>
$(document).ready(function(){
	
	$("#btGoCerate").hide();
	
	$(".show_mystory").show();
	$(".create_mystory").hide();
	
	$("#btCerate").click(function(){
		//var show = document.getElementById("show");
		//show.innerHTML = "btMystory";
		//alert("btCerate2 Click");
		$(".show_mystory").hide();
		$(".create_mystory").show();
		$("#btCerate").hide();
		
	});
		
});
		
</script>
<div class="">

<p>mystory</p>
<div class="show_mystory " style="background-color:red">
<p>show_mystory</p>
</div>
<div class="create_mystory " style="background-color:yellow">
<p>create_mystory</p>
	<form class="form-horizontal" method="post" name="" id="">
		<div class="form-group">
		  <label class="control-label col-sm-2" for="username">Story Name:</label>
		  <div class="col-sm-10">
			<input type="text" class="form-control" id="storyname" placeholder="Enter Story Name" name="storyname">
		  </div>
		</div>
		<div class="form-group">
		  <label class="control-label col-sm-2" for="category">Category:</label>
		  <div class="col-sm-10">
			<select name="category" id="category"  class="form-control">
				  <option value="volvo">Volvo</option>
				  <option value="saab">Saab</option>
				  <option value="mercedes">Mercedes</option>
				  <option value="audi">Audi</option>
			</select>
		  </div>
		</div>
		<div class="form-group">
		  <label class="control-label col-sm-2" for="description">Description:</label>
		  <div class="col-sm-10">          
			<input type="text" class="form-control" id="description" placeholder="Description" name="description">
		  </div>
		</div>
		 <input type="file" name="pic" accept="image/*">
		<div class="form-group">        
		  <div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default" id="regisCreate">Create</button>
		  </div>
		</div>
	</form>

</div>
<button id="btCerate" class=" w3-button  w3-yellow pull-left  w3-large fa fa-plus"></button>
 
</div>