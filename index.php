<html>

<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="JS/jquery-1.8.2.min.js"></script>
    <script src="JS/bootstrap.min.js"></script>
    <title>document</title>
    <link rel=stylesheet href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript">
        $(document).ready(function() {
                    $("#txtUid").focus();

                    //--=--=-=-=-=-=USER ID VALIDATION-=-=-=-//

                    /*      $("#txtUid").blur(function() {
                              var r = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
                              var uid = $("#txtUid").val();
                              if (uid == "") {
                                  $("#emailHelp").html("Enter user ID first");

                                  $("#txtUid").focus();
                              } else if (r.test(uid) == false) {
                                  $("#emailHelp").html("Enter valid Email Id");

                              } else {
                                  $("#emailHelp").html("It's FINE");

                              }

                          });*/

                    //-=-=-=-=-=-=-= PASSWORD VERIFICATION USING EYE BUTTON-=-=-=-=-//

                   $("#btnPwd").mousedown(function() {

                        $("#txtPwd").prop("type", "text");
                    });
                    $("#btnPwd").mouseup(function() {
                        $("#txtPwd").attr("type", "password");
                    });
                  //-=-=-==-=-=-=-=-=-=-=-==-=-=- PASSWORD=-=-=-=-=-=-//
                    $("#txtPwd").keydown(function() {
                        var r = /(?=^.{8,}$)(?=.*\d)(?=.*[!@#$%^&*]+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/;
                        var pwd = $(this).val();
                        if (r.test(pwd) == false) {
                            $("#errPwd").html("min-8,numerics,spl symbols,alph.");
                        } else if (pwd.length <= 4)
                            $("#errPwd").html("weak");
                        else
                        if (pwd.length > 4 && pwd.length <= 7)
                            $("#errPwd").html("Average");
                        else
                            $("#errPwd").html("Strong");
                    });

                    //-=-=-=-=-=-=-=-=-=MOBILE PHONE VALIDATION-=-=-=-=-//

                    $("#txtMob").blur(function() {
                        var r = /^[6-9]{1}[0-9]{9}$/;
                        var pwd = $("#txtMob").val();

                        if (r.test(pwd) == false) {
                            $("#errMob").html("Invalid Mobile number");
                        } else {
                            $("#errMob").html("okay");

                        }

                    });

                    $("#txtUid").blur(function() {
                        var uid = $("#txtUid").val();
                        var actionUrl = "ajax-login.php?uid=" + uid;
                        $.get(actionUrl, function(response) {
                            $("#emailerr").html(response);
                            
                        });});
                        
  $("#log").click(function() {
                            $("#txtuid").val("");
                            $("#txtpwd").val("");
                            $("#loginmsg").html("*");
                        })
                        $("#signn").click(function() {
                            $("txtUid").val("");
                            $("txtMob").val("");
                            $("txtPwd").val("");
                            $('input[name="radio"]').prop('checked', false);
                                                        $("#modalLogin").modal("hide");

                        })
            
                   

                    //-=-=-=-=-= SIGNUP-=-=-=-=-=-=-=-=-=-        
                    $("#signup").click(function() {
                        var uid = $("#txtUid").val();
                        var pwd = $("#txtPwd").val();
                        var mob = $("#txtMob").val();



                        if ($("#txtCatW").prop("checked") == true)
                            var cat = $("#txtCatW").val();
                        else
                            var cat = $("#txtCatC").val();

                        var actionUrl = "ajax-sign.php?uid=" + uid + "&pwd=" + pwd + "&mobile=" + mob + "&category=" + cat;
                        $.get(actionUrl, function(response1) {
                            $("#msg").html(response1);
                        });
                        var actionurl = "sms-send.php?uid=" + uid + "&pwd=" + pwd + "&mobile=" + mob + "&category=" + cat;
                        $.get(actionurl, function(response1) {

                            $("#msg").html(response1);
                            $("#modalSignup").modal("hide");
                        });
                    });
$(document).ajaxStart(function() {
    
				$("#wait").show();
			});

			$(document).ajaxStop(function() {
				$("#wait").hide();
                    });
                
                    
                    //-=-=-=========Send message-==========



                    //-=-=-=-=-=-=-=-Login Page-=-=-=-=-=//
                    $("#login").click(function() {
                        var uid = $("#txtuid").val();
                        var pwd = $("#txtpwd").val();

                        var actionUrl = "ajax-loginbtn.php?uid=" + uid + "&pwd=" + pwd;
                        $.get(actionUrl, function(response2) {
                            //alert(response2);
                            //$("#loginmsg").html(response2);
                            if (response2 == "citizen") {

                                location.href = "dash-citizen.php";

                            } else if (response2 == "worker")
                                location.href = "dash-worker.php";
                            else if(response2=="Admin")
                                location.href="dash-admin.php";
                            else
                               $("#loginmsg").html(response2);

                        });
                    
                    });
                                $("#forgot").click(function() {
                     $("#modalLogin").modal("hide");
                                })

            
                    //-=-=-=-=-=-=-=-Forgot password-=-=-==--//
                    $("#forgotbttn").click(function() {

                        var uid = $("#email").val();
                        alert();
                        
                        var Actionurl = "sms-send-forgot.php?uid=" + uid;
                        $.get(Actionurl, function(response) {
                            $("#forgotmsg").html(response);
                           //alert(response);
                        })
                    
                    });
                      
                });

    </script>
    <style>
        #loginmsg{
            color: red;
            font-size: 20px;
        }
        #emailerr{
                 color: green;
            font-size: 15px;
        
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
        .carr {
            height: 76%;
        }

        .card {
            border-radius: 3%;
        }

        .card img {
            height: 155px;
            border-radius: 5%;
        }

        .developer {
            height: 280px;
            width: 100%;
          background-color: lightyellow;

        }      
        #signn:hover{
            cursor: pointer;
        }
        #overall{
            width: 80%;
            margin-left:10%;
        }
        .left  {
            width: 18%;
                        border-radius: 50%;

            background-color: whitesmoke;
            float: left;
        }
        .dev:hover{
            text-shadow: 2px 2px 10px lightgray;
        }
        .right {
            width: 32%;
            float: left;
            padding: 25px;
        }
        .dev img{
            border-radius: 50%;
            border: 1px grey white;
        }
        .dev img:hover{
            box-shadow: 1px 1px 10px grey;
        }

        .left img {
            height: 93%;
            width: 90%;
            margin: 8px;
        }

        body {
            background-image: url(pics/latest.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            font-family: cursive;
        }

        .footer {
            
            height: 363px;
            background-color: black;
            color: white;
            float: left;
            padding: 20px;
        }

        .footer .leftside {
            width: 28%;
            float: left;
            padding: 25px;
            margin-right: 20px;
        }

        .footer .rightside {
            width: 33%;
            float: right;
            padding: 25px;
            height: 100%;
            color: white;
        
        }
        ul{
            list-style: none;
        }
        .rightside h4{
            text-align: center;
        }

        .rightside img {
            height: 23px;
            width: 23px;
            margin: 6px;
            border-radius: 50%;
        }

        a {
            color: inherit;
        }

        a:hover {
            text-decoration: none;
            color: inherit;
        }

        .rightside li:hover {
            cursor: pointer;
        }

        .footer .centerside {
            width: 25%;
            float: left;
            padding: 25px;
            height: 100%;
            margin-left: 55px;
        }

        h2 {
            background-color: darkslategrey;
            color: whitesmoke;
        }
        #forgot{
            
            color: #0000EE;
        }
        #forgot:hover{
            cursor: pointer;
        }
        .carousel-inner h4 {
            color: black;
        }

        .carousel-inner p {
            color: black;
        }

        nav img {
            height: 37px;
        }
        .navbar{
            
            top: 5px;
            z-index: 3;
            
        }


    </style>

    <style>
        .mapouter {
            position: relative;
            text-align: center;
            height: 500px;
            width: 600px;
        }

        .gmap_canvas {
            overflow: hidden;
            background: none !important;
            height: 500px;
            width: 600px;
        }
    </style>
</head>

<body>
    
    <div id="wait"></div>
    <div id="overall">
    <!--    //-=-=-=-=navbar-=-=-=-=-=-=-=-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#"><img src="pics/logooo2.png"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">www.mps.com <span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
        <!--======================================================-->
        
        <div class="btn btn-outline-light" data-toggle="modal" id="log" data-target="#modalLogin" style="margin-left:30px">Login</div>
        <!---=================================================-->

    </nav>

    <!---========================carousall-------->
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active carr">
                <img src="pics/Red%20Modern%20Marketing%20Presentation.png" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                   <b> <h4>Serving the mankind</h4>
                    <p>Services are provided on a click.</p>
                    </b>           </div>
            </div>
            <div class="carousel-item carr">
                <img src="pics/Red%20Modern%20Marketing%20Presentation%20(5).png" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                   <b> <h4>Valuable Feedback</h4>
                       <p> Feedback is recorded for services</p></b>
                </div>
            </div>
            <div class="carousel-item carr">
                <img src="pics/Red%20Modern%20Marketing%20Presentation%20(1).png" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <b>  <h4>Providing jobs to workers</h4>
                    <p>Employment is key to development
                      </p></b>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-----=-=-=-=-====================----------->
    <br>
    <center>
        <h2> Our Services</h2>
    </center>


    <br>
    <!----===============----cards------>
    <div class="container">
        <div class="form-row">
            <div class="col-md-3">
                <div class="card" style="width: 14rem;">
                    <img src="pics/search.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Worker Search</h5>
                        <p class="card-text">The clients are allowed to search the worker as per their need.</p>

                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card" style="width: 14rem;">
                    <img src="pics/getwork2.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Get Work</h5>
                        <p class="card-text">Now it's very easy to find the work best suited for you.</p>

                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card" style="width: 14rem;">
                    <img src="pics/postwork2.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Post Work</h5>
                        <p class="card-text">Citizens can now post their work here to be noticed by the workers.</p>

                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card" style="width: 14rem;">
                    <img src="pics/rating.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Rate Workers</h5>
                        <p class="card-text">Citizens are allowed to give their feedback the services provided.</p>

                    </div>
                </div>
            </div>
        </div>


    </div>
    <!--         Meet the Developer-=-=-=-         -->

    <br>
    <center>
        <h2> Meet the Developer </h2>
    </center>
<center>
        <div class="developer"><div class="dev">
            <div class="developer left"><img src="pics/mypicnew'.jpeg" style="height:inherit">
            </div>
            <div class="developer right" style="border-right:3px darkslategrey solid">
                <br>
                <h3>
                    Palvika</h3>
                <p>
                (Engineering Student @ BVCOE,GGSIPU)
               Full StackWeb Developer, Creativity head at BVPIEEE-IAS,C Programmer, Loves coding in C, Always excited to learn new skills.<br>
                #Email : palvikagoyal123@gmail.com</p>

            </div></div>
   <div class="dev">         <div class="developer right">
                <br>
                <h3>
                   Rajesh K. Bansal </h3>
<p>
(SCJP-Sun Certified Java Programmer)
17 Years experience in Training & Development. Founder of realJavaOnline.com, loves coding in Java(J2SE, J2EE), C++,PHP, Python, AngularJS, Android.<br> 
    #Email : bcebti@gmail.com #Contact : 98722-46056</p>
            </div>
 <div class="developer left"><img src="pics/sir.jpg">
            </div>   </div>         
        </div>
    </center>
    <div class="footer">
        <div class="leftside">

            <h4>ABOUT US</h4>
            <p>Mps.com is a website developed keeping in mind the basic needs of one and all, This website mainly focus on the most important part of one's life i.e.Manpower Services and employment. We allow our users to hire, compare and review the services they opt for.</p>
        </div>
        <div class="centerside">
            <h4>FUTURE SCOPE</h4>
            <p>
                Currently the site is focused on manpower services and ready to enhance the features as per user's feedback and requirement.</p>
        </div>
        <div class="rightside">
            <h4>REACH US</h4>
            <ul>
                <li><a href="https://goo.gl/maps/q98aA1BaKhbACZHe7"><img src="pics/location.png">google/bzd/bhszs</a></li>
                <li><a href="tel:918194932232"><img src="pics/call.png">+91 8194932232</a></li>
                <li><img src="pics/mail.png">contact@mps.com></li>
              <!--<li>  <a href="mailto:palvika2811@gmail.com">sdfhfgtjhk</a></li>-->
                <li><a href="v"></a><img src="pics/twitter.png">serviceyouneed.com></li>
                <li><a href="https://www.linkedin.com/in/palvika-goyal-035976181"><img src="pics/linkedin.png">ManPower</a></li>
                <li><a href="https://www.facebook.com/EasyWork-106842021109870/"><img src="pics/fb.png">Services.sxj</a></li>

            </ul>
        </div>
            </div>
    <!---=--=-=-=-=-=-=-=-=---------Google Map Embedd-=-------------->
     
       <!--<center>
        <div class="mapouter">
<h4>Find our way</h4>
            <li> <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3447.8807337916096!2d74.95013941507348!3d30.211951281821662!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391732a4f07278a9%3A0x4a0d6293513f98ce!2sBanglore%20Computer%20Education%20(C%20C%2B%2B%20Android%20J2EE%20PHP%20Python%20AngularJs%20Spring%20Java%20Training%20Institute)!5e0!3m2!1sen!2sin!4v1594707464908!5m2!1sen!2sin" width="70" height="70" frameborder="1" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe></li>
        </div>
    </center>-->
    <!--signup form-->

    <div class="modal fade" tabindex="-1" role="dialog" id="modalSignup">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title">Signup</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="txtUid">Email address</label>
                            <input type="text" required class="form-control" id="txtUid">
                            <small id="emailerr" class="form-texts">&nbsp;</small>
                        </div>
                        <div class="form-group">
                            <label for="txtPwd">Password</label>
                            <input type="password" required class="form-control" id="txtPwd">
                        
                            <small id="errPwd" class="form-text text-muted">&nbsp;</small>
                        </div>
                        <div class="form-group">
                            <label for="txtMob">Mobile Number</label>
                            <input type="text" required class="form-control" id="txtMob">
                            <small id="errMob" class="form-text text-muted">&nbsp;</small>
                        </div>
                  
                    </form>
                </div>
                <div class="modal-footer">

                    <small id="msg" class="form-text text-muted">&nbsp;</small>

                    <button type="button" class="btn btn-primary" id="signup">Signup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- login form -->

    <div class="modal fade" tabindex="-1" role="dialog" id="modalLogin">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title">Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="txtuid">Email address</label>
                            <input type="text" class="form-control" id="txtuid">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="txtpwd">

                        </div>
                      <center>    <button type="button" class="btn btn-primary " id="login">Login</button><br><div data-toggle="modal" data-target="#modalforgot" id="forgot">Forgot Password ?</div>     

                        </center>
                    </form>
                </div>
                                   
<center>
                                    
               
 New to EasyWork?<div data-toggle="modal" id="signn" data-target="#modalSignup" style="margin-left:30px;color:blue">Join Now
                  
    </div></center></div>
            </div>
        </div>
    </div>

    <!-- forgot password-->

    <div class="modal fade" tabindex="-1" role="dialog" id="modalforgot">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title">Forgot Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="forgo">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="text" class="form-control" id="email">
                        </div>
                        <!--<div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="password">

                        </div>-->
                    </form>
                </div>
                <div class="modal-footer">
                    <span id="forgotmsg">&nbsp;</span>
                    <button type="button" class="btn btn-primary" id="forgotbttn">Forgot Password</button>

                </div>
            </div>
        </div>
    </div>
       </div>
</body>

</html>
