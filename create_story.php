<?php
session_start();
//$_SESSION['mystoryPage']='showmystory';
//$_GET['page'];
?>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="css/ytLoad.jquery.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/ytLoad.jquery.js"></script>
	
</head>
<style>

</style>
<body class="bgHome">
    <div class="w100 logoHome login marginT10" style="position:retative"></div>
		<div class="bgW_login contentStory marginB10">
			<div class="marginAuto wp100" style="padding-top:60px;">
				<section class="area">
					<div class="container">
						 <div class="row">
							<div class="col-md-12">
								<ul class="nav nav-tabs">
									<li><a data-toggle="tab" href="#tab1">HOME</a></li>
									<li><a data-toggle="tab" href="#tab2">CATEGORY</a></li>
									<li class="active"><a data-toggle="tab" href="#tab3">MY STORY</a></li>
								</ul>
							</div>
							<div id="myTabContent1" class="tab-content" style="">
								<div class="tab-pane fade" id="tab1"></div>
								<div class="tab-pane fade" id="tab2"></div>
								<div class="tab-pane fade active in" id="tab3">
									<form class="marginT20" style="width :90%; margin-left:auto; margin-right:auto; ">
									  <div class="form-group">
										<label for="exampleInputEmail1">Story Name</label>
										<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
									  </div>
									  <div class="form-group">
										<label for="exampleFormControlSelect2">Category</label>
										<select class="form-control">
										  <option value="0">Select Category</option>
										  <option value="1">Fantasy</option>
										  <option value="2">a</option>
										  <option value="3">b</option>
										  <option value="4">c</option>
										</select>
									  </div>
									  <div class="form-group">
										<label for="exampleFormControlTextarea1">Short Description</label>
										<textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
									  </div>
									  <div class="form-group">
										<label for="exampleFormControlTextarea1">Short Description</label>
										<div class="box" style="width:90px; height:90px; margin-left:auto; margin-right:auto; border: 1px solid #085b6b;">
											<span class="glyphicon glyphicon-plus" style="margin-left: 35px;margin-top: 30px;"></span>
										</div>
									  </div>
									  <div class="btn-confirm">
											<button type="submit" class="btn btn-primary btn-confirm" >CREATE</button>
									  </div>
									  
									
									</form>
								</div>
							</div>
						</div>
					</div>
				</section>
				
            </div>
        </div>
    </div>
 
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

</body>
</html>