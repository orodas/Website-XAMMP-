<html>
<head>
	<title>My List</title>
	<script src="js/jquery.js"></script>
</head>
<body style="background-color:powderblue;">
	<div class="container">
		<br />
		<br />
		<br />
		<div class="table-responsive">
			<h3 align="center">Manage / View</h3><br />
			<div id="live_data"></div>
		</div>
	</div>
</body>
</html>
<script>
	$(document).ready(function(){
		function fetch_data()
		{
			$.ajax({
				url:"deleteitem2.php",
				method:"POST",
				success:function(data){
					$('#live_data').html(data);
				}
			});
		}
		fetch_data();
	

		$(document).on('click', '#btn_add', function(){  
			   var new_item = $('#new_item').text(); 
				//alert(new_item);
			   if(new_item == '')  
			   {  
					alert("Enter New item");  
					return false;  
			   }  
			   $.ajax({  
					url:"editlist.php",  
					method:"POST",  
					data:{new_item:new_item},  
					dataType:"text",  
					success:function(data)  
					{  
						 alert(data);  
						 fetch_data();  
					}  
			   })  
		});

		function edit_data(id, text, column_name)  
		{  
			$.ajax({  
				url:"edit.php",  
				method:"POST",  
				data:{id:id, text:text, column_name:column_name},  
				dataType:"text",  
				success:function(data){  
					//alert(data);  
				}  
			});  
		} 

		$(document).on('blur', '.item', function(){  
			   var id = $(this).data("id1");  
			   var item = $(this).text();  
			   edit_data(id, item, "val");  
		});

		$(document).on('click', '.btn_delete', function(){  
           var id=$(this).data("id3");  
           if(confirm("Are you sure you want to delete this?"))  
           {  
                $.ajax({  
                     url:"delete.php",  
                     method:"POST",  
                     data:{id:id},  
                     dataType:"text",  
                     success:function(data){  
                          alert(data);  
                          fetch_data();  
                     }  
                });  
           }  
		});  

	});		
</script>
