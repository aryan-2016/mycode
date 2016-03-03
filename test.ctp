
<form id="HackAddHackForm" accept-charset="utf-8" method="post" action="">
						
		<select id="HackStatus" required="required" class="full-width" name="data[Hack][status]"><option value="">Status</option><option value="4">Analyzing</option><option value="2">Defining</option><option value="1">Idea</option><option value="3">Implementing</option><option value="5">Systemizing</option></select>
	
		<textarea id="HackObjective" rows="6" cols="30" required="required" class="full-width" name="data[Hack][objective]"></textarea>
	
		<input type="text" pattern="[0-9]+([\.][0-9]+)?" title="This should be a number with up to 2 decimal places." name="data[Hack][funnel_step_name][]" class="" required="required" placeholder="Name Funnel Step" id="HackFunnelStepName">
		<input type="text" name="data[Hack][funnel_step_name][]" class="" required="required" placeholder="Name Funnel Step" id="HackFunnelStepName">
		<?php //echo $this->Form->input('txt.', array('type' => 'text','label' => 'Field 1')); ?>
		<?php //echo $this->Form->input('txt.', array('type' => 'text','label' => 'Field 1')); ?>
		
		<input type="text" id="HackNumberResult" placeholder="Number Result" required="required" class="" name="data[Hack][number_result][]">
		<input type="text" id="HackNumberResult" placeholder="Number Result" required="required" class="" name="data[Hack][number_result][]">
		
		<?php echo $this->Form->button('Submit Form', array('type' => 'submit', 'escape' => true)); ?>							
	</form>
				
				
	<?php
	    echo '<br>objective=' . $this->request->data['Hack']['objective'];
			
			echo '<br>status=' . $this->request->data['Hack']['status'];
			
			$numberResult = $this->request->data['Hack']['number_result'];
				
			$funnelStepName = $this->request->data['Hack']['funnel_step_name']; 
			/*echo '<br>values=<pre>'; print_r($values);
			
			foreach($values as $value)
				echo '<br>value=' . $value;*/
			
			$funnelStepNameCount = count($funnelStepName);
			for($i=0; $i < $funnelStepNameCount; $i++)
			{
				echo '<br>funnelStepName=' . $funnelStepName[$i];
				echo '<br>numberResult=' . $numberResult[$i];				
			}
	?>
