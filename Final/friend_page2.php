<!DOCTYPE html>
<?php session_start(); ?>
<html>

<head>
	<title>Friend Page</title>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<link href="http://cdn.phpoll.com/css/animate.css" rel="stylesheet">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.js"></script>
	<link rel="icon" href="img/logo.png" type="image/x-icon">
	<link href="css/userHome.css" rel="stylesheet">
	<script src="css/userHome.js"></script>
</head>
<style>
	.cover {
		background-image: url("img/cover.jpg");
		background-color: red;
		height: 360px;
		width: 900px;
		margin: auto;
		top: -20px;
		position: relative;
	}

	.cover_button {
		margin-top: 300px;
		margin-left: 130px;
		margin-bottom: 20px;
	}

	#friend_status:hover .dropdown-menu {
		display: block;
	}

	#follow_status:hover .dropdown-menu {
		display: block;
	}

	#more_options:hover .dropdown-menu {
		display: block;
	}

	.dropdown-menu {
		display: none;
		position: absolute;
		background-color: #f9f9f9;
		min-width: 100px;
		box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
		z-index: 1;
	}

	.profile_photo {
		width: 150px;
		height: 150px;
		margin-left: 20px;
		bottom: -380px;
		position: absolute;
		z-index: 1;
		border: solid 5px white;
	}

	#friend_name {
		color: white;
		bottom: -350px;
		position: absolute;
		margin-left: 50px;
		z-index: 1;
	}

	.mycontainer {
		width: 900px;
		margin: auto;
	}

	.panel>.panel-heading {
		color: #e62e00;
	}


	.affix {
		top: 0;
		width: 360px;
		z-index: 2;
	}

	.comment {
		width: 100%;
	}

	.comment_div {
		color: black;
	}

	.thumbnail {
		margin:-10px;
		padding: 0px !important;
	}

	#friend_photo {
		width: 140px;
		height: 180px;
		margin: 0 auto;
	}

	#friend_photo_small {
		width: 120px;
		height: 140px;
		margin: 0 auto;
	}

	#about,
	#friends,
	#photos {
		display: none;
	}

	.post_photo{
		padding: 0;

	}

	.main_panel {
  /* height: 480px; */
  height: calc(100vh - 200px);

}

</style>
<script type="text/javascript">
	$(document).ready(function() {
		$("#about_link").click(function() {
			$("#about").show();
			$("#home").hide();
			$("#friends").hide();
			$("#photos").hide();
		});
		$("#home_link").click(function() {
			$("#home").show();
			$("#about").hide();
			$("#friends").hide();
			$("#photos").hide();
		});
		$("#friend_link").click(function() {
			$("#friends").show();
			$("#about").hide();
			$("#home").hide();
			$("#photos").hide();
		});
		$("#photo_link").click(function() {
			$("#photos").show();
			$("#about").hide();
			$("#home").hide();
			$("#friends").hide();
		});



		// $('form').submit(function() {
		// 	var comment = $.trim($(this).find('.comment').val());
		// 	//var comment = $.trim($('.comment').val());
		// 	if (comment == '') {
		// 		alert($(this).children('.comment').attr("placeholder");
		// 		//$('.comment').attr("placeholder", "Please Enter Something...").placeholder();
		// 		$(this).children('.comment').attr("placeholder", "Please Enter Something...").placeholder();
		// 		return false;
		// 	}
		// });

		$(".comment").blur(function() {
			$(this).attr("placeholder", "Enter your comment").placeholder();
		});

		$("form input").keypress(function(event) {
			if (event.which == 13) {
				event.preventDefault();
				$("form").submit();
			}
		});

		$(".comment_link").click(function() {
			//e.preventDefault();
			$(".comment").focus();
			return false;
		});



		$('.getSrc_small').click(function(){
        var src = $(this).attr('src');
        $('.showPic_small').attr('src', src);

    });

		$('.getSrc').click(function(){
        var src = $(this).attr('src');
        $('.showPic').attr('src', src);
    });

		$('#myModel_small').appendTo("body");

		$('#active li a').click(function() {
           $('#active li').removeClass();
           $(this).parent().addClass('active');
        });


	})
</script>

<body>
	<?php
    //ob_start();
    include 'db.php';
		include "navBar.php";
?>
		<!--- Cover -->
		<div class="cover">
			<div class="row">
				<div class="col-lg-6">
					<div class="row">
						<div class="col-lg-4">
							<?php
							$sql_friend="SELECT * FROM Users where User_Id = 22";
							$result_friend=mysqli_query($conn, $sql_friend);
							$row_friend = mysqli_fetch_assoc($result_friend);
							$display_name = $row_friend['DisplayName'];
							$profile_photo = $row_friend['ProfilePhoto'];
							$birthday = $row_friend['Birthday'];
							$gender = $row_friend['Gender'];
							$email = $row_friend['Email'];
							?>
							<img class="profile_photo" src="<?php echo $profile_photo; ?>" />
						</div>
						<div class="profile_name col-lg-8">

							<h1 id='friend_name'><?php echo $display_name; ?></h1>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="cover_button">
						<div class="btn-group">
							<button type="button" id="friend_status" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span>Connected &nbsp<i class="fa fa-sort-desc" aria-hidden="true"></i></span>
								<ul class="dropdown-menu">
									<li><a href="#">Close Friends</a></li>
									<li><a href="#">Unfriend</a></li>
								</ul>
							</button>
							<button type="button" id="follow_status" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span>Following &nbsp<i class="fa fa-sort-desc" aria-hidden="true"></i></span>
								<ul class="dropdown-menu">
									<li><a href="#">Unfollowed</a></li>
									<li><a href="#">F2</a></li>
								</ul>
							</button>
							<button type="button" id="more_options" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span><i class="fa fa-bars" aria-hidden="true"></i></span>
								<ul class="dropdown-menu">
									<li><a href="#">Report</a></li>
									<li><a href="#">Block</a></li>
								</ul>
							</button>
						</div>
					</div>
				</div>
			</div>
			<div class="cover_menu">
				<nav class="navbar navbar-default">
					<div id="cover_menu" class="container-fluid">
						<ul class="nav navbar-nav navbar-right" id="active">
							<li class="active"><a href="#" id="home_link">Timeline</a></li>
							<li><a href="#" id="about_link">About</a></li>
							<li><a href="#" id="friend_link">Friends</a></li>
							<li><a href="#" id="photo_link">Photos</a></li>
							<li><a href="#"><span>More &nbsp<i class="fa fa-sort-desc" aria-hidden="true"></i></span></a></li>
						</ul>
					</div>
				</nav>
			</div>
		</div>

		<div class="container-fluid headwrap">
			<div class="mycontainer">
				<br><br>
													<!--"Home" div-->
				<div id="home">
					<div class="row">
						<div class="col-lg-5">
							<div class="left_menu" data-spy="affix" data-offset-top="10">

									<!--Left Photo Panel-->
								<div class="panel panel-default">
									<div class="panel-heading"><b>Photos</b></div>
									<div class="panel-body">
											<div class="modal fade text-center" id="myModel_small" tabindex="-1" aria-labelledby="myModelLabel" area-hidden="true">
											<div class="modal-dialog modal-lg" style="display: inline-block; width: auto;">
													<div class="modal-content">
													<img src="" class="showPic_small" width=700px>
													<div class="modal-footer">type="button" class="btn btn-default" data-dismiss="modal">Close</button>
													</div>
													</div>
													</div>
											</div>
											<div class="photos">
												<?php
													$sql_serchphoto="SELECT * FROM Post WHERE User_Id=22 Order BY Post_Id DESC";
													$result_photo=mysqli_query($conn, $sql_serchphoto);
													$count = 6;
													while ($row = mysqli_fetch_assoc($result_photo)) {
														if($count > 0){
															$image = $row['Photo_Path']; ?>
															<div class='col-md-4 item'>
															<div class='thumbnail'>
																<a data-toggle="modal" data-target="#myModel_small"><img src='<?php echo $image; ?>' class='image getSrc_small'id="friend_photo_small"/></a>
															</div>
															</div>
													<?php
														$count--;
														}}
													?>
											</div>

									</div>
									<div class="panel-footer">
									</div>
								</div>

									<!--Left Friend Panel-->
								<div class="panel panel-default">
									<div class="panel-heading"><b>Friends</b></div>
									<div class="panel-body">
										<div class="friends">

										</div>
									</div>
									<div class="panel-footer">

									</div>
								</div>
							</div>

						</div>

						<!-- middle friend zone-->
						<div class="col-lg-7">
							<!--friend1-->
							<!--<div class="panel panel-default">
							<div class="panel-heading"><b>Leave a comment</b></div>
							<div class="panel-body">
								<textarea class="mood" rows="5" style="width:100%;border:none" placeholder="TYPE YOUR MOOD HERE"></textarea>
							</div>
							<div class="panel-footer"><a href="#">Post <span class="glyphicon glyphicon-check"></span></a></div>
						</div>-->
						<?php
							$sql_post = "SELECT * FROM Post WHERE User_Id=22 ORDER BY Post_Id DESC";
							$result_post=mysqli_query($conn, $sql_post);
							while ($row_post = mysqli_fetch_assoc($result_post)) {
									$image_post = $row_post['Photo_Path'];
									$comment_post = $row_post['Content'];
									$time_post = $row_post['Post_Time'];
									$comment_post = $row_post['Content'];
									$id_post = $row_post['Post_Id'];
							?>


							<div class="panel panel-default">
								<div class="panel-heading">
									<a href="#"><img src="<?php echo $profile_photo; ?>" width="30px" height="30px" /></a>
									&nbsp&nbsp<b><?php echo $display_name; ?>`s Moments</b>
								<span style="float:right"><?php echo $time_post; ?></span></div>
								<div class="panel-body">

									<p><?php echo $comment_post; ?></p>
									<img class="post_photo img-responsive center-block" src="<?php echo $image_post; ?>"/>
									<!--embed video from youtube-->
									<!-- <div class="embed-responsive embed-responsive-16by9">
										<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/OrWjjOOYxhI"></iframe>
									</div> -->
								</div>
								<div class="panel-footer">
									<a href="#"> <span class="glyphicon glyphicon-thumbs-up"></span>&nbsp Like</a>&nbsp
									<a href="#" class="comment_link"> <span class="glyphicon glyphicon glyphicon-share-alt"></span>&nbsp Comment</a>&nbsp
									<a href="#"> <span class="glyphicon glyphicon-share"></span>&nbsp Share</a>

									<br />
									<hr />

										<!--"Comment" div-->
									<div class="commnet_div">
										<?php
											$sql_comment = "SELECT * FROM Comments WHERE Post_Id='$id_post' ORDER BY Comment_Id DESC";
						    			$result_comment = mysqli_query($conn, $sql_comment);
                                    while ($row_comment = mysqli_fetch_array($result_comment)) {
                                        echo "<p>";
												if($row_comment['Content'] != ''){
												echo $row_comment['Content'] . "<br />";
											}
                                        echo "</p>";
                                    }
                                ?>
									<form method="post">
										<input type="text" name="comment" class="comment" id="comment" placeholder="Enter your comment" data-validation="length" data-validation-length="min2" data-validation-error-msg="comment should not be empty"/>

								<?php
                                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                        $message = $_POST['comment'];
                                        $sql_insert = "insert into Comments (Content,User_Id,Post_Id) values ('$message',1,11);";
										//ob_start();
										$result = mysqli_query($conn, $sql_insert);
                                        header("location:".$_SERVER['PHP_SELF']);
                                        exit();
                                    }
                                    //ob_end_flush();
                                ?>
									</form>
								 </div>
							 </div>
							</div>
							<?php  } ?>

						</div>
					</div>
				</div>

				<!-- "About" div-->
				<div id="about">
					<div class="panel panel-default">
						<div class="panel-heading"><b>About</b></div>
						<div class="panel-body">
							<div class="about">
								<ul class="nav nav-pills nav-stacked col-lg-3">
									<li class="active"><a href="#tab_a" data-toggle="pill">Overview</a></li>
									<li><a href="#tab_b" data-toggle="pill">School and Work</a></li>
									<li><a href="#tab_c" data-toggle="pill">Contant Information</a></li>
								</ul>

								<div class="tab-content col-lg-9">
									<div class="tab-pane active" id="tab_a">

										<table>
											<tr>
												<td>
												</td>
											</tr>
										</table>
									</div>
									<div class="tab-pane" id="tab_b">
										<h4>Pane B</h4>
										<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
									</div>
									<div class="tab-pane" id="tab_c">
										<table>
											<tr>
												<td>Address</td>
												<td></td>
											</tr>
											<tr>
												<td>Birthday</td>
												<td><?php echo $birthday; ?></td>
											</tr>
											<tr>
												<td>Gender</td>
												<td><?php echo $gender; ?></td>
											</tr>
											<tr>
												<td>Email</td>
												<td><?php echo $email; ?></td>
											</tr>
										</table>
									</div>
								</div>
							</div>
						</div>
						<div class="panel-footer">
						</div>
					</div>
				</div>



				<!-- "Friends" div-->
				<div id="friends">
					<div class="panel panel-default">
						<div class="panel-heading"><b>Friends</b></div>
						<div class="panel-body">
							<div class="about">

							</div>
						</div>
						<div class="panel-footer">
							<a href="#"> <span class="glyphicon glyphicon-chevron-left"></span></a>
							<a href="#"> <span class="glyphicon glyphicon-chevron-right"></span></a>
						</div>
					</div>
				</div>


				<!-- "Photos" div-->
				<div id="photos">
					<div class="panel panel-default">
						<div class="panel-heading"><b>Photos &nbsp<a href="photo.php" style="float:right">Photo Wall</a></b></div>
						<div class="panel-body">
							<div class="modal fade text-center" id="myModel" tabindex="-1" aria-labelledby="myModelLabel" area-hidden="true">
	                        <div class="modal-dialog modal-lg" style="display: inline-block; width: auto;">
	                            <div class="modal-content">

	                                <img src="" class="showPic" width=700px>
	                                <div class="modal-footer">
	                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

	                                </div>
	                            </div>
	                        </div>
	                    </div>
							<div class="photos">
								<?php
	                                    $sql_serchphoto="SELECT * FROM Post WHERE User_Id=22 ORDER BY Post_Id";
	                                    $result_photo=mysqli_query($conn, $sql_serchphoto);
	                                    while ($row = mysqli_fetch_assoc($result_photo)) {
	                                        $image = $row['Photo_Path']; ?>
	                                    <div class='col-xs-offset-0 col-xs-6 col-sm-offset-0 col-sm-4 col-md-3 col-lg-2 col-lg-offset-0 item'>
	                                        <div class='thumbnail'>
	                                             <a data-toggle="modal" data-target="#myModel"><img src='<?php echo $image; ?>' class='image getSrc'id="friend_photo"/></a>
	                                        </div>
	                                    </div>
	                                <?php
	                                    }
	                                ?>
							</div>
						</div>
						<div class="panel-footer">
							<!--<a href="#"> <span class="glyphicon glyphicon-chevron-left"></span></a>
							<a href="#"> <span class="glyphicon glyphicon-chevron-right"></span></a>-->
						</div>
					</div>
				</div>
			</div>
		</div>

		<script type="text/javascript">
        $.validate({
        });

        $("input").rules("remove", "required");
        
    </script>
</body>
</html>
