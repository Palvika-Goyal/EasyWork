<!DOCTYPE html>
<html lang="en">
<?php session_start();
    if(isset($_SESSION["activeuser"])==false)
        header("location:index.php");
?>


<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
-->
    <script src="JS/jquery-1.8.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/angular.min.js"></script>


    <style>
        .card {
            float: left;
            margin-top: 20px;
            margin-left: 50px;
            border-radius: 10px;
        }

       

        a {
            color: black;
        }

        .card:hover {
            cursor: pointer;
            color: black;
        }

        body {
background-image: url(pics/bgnew.png) ;
        background-size: cover;
        background-repeat: no-repeat;}

    </style>
    <!-- styling---rating...-->

    <style>
        .hide {
            display: none;
        }

        .rating>label {
            font-size: 1.5rem;
        }

        .rating {
            direction: rtl;
        }

        .rating>label:hover::before,
        .rating>label:hover~label:before,
        .rating>input:checked~label:before {
            color: gold;
            content: "\2605";
            position: absolute;
        }

        .rating>label:hover::before,
        .rating>label:hover~label:before {
            background-color: aqua;
        }

    </style>
    <!---js gor requirement-->
    <script>
        $(document).ready(function() {
            $("#work").click(function() {
                var uid = $("#txtUid").val();
                var category = $("#cat").val();
                var problem = $("#txtService").val();
                var location = $("#txtLoc").val();
                var city = $("#txtCity").val();
                var actionUrl = "ajax-requirement.php?uid=" + uid + "&category=" + category + "&problem=" + problem + "&location=" + location + "&city=" + city;
                $.get(actionUrl, function(response) {
                    $("#msg").html(response);
                })
                            $("#modalWork").modal("hide");

            })
            
        })

    </script>
    <script>
        var varModule = angular.module("ourmodule", []);
        varModule.controller("mycontroller", function($scope, $http) {
            $scope.jsonArray;
            $scope.doFetch = function() {
                $http.get("jsonFetch.php?uid=" + $scope.txtUid).then(okFx, notOkFx);

                function okFx(response) {
                    
                    $scope.jsonArray = response.data;
                }

                function notOkFx(response) {
                    alert(response.data);
                }
            }
            $scope.doDel = function(i) {
                $scope.r = $scope.jsonArray[i].rid;
                $http.get("json-delete.php?rid=" +
                    $scope.r).then(okFx, notOkFx);

                function okFx(response) {
                    $scope.jsonArraySel = response.data;
                }

                function notOkFx(response) {
                    alert(response.data);
                }
            }

            $scope.jsonArrayRate;
            $scope.doFetchRate = function() {
                $http.get("jsonFetchRate.php?uid=" + $scope.uid).then(okFx, notOkFx);

                function okFx(response) {
                    $scope.jsonArrayRate = response.data;
                }

                function notOkFx(response) {
                    alert(response.data);
                }
            }
            $scope.updateRatings = function(rid, workeruid, index) {
                console.log(rid);

                var ele = document.getElementsByName(rid);
                //alert(ele);
                for (i = 0; i < ele.length; i++) {
                    if (ele[i].checked) {
                        $scope.ratingsValue = ele[i].value;
                        //alert($scope.ratingsValue);
                        $http.get("json-rate-worker.php?username=" + workeruid + "&rating=" + $scope.ratingsValue + "&rid=" + rid).then(ok, notok);

                        function ok(response) {
                          
                            $scope.jsonArrayRate.splice(index, 1);           }
                        function notok(response) {
                            alert();
                        }

                    
                }
            }
        };
        });

    </script>
    <style>
        #bar{
            height:70px;
            width: 100%;
            background-color: white;
            float: left;
            padding: 16px;
            
        }
        #bar h3{
            cursor: pointer;
        }
        #bar a:hover{
            text-decoration: none;
            color: black;
        }
    </style>
</head>
<body ng-app="ourmodule" ng-controller="mycontroller">
 
    <div id="bar">
    <h4 style="float:left;margin-left:2%">www.mps.com <h3 style="float:right;margin-right:2%"><a href="Profile-citizen-front.php">Hi! <?php 
    echo $_SESSION["activeuser"];
        ?>   <img src="pics/user.png" style="float:left;height:48px;margin-right:10px"></a></h3></h4></div>
    
    <div class="container">
        <div class="form-row">
            <div class="col-md-3"><a href="Profile-citizen-front.php">
                    <div class="card" style="width: 18rem;"><br>
                        <center> <img src="pics/user.png" style="width:125px" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Profile</h5>
                                <p class="card-text">Citizens can update their profile here</p>
                            </div>

                        </center>
                    </div>
                </a></div>
             <a href="worker-search.php">
                <div class="col-md-3 offset-md-3">
                    <div data-toggle="modal" id="profile"  class="card" style="width: 18rem;"><br>
                        <center> <img src="pics/search.png" style="width:118px;height:120px" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Search the Worker</h5>
                                <p class="card-text">Citizens can ssearch worker for their work here</p>
                            </div>

                        </center>
                    </div>
                </div>
            </a>
        
            <div class="col-md-3 offset-md-1">
                <div data-toggle="modal" id="profile" data-target="#modalWork" class="card" style="width: 18rem;"><br>
                    <center> <img src="pics/services.jpg" style="width:215px" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Work</h5>
                            <p class="card-text">Citizens can post their work or queries here</p>
                        </div>

                    </center>
                </div>
            </div></div>
         <div class="form-row">
            <div class="col-md-3">
                <div data-toggle="modal" id="requirement" data-target="#modalreq" class="card" style="width: 18rem;"><br>
                    <center> <img src="pics/requirement.jpg" style="width:215px;height:120px" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Requirement</h5>
                            <p class="card-text">Citizens can rate the services by worker here</p>
                        </div>

                    </center>
                </div>
            </div>
              <div class="col-md-3 offset-md-1">
                <div data-toggle="modal" id="rating" data-target="#modalrate" class="card" style="width: 18rem;"><br>
                    <center> <img src="pics/rating.jpg" style="width:215px;height:120px" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Rate The Worker</h5>
                            <p class="card-text">Citizens can post their work or queries here
                            </p>                        </div>

                    </center>
                </div>
            </div>
           
        <a href="logout.php">
                <div class="col-md-3 offset-md-3">
                    <div data-toggle="modal" id="profile" data-target="#modalWork" class="card" style="width: 18rem;"><br>
                        <center> <img src="pics/logout.jpg" style="width:118px" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Logout</h5>
                                <p class="card-text">Citizens can post their work or queries here</p>
                            </div>

                        </center>
                    </div>
                </div>
            </a>
        </div>
        
           
        <div class="modal fade" tabindex="-1" role="dialog" id="modalWork">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="container">
                        <div class="modal-header">
                            <h5 class="modal-title">Post Requirement</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <br>
                        <div class="form-row">
                            <div class="col-md-6 form-group">
                                <label for="txtUid">Email/User id</label>
                                <input type="text" id="txtUid" class="form-control" ng-model="txtUid" required name="txtUid" disabled ng-init="txtUid='<?php echo $_SESSION['activeuser']?>'">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="cat">Category</label>
                                <select id="cat" name="cat" class="form-control">
                                    <option selected>Select</option>
                                    <option value="Painter">Painter</option>
                                    <option value="Plumber">Plumber</option>
                                    <option value="Electrician">Electrician</option>
                                    <option value="Contractor">Contractor</option>
                                    <option value="Carpenter">Carpenter</option>
                                    <option value="Mason">Mason</option>
                                </select></div>
                        </div>
                        <div class="form-group">
                            <label for="txtService">Services you need</label>
                            <textarea class="form-control" required name="txtService" id="txtService" rows="3"></textarea>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 form-group">
                                <label for="">Location</label>
                                <input type="text" required class="form-control" name="txtLoc" id="txtLoc">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="">City</label>
                                <input type="text" required class="form-control" name="txtCity" id="txtCity">
                            </div>


                            <div class="modal-footer">
                                <button type="button" id="work" class="btn btn-primary">Post requirement</button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" tabindex="-1" role="dialog" id="modalreq">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="container">
                        <div class="modal-header">
                            <h5 class="modal-title">Post Requirement</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <br>
                        <div class="form-row">
                            <div class="col-md-12 form-group">
                                <label for="Uid">Cutuid</label>
                                <input type="text" class="form-control" ng-model="txtUid"  name="rid" ng-init="txtUid='<?php echo $_SESSION['activeuser']?>'">
                            </div>
                        </div>
                        <center>
                            <div class="col-md-6 form-group">
                                <button type="button" class="btn btn-primary" ng-click="doFetch();">Fetch Requirement</button>
                            </div>
                        </center>

                        <table width="450" border="1">
                            <tr>
                                <th>Sr. No.</th>
                                <th>Rid</th>
                                <th>Custid</th>
                                <th>category</th>
                                <th>Problem</th>
                                <th>Location</th>
                            </tr>
                            <tr ng-repeat="obj in jsonArray">

                                <td>
                                    {{obj.rid}}
                                </td>
                                <td>
                                    {{obj.custuid}}
                                </td>
                                <td>
                                    {{obj.category}}
                                </td>
                                <td>
                                    {{obj.problem}}
                                </td>
                                <td>
                                    {{obj.location}}
                                </td>
                                <td>
                                    <input value="delete" type="button" ng-click="doDel($index);">
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" tabindex="-1" role="dialog" id="modalrate">
            <div class="modal-dialog">
                <div class="modal-content" id="x">
                    <div class="modal-header bg-warning">
                        <h5 class="modal-title">Manage Rating</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-row">
                                <div class=" form-group">
                                    <label for="uid">USER ID</label>
                                    <input type="text" class="form-control" name="uid" ng-model="uid" ng-init="uid='<?php echo $_SESSION['activeuser']?>'">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class=" form-group">

                                    <button type="button" class="btn btn-primary" id="signup" ng-click="doFetchRate();">Fetch Data</button>
                                    <table class="table table-dark">
                                        <font color="white">
                                            <tr>
                                                <th>RID</th>
                                                <th>Worker Uid</th>
                                                <th>Rating</th>
                                                <th>Post Rating</th>

                                            </tr>
                                            <tr ng-repeat="obj in jsonArrayRate">
                                                <td>{{obj.rid}}</td>
                                                <td>{{obj.workeruid}}</td>
                                                <td>
                                                    <form>
                                                        <div class="rating">
                                                            <input type="radio" name={{obj.rid}} class="hide" id="star5-{{obj.rid}}" value="5"><label for="star5-{{obj.rid}}">&#9734;</label>
                                                            <input type="radio" name={{obj.rid}} class="hide" id="star4-{{obj.rid}}" value="4"><label for="star4-{{obj.rid}}">&#9734;</label>
                                                            <input type="radio" name={{obj.rid}} class="hide" id="star3-{{obj.rid}}" value="3"><label for="star3-{{obj.rid}}">&#9734;</label>
                                                            <input type="radio" name={{obj.rid}} class="hide" id="star2-{{obj.rid}}" value="2"><label for="star2-{{obj.rid}}">&#9734;</label>
                                                            <input type="radio" name={{obj.rid}} class="hide" id="star1-{{obj.rid}}" value="1"><label for="star1-{{obj.rid}}">&#9734;</label>
                                                        </div>
                                                    </form>
                                                </td>
                                                <td>
                                                    <button ng-click="updateRatings(obj.rid,obj.workeruid,$index);">Update</button>
                                                </td>

                                            </tr>
                                        </font>
                                    </table>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



</body>

</html>
