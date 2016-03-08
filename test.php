$this->paginate = array(
				'Channel' => array(
						'limit' => 8,
						'recursive' => 2,
						'model' => 'Channel'),
				'Hack' => array(
						//'limit' => 8,
						//'recursive' => 2,
						'model' => 'Hack',
				'contain' => array(
        'Category' => array(
            'conditions' => array(
                'Category.id' => 3
            )
        )))
				);
		$this->Paginator->settings = $this->paginate;
		
		$this->loadModel("Channel");
		$this->Channel->recursive = 2;
		$this->Channel->bindModel(array('hasMany' => array(
				'Hack' => array(
						'className' => 'Hack',
						'fields' => array('id', 'name'),
						'conditions' => array(
						)))), false);
			
		
		
		$this->loadModel("Hack");
		//$this->HackFavorite->recursive = -1;
		$this->Hack->bindModel(array('hasOne' => array(
				'HackFavorite' => array(
						'className' => 'HackFavorite',
						'fields' => array('hack_id', 'favorite')
				))), false);
		
		$channels = $this->Channel->find('all', array(
				'fields' => array('id', 'name'),
				'conditions' => array(),
				'order' => array('Channel.name')
		));
		//echo '<br>channels=<pre>';print_r($channels);exit;
			
		$channelsWithHacksArrays = $this->Paginator->paginate('Channel');
		
		
		
		
		
		<?php
/*if(isset($key))
	$this->Paginator->options(array('url'=>array('controller'=>'abc','action'=>'search', '?'=>array('keyword' =>$searchkeyword, 'name' =>$name, 'all' => '1'))));
	*/
?>

<?php foreach ($channelsWithHacksArrays as $channelsWithHacks): ?>
		<?php echo $channelsWithHacks['Channel']['name']; ?>
<?php endforeach; ?>

<div style="width: 50%; float: left;">
	<?php 	
		$curPage = $this->Paginator->counter(array('format' => '{:page} '));
		$curPage = trim($curPage);
		$num = $this->Paginator->numbers(); 
		$num = trim($num);
		
		if($curPage!=''):
			echo $this->Paginator->counter(array('format' => 'Page {:page} of {:pages}, showing {:current} records out of {:count} total')); 
	?>
</div> 
<div id='viewPageNumber'  style="text-align: right; width: 50%; float: right;">
	<?php 
		if($num!='') :
			echo $this->Paginator->prev('« Previous '); 
		 	echo $this->Paginator->numbers(); 
		 	echo $this->Paginator->next(' Next »'); 
	 	endif;
	?> 
	<?php endif; ?>
</div>   
