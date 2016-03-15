http://stackoverflow.com/questions/14123018/cakephp-2-1-find-using-contain-with-condition

http://stackoverflow.com/questions/26451279/select-records-which-have-atleast-one-hasmany-relation-row-in-cakephp?rq=1

http://ask.amoeba.co.in/joining-multiple-tables-in-cakephp-using-bindmodel-method/


<link rel="stylesheet" href="../css/bootstrap.css" type="text/css"/>
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.js"></script>

<script type="text/javascript" src="../js/bootstrap-multiselect.js"></script>
<link rel="stylesheet" href="../css/bootstrap-multiselect.css" type="text/css"/>


<select id="example-getting-started" multiple="multiple">
    <option value="cheese">Cheese</option>
    <option value="tomatoes">Tomatoes</option>
    <option value="mozarella">Mozzarella</option>
    <option value="mushrooms">Mushrooms</option>
    <option value="pepperoni">Pepperoni</option>
    <option value="onions">Onions</option>
</select>

<script type="text/javascript">
    $(document).ready(function() {
        $('#example-getting-started').multiselect({
        	disableIfEmpty: true,
            maxHeight: 100,
            numberDisplayed: 1,
            onChange: function(element, checked) {               

             	// Get selected options.
                var selectedOptions = $('#example-getting-started option:selected');
 
                if (selectedOptions.length >= 3) {
                    // Disable all other checkboxes.
                    var nonSelectedOptions = $('#example-getting-started option').filter(function() {
                        return !$(this).is(':selected');
                    });
 
                    var dropdown = $('#example-getting-started').siblings('.multiselect-container');
                    nonSelectedOptions.each(function() {
                        var input = $('input[value="' + $(this).val() + '"]');
                        input.prop('disabled', true);
                        input.parent('li').addClass('disabled');
                    });
                }
                else {
                    // Enable all checkboxes.
                    var dropdown = $('#example-getting-started').siblings('.multiselect-container');
                    $('#example-getting-started option').each(function() {
                        var input = $('input[value="' + $(this).val() + '"]');
                        input.prop('disabled', false);
                        input.parent('li').addClass('disabled');
                    });

                    ////////
                    if (checked === true) {
                        //action taken here if true
                        alert(element.val());

                        addFilter('channel[]='+element.val());
                    }
                    else if (checked === false) {
                        /*if (confirm('Do you wish to deselect the element?')) {
                            //action taken here
                        }
                        else {
                            $("#example-confirmation").multiselect('select', element.val());
                        }*/

                        removeFilter('channel[]='+element.val());
                    }
                    ////////
                    
                }
                
            }
            /*buttonText: function(options, select) {
                if (options.length === 0) {
                    return 'No option selected ...';
                }
                else if (options.length > 3) {
                    return 'More than 3 options selected!';
                }
                 else {
                     var labels = [];
                     options.each(function() {
                         if ($(this).attr('label') !== undefined) {
                             labels.push($(this).attr('label'));
                         }
                         else {
                             labels.push($(this).html());
                         }
                     });
                     return labels.join(', ') + '';
                 }
            }*/
        });

        <?php 
        	$arr = array(0=>'tomatoes', 1=>'mushrooms');
        	$selectedValues = implode("','", $arr);
        ?>
        var selectedValues = ['<?php echo $selectedValues; ?>']; //['tomatoes', 'mushrooms']; 
        $('#example-getting-started').multiselect('select', selectedValues);        
        
    });

	function removeFilter(filterParam)
	{
		var currentUrl = window.location.href.split('#')[0];
		var newUrl = currentUrl.split('?')[0];
		var newUrlParams = '';
		var j = 0;		
				
		var params = currentUrl.split('?')[1];
		var params2 = params.split('&');
		
		for(var i=0; i<params2.length; i++) 
		{			
			if(params2[i] == filterParam) 
			{				
				if(i == 0)
					j = 1;			
			}
			else
			{
				if(i == 0 || j == 1)
				{
					newUrlParams += '?' + params2[i];
					j = 0;
				}
				else
					newUrlParams += '&' + params2[i];
			}
		}
				
		window.location.href = newUrl + newUrlParams;
	}

	function addFilter(filterParam)
	{
		var currentUrl = window.location.href.split('#')[0];
		var newUrl = '';
		var channelFilterAlert = 0;
				
		if(channelFilterAlert < 1)
		{
			if(currentUrl.indexOf(filterParam) > -1)
			{
				window.location.href = window.location.href;
			}
			else
			{
				if(currentUrl.indexOf('?') > -1)		
					newUrl = currentUrl + '&' + filterParam;
				else
					newUrl = currentUrl + '?' + filterParam;
					
				window.location.href = newUrl;				
			}			
		}		
	}
</script>
