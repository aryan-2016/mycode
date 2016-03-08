
		$this->loadModel('EmployeeEducation');
		$this->loadModel('Education');
		
		/*$this->EmployeeEducation->bindModel(array('belongsTo' => array(
				'Education' => array(
						'className' => 'Education'
				))));		
		$EmployeeEducation = $this->EmployeeEducation->find('all', array('group' => array('education_id')));		
		echo '<br>EmployeeEducation=<pre>';print_r($EmployeeEducation);exit;*/
		
		$this->Education->bindModel(array('hasMany' => array(
				'EmployeeEducation' => array(
						'className' => 'EmployeeEducation',
						'foreignKey' => 'education_id',
						'conditions' => array('EmployeeEducation.education_id' => 'Education.id')
				))));		
		$Education = $this->Education->find('all', array(
				/*'fields'=> array('Education.*','EmployeeEducation.*'),
				'joins'=> array(
								array(
										'table'=>'employee_educations',
										'alias' => 'EmployeeEducation',
										'type'=>'inner',
										'conditions'=>array(
												'Education.id=EmployeeEducation.education_id'
									))
						),*/
				//'group' => array('Education.name')
		));	
		
		/*$Education = $this->Education->find('all', array('contain' => array(
				'EmployeeEducation' => array(
						'conditions' => array('EmployeeEducation.education_id ' => 'Education.id')
				)
		)));*/
		
		echo '<br>Education=<pre>';print_r($Education);
		
		$arr = array();
		foreach($Education as $Edu)
		{
			if(count($Edu['EmployeeEducation'])>0)
				$arr[$Edu['Education']['name']]=$Edu['EmployeeEducation'];
		}
		
		echo '<br><br>arr=<pre>';print_r($arr);exit;




============================================
CREATE TABLE IF NOT EXISTS `sp_channels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `sp_channels`
--

INSERT INTO `sp_channels` (`id`, `name`, `status`, `created_date`, `modified_date`) VALUES
(1, 'Affiliate Marketing', 1, '2016-03-03 12:16:12', '2016-03-03 12:16:12'),
(2, 'Blogs', 1, '2016-03-03 12:16:12', '2016-03-03 12:16:12'),
(3, 'Business Development', 1, '2016-03-03 12:16:12', '2016-03-03 12:16:12'),
(4, 'Community', 1, '2016-03-03 12:16:12', '2016-03-03 12:16:12'),
(5, 'Content Marketing', 1, '2016-03-03 12:16:12', '2016-03-03 12:16:12'),
(6, 'Email', 1, '2016-03-03 12:16:12', '2016-03-03 12:16:12'),
(7, 'Engineering', 1, '2016-03-03 12:16:12', '2016-03-03 12:16:12'),
(8, 'Plateforms', 1, '2016-03-03 12:16:12', '2016-03-03 12:16:12'),
(9, 'Offline Ads', 1, '2016-03-03 12:16:12', '2016-03-03 12:16:12'),
(10, 'P.R.', 1, '2016-03-03 12:16:12', '2016-03-03 12:16:12'),
(11, 'Sales', 1, '2016-03-03 12:16:12', '2016-03-03 12:16:12'),
(12, 'Search Engine Marketing', 1, '2016-03-03 12:16:12', '2016-03-03 12:16:12'),
(13, 'Search Engine Optimization', 1, '2016-03-03 12:16:12', '2016-03-03 12:16:12'),
(14, 'Social/Display', 1, '2016-03-03 12:16:12', '2016-03-03 12:16:12'),
(15, 'Ads', 1, '2016-03-03 12:16:12', '2016-03-03 12:16:12'),
(16, 'Speaking', 1, '2016-03-03 12:16:12', '2016-03-03 12:16:12'),
(17, 'Engagements', 1, '2016-03-03 12:16:12', '2016-03-03 12:16:12'),
(18, 'Trade Shows', 1, '2016-03-03 12:16:12', '2016-03-03 12:16:12'),
(19, 'Guerilla', 1, '2016-03-03 12:16:12', '2016-03-03 12:16:12');

=====================================

CREATE TABLE IF NOT EXISTS `sp_experiments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `hack_id` int(11) NOT NULL,
  `step_name` varchar(255) NOT NULL,
  `assigned_to_user_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `project_id` (`project_id`),
  KEY `hack_id` (`hack_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `sp_experiments`
--

INSERT INTO `sp_experiments` (`id`, `project_id`, `hack_id`, `step_name`, `assigned_to_user_id`, `status`, `created_date`, `modified_date`) VALUES
(1, 1, 1, 'e', 0, 1, '2016-03-04 10:47:28', '2016-03-04 10:47:28'),
(2, 1, 2, 'exp1', 7, 1, '2016-03-04 10:53:45', '2016-03-04 10:53:45'),
(3, 1, 2, 'exp2', 0, 1, '2016-03-04 10:53:45', '2016-03-04 10:53:45'),
(4, 1, 2, 'exp3', 0, 1, '2016-03-04 10:53:45', '2016-03-04 10:53:45'),
(5, 1, 7, 'ed', 11, 1, '2016-03-05 11:12:01', '2016-03-05 11:12:01'),
(6, 1, 8, 'test1', 1, 1, '2016-03-07 14:12:11', '2016-03-07 14:12:11'),
(7, 1, 8, 'test2', 0, 1, '2016-03-07 14:12:11', '2016-03-07 14:12:11'),
(8, 1, 8, 'test3', 0, 1, '2016-03-07 14:12:11', '2016-03-07 14:12:11'),
(9, 1, 9, 'ed', 41, 1, '2016-03-07 14:40:44', '2016-03-07 14:40:44'),
(10, 1, 10, 'ed', 2, 1, '2016-03-07 14:50:44', '2016-03-07 14:50:44'),
(21, 1, 11, 'exp3', 24, 1, '2016-03-08 13:24:40', '2016-03-08 13:24:40'),
(20, 1, 11, 'exp2', 41, 1, '2016-03-08 13:24:40', '2016-03-08 13:24:40'),
(22, 1, 11, 'exp4', 19, 1, '2016-03-08 13:24:40', '2016-03-08 13:24:40');

==============================


CREATE TABLE IF NOT EXISTS `sp_frontusers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `password_salt` varchar(255) NOT NULL,
  `type` varchar(30) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `Fuid` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `sp_frontusers`
--

INSERT INTO `sp_frontusers` (`id`, `name`, `email`, `phone_number`, `password`, `password_salt`, `type`, `status`, `Fuid`) VALUES
(1, 'Subrata Dutta', 'sdutta@sampatti.com', '+91-25042365', '123456', '123456', 'website', 1, ''),
(2, 'Devedar Singh Bhadoria 123', '123@sampatti.com', '+91-01475599', '123456', '123456', 'website', 1, ''),
(14, 'pa', 'parul@csipl.net', '125487', '098f6bcd4621d373cade4e832627b4f6', '', 'app', 1, ''),


===============================


CREATE TABLE IF NOT EXISTS `sp_funnels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `hack_id` int(11) NOT NULL,
  `funnel_step_name` varchar(255) NOT NULL,
  `number_result` int(11) NOT NULL,
  `result_type` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `project_id` (`project_id`),
  KEY `hack_id` (`hack_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `sp_funnels`
--

INSERT INTO `sp_funnels` (`id`, `project_id`, `hack_id`, `funnel_step_name`, `number_result`, `result_type`, `status`, `created_date`, `modified_date`) VALUES
(1, 1, 1, 'f', 0, 'r', 1, '2016-03-04 10:47:28', '2016-03-04 10:47:28'),
(2, 1, 2, 'funnel step1', 0, 'rt1', 1, '2016-03-04 10:53:45', '2016-03-04 10:53:45'),
(3, 1, 2, 'funnel step2', 0, 'rt2', 1, '2016-03-04 10:53:45', '2016-03-04 10:53:45'),
(4, 1, 2, 'funnel step3', 0, 'rt3', 1, '2016-03-04 10:53:45', '2016-03-04 10:53:45'),
(5, 1, 7, 'fd', 0, 'rt', 1, '2016-03-05 11:12:01', '2016-03-05 11:12:01'),
(6, 1, 8, 'idea1', 70, 'true', 1, '2016-03-07 14:12:11', '2016-03-07 14:12:11'),
(7, 1, 8, 'idea2', 90, 'false', 1, '2016-03-07 14:12:11', '2016-03-07 14:12:11'),
(8, 1, 9, 'fd', 0, 'rt', 1, '2016-03-07 14:40:44', '2016-03-07 14:40:44'),
(9, 1, 10, 'fd', 0, 'rt', 1, '2016-03-07 14:50:44', '2016-03-07 14:50:44'),
(20, 1, 11, 'fd12', 12, 'rt13', 1, '2016-03-08 13:24:40', '2016-03-08 13:24:40'),
(19, 1, 11, 'fd11', 2, 'rt11', 1, '2016-03-08 13:24:40', '2016-03-08 13:24:40'),
(21, 1, 11, 'fd14', 14, 'rt14', 1, '2016-03-08 13:24:40', '2016-03-08 13:24:40');


===========================================


CREATE TABLE IF NOT EXISTS `sp_hack_favorites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `hack_id` int(11) NOT NULL,
  `favorite` tinyint(1) NOT NULL DEFAULT '0',
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `hack_id` (`hack_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `sp_hack_favorites`
--

INSERT INTO `sp_hack_favorites` (`id`, `user_id`, `hack_id`, `favorite`, `modified_date`) VALUES
(1, 5, 4, 1, '2016-03-05 11:39:35'),
(2, 5, 5, 1, '2016-03-05 11:52:00'),
(3, 5, 1, 1, '2016-03-05 11:52:04'),
(4, 5, 7, 1, '2016-03-05 14:58:23'),
(5, 5, 2, 0, '2016-03-07 14:17:32'),
(6, 5, 6, 0, '2016-03-07 14:08:49'),
(7, 5, 3, 1, '2016-03-07 14:21:37'),
(8, 5, 8, 1, '2016-03-07 14:18:16'),
(9, 5, 10, 1, '2016-03-07 17:21:14');


===========================


CREATE TABLE IF NOT EXISTS `sp_hacks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `milestone_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `channel_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `objective` varchar(255) NOT NULL,
  `hypothesis` varchar(255) NOT NULL,
  `marketing` decimal(6,2) NOT NULL,
  `engineering` decimal(6,2) NOT NULL,
  `design` decimal(6,2) NOT NULL,
  `cac` decimal(6,2) NOT NULL,
  `total_customers` decimal(6,2) NOT NULL,
  `responce_rate` decimal(6,2) NOT NULL,
  `conversion` decimal(6,2) NOT NULL,
  `ltv` decimal(6,2) NOT NULL,
  `score` decimal(6,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `project_id` (`project_id`),
  KEY `fk_sp_hacks_user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `sp_hacks`
--

INSERT INTO `sp_hacks` (`id`, `name`, `user_id`, `project_id`, `milestone_id`, `status_id`, `channel_id`, `category_id`, `objective`, `hypothesis`, `marketing`, `engineering`, `design`, `cac`, `total_customers`, `responce_rate`, `conversion`, `ltv`, `score`, `status`, `created_date`, `modified_date`) VALUES
(1, 'hack1', 5, 1, 27, 2, 16, 2, 'test objective', 'test hypo', 1.00, 2.00, 3.00, 4.00, 5.00, 6.00, 7.00, 8.00, 9.00, 1, '2016-03-04 10:47:28', '2016-03-05 11:09:48'),
(2, 'hack2', 5, 1, 21, 4, 12, 1, 'obj2', 'hypo2', 9.00, 8.00, 7.00, 6.00, 5.00, 4.00, 3.00, 2.00, 1.00, 1, '2016-03-04 10:53:45', '2016-03-05 11:09:55'),
(3, 'hack3', 5, 1, 27, 2, 16, 2, 'test objective', 'test hypo', 1.00, 2.00, 3.00, 4.00, 5.00, 6.00, 7.00, 8.00, 9.00, 1, '2016-03-04 10:47:28', '2016-03-05 11:10:04'),
(4, 'hack4', 5, 1, 27, 2, 16, 2, 'test objective', 'test hypo', 1.00, 2.00, 3.00, 4.00, 5.00, 6.00, 7.00, 8.00, 9.00, 1, '2016-03-04 10:47:28', '2016-03-05 11:10:12'),
(5, 'hack5', 5, 1, 27, 2, 16, 2, 'test objective', 'test hypo', 1.00, 2.00, 3.00, 4.00, 5.00, 6.00, 7.00, 8.00, 9.00, 1, '2016-03-04 10:47:28', '2016-03-05 11:10:21'),
(6, 'hack6', 5, 1, 21, 4, 12, 1, 'obj2', 'hypo2', 9.00, 8.00, 7.00, 6.00, 5.00, 4.00, 3.00, 2.00, 1.00, 1, '2016-03-04 10:53:45', '2016-03-05 11:10:29'),
(7, 'hack9', 5, 1, 30, 4, 18, 3, 'obj9', 'hypo9', 11.00, 12.00, 13.00, 14.00, 15.00, 16.00, 17.00, 18.00, 19.00, 1, '2016-03-05 11:12:01', '2016-03-05 11:12:01'),
(8, 'shobs hack', 5, 1, 21, 1, 3, 1, 'Nulla porta auctor eros vel sodales. Pellentesque in orci ac arcu ultricies lobortis vitae in libero. Duis eu pharetra erat. Phasellus nec nisl ac urna auctor cursus. ', 'Ghasellus lobortis arcu vitae arcu hendrerit fringilla. Nullam ac dolor ut ex vehicula vulputate a ac mauris. Suspendisse rhoncus commodo sagittis', 2.00, 1.00, 1.00, 1.00, 1.00, 1.00, 2.00, 2.00, 2.00, 1, '2016-03-07 14:12:11', '2016-03-07 14:12:11'),
(9, 'hack10', 5, 1, 28, 1, 5, 6, 'obj10', 'hypo10', 7.00, 7.00, 7.00, 14.00, 15.00, 16.00, 7.00, 18.00, 1.00, 1, '2016-03-07 14:40:44', '2016-03-07 14:40:44'),
(10, 'hack11', 5, 1, 29, 3, 8, 1, 'obj11', 'hypo11', 11.00, 11.00, 11.00, 11.00, 11.00, 11.00, 11.00, 11.00, 11.00, 1, '2016-03-07 14:50:44', '2016-03-07 14:50:44'),
(11, 'hack12', 5, 1, 27, 4, 2, 3, 'obj12', 'hypo12', 1.00, 2.00, 1.00, 2.00, 1.00, 1.00, 1.00, 1.00, 2.00, 1, '2016-03-07 14:58:42', '2016-03-08 10:51:15');


=============================

CREATE TABLE IF NOT EXISTS `sp_milestones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `project_id` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_sp_milestones_projectid` (`project_id`),
  KEY `fk_sp_milestones_user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `sp_milestones`
--

INSERT INTO `sp_milestones` (`id`, `name`, `user_id`, `status`, `project_id`, `created_date`, `modified_date`) VALUES
(21, 'm6', 5, 1, 1, '2016-03-02 10:10:21', '2016-03-05 11:09:26'),
(27, 'm2', 5, 1, 1, '2016-03-02 13:01:57', '2016-03-05 11:09:18'),
(28, 'm3', 5, 1, 1, '2016-03-02 13:01:59', '2016-03-05 11:09:10'),
(29, 'm4', 5, 1, 1, '2016-03-02 13:01:59', '2016-03-05 11:08:58'),
(30, 'm7', 5, 1, 1, '2016-03-05 11:08:22', '2016-03-05 11:08:22');

===============================


$this->loadModel("Channel");
		$this->Channel->recursive = 2;		
		$this->Channel->bindModel(array('hasMany' => array(
										'Hack' => array(
											'className' => 'Hack',
											'fields' => array('id', 'name'),
											'conditions' => array(
												'Hack.project_id' => $projectId,
												'Hack.user_id' => $userId
											)))));
											
		////filter Favorites
		$hackFavoriteConditions = array();
		$hackFavoriteConditions['HackFavorite.user_id'] = $userId;
			
		$filterFavorites = 0;
		if($_GET['favorites'])
		{
			$filterFavorites = 1;			
			$hackFavoriteConditions['HackFavorite.favorite'] = 1;			
		}
		////
		
		$this->loadModel("HackFavorite");
		//$this->HackFavorite->recursive = -1;
		$this->Hack->bindModel(array('hasOne' => array(
										'HackFavorite' => array(
											'className' => 'HackFavorite',
											'fields' => array('hack_id', 'favorite'),
											'conditions' => $hackFavoriteConditions
											))));
		
		$channels = $this->Channel->find('all', array(
													'fields' => array('id', 'name'),													
													'conditions' => array(),
													'order' => array('Channel.name')
												));
												
		$this->set('channels', $channels);
		//echo '<br>channels=<pre>';print_r($channels);exit;												
		$channelsWithHacksArrays = array();		
		foreach($channels as $channel)
		{
			$hacksWithFavoriteArrays = array();
			if(count($channel['Hack']) > 0)
			{
				$count = 0;
				foreach($channel['Hack'] as &$hack)
				{
					//$hack['channel_name'] = $channel['Channel']['name'];
					
					$hack['hack_favorite'] = 0;
						
					$hackFavoriteCount = 0;
					if(count($hack['HackFavorite']) > 0)
					{
						$count++;
						$hackFavoriteCount++;
						$hack['hack_favorite'] = $hack['HackFavorite']['favorite'];
						$hacksWithFavoriteArrays[] = $hack;
					}					
					else if($filterFavorites > 0  && $hackFavoriteCount == 0)
					{						
						
					}
					else
						$hacksWithFavoriteArrays[] = $hack;
				}
				
				if($filterFavorites > 0 && $count > 0)
					$channelsWithHacksArrays[$channel['Channel']['name']] = $hacksWithFavoriteArrays;
				else if($filterFavorites  && $count == 0)
				{						
					
				}
				else
					$channelsWithHacksArrays[$channel['Channel']['name']] = $hacksWithFavoriteArrays;
			}
		}
		
		$this->set(compact('projectId', 'selectedProjectName', 'userProjects', 'channelsWithHacksArrays'));
