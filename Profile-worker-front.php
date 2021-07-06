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

    <!---=-=-=-=-=--=-=-=--->
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

        function showPreview(file) {

            if (file.files && file.files[0]) {
                var reader = new FileReader();
                reader.onload = function(ev) {
                    $('#prev2').attr('src', ev.target.result);
                }
                reader.readAsDataURL(file.files[0]);
            }

        }
        var pos=state_arr.indexOf(jsonAryResponse[0].state);
        
$("#state").val(jsonAryResponse[0].state);
print_city('city', pos+1);
$("#city").val(jsonAryResponse[0].city);

    </script>
    
   
    <!--=-=-=-=-=JSON-=-=-=-=-=---->
    <script>
        $(document).ready(function() {
            $("#btnFetchProfile").click(function() {
                var uid = $("#txtUid").val();
                //alert(uid);
                var url = "JSON-workers.php?uid=" + uid;

                $.getJSON(url, function(jsonAryResponse) {
                    alert(JSON.stringify(jsonAryResponse));
                    //alert(jsonAryResponse.length);
                    if (jsonAryResponse.length == 0)
                        alert("invalid id");
                    else {
                        $("#txtEmail").val(jsonAryResponse[0].email); //use table col. name
                        $("#txtName").val(jsonAryResponse[0].wname); //use table col. name
                        $("#txtMob").val(jsonAryResponse[0].cnumber); //use table col. name
                        $("#txtFirm").val(jsonAryResponse[0].firmshop); //use table col. name
                        $("#txtAdd").val(jsonAryResponse[0].address); //use table col. name
                        $("#txtCity").val(jsonAryResponse[0].city); //use table col. name
                        $("#state").val(jsonAryResponse[0].stat); //use table col. name
                        $("#cat").val(jsonAryResponse[0].category); //use table col. name
                        $("#txtSpc").val(jsonAryResponse[0].spl); //use table col. name
                        $("#experience").val(jsonAryResponse[0].exp); //use table col. name
                        $("#txtInfo").val(jsonAryResponse[0].otherinfo); //use table col. name
                        $("#prev").attr("src", "uploads/" + jsonAryResponse[0].apic);
                        $("#prev2").attr("src", "uploads/" + jsonAryResponse[0].ppic);
                        $("#hdn").val(jsonAryResponse[0].apic);
                        $("#hdn2").val(jsonAryResponse[0].ppic);

                    }
                });

            })
        })

    </script>
<style>
    
    .container{
        width: 80%;
        margin-left: 10%;
        background-color:dimgray;
        color: white;   
    }
    
    </style>
</head>

<body>
    <!--<div id="wait"></div>-->
    <div class="container">
        <div class="row bg-success">
            <div class="col-md-12">
                <center>
                    <h3>Worker Profile</h3>
                </center>
            </div>
        </div>
        <form action="Profile-worker-process.php" method="post" enctype="multipart/form-data">

            <input type="hidden" id="hdn" name="hdn">
            <input type="hidden" id="hdn2" name="hdn2">
            <div class="form-row">
                <div class="col-md-5 form-group">
                    <label for="txtUid">Email/User id</label>
                    <input type="text" id="txtUid" class="form-control" disabled name="txtUid" value=" <?php 
        echo $_SESSION["activeuser"];
        ?>">
                    <span id="errUid">*</span>
                </div>
                <div class="col-md-5 form-group">
                    <label for="txtEmail">E-mail</label>
                    <input type="text" class="form-control"  name="txtEmail" id="txtEmail">
                </div>
                <div class="col-md-2 form-group">
                    <label for="">&nbsp;</label>
                    <input type="button" id="btnFetchProfile" class="form-control btn btn-secondary" value="Fetch Profile">

                </div>


            </div>
            <div class="form-row">
                <div class="col-md-5 form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="txtName" required id="txtName">
                </div>
                <div class="col-md-3 form-group">
                    <label for="">Contact Number</label>
                    <input type="text" required class="form-control" name="txtMob" id="txtMob">
                </div>
                <div class="col-md-4 form-group">
                    <label for="">Firm Name</label>
                    <input type="text" oninvalid="this.setCustomValidity('Enter proper mobile number')"  class="form-control" name="txtFirm" id="txtFirm">
                </div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Address</label>
                <textarea class="form-control" required name="txtAdd" id="txtAdd" rows="3"></textarea>
            </div>


            <div class="form-row">
                <div class="col-md-6 form-group">
                    <label for="">City</label>
                    <input type="text" required class="form-control" required name="txtCity" id="txtCity">
                </div>
                <div class="form-group col-md-6">
                    <label for="state">State</label>
                    <select onchange="print_city('city',this.selectedIndex);" id="state" name="state" class="form-control" required>
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
                        <option value="WEST BENGAL">WEST BENGAL</option>
                    </select>
                </div>

            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="cat">Category</label>
                    <select id="cat" name="cat" required class="form-control">
                        <option selected>Select</option>
                        <option value="Painter">Painter</option>
                        <option value="Plumber">Plumber</option>
                        <option value="Electrician">Electrician</option>
                        <option value="Contractor">Contractor</option>
                        <option value="Carpenter">Carpenter</option>
                        <option value="Mason">Mason</option>
                    </select></div>
                <div class="col-md-6 form-group">
                    <label for="txtSpc">Specialization</label>
                    <input type="text" class="form-control" name="txtSpc" id="txtSpc">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="experience">Experience</label>
                    <select id="experience" name="experience" class="form-control">
                        <option selected>None</option>
                        <option value="1">1 year</option>
                        <option value="2">2 year</option>
                        <option value="3">3 year</option>
                        <option value="4">4 year</option>
                        <option value="5">5 or more</option>
                    </select></div>
                <div class="col-md-6 form-group">
                    <label for="txtInfo">Other Info</label>
                    <input type="text" class="form-control" name="txtInfo" id="txtInfo">
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-2">
                    <label for="">Select aadhar Pic</label>
                </div>
                <div class="col-md-3">
                    <input type="file" name="aadharPic" id="aadharPic" onchange="showpreview(this);">
                </div>
                <div class="col-md-1">
                    <img src="pics/user2.jpg" id="prev" width="50" height="50" alt="">
                </div>
                <div class="col-md-2">
                    <label for="">Select Profile Pic</label>
                </div>
                <div class="col-md-3">
                    <input type="file" name="profilePic" id="profilePic" onchange="showPreview(this);">
                </div>
                <div class="col-md-1">
                    <img src="pics/user.png" id="prev2" width="50" height="50" alt="">
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
