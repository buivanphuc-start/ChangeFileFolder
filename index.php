<?php
spl_autoload_register(function($class_name){
    require './Handle/'.$class_name.'.php';
});

// $data = array();
// $data[] = 1;

// $data[] = 2;

// $data[1][] = 3;

// $data[2][1][] = 4;
// var_dump($data);
$dir = null;
$resource = new Resource();
if(isset($_POST['btnSearch'])){
	$dir = $_POST['links'];
}
$result = false;
if(isset($_POST['btnChange']))
{
	$links = $_POST['links'];
	$oldName = $_POST['oldName'];
	$newName = $_POST['newName'];
	$result = $resource->changeNameFile($links,$oldName,$newName);
	$dir = $_POST['links'];

}


?>
<!DOCTYPE html>
<html itemscope="" itemtype="http://schema.org/SearchResultsPage" lang="en-VN">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" href="public/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="public/fontawesome/css/all.css">

	<link rel="stylesheet" type="text/css" href="public/css/style2.css" >



  <style type="text/css">

  </style>
</head>
<body>
<div class="header">
	<div class="container">
		<div class="nameWeb">
			<h1>Web change the File or Folder name</h1>
		</div>
	</div>
</div>
<nav>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="formSearch">
					<form action="index.php" method="POST">
						<legend>Pleace enter the link to the folder or file</legend>
						<div class="form-group">
							<input type="text" class="form-control" id="link" name="links" placeholder="Enter the address link">
						</div>
						<button type="submit" name="btnSearch" class="btn btn-primary">Search</button>
					</form>	
				</div>				
			</div>
			
			<div class="col-md-6">
				<div class="formChange">
						<form action="index.php" method="POST" id="formRename" role="form">
						<legend>Change a new name</legend>
						<div class="form-group">
							<input type="text" class="form-control" name="oldName" id="oldName" placeholder="Enter the name to change">
							<input type="text" class="form-control" name="newName" id="newName" placeholder="Enter a new name">
							<input  type="hidden" class="form-control" id="links" name="links" value="<?php echo $dir ?>">
						</div>

						<button type="submit" id="btnChange" name='btnChange' class="btn btn-primary">Change</button>
					</form>	
				</div>				
			</div>
			<div class="col-md-12">
				<div class="table">
						<div class="force-overflow">
							<ul>
								<?php 
								if($dir != null) {
									echo "<h3>".$dir."</h3>";
								 	$resource->dirToArray($dir);
								}
								?>
							</ul>
						</div>
				</div>			
			</div>
		</div>
	</div>
	

</nav>
	<script type="text/javascript" src="public/bootstrap/js/jquery-3.4.0.min.js"></script>
	<script type="text/javascript" src="public/bootstrap/js/bootstrap.min.js"></script>

	<script type="text/javascript" src="./public/js/script.js"></script>
</body>
</html>
