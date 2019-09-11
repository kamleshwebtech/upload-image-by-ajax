<html>
<head>
<script type="text/javascript" src="assets/jquery-3.3.1.min.js"></script>

<link href="assets/bootstrap.css" media="screen" rel="stylesheet" type="text/css">
<style>
/* Container */
.container{
   font-family: arial;
   margin: 0 auto;
   margin-top: 5%;
   border: 0px solid black;
   width: 50%;
   border-radius: 5px;
   background-color: ghostwhite;
   text-align: center;
   padding: 20px;
   border:solid 1px #dadada;
}
/* Preview */
.preview{
   width: 100px;
   height: 100px;
   border: 1px solid #999999;
   margin: 0 auto;
   background: white;
}

.preview img{
   /*display: none;*/
}
/* Button */
.button{
   border: 0px;
   background-color: deepskyblue;
   color: white;
   padding: 5px 15px;
   margin-left: 10px;
}
.mt-20{
	margin-top: 20px;
}
</style>
</head>
<body>
<div class="container">
	<h1 align="center">Upload Image By Ajax</h1>
    <form method="post" action="" enctype="multipart/form-data" id="myform">
    	<div class="mt-20 row">
	        <div class='preview'>
	            <img src="assets/no-image.jpg" id="img" width="100" height="100">
	        </div>
	    </div>
	    <div class="mt-20 row">
        	<div class="col">
            	<input type="file" id="file" name="file" accept="image/*" />
        	</div>
        </div>
        <div class="mt-20 row">
	        <div class="col">
    	        <input type="button" class="button" value="Upload" id="but_upload">
	        </div>
	    </div>
    </form>
</div>


<script type="text/javascript">
$(document).ready(function(){
    $("#but_upload").click(function(){
        var fd = new FormData();
        var files = $('#file')[0].files[0];
        fd.append('file',files);
        $.ajax({
            url: 'upload.php',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            success: function(response){
                if(response != 0){
                    $("#img").attr("src",response); 
                    $(".preview img").show(); // Display image
                }else{
                    alert('file not uploaded');
                }
            },
        });
    });
});	
</script>

</body>
</html>