<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="style.css">
  <title>Upload your image</title>
</head>
<body>
  <form enctype="multipart/form-data" method="POST">
    <div id="sidebar_right">
    <h4>Upload your image</h4>
    <input type="file" name="uploaded_file"></input><br>
    <input type="submit" value="Upload"></input><br>
<h6>
	<?php 
	if(!empty($_FILES['uploaded_file'])){
	    $extension=pathinfo($_FILES['uploaded_file']['name'],PATHINFO_EXTENSION);
	    //取得檔案副檔名
	    $path = "/opt/lampp/htdocs/test/";
	    $path = $path . basename( $_FILES['uploaded_file']['name']);
	    $uploaded_size = $_FILES[ 'uploaded_file' ][ 'size' ];
	    $uploaded_tmp  = $_FILES[ 'uploaded_file' ][ 'tmp_name' ];
	    if(in_array($extension,array('jpg','jpeg','png','gif'))
	        && ( $uploaded_size < 100000 )
		//&& getimagesize( $uploaded_tmp )
		){
	        if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path)) {
       	         echo "successful !!!";}
       		else{
      		  echo "<script>alert('The file is not allowed, please try again!');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
     		   }
	    	}
	     else{
                echo "The file is not allowed or empty,<br> please try again!";
            }
	}
	else{
	        echo "";
	    }
	?>
</h6>
    </div>
  </form>
</body>
</html>

