<?php
$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())

?>

<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	<link href="abc.min.css" rel="stylesheet">
	
</head>
<body>
	<div id="container">
		<div id="header">
			<h1><?php echo $this->Html->link($cakeDescription, 'http://cakephp.org'); ?></h1>
		</div>
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			<?php echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false, 'id' => 'cake-powered')
				);
			?>
			<p>
				<?php echo $cakeVersion; ?>
			</p>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>


<?php
echo $this->Html->meta('icon',$this->Html->url('/img/abc_icon.png'));

echo $this->Html->css('bootstrap.min'); 

echo $this->Html->script('jquery.latest.min');


$trail = array_filter(explode("/", Router::url()));
if(($trail[1] == 'Home'){}

echo $this->element('sidemenu');

foreach($list as $val):
endforeach;
?>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	</div>
</div>

<script>
</script>

<style>
</style>

<a href="/" class="btn btn-primary">Go to homepage</a>

<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 col-lg-offset-4 col-md-offset-4 col-sm-offset-3">
	<?php echo $this->Session->flash('successmsg'); ?>
</div>

<?php echo $this->Form->create('User', array('id' => 'userform', 'class'=>'userform','role'=>'form')); ?>
				<?php echo $this->Form->input('name',array('label'=>'Name','type' => 'text','class'=>'',
						'id'=>'','autocomplete' => 'off','pattern'=>'^[a-zA-Z\s]+$','title'=>'Only alphabets and space are allowed','value'=>'')); 
				?>
				<?php echo $this->Form->button('Update', array('type'=>'submit'));?>
<?php echo $this->Form->end(); ?>

<?php 
echo $this->Form->input('abc', array(
										'label'=>false,
										'type'=>'checkbox',
										'after' => '<label style="padding-left:5px;">&nbsp;Name</lablel>',
										'hiddenField' => false,
										'id'=>'abc',
										'checked'=>'true',
										'onclick'=>'displayRatingsReviews(this);',
										'div' => false
									)); 
?>

<?php						
	echo $this->Html->link(
			'Download',
			'/files/abc.zip',
			array('class' => '', 'target' => '_blank')
	);
?>	

'required' => 'required'
'style' => 'text-transform: capitalize;'
'maxlength'=>'12'
'minlength'=>'8'
'equalTo'=>'#useremail'
'checked' => true
'readonly' => 'readonly'
'empty' => '(choose one)'
'selected' => ''



<select class="" id="" name="">
	<option value="" disabled>Select</option>
</select>

<?php 
App::import('model','User');
$userObj = ClassRegistry::init('User');
?>

<?php echo $this->Session->flash(); ?>

<?php echo $this->element('create_user', compact('ids', 'names')); ?>

<script src="/js/jquery-ui.min.js"></script>

<?php echo $this->element('abc', array('ids' => $ids, 'names' =>$names)); ?>

<?php
$this->Session->read('abc');

Router::url().'?show=manual';


?>

