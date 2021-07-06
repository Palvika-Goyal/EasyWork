<!DOCTYPE html>
<html lang="en">
<?php 
    session_start();
   
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
    <script>
     var varModule = angular.module("ourmodule", []);
        varModule.controller("mycontroller", function($scope, $http) {
            $scope.jsonArray;
            $scope.doFetch = function() {
                $http.get("jsonFetch.php?uid=" + $scope.txtUid).then(okFx, notOkFx);

                function okFx(response) {
                    alert(JSON.stringify(response.data));

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
                    alert(JSON.stringify(response.data));
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
                    alert(JSON.stringify(response.data));
                    $scope.jsonArrayRate = response.data;
                }

                function notOkFx(response) {
                    alert(response.data);

                }
            }
            $scope.jsonArrayRating;
            $scope.doPost = function(index) {
                alert($scope.rat);
                $scope.rid = $scope.jsonArrayRate[index].rid;
                $http.get("json-rating.php?workeruid=" + $scope.jsonArrayRate[index].workeruid + "& rid=" + $scope.rid+"&rate="+ $scope.rate).then(okFx, notOkFx);

                function okFx(response) {
                    alert(JSON.stringify(response.data));
                    $scope.jsonArrayRating=response.data;}
                    function notOkFx(response) {
                        alert(response.data);
                    }
                }
            
        });</script>
    

    <style>
        h4 {
            color: #062F4F;

            background-color: darkgoldenrod;
            line-height: 50px;
        }

        body {
            background-color: #062F4F;
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
        .card:hover{
            cursor: pointer;
        }
    </style>
</head>

<body ng-app ng-init="doFetchAll();">
    <h4>www.mps.com   Welcome: <!--?php session_start(); echo $_SESSION["activeuser"];?-->
</h4>
  
  <a href="Manager-users-front.php">  <div class="card" style="width: 18rem;"><br>
        <center> <img src="pics/rating.jpg" style="width:240px" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">User Manager</h5>
                <p class="card-text">Workers can request their clients for rating here.</p>
            </div>

        </center>
      </div></a>
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
    
</body>

</html>
