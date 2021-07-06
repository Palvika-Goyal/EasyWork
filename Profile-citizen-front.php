<!DOCTYPE html>
<html lang="en">
    <?php session_start();
    ?>
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="JS/bootstrap.min.js"></script>

<script src="js/jquery-1.8.2.min.js"></script>
<script>
     function showpreview(file) {

            if (file.files && file.files[0]) {
                var reader = new FileReader();
                reader.onload = function(ev) {
                    $('#prev').attr('src', ev.target.result);
                }
                reader.readAsDataURL(file.files[0]);
            }

        }

    </script>
    <style>
        body{
            background-image: url(pics/bgnew.jpg);
            background-size: cover;
            background-repeat: no-repeat;
        }
        .container{
            width: 80%;
            background-color: #062F4F;
            color: white;
            margin-left: 10%;    
        }
    
#wait {       
        			width: 90px;
			height: 90px;
			background-image: url(pics/waitgifne.gif);
			background-size: contain;
            background-repeat: no-repeat;
			display: none;
			position: absolute;
			left: 43%;
			top: 48%;
			z-index: 20000;
            border-radius: 50%;
		}
    </style>
<script>

//--=-=-=-=-JSON=-=-=-=-=-=-=-=-=
    $(document).ready(function(){
        
        
$("#btnFetchProfile").click(function() {
var uid=$("#txtUid").val();
var url="JSON-citizens.php?uid="+uid;
//0 or 1 possibility
$.getJSON(url, function(jsonAryResponse) {
//alert(JSON.stringify(jsonAryResponse));
//alert(jsonAryResponse.length);
if(jsonAryResponse.length==0)
alert("invalid id");
else
{
$("#txtName").val(jsonAryResponse[0].name);//use table col. name
$("#txtMob").val(jsonAryResponse[0].contact);//use table col. name
$("#txtAdd").val(jsonAryResponse[0].address);//use table col. name
$("#txtCity").val(jsonAryResponse[0].city);//use table col. name
$("#state").val(jsonAryResponse[0].stat);//use table col. name
$("#email").val(jsonAryResponse[0].email);//use table col. name
$("#prev").attr("src","uploads/"+jsonAryResponse[0].pic);
$("#hdn").val(jsonAryResponse[0].pic);

}
});
});     

        $(document).ajaxStart(function() {
				$("#wait").show();
			});

			$(document).ajaxStop(function() {
				$("#wait").hide();
			});
});
</script>

</head>

<body>
<div id="wait"></div>
<div class="container">
<div class="row bg-success">
<div class="col-md-12">
<center>
<h3>Citizen Profile</h3>
</center>
</div>
</div>
<form action="Profile-citizen-process.php" method="post" enctype="multipart/form-data">

<input type="hidden" id="hdn" name="hdn">
<div class="form-row">
<div class="col-md-8 form-group">
<label for="">Email/User id</label>
<input type="text" id="txtUid" class="form-control" name="txtUid" disabled value="<?php echo $_SESSION["activeuser"]  ?>">

</div>
<div class="col-md-4 form-group">
<label for="">&nbsp;</label>
<input type="button" id="btnFetchProfile" class="form-control btn btn-secondary" value="Fetch Profile">

</div>


</div>
<div class="form-row">
<div class="col-md-6 form-group">
<label for="">Name</label>
<input type="text" class="form-control" name="txtName" id="txtName">
</div>
<div class="col-md-6 form-group">
<label for="">Contact Number</label>
<input type="text" class="form-control" required name="txtMob" id="txtMob">
</div>
</div>
<div class="form-group">
    <label for="exampleFormControlTextarea1">Address</label>
    <textarea class="form-control" name="txtAdd" id="txtAdd" rows="3"></textarea>
  </div>
<div class="form-row">
<div class="col-md-6 form-group">
<label for="">City</label>
<input type="text" class="form-control" required name="txtCity" id="txtCity">
</div>
  <div class="form-group col-md-6">
      <label for="state">State</label>
      <select id="state" name="state" class="form-control">
        <option selected>Select State</option>
        
      
       
                            <option value="ANDAMAN AND NICOBAR ISLAND">ANDAMAN AND NICOBAR ISLAND</option>
                            <option value="ANDHRA PARDESH">ANDHRA PARDESH</option>
                            <option value="ARUNACHAL PARDESH">ARUNACHAL PARDESH</option>
                            <option value="ASSAM">ASSAM</option>
                            <option value="BIHAR">BIHAR</option>
                            <option value="CHANDIGARH">CHANDIGARH</option>
                            <option value="CHHATTISGARH">CHHATTISGARH</option>
                            <option value="CADRA AND NAGAR HAVELI AND DAMAN AND DIU">CADRA AND NAGAR HAVELI AND DAMAN AND DIU</option>
                            <option value="DELHI">DELHI</option>
                            <option value="GOA">GOA</option>
                            <option value="GUJARAT">GUJARAT</option>
                            <option value="HARYANA">HARYANA</option>
                            <option value="HP">HIMACHAL PARDESH</option>
                            <option value="J&K">JAMMU AND KASHMIR</option>
                            <option value="JHARKHAND"> JHARKHAND</option>
                            <option value="KARNATAKA">KARNATAKA</option>
                            <option value="KERALA">KERELA</option>
                            <option value="LADAKH">LADAKH</option>
                            <option value="LAKSHDWEEP">LAKSHADWEEP</option>
                            <option value="MP">MADHYA PARDESH</option>
                            <option value="MAHARASHTRA">MAHARASHTRA</option>
                            <option value="MANIPUR">MANIPUR</option>
                            <option value="MEGHALAYA">MEGHALAYA</option>
                            <option value="MIZORAM">MIZORAM</option>
                            <option value="NAGALAND">NAGALAND</option>
                            <option value="ODISHA">ODISHA</option>
                            <option value="PUDUCHERRY">PUDUCHERRY</option>
                            <option value="PUNJAB">PUNJAB</option>
                            <option value="RAJASTHN">RAJASTHAN</option>
                            <option value="SIKIM">SIKIM</option>
                            <option value="TAMIL NADU">TAMIL NADU</option>
                            <option value="TELANGANA">TELANGANA</option>
                            <option value="TRIPURA">TRIPURA</option>
                            <option value="UP">UTTAR PARDESH</option>
                            <option value="UTTARAKHAND">UTTARAKHAND</option>
                            <option value="WEST BENGAL">WEST BENGAL</option></select>
    </div>

</div>
<div class="form-row">
<div class="col-md-4">
<label for="">Select Profile Pic</label>
</div>
<div class="col-md-4">
<input type="file" name="profilePic" id="profilePic" onchange="showpreview(this);">
</div>
<div class="col-md-4">
<img src="pics/user2.jpg" id="prev" width="50" height="50" alt="">
</div>
<div class="col-md-4 form-group">
<label for="txtEmail">E-mail</label>
<input type="text" class="form-control" name="email" id="email">
</div>
</div>
<br>
<div class="form-row">
<div class="col-md-12">
<center>
<input type="submit" value="Save" name="btn" class="btn btn-danger" style="width:100px">
<input type="submit" value="Update" name="btn" class="btn btn-danger" style="width:100px">
</center>
</div>
</div>
</form>
</div>
</body>

</html>