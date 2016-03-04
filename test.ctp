
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
