<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<title>TractionHound</title>
		<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/media.css">
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script src="js/bootstrap.js"></script>
		<script type="text/javascript" src="js/custom.js"></script>			  
	</head>
	<body>
		<header>
			<div class="logo pull-left">
				<img src="img/logo.png">
			</div>
			<div class="dropdown user-menu pull-right">
				<button aria-expanded="true" aria-haspopup="true"
					data-toggle="dropdown" id="userMenu" type="button"
					class="btn btn-default dropdown-toggle">
					<span class="profile-pic"><img src="img/user.png"></span>
					Welcome Admin<span class="caret"></span>
				</button>
				<ul aria-labelledby="userMenu" class="dropdown-menu">
					<li><a href="#">Action</a></li>
					<li><a href="#">Another action</a></li>
					<li><a href="#">Something else here</a></li>
					<li><a href="">Log Out</a></li>
				</ul>
			</div>
			<div class="clearfix"></div>
		</header>
		<div id="container">
			<div id="content">
				<section class="main">
					<div class="clearfix"></div>
					<div class="action-strip">
						<img src="<?php echo $this->webroot; ?>img/check.png"> Project Name
				
						<span class="mobile-menu"></span>
					</div>
					<div class="content-box">
						<nav class="navigation">
							<ul>
								<li class="has-childs open">
									<a href="<?php echo Configure::read('App.Url');?>userProjects/index">Projects</a>
									<div class="childs" style="display:block;">
										<ul>
										<li><a href="" class="create-project">Create Project</a></li>						
										<?php if(count($userProjects) > 0): ?>
												<?php foreach($userProjects as $project): ?>
														<li 
														<?php if($project['id'] == $projectId): ?> 
																style="background-color: yellow;" 
														<?php endif; ?>
														>
															<a href="<?php echo Configure::read('App.Url') . 'criticalPaths/index/' . $project['id']; ?>"><?php echo $project['name']; ?></a>
														</li>
												<?php endforeach; ?>
										<?php else: ?>						
												<li>No Project Found</li>
										<?php endif; ?>
									</ul>
									<div class="breif-text">
										<p>
										Lorem Ipsum is simply dummy
										text of the printing and typesetting
										industry. Lorem Ipsum has been
										the industry's standard. 
										</p>
									</div>
									</div>
								</li>
								<li style="background: #a04d00 none repeat scroll 0 0;font-weight: 600;"><a href="<?php echo Configure::read('App.Url');?>criticalPaths/index">Critical Path</a></li>
								<li><a href="<?php echo Configure::read('App.Url');?>hacks/addHack">Hacks</a></li>
								<li><a href="">Strategy</a></li>
								<li><a href="">Community</a></li>
								<li><a href="">University</a></li>				
							</ul>
						</nav>
						<div class="related-html">
							<h1>Critical Path</h1>
							<form method="post" action="" name="CriticalPath">
								<div class="action-buttons pull-right">
									<!-- <button class="edit">Edit</button> -->
									<button type="submit" class="save">Save</button>
								</div>
								<label>Defined Goal</label>			
								<input type="text" name="data[CriticalPath][critical_path_goal]" value="<?php echo $viewProject['ManageProject']['critical_path_goal']; ?>" placeholder="Increase users by 5000 in 6 Weeks" required/>
							</form>
							<?php echo $this->Session->flash('save_success'); ?>
							<p class="h3">Milestones <a class="pull-right add-milestone">Add Milestone</a></p>
				
							<div class="milestones">
								<?php //if(count($projectMilestones) > 0): ?>								
										<div class="milestone" >							
											<div class="col-md-9">								
												<input type="text" name="data[Milestone][name]" value="<?php echo ''; ?>" placeholder="Milestone" required/>
											</div>
											<div class="col-md-3">
												<button name="data[Milestone][save]" class="save" style="background: #334762 none repeat scroll 0 0;border: medium none;color: #fff;font-size: 16px;height: 42px;margin-left: 7px;padding: 0 40px;">Save</button>
											</div>																		
										</div>						
										<div class="milestone">
											Milestone  <div class="pull-right actions"><a href="" class="edit"></a><a href="" class="remove"></a></div>
										</div>						
								<?php //else: ?>
										<h3 class="alert-danger"><?php echo Configure::read('no_milestones'); ?></h3>
								<?php //endif; ?>
							</div>
						</div>
					</div>
					<div class="clearfix"></div>
				</section>
				
				<script type="text/javascript">
					$(document).ready(function ()
					{
						var newMileStoneId = 1; //fetch last milestone id from db +1
						$('.add-milestone').on("click", function() {
							$('.milestones').append('<div class="milestone" id="milestone-div-'+newMileStoneId+'"><div class="col-md-9"><input type="text" id="addedMilestone'+newMileStoneId+'" name="data[Milestone][name'+newMileStoneId+']" value="" placeholder="Milestone" required/></div><div class="col-md-3"><button id="saveAddedMilestone" class="save saveAddedMilestone" style="background: #334762 none repeat scroll 0 0;border: medium none;color: #fff;font-size: 16px;height: 42px;margin-left: 7px;padding: 0 40px;" onclick="saveMilestone('+newMileStoneId+');">Save</button></div></div><div class="col-md-12" id="msgarea-'+newMileStoneId+'" style="display:none;"></div>');
							newMileStoneId++;
						});

					});

					function saveMilestone(mileStoneDivId)
					{
					//$(document).on('click', '.saveAddedMilestone', function(){
						 //var addedMilestoneName = $(this).parent().parent().find('input[type=text]').val();
						 //var mileStoneDivId = $(this).parent().parent()..attr('id');
						 var addedMilestoneName = $("#addedMilestone"+mileStoneDivId).val();						 
						 
						 if(addedMilestoneName == '')
						 {
							 alert('Please enter name');
						 }
						 else
						 {
							$.ajax({
								  type: 'post',
								  url: 'http://localhost/cakephp242-test-project/pages/ajaxCall',
								  data: { 
									'milestone_name': addedMilestoneName, 
									'project_id': '<?php echo 123; ?>'
								  },
								  dataType: "json",
								  success: function (response) {
									//alert('response='+response);
									
									$("#msgarea-"+mileStoneDivId).css('display','block');										
									
									if(response !=0)
									{
										if(response[0].indexOf('successfully') > -1)
										{
											var addedMilestoneId = response[2];
											//alert(addedMilestoneId);
											$("#milestone-div-"+mileStoneDivId).html('');
											$("#milestone-div-"+mileStoneDivId).html(addedMilestoneName+'<div class="pull-right actions"><a href="" class="edit" onclick="editMilestone('+mileStoneDivId+', '+addedMilestoneId+');">Edit</a><a href="" class="remove" onclick="deleteMilestone('+addedMilestoneId+');>Remove</a>');
		
											$("#msgarea-"+mileStoneDivId).html('<span style="color:green;">saved successfully</span>').clearQueue().hide().fadeTo('medium',1).delay(4000).fadeOut('slow');
										}
									}
									else
									{
										$("#msgarea-"+mileStoneDivId).html('<span style="color:red;">not saved</span>').clearQueue().hide().fadeTo('medium',1).delay(4000).fadeOut('slow');
									}
								  },
								  error: function () {
									alert("error");
								  }
							  });

							/*$.post(
								  'http://localhost/cakephp242-test-project/pages/ajaxCall',
								  { 
									'milestone_name': addedMilestoneName, 
									'project_id': '123'
								  },
								  function (response) {
									alert('response='+response);
								  },
								  'json'
							  );*/
							 }
					 //});
					}

					function editMilestone(mileStoneDivId, editedMileStoneId)
					{
						$("#milestone-div-"+mileStoneDivId).html('');
						$("#milestone-div-"+mileStoneDivId).html('<div class="col-md-9"><input type="text" id="editedMileStoneId-'+editedMileStoneId+'" name="data[Milestone][name'+editedMileStoneId+']" value="" placeholder="Milestone" required/></div><div class="col-md-3"><button id="saveAddedMilestone" class="save saveAddedMilestone" style="background: #334762 none repeat scroll 0 0;border: medium none;color: #fff;font-size: 16px;height: 42px;margin-left: 7px;padding: 0 40px;" onclick="updateMilestone('+editedMileStoneId+');">Update</button></div>');

					}			
				</script>
				<!-- http://www.synapse.asia/pmportal_8095/criticalPaths/index/1 -->
			</div>
		</div>
		<footer>
			<ul>
				<li><a href="">Lorem ipsum </a></li>
				<li><a href="">dolor sit amet</a></li>
				<li><a href="">consectetur</a></li>
				<li><a href="">adipiscing elit</a></li>
				<li><a href="">Quisque dictum</a></li>
				<li><a href="">urna ut nisi</a></li>
			</ul>
			<small>Copyright © 2016 Traction Hound. All Rights Reserved</small>
		</footer>
	</body>
</html>

<!-- //Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display')); -->
