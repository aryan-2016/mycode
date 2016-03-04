<?php
App::uses('AppController', 'Controller');
class HacksController extends AppController 
{
	public $uses = array();
	public $helpers = array('Html', 'Form', 'Session');
	public $components = array('UserAuthorization', 'Session');
	
	public function hackList($projectId = null) 
	{
		$this->layout = 'user';
		
		$this->UserAuthorization->checkUserLogin();

		if(!isset($projectId) && empty($projectId))
			$this->redirect('/');
			
		$userId = $this->Session->read('user.Frontuser.id');
		
		$this->loadModel("ManageProject");
		$this->ManageProject->recursive = -1;
			
		$viewProject = $this->ManageProject->findById($projectId);
		
		if($viewProject['ManageProject']['user_id'] != $userId)
			$this->redirect('/');
			
		$userProjects = $this->ManageProject->findByUserId($userId);
		
		$this->loadModel("Hack");
		//$this->Hack->recursive = -1;
		$this->Hack->bindModel(array('belongsTo' => array(
										'Channel' => array(
											'className' => 'Channel'
										))));
				
		/*$userProjectHacks = $this->Hack->find('all', array(
										'fields' => array('id', 'name', 'channel_id'),
										'conditions' => array('Hack.project_id' => $projectId),
										'order' => array('Hack.name')
										//'group' => array('Hack.channel_id') 
									));*/
									
		
		//echo '<br>userProjectHacks=<pre>';print_r($this->Hack->find('all'));exit;
		
		
		$this->loadModel("Channel");
		//$this->Channel->recursive = -1;
		$this->Channel->bindModel(array('hasMany' => array(
										'Hack' => array(
											'className' => 'Hack'
										))));
		
		$channels = $this->Channel->find('all', array(
													'fields' => array('id', 'name'),
													/*'joins' => array(
																	array(
																	'table' => 'hacks',
																	'alias' => 'Hack',
																	'type' => 'inner',
																	'conditions' => array('Channel.id = Hack.channel_id','Hack.project_id' => $projectId)
																	)
													),*/
													'conditions' => array(),
													'order' => array('name'),
													'contain' => 'Hack'
												));
												
		/*$channels = $this->Channel->find('all', array(
								'fields' => array('Hack.id', 'Hack.name', 'Channel.id', 'Channel.name'),
								'joins' => array(
												array(
												'table' => 'hacks',
												'alias' => 'Hack',
												'type' => 'inner',
												'conditions' => array('Channel.id = Hack.channel_id','Hack.project_id' => $projectId),
												'group' => array('Hack.channel_id')
												)
								),
								'conditions' => array(
										//'Hack.project_id' => $projectId
								)
		));*/
												
		echo '<br>channels=<pre>';print_r($channels);exit;
		//echo '<br>userProjectHacks=<pre>';print_r($userProjectHacks);exit;
		
		$this->set(compact('projectId', 'userProjects', 'userProjectHacks'));
	}

	public function addHack($projectId = null) 
	{
		$this->layout = 'user';

		$this->UserAuthorization->checkUserLogin();
		
		if(!isset($projectId) && empty($projectId))
			$this->redirect('/');
			
		$userId = $this->Session->read('user.Frontuser.id');
		
		$this->loadModel("ManageProject");
		$this->ManageProject->recursive = -1;
			
		$viewProject = $this->ManageProject->findById($projectId);
		
		if($viewProject['ManageProject']['user_id'] != $userId)
			$this->redirect('/');
			
		$userProjects = $this->ManageProject->findByUserId($userId);
		
		$this->loadModel("Milestone");
		$this->Milestone->recursive = -1;
		
		$projectMilestones = $this->Milestone->find('list', array(
													'fields' => array('id', 'name'),
													'conditions' => array('Milestone.project_id' => $projectId),
													'order' => array('Milestone.id')
												));
												
		$this->loadModel("Status");
		$this->Status->recursive = -1;
		
		$statusOptions = $this->Status->find('list', array(
													'fields' => array('id', 'name'),
													'conditions' => array(),
													'order' => array('name')
												));
												
		$this->loadModel("Channel");
		$this->Channel->recursive = -1;
		
		$channelOptions = $this->Channel->find('list', array(
													'fields' => array('id', 'name'),
													'conditions' => array(),
													'order' => array('name')
												));
												
		$this->loadModel("Category");
		$this->Category->recursive = -1;
		
		$categoryOptions = $this->Category->find('list', array(
													'fields' => array('id', 'name'),
													'conditions' => array(),
													'order' => array('name')
												));
												
		$this->loadModel("Frontuser");
		$this->Frontuser->recursive = -1;
		
		//change this code for display only team members
		$userOptions = $this->Frontuser->find('list', array(
													'fields' => array('id', 'name'),
													'conditions' => array(),
													'order' => array('name')
												));
											
		$this->set(compact('projectMilestones', 'statusOptions', 'channelOptions', 'categoryOptions', 'userOptions'));

		$msg = '';
		if ($this->request->is("post")) 
		{
			try
			{
				//save Hack data
				$this->loadModel("Hack");
				$this->Hack->recursive = -1;
				
				$hackData = array(
							'Hack' => array(
								'name' => $this->request->data['Hack']['name'],
								'project_id' => $projectId,
								'milestone_id' => $this->request->data['Hack']['milestone'],
								'status_id' => $this->request->data['Hack']['status'],
								'channel_id' => $this->request->data['Hack']['channel'],
								'category_id' => $this->request->data['Hack']['category'],
								'objective' => $this->request->data['Hack']['objective'],
								'hypothesis' => $this->request->data['Hack']['hypothesis'],
								'marketing' => $this->request->data['Hack']['marketing'],
								'engineering' => $this->request->data['Hack']['engineering'],
								'design' => $this->request->data['Hack']['design'],
								'cac' => $this->request->data['Hack']['cac'],
								'total_customers' => $this->request->data['Hack']['total_customers'],
								'responce_rate' => $this->request->data['Hack']['responce_rate'],
								'conversion' => $this->request->data['Hack']['conversion'],
								'ltv' => $this->request->data['Hack']['ltv'],
								'score' => $this->request->data['Hack']['score'],
								'created_date' => date('Y-m-d H:i:s')							
							));
				$this->Hack->create();						
				$hackSaveStatus = $this->Hack->save($hackData);
				
				$hackLastInsertID = $this->Hack->getLastInsertID();
				
				//save Funnel data
				$this->loadModel("Funnel");
				$this->Funnel->recursive = -1;
				
				$funnelStepNames = $this->request->data['Hack']['funnel_step_name'];
				$funnelNumberResult = $this->request->data['Hack']['number_result'];
				$funnelResultType = $this->request->data['Hack']['result_type'];
				
				$funnelStepNamesCount = count($funnelStepNames);
				
				$funnelDataArrays = array();
				
				for($i=0; $i < $funnelStepNamesCount; $i++)
				{
					$funnelData = array(
							'Funnel' => array(
								'project_id' => $projectId,
								'hack_id' => $hackLastInsertID,
								'funnel_step_name' => $funnelStepNames[$i],
								'number_result' => $funnelNumberResult[$i],
								'result_type' => $funnelResultType[$i],
								'created_date' => date('Y-m-d H:i:s')
							));
					$funnelDataArrays[] = $funnelData;
				}
				
				$this->Funnel->create();
				$funnelSaveStatus = $this->Funnel->saveMany($funnelDataArrays);
				
				//save Experiment data
				$this->loadModel("Experiment");
				$this->Experiment->recursive = -1;
				
				$experimentStepNames = $this->request->data['Hack']['step_name'];
				$experimentUserIds = $this->request->data['Hack']['user_name'];			
				
				$experimentStepNamesCount = count($experimentStepNames);
				
				$experimentDataArrays = array();
				
				for($i=0; $i < $experimentStepNamesCount; $i++)
				{
					$experimentData = array(
							'Experiment' => array(
								'project_id' => $projectId,
								'hack_id' => $hackLastInsertID,
								'step_name' => $experimentStepNames[$i],
								'assigned_to_user_id' => $experimentUserIds[$i],
								'created_date' => date('Y-m-d H:i:s')							
							));
					$experimentDataArrays[] = $experimentData;
				}
				
				$this->Experiment->create();
				$experimentSaveStatus = $this->Experiment->saveMany($experimentDataArrays);
				
				if ($hackSaveStatus !== false && $funnelSaveStatus !== false &&  $experimentSaveStatus !== false)
				{
					$msg = Configure::read('save_success');
					$msgClass = 'alert alert-success';
				}
				else
				{
					$msg = Configure::read('not_save');
					$msgClass = 'alert alert-danger';
				}
			}
			catch(Exception $e)
			{
				echo 'Message: ' .$e->getMessage();
				$msg = Configure::read('not_save');
				$msgClass = 'alert alert-danger';
			}
			
			$this->Session->setFlash($msg, 'default', array('class' => $msgClass));
		}
	
		$this->set(compact('projectId', 'userProjects', 'msg'));
	}	
}