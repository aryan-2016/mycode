<?php
App::uses('Model', 'Model');
class AppModel extends Model 
{
	//debug query
	/*
	 * 1. set debug=2
	 * 2. write following code in model
	 	//for last query
	 	$log = $this->getDataSource()->getLog(false, false);
		debug(end($log['log']));
		
		or
		
		$dbo = $this->getDatasource();
		$logs = $dbo->getLog();
		$lastLog = end($logs['log']);
		debug( $lastLog['query'] );
		
		//for all query
		$log = $this->getDataSource()->getLog(false, false);
		debug($log);
	 */
}

App::uses('AppModel', 'Model');
class User extends AppModel 
{
	public function loadUser($id)
	{
		$result = $this->find('first', array('conditions'=>array('id'=>$id)));
		
		if(!$result)
			return 0;
		
		return $result['User'];
	}
}

$result = $this->query($sql);

App::uses('CakeSession', 'Model/Datasource');

public $useTable = false;

$totalIds += $users['Users']['id'];

$userModel = ClassRegistry::init('User');
$user = $userModel->find('first',array(
								'conditions'=>array('User.id' => $id),
								'fields' => array('id')
								));
								
var $name = 'User';

$user = $this->find('all', array(
				'conditions'=>array('lower(name)'=>$name)
		));
		
$user=$this->find('all',array('order'=>array('name ASC')));

$updateUserById = $this->updateAll($data,array('id'=>$id));

App::import('model', 'User');

$this->create();
if($this->save($data))
	return 1;

$this->read(null, $existUser['id']);
if($this->save($data))
	return 2;

if($this->saveAll($data))
	return 1;

$deleteCondition['conditions'] = array('id'=> $id);
$this->deleteAll($deleteCondition['conditions'],false);

$this->saveMany($data);

$result = $this->find('first', array(
								'fields' => array('User.*', 'Employee.id'),
								'joins' => array(
												array(
												'table' => 'users',
												'alias' => 'User',
												'type' => 'inner',
												'conditions' => array('Employee.emp_id = User.id')
												)
								),
								'conditions' => array(
										'Employee.emp_name' => $name,
										'Employee.emp_id' => $id
								)
		));

$userObj = new User();

$this->find('all', array(
'conditions' => array(),
'order' => array(),
'limit' => $limit,
'offset' => $startFrom));

$conditon = array('OR'=>array("lower(name) LIKE lower('%abc%')"));	

'conditions' => array('id in('.$Ids.')','createdate>='.$create_date,'finishdate<'.$finish_date)

'conditions' => array('AND'=>array('id = 2'))

$this->read(null, $id);
if($this->saveField('name', $name))
	return 2;

$this->deleteAll(array(				
				'id' => $id
		), false);
		
$this->updateAll($data, array('id'=>$id))

$id = $this->getLastInsertId();

$name = htmlspecialchars($name, ENT_QUOTES); //addslashes($name);

'fields' => array('SUM(amount + tax) as total')

'joins' => array(
						array(
								'table' => 'employees',
								'alias' => 'Employee',
								'type' => 'inner',
								'conditions' => array('Manager.id = Employee.id')
						),
						array(
								'table' => 'users',
								'alias' => 'User',
								'type' => 'inner',
								'conditions' => array('Manager.id = User.id')
						)
				),
				
'conditions' => array('AND'=>array(
"not ((name = 'abc' OR name = 'def') AND (".time()." - create_time)/86400 >22)"
))

'fields'=>array('COUNT(id) AS total_ids')

'fields' => array('SUM(amount) AS total','COUNT(*)')

$result = $this->find('all', array(
				'fields' => array('count(*) AS count'),
				'conditions' => array('id' => $id)
		));		
return $result[0][0]['count'];

'conditions' => array('create_time BETWEEN ? AND ?' => array($createDate, $endDate))

'group' => array('name')

$this->id = $id;
$this->saveField('name', 'abc');

'comment !=' => ""

'fields'=> array('DISTINCT name')

$result = $this->find('all');

