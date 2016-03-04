<section class="main">
	<div class="clearfix"></div>
	<div class="action-strip">
		<img src="<?php echo $this->webroot; ?>img/check.png"> Project Name

		<span class="mobile-menu"></span>
	</div>
	<div class="content-box">	
		<?php echo $this->element('user_left_sidebar', compact('projectId', 'userProjects')); ?>
		
		<div class="related-html hack-html">
			<div id="hack_list_msg" class="col-md-12" style="text-align:center;">
				<?php echo $this->Session->flash(); ?>
			</div>
			
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<h1>Hacks</h1>
				<div class="action-buttons pull-right">
					<?php $addHackPageUrl = Configure::read('App.Url') . 'hacks/addHack/' . $projectId; ?>
					<button class="add_hack" onclick="window.location.href='<?php echo $addHackPageUrl; ?>'">ADD HACK</button>
				</div>
			</div>

			<?php if(count($userProjectHacks) > 0): ?>
					<?php $divBreakCount = 0; ?>
					<?php foreach($userProjectHacks as $userProjectHack): ?>							
							<?php if(($divBreakCount == 0) || ($divBreakCount % 3 == 0)): ?>
									<?php $divClose = false; ?>
									<div class="row channelspace">
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
											<label>Channel Type</label>
										</div>
										<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
											<div class="hack-name">
												<h1><?php echo $userProjectHack['Hack']['name']; ?></h1>
												<a href="#<?php echo $userProjectHack['Hack']['id']; ?>" class="staricon"><img src="<?php echo $this->webroot; ?>img/starimg.png"></a>
											</div>
										</div>
							<?php else: ?>
									<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
										<div class="hack-name">
											<h1><?php echo $userProjectHack['Hack']['name']; ?></h1>
											<a href="#<?php echo $userProjectHack['Hack']['id']; ?>" class="staricon"><img src="<?php echo $this->webroot; ?>img/starimg.png"></a>
										</div>
									</div>
							<?php endif; ?>							
							<?php if(($divBreakCount > 0) && (($divBreakCount + 1) % 3 == 0)): ?></div><?php $divClose = true; ?><?php endif; ?>
							<?php $divBreakCount++; ?>
					<?php endforeach; ?>
					<?php if(!$divClose): ?></div><?php endif; ?>
			<?php else: ?>
					<div id="no_hacks" class="col-md-12" style="text-align:center;">
						<?php echo Configure::read('no_hacks'); ?>
					</div>					
			<?php endif; ?>
			
			<!--<div class="row channelspace">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<label>Channel Type</label>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
					<div class="hack-name">
						<h1>Hack Name</h1>
						<a href="#" class="staricon"><img src="<?php echo $this->webroot; ?>img/starimg.png"></a>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
					<div class="hack-name">
						<h1>Hack Name</h1>
						<a href="#" class="staricon"><img src="<?php echo $this->webroot; ?>img/starimg.png"></a>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
					<div class="hack-name">
						<h1>Hack Name</h1>
						<a href="#" class="staricon"><img src="<?php echo $this->webroot; ?>img/starimg2.png"></a>
					</div>
				</div>
			</div>
			
			<div class="row channelspace">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<label>Channel Type</label>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
					<div class="hack-name">
						<h1>Hack Name</h1>
						<a href="#" class="staricon"><img src="<?php echo $this->webroot; ?>img/starimg.png"></a>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
					<div class="hack-name">
						<h1>Hack Name</h1>
						<a href="#" class="staricon"><img src="<?php echo $this->webroot; ?>img/starimg.png"></a>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
					<div class="hack-name">
						<h1>Hack Name</h1>
						<a href="#" class="staricon"><img src="<?php echo $this->webroot; ?>img/starimg2.png"></a>
					</div>
				</div>
			</div>
			
			<div class="row channelspace">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<label>Channel Type</label>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
					<div class="hack-name">
						<h1>Hack Name</h1>
						<a href="#" class="staricon"><img src="<?php echo $this->webroot; ?>img/starimg.png"></a>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
					<div class="hack-name">
						<h1>Hack Name</h1>
						<a href="#" class="staricon"><img src="<?php echo $this->webroot; ?>img/starimg.png"></a>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
					<div class="hack-name">
						<h1>Hack Name</h1>
						<a href="#" class="staricon"><img src="<?php echo $this->webroot; ?>img/starimg2.png"></a>
					</div>
				</div>
			</div>
			
			<div class="row channelspace">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<label>Channel Type</label>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
					<div class="hack-name">
						<h1>Hack Name</h1>
						<a href="#" class="staricon"><img src="<?php echo $this->webroot; ?>img/starimg.png"></a>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
					<div class="hack-name">
						<h1>Hack Name</h1>
						<a href="#" class="staricon"><img src="<?php echo $this->webroot; ?>img/starimg.png"></a>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
					<div class="hack-name">
						<h1>Hack Name</h1>
						<a href="#" class="staricon"><img src="<?php echo $this->webroot; ?>img/starimg2.png"></a>
					</div>
				</div>
			</div>-->
			
			<?php echo $this->element('question_icon_div'); ?>			
		</div>
	</div>
	<div class="clearfix"></div>
</section>

<script type="text/javascript">	
	$(document).ready(function ()
	{		
		
	});
</script>