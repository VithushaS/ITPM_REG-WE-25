
<?php
// Start the session
// session_start();
// if (!isset($_SERVER['HTTP_REFERER'])) {
//     // redirect them to your desired location
//     header('location:index.php');
//     exit;
// }
 
?>
<!DOCTYPE html>
<html>
<head>



        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">

        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
  

<script>

var id = "<?php echo $_GET['id'] ?>";

</script>


<style type="text/css">
	*{
		font-family: sans-serif;
	}
	
</style>
</head>
 





<body class="bg-dark">
	  <div class="container">
		<div class="row justify-content-center" id="modal_fx">
			<div class="col-lg-5 bg-light mt-4 px-4 p-2 rounded">
			   <h2 class="text-center text-info pb-2">📁Attachments📁</h2>
			   <form action="" method="POST" enctype="multipart/form-data" id="attach_upload">
			   	<div class="form-group">

			   		<div class="browse custom-file">
			   			<input type="file" name="files[]" class="custom-file-input" id="attach" accept=".pdf">
			   			<label for="image" class="custom-file-label">Project Attachement</label>
			   		</div>
			   	</div>
                   
			   	<div class="form-group">
			   		<input type="submit" id="add" name="submit" class="btn btn-info btn-block" value="UPLOAD">
			   	</div>
			   	<h5 class="text-center text-success" id="result"> </h5>
                   <button id="show">show</button>
			   </form>	
			</div>
		</div>
         <div class="row justify-content-center">
         	<div class="col-lg-10 mt-4">
         		<div class="row p-2" id="preview">
                 <!--Images will be displayed dynamically here-->
         		</div>
         	</div>
         </div>
	 </div>
<script type="text/javascript" src="js/attach.js"></script>


             
<!-- hide start  -->



<!-- hide end -->
 
</body>
</html>