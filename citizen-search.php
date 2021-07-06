<!DOCTYPE html>
<html lang="en">
    <?php session_start();
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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

    <script src="js/bootstrap.min.js"></script>
    <script src="js/angular.min.js"></script>
    <style>
       
         body {
           background-image: url(pics/undrawgif.gif);
            background-repeat: no-repeat;
            background-size: 80%;

        }

          #up{
            width: 100%;
            height: 65px;
            padding: 10px;
            background-color: steelblue;
        }  
        #up h2{
            padding: 10px;
        }
        #up img{
            border-radius: 50%;
        }
 #up a{
            color: black;
        }
       #up a:hover{
            text-decoration: none;
           color: black;
        }
    </style>
    <script>
        var varModule = angular.module("ourmodule", []);
        varModule.controller("mycontroller", function($scope, $http) {
            $scope.jsonArrayCat;
            $scope.jsonArraySel;
            $scope.doFetchAllCat = function() {
                $http.get("jsonFetchAllCatReq.php").then(okFx, notOkFx);

                function okFx(response) {
                    $scope.jsonArrayCat = response.data;
                    $scope.selObject = $scope.jsonArrayCat[1];
                }

                function notOkFx(response) {
                    alert(response.data);
                }
            }


            //--=-=-=-=-=-=
            $scope.jsonArrayCity;

            $scope.doFetchAllCity = function() {
                $http.get("jsonFetchAllCityReq.php").then(okFx, notOkFx);

                function okFx(response) {
                    //alert(JSON.stringify(response.data));
                    $scope.jsonArrayCity = response.data;
                    $scope.selObject2 = $scope.jsonArrayCity[1];
                }

                function notOkFx(response) {
                    alert(response.data);
                }
            }
            $scope.doFetchSel = function() {
                $http.get("jsonFetchSelReq.php?category=" + $scope.selObject.category + "&city=" + $scope.selObject2.city).then(okFx, notOkFx);

                function okFx(response) {
                    
                    $scope.jsonArraySel = response.data;
                }

                function notOkFx(response) {
                    alert(response.data);
                }
            }
            $scope.showDetails = function(index) {
                $scope.txtdet = $scope.jsonArraySel[index];
            }
            $scope.array;
            $scope.dodetails=function(custuid){
                $http.get("jsonfetchalldetails.php?custuid="+custuid).then(okFx,notOkFx);
                function okFx(response){
                    //alert(JSON.stringify.data);
                    $scope.array=response.data;
                }
                function notOkFx(response){
                    alert(response.data);
                }
            }
        })

    </script>
</head>

<body ng-app="ourmodule" ng-controller="mycontroller" ng-init="doFetchAllCat(); doFetchAllCity();">
     <div id="up"><h2 style="float:left;margin-left:2%">Search here for Work<h3 style="float:right;margin-right:2%"><a href="Profile-citizen-front.php">Hi! <?php 
    echo $_SESSION["activeuser"];
        ?>   <img src="pics/user.png" style="float:left;height:48px;margin-right:10px"></a></h3></h2></div>
    <center>
        <h4>Category:  <select ng-model="selObject" ng-options="obj.category for obj in jsonArrayCat"></select></h4>
        <br>
        <h4>
        City:    <select ng-model="selObject2" ng-options="obj.city for obj in jsonArrayCity"></select></h4>
        <br>
        <div class="btn btn-primary" ng-click="doFetchSel();">Show</div>
    </center>
    <div class="container">
        <div class="row">
            <div class="col-md-3" ng-repeat="obj in jsonArraySel">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"> {{obj.problem}}</h5>
                        <p class="card-text">Location: {{obj.location}}</p>
                        <p class="card-text">City: {{obj.city}}</p>
                        <p class="card-text">dop: {{obj.firmshop}}</p>
                        <div ng-click="showDetails($index)" class="btn btn-primary" data-toggle="modal" data-target="#modalDetails">More Details</div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" tabindex="-1" role="dialog" id="modalDetails">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title">Detalis</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
 <div class="form-group">


                           <img src="uploads/{{array[0].pic}}" height="150">

                        </div>
                        <div class="form-group">


                            Citizen Name:{{array[0].name}};

                        </div>
                        <div class="form-group">


                            Citizen Name:{{array[0].uid}};

                        </div>
                        <div class="form-group">


                            Citizen Name:{{array[0].contact}};

                        </div>
                        <div class="form-group">


                            Citizen Name:{{array[0].address}};

                        </div> <div class="form-group">


                            Citizen Name:{{array[0].city}};

                        </div> <div class="form-group">


                            Citizen Name:{{array[0].stat}};

                        </div> <div class="form-group">


                            Citizen Name:{{array[0].email}};

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
