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
<body class="bgHome container">
	<div class="row">
		<div class="col-xs-12 col-lg-offset-3 col-lg-6">
			<div class="w100 logoHome login marginT10" style="position:retative"></div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-lg-offset-2 col-lg-8">
			<div class="bgW_login contentStory marginB10">
				<div class="marginAuto wp100" style="padding-top:60px;">
					<section class="area">
						 <div class="row">
							<div class="col-md-12">
								<ul class="nav nav-tabs">
									<li><a data-toggle="tab" href="">HOME</a></li>
									<li><a data-toggle="tab" href="">CATEGORY</a></li>
									<li class="active"><a data-toggle="tab" href="#tab3">MY STORY</a></li>
								</ul>
							</div>
							<div id="myTabContent1" class="tab-content mystory-create" style="">
								<div class="tab-pane fade" id="tab1"></div>
								<div class="tab-pane fade" id="tab2"></div>
								<div class="tab-pane fade active in" id="tab3">
									<form class="marginT20" style="width :90%; margin-left:auto; margin-right:auto; ">
										  <div class="form-group">
											<label for="">Story Name</label>
											<input type="text" class="form-control" id=""  placeholder="">
										  </div>
										  
										  <div class="form-group">
											<label for="">Audio Recording </label>
											<div class="box-img" style="">
												<div class="box-text-number">
													<p class="text-center">1</p>
												</div>
												<div class="objectCenter" style="width : 23px;height:24px;top: 40%;">
													<i class="fa fa-camera" style="font-size:24px"></i>
												</div>
												<p class="text-center objectCenter" style="top:55%">Add Picture</p>
											</div>
										  </div>
										  <div class="row " style="margin-top: -10px;">
												<div class="col-xs-3 col-sm-3">
													<div id="" class="form-group form-group-sm">
														<div class="bg-btn btn-create" style="margin-left:40px;">
															<i class="fa fa-edit" ></i>
														</div>
													</div>
												</div>
												<div class="col-xs-3 col-sm-3">
													<div id="" class="form-group form-group-sm">
														<div class="bg-btn btn-refresh" style="margin-left:20px;">
															<i class="fa fa-refresh" ></i>
														</div>
															
													</div>
												</div>
												<div class="col-xs-3 col-sm-3">
													<div id="" class="form-group form-group-sm">
														<div class="bg-btn btn-microphone">
															<i class="fa fa-microphone" style=""></i>
														</div>
													</div>
												</div>
												<div class="col-xs-3 col-sm-3">
												
													<div id="" class="form-group form-group-sm">
														<div class="bg-btn btn-play" style="margin-left:-20px;">
															<i class="fa fa-play-circle" ></i>
														</div>
													</div>
												</div>
										  </div>
										  <div class="btn-confirm btn-ok">
											<button type="submit" class="btn btn-primary wp100" >OK</button>
										  </div>
																			  
									</form>
								</div>
							</div>
						</div>
					</section>
					
				</div>
			</div>
		</div>
	</div>

 
    <script>
		$(document).ready(function(){
			  $(".btn-create").click(function(){
				  alert("create")
			  });
			  
			  $(".btn-refresh").click(function(){
				  alert("refresh")
			  });
			  
			  $(".btn-microphone").click(function(){
				  alert("microphone")
			  });
			  
			  $(".btn-play").click(function(){
				  alert("play")
			  });
			  
			  
			  $(".btn-ok").click(function(){
				  alert("ok")
			  });
			  
			 
			
		});
			
	</script>

</body>
</html>