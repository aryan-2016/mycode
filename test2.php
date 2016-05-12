https://zf2.readthedocs.io/en/latest/user-guide/routing-and-controllers.html

$csvFileName = "abc.csv";
			
			$csvData = "Email, Added Date\n";
			
			header('Content-type: text/csv'); // application/ms-excel
			header('Content-Disposition: attachment; filename=' . $csvFileName);
			
			foreach($allrow as $row) 
			{				
				$c1= $row->c1;
				$c2 = $row->c2;				
				
				$csvData .= "$c1, $c2\n";
			}
			
			echo $csvData;	
