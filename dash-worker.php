<!DOCTYPE html>
<html lang="en">
<?php 
    session_start();
     if(isset($_SESSION["activeuser"])==false)
        header("location:index.php");
    ?>

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-1.8.2.min.js"></script>

    <script src="JS/bootstrap.min.js"></script>


    <script>
        $(document).ready(function() {
            $("#work").click(function() {
                var uidW = $("#txtUidW").val();
                var uidC = $("#txtUidC").val();
                var actionUrl = "ajax-rating.php?workeruid=" + uidW + "&citizenuid=" + uidC;
                $.get(actionUrl, function(response) {
                    $("#msg").html(response);
                })
            })
        })

    </script>
    <style>
        h4 {
            color: #062F4F;

            
            line-height: 50px;
        }

        body {
           background-image: url(pics/bgnew.png);
            background-size: cover;
            background-repeat: no-repeat;
            color: #1d1e22;
        }

        .card {
            color: black;
            float: left;
            margin-left: 50px;
            border-radius: 10px;

        }

        .card:hover {
            cursor: pointer;
        }
         #bar{
            height:70px;
            width: 100%;
            background-color: lightsteelblue;
            float: left;
            padding: 16px;
            margin-bottom: 10px;
        }
        #bar h3{
            cursor: pointer;
        }
        #bar a{
            color: black;
        }
        #bar a:hover{
            text-decoration: none;
            color: black;

    </style>
</head>

<body>
    <div id="bar">
     <h4 style="float:left;margin-left:2%">www.mps.com <h3 style="float:right;margin-right:2%"><a href="Profile-worker-front.php">Hi! <?php 
    echo $_SESSION["activeuser"];
        ?>   <img src="pics/user.png" style="float:left;height:48px;margin-right:10px;border-radius:50%"></a></h3></h4>
    
    </div>
    
    <div class="container">
        
       <div class="form-row">
            <div class="col-md-3"><a href="Profile-worker-front.php">
                    <div class="card" style="width: 18rem;"><br>
                        <center> <img src="pics/user.png" style="width:125px" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Profile</h5>
                                <p class="card-text">Workers can update their profile here</p>
                            </div>

                        </center>
                    </div>
                </a></div>
             <a href="citizen-search.php">
                <div class="col-md-3 offset-md-3">
                    <div data-toggle="modal" id="profile" data-target="#modalWork" class="card" style="width: 18rem;"><br>
                        <center> <img src="pics/search.png" style="width:118px;height:120px" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Search the Work</h5>
                                <p class="card-text">Citizens can ssearch worker for their work here</p>
                            </div>

                        </center>
                    </div>
                </div>
            </a>
        
            <div class="col-md-3 offset-md-1">
                <div data-toggle="modal" id="profile" data-target="#modalWork" class="card" style="width: 18rem;"><br>
                    <center> <img src="pics/rating.jpg" style="width:215px" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Work</h5>
                            <p class="card-text">Citizens can post their work or queries here</p>
                        </div>

                    </center>
                </div>
            </div></div>
        <br>
         <div class="form-row">
            <div class="col-md-3">
                <a href="logout.php">

                    <div data-toggle="modal" id="profile" data-target="#modalWork" class="card" style="width: 18rem;"><br>
                        <center> <img src="pics/logout.jpg" style="width:118px" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Logout</h5>
                                <p class="card-text">Citizens can post their work or queries here</p>
                            </div>

                        </center>
                    </div>
               
                </a>
            </div>
        </div> 
 
             

    <div class="modal fade" tabindex="-1" role="dialog" id="modalWork">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="container">
                    <div class="modal-header">
                        <h5 class="modal-title">Request Rating</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="col-md-12 form-group">
                            <label for="txtUidW">Worker id</label>
                            <input type="text" id="txtUidW" class="form-control" required name="txtUidW" value=" <?php 
        echo $_SESSION['activeuser'];
        ?>">
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="col-md-12 form-group">
                            <label for="txtUidC">Citizen id</label>
                            <input type="text" id="txtUidC" class="form-control" required name="txtUidC">
                        </div>

                    </div>

                    <div class="modal-footer">
                        <small id="msg">*</small>
                        <button type="button" id="work" class="btn btn-primary">Request Rating</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>
