<?php
	session_start();
	$output = '';
	$connect = mysqli_connect("localhost","root","","lists");
	$cuser = $_SESSION['username'];
	$sql = "SELECT * FROM items WHERE user = '$cuser'";
	
	$result = mysqli_query($connect, $sql);
	
	$output .= '
		<div class="table-responsive">
			<table class="table table-bordered">
				<tr>
					<th width="10%">Id</th>
					<th width="80%">Item</th>
					<th width="10%">Delete</th>
				</tr>';
	
	if(mysqli_num_rows($result) > 0)  
	{  
		while($row = 

	mysqli_fetch_array($result))  
		{  
			$output .= '  
				<tr>  
					<td>'.

	$row["ID"].'</td>
						<td class="item" data-id1="'.$row["ID"].'" contenteditable>'.$row["val"].'</td>
						<td><button type="button" name="delete_btn" data-id3="'.$row["ID"].'" class="btn btn-xs btn-danger btn_delete">x</button></td>  
                </tr>  
			';
		}
		$output .= '  
           <tr>  
                <td></td>  
                <td id="new_item" contenteditable></td>  
                <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>  
           </tr>  
		';  
	}
	else  
	{  
		$output .= '<tr>  
						<td>Data not Found</td>  
                    </tr>';  
	}  
		$output .= '</table>  


      </div>';  
 echo $output;  
				
?>
