/*$(document).on('click', '.saveAddedMilestone', function(){
			 var addedMilestoneName = $(this).parent().parent().find('input[type=text]').val();

			$.ajax({
				  type: 'post',
				  url: '<?php echo Configure::read('App.Url'); ?>criticalPaths/saveMilestone',
				  data: { 
					'milestone_name': addedMilestoneName, 
					'project_id': '<?php echo $projectId; ?>'
				  },
				  dataType: "json",
				  success: function (response) {
					
				  },
				  error: function () {
					alert("error");
				  }
			  });
		 });*/

======================

	 //var addedMilestoneName = $(this).parent().parent().find('input[type=text]').val();
	 //var mileStoneDivId = $(this).parent().parent()..attr('id');

======================


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


======================


//$('.milestones').append('<div class="milestone" ><div class="col-md-9"><input type="text" id="addedMilestone'+newMileStoneId+'" name="data[Milestone][name'+newMileStoneId+']" value="" placeholder="Milestone" required/></div><div class="col-md-3"><button id="saveAddedMilestone" class="save saveAddedMilestone" style="background: #334762 none repeat scroll 0 0;border: medium none;color: #fff;font-size: 16px;height: 42px;margin-left: 7px;padding: 0 40px;">Save</button></div></div>');
			

======================

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

======================

--ALTER TABLE sp_milestones ALTER COLUMN created_date SET DEFAULT CURRENT_TIMESTAMP;
--ALTER TABLE sp_milestones ALTER COLUMN modified_date SET DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP;
--ALTER TABLE sp_milestones MODIFY created_date datetime NOT NULL DEFAULT now();
--ALTER TABLE sp_milestones MODIFY modified_date datetime NOT NULL DEFAULT now() ON UPDATE now();

$this->Milestone->saveField('modified_date', date('Y-m-d H:i:s'));

======================

<?php foreach($projectMilestones as $milestone): ?>														
		<div class="milestone" id="milestone-div-<?php echo $milestone['Milestone']['id']; ?>">
			<div class="col-md-9">
				<input type="text" id="milestone-<?php echo $milestone['Milestone']['id']; ?>" value="<?php echo $milestone['Milestone']['name']; ?>" style="background-color: white;" disabled />
			</div>
			<div class="col-md-3">
				<div class="pull-right actions">
					<a href="#" class="edit" onclick="editMilestone('<?php echo $milestone['Milestone']['id']; ?>', '<?php echo $milestone['Milestone']['id']; ?>');return false;"></a>
					<a href="#" class="remove" onclick="deleteMilestone('<?php echo $milestone['Milestone']['id']; ?>', '<?php echo $milestone['Milestone']['id']; ?>');return false;"></a>
				</div>
			</div>
		</div>
		<div class="col-md-12 msgarea" id="msgarea-<?php echo $milestone['Milestone']['id']; ?>" style="display:none;"></div>
<?php endforeach; ?>

$(document).ready(function ()
{
	var newMileStoneId = '<?php echo $lastMileStoneId; ?>';
	$('.add-milestone').click(function() {
		$('.milestones').append('<div class="milestone" id="milestone-div-'+newMileStoneId+'"><div class="col-md-9"><input type="text" id="addedMilestone-'+newMileStoneId+'" placeholder="Milestone"/></div><div class="col-md-3"><button class="save" style="background: #334762 none repeat scroll 0 0;border: medium none;color: #fff;font-size: 16px;height: 42px;margin-left: 7px;padding: 0 40px;" onclick="saveMilestone('+newMileStoneId+');">Save</button></div></div><div class="col-md-12 msgarea" id="msgarea-'+newMileStoneId+'" style="display:none;"></div>');
		//$('.milestones').append('<div class="milestone" id="milestone-div-'+newMileStoneId+'" style="background: #fff none repeat scroll 0 0;border-color: #ccc #ccc transparent;border-style: solid;border-width: 1px;font-size: 18px;line-height: 50px;padding: 0 10px 0 30px;"><div class="col-md-9"><input type="text" id="addedMilestone-'+newMileStoneId+'" placeholder="Milestone"/></div><div class="col-md-3"><button class="save" style="background: #334762 none repeat scroll 0 0;border: medium none;color: #fff;font-size: 16px;height: 42px;margin-left: 7px;padding: 0 40px;" onclick="saveMilestone('+newMileStoneId+');">Save</button></div></div><div class="col-md-12 msgarea" id="msgarea-'+newMileStoneId+'" style="display:none;"></div>');
		/*$('#milestone-div-'+newMileStoneId).css({
				'background' : '#fff none repeat scroll 0 0',
				'border-color' : '#ccc #ccc transparent',
				'border-style' : 'solid',
				'border-width' : '1px',
				'font-size' : '18px',
				'line-height' : '50px',
				'padding' : '0 10px 0 30px'
		});*/
		//$('#milestone-div-'+newMileStoneId).addClass('milestone');
		newMileStoneId++;
	});			
	
});
	
======================

<textarea maxlength="200" list_id="21" class="list_note_save" placeholder="Add Note Here"></textarea><br/>
<textarea maxlength="200" list_id="22" class="list_note_save" placeholder="Add Note Here"></textarea><br/>
<textarea maxlength="200" list_id="23" class="list_note_save" placeholder="Add Note Here"></textarea><br/>
<a href="">reload</a>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script>
var saveEleList=''; 
var saveListid=''; 
var saveTextvalue='';

$(document).ready(function(){  
	
});

$('body').on("focusout",'.list_note_save',function(e){
	var eleList=this;
	var listid=$(this).attr('list_id');
	var textvalue=$(this).val();
	if(listid != '' && textvalue!=''){
		
	}
});

$('body').on("focus",'.list_note_save',function(e){
	saveEleList=this;
	saveListid=$(this).attr('list_id');
	//saveTextvalue=$(this).val();	
});

$(document).click(function() {
		if(saveListid != '')
		{	
			$.ajaxSetup({async: false});
		
			$.ajax({
				  type: 'post',
				  url: '<?php echo Configure::read('App.Url'); ?>pages/test',
				  data: { 
					'saveListid': saveListid
				  },
				  dataType: "json",
				  success: function (response) {				
					alert('success saveListid='+response);
				  },
				  error: function () {
					alert("error");
				  }
			});
			$.ajaxSetup({async: true});
		}			
});
</script>

public function test() 
{
	$this->layout = false;
	
	if (isset ( $_POST ['saveListid'] ) && $_POST ['saveListid'] != '')
	{
		$saveListid = $_POST['saveListid'];
		echo json_encode($saveListid);
		return;
	}
}

======================

		$this->loadModel("Hack");
		$this->Hack->recursive = -1;
		/*$this->Hack->bindModel(array('belongsTo' => array(
										'Channel' => array(
											'className' => 'Channel'
										))));*/
				
		$userProjectHacks = $this->Hack->find('all', array(
										'fields' => array('id', 'name', 'channel_id'),
										'conditions' => array('Hack.project_id' => $projectId),
										'order' => array('Hack.name')
										//'group' => array('Hack.channel_id') 
									));
									
		
		//echo '<br>userProjectHacks=<pre>';print_r($this->Hack->find('all'));exit;
		
		
		//$this->loadModel("Channel");
		//$this->Channel->recursive = -1;
		/*$this->Channel->bindModel(array('hasMany' => array(
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
													/*'conditions' => array(),
													'order' => array('name'),
													'contain' => 'Hack'
												));*/
												
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
												
		//echo '<br>channels=<pre>';print_r($channels);exit;
		//echo '<br>userProjectHacks=<pre>';print_r($userProjectHacks);exit;
		
=======================

function backButton()
{				
	window.location.href = '<?php echo $_SERVER['HTTP_REFERER']; ?>'; //window.history.back(); //window.history.go(-1); //'<?php echo $hackListPageUrl; ?>';
	//return false;
}
	
=======================
<?php
/*$this->request->params['pass'];
$_REQUEST['pageNo'];
$this->request->data['Frontuser']['name'];*/
			
error_log($data); //check error.log to see the result			
CakeLog::write('data:',$data);

/*$dateFile = date('d-m-Y').".txt";			
$fWrite = fopen($dateFile,"a");
$wrote = fwrite($fWrite, $data);
fclose($fWrite);*/			

/*$webhookContent = "";
$webhook = fopen('php://input' , 'rb');
while (!feof($webhook)) 
{
	$webhookContent .= fread($webhook, 4096);
}
fclose($webhook);
error_log($webhookContent);			
CakeLog::write('webhookContent:',$webhookContent);*/

=======================

/*ob_start();
var_dump($shopifyResponse);
$z1 = ob_get_clean();

ob_start();                    // start buffer capture
var_dump( $shopifyResponse );           // dump the values
$z2 = ob_get_contents(); // put the buffer into a variable
ob_end_clean();*/
			
=======================

public function testShopifyLogin() 
{
	$this->layout = false;
	$this->autoRender = false;
	
	/////////////////////////////////////////////////////////////
	
	/*// Create the API URL using the private app credentials
	//https://apikey:password@hostname/admin/resource.json
	$api_url = 'https://a10613fbe1ccb8db6c0b88db2114c2cb:c002f02e350123d820d7f16a3215d2b5@syna.myshopify.com';
	
	// Create the API URL for the Shopify shop object
	$shop_obj_url = $api_url . '/admin/shop.json';

	// Get the shop object content
	$shop_content = @file_get_contents( $shop_obj_url );

	// Decode the JSON
	$shop_json = json_decode( $shop_content, true );

	// Create a variable to make the rest of the code more readable
	$shop = $shop_json['shop'];

	echo '<br>Email is: ' . $shop['email'];

	echo '<br>Shopify store name: ' . $shop['name'];

	echo '<br>Shopify store owner: ' . $shop['shop_owner'];

	foreach($shop as $key => $value)
	{
		echo $key . ': ' . $value . '<br>';
	}*/
	
	/////////////////////////////////////////////////////////////

	/*$api_url = 'https://a10613fbe1ccb8db6c0b88db2114c2cb:c002f02e350123d820d7f16a3215d2b5@syna.myshopify.com';
	$shop_obj_url = $api_url . '/admin/customers.json';
	$shop_content = @file_get_contents( $shop_obj_url );		
	$shop_json = json_decode( $shop_content, true );
	$shop = $shop_json['customers'];		

	foreach($shop as $key => $value)
	{
		echo $key . ': ' . $value . '<br>';
	}*/
	
	/////////////////////////////////////////////////////////////
	
	/*$post = array(
				  'client_id' => 'a10613fbe1ccb8db6c0b88db2114c2cb',
				  'client_secret' => 'b6b1ee97339787d0542131481d936a73',
				  'code'   =>  'code'
				);

	$ch = curl_init();

	curl_setopt($ch,    
	CURLOPT_URL,"https://syna.myshopify.com/admin/oauth/access_token");
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS,$post);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	$response = curl_exec($ch);
	curl_close($ch);
	var_dump($response);*/
	
	/////////////////////////////////////////////////////////////
	
	/*if ($this->request->is('post')) 
	{
		$this->loadModel("Frontuser");
		$this->Frontuser->recursive = -1;
		
		$shopifyResponseArray = json_decode(file_get_contents('php://input'), true);
		//$z = print_r(json_decode(file_get_contents('php://input'), true), 1);
		
		$shopifyUserData = array(										
									'user_name' => $shopifyResponseArray['email'], 
									'name' => $shopifyResponseArray['first_name'] . ' ' . $shopifyResponseArray['last_name'],
									'email' => $shopifyResponseArray['email'],
									'password' => '123456',
									'creation_source' => 'shopify',
									'shopify_customer_id' => $shopifyResponseArray['id'],
									'created_date' => date('Y-m-d H:i:s')
								);
		
		$this->Frontuser->create();
		$this->Frontuser->save($shopifyUserData);
	}*/		
}

<p><a href="http://www.synapse.asia/pmportal_8095/userProjects/index?id={{ customer.id }}&email={{ customer.email }}">Traction Hound</a></p>

<p><a href="#" onclick="redirectToTractionHound();">Traction Hound</a></p>
<script type="text/javascript">
	function redirectToTractionHound()
  	{
      	var varify_code = Math.round((Math.pow(36, length + 1) - Math.random() * Math.pow(36, 8))).toString(36).slice(1); //8-length
      	
    	window.location = "http://www.synapse.asia/pmportal_8095/userProjects/redirectedFromShopify?id={{ customer.id }}&email={{ customer.email }}&redirect_uri=myshopify&varify_code="+varify_code;
  	}
</script>

$shopifyUrl = $_SERVER['HTTP_REFERER'];
echo '<br>shopifyUrl='.$shopifyUrl;

$shopifyUrl = $_SESSION['referrer'];
echo '<br>shopifyUrl1='.$shopifyUrl;

$shopifyUrl = $this->referer();
echo '<br>shopifyUrl2='.$shopifyUrl;

$shopifyUrl = $this->request->referer();
echo '<br>shopifyUrl3='.$shopifyUrl;
		
if(stripos($shopifyUrl, 'myshopify') !== false) //case-insensitive
{}
		
=======================

//in controller
/*$log = $this->Channel->getDataSource()->getLog(false, false);       
//$lastLog = end($log['log']);
//echo '<br>lastLog=<pre>';print_r($lastLog);
echo '<br>log=<pre>';print_r($log);
exit;*/

=======================

