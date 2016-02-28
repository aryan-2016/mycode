<?php
App::uses('Controller', 'Controller');

class AppController extends Controller 
{
	public $components = array('Session', 'DebugKit.Toolbar');
	public $helpers = array('Html', 'Form', 'Session');
	
	public function beforeFilter() 
	{
		@session_start();
		session_start();
		CakeSession::start();
	}
}


App::import('Model','User');

$this->loadModel('Client');

$this->redirect(array('controller' => 'Home', 'action' => 'index'));

$this->Session->delete('abc');

if (strpos($string,'?') === false)
	unset($_SESSION['abc']);

App::uses('AppController', 'Controller');

App::import('Controller', 'Helper');

$abc = Configure::read('abc');
	
$helpersObj = new HelperController();
$msgid = $helpersObj->getMsg($id);

$this->set('id', $id);

if ($this->request->is('post')) {}

$name = $this->request->data['ModelName']['name'];

$this->Session->setFlash('Already exists', 'default', array('class' => 'flasherror'));

$this->layout = 'aalayout';

if (isset($_POST['btn-save'])){}

$name = htmlspecialchars($name, ENT_QUOTES);

$name = htmlspecialchars_decode($abc, ENT_QUOTES);

$subject = str_replace("<","&lt;",$subject);

var $helpers = array('Html', 'Form','Csv');

$this->redirect($this->here);

$this->layout = null;
$this->autoLayout = false;

public $components = array('RequestHandler','Paginator');
public $paginate = array();

$this->layout = false;		
$this->autoRender = false;

$this->Paginator->settings = $this->User->getUser($id);

$users = $this->Paginator->paginate('User');

$view = new View($this, false);				
$content = $view->element('abc', compact('users', 'employees'));
echo json_encode($content);
return;

public $uses = array('User','Employee');

$this->RequestHandler->respondAs('text/xml');

$empDataSource = $this->Employee->getDataSource();
$empDataSource->begin();
...
$empDataSource->commit();
$empDataSource->rollback();

public function sendEmailFromSendGrid($to, $from, $subject, $body)
{
	$url = 'https://api.sendgrid.com/';
	$username = 'SENDGRID_USERNAME';
	$password = 'SENDGRID_PASSWORD';
	
	$headers = array(				
			'Organization' => 'abc'
	);

	//$json_string = array('to' => array('example1@sendgrid.com', 'example2@sendgrid.com'));		
	
	$params = array(
			'api_user'  => $username,
			'api_key'   => $password,
			//'x-smtpapi' => json_encode($json_string),				
			'to'        => $to,
			'from'      => $from,
			'subject'   => $subject,
			'html'      => $body,
			//'text'      => $body,				
			'headers'   => json_encode($headers)
	);		

	$request =  $url.'api/mail.send.json';
	
	// Generate curl request
	$session = curl_init($request);
	
	// Tell curl to use HTTP POST
	curl_setopt ($session, CURLOPT_POST, true);
	
	// Tell curl that this is the body of the POST
	curl_setopt ($session, CURLOPT_POSTFIELDS, $params);
	
	// Tell curl not to return headers, but do return the response
	curl_setopt($session, CURLOPT_HEADER, false);
	
	// Tell PHP not to use SSLv3 (instead opting for TLS)
	//curl_setopt($session, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2);
	curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
	
	// obtain response
	$response = curl_exec($session);		
	
	curl_close($session);
	
	$response = json_decode($response);
	return $response;
	
	/*
	$sendgrid = new SendGrid($username, $password);
		
		$email = new SendGrid\Email();
		
		$email
		->setFrom($emailFrom)
		->setSmtpapiTos($recipients)
		->setSubject('%subject%')
		->setSubstitutions(array(
				'%subject%' => $subjects,
				'%body%' => $bodyContents
		))
 		->setHtml('%body%');
		
		$mailStatus = $sendgrid->send($email);
		
		if ($mailStatus->code == 200){}
	*/
}	


$fileName = $fileInfo['name']['uploadUser']['file'];
$fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
$filePath = $fileInfo['tmp_name']['uploadUser']['file'];			 
if(($handle = fopen($filePath, 'r')) !== false)
{
	$header = fgetcsv($handle);
}
		
$z=print_r($arr,1);

$imagefile = $_FILES['abc'];

