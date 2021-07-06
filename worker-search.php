<!DOCTYPE html>
<html lang="en">
<?php session_start();
?>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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

    </style>
    <script>
        var varModule = angular.module("ourmodule", []);
        varModule.controller("mycontroller", function($scope, $http) {
            $scope.jsonArrayCat;
            $scope.jsonArraySel;
            $scope.doFetchAllCat = function() {
                $http.get("jsonFetch-allCat.php").then(okFx, notOkFx);

                function okFx(response) {
                    // alert(JSON.stringify(response.data));
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
                $http.get("jsonFetch-allCity.php").then(okFx, notOkFx);

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
                $http.get("jsonFetch-sel.php?category=" + $scope.selObject.category + "&city=" + $scope.selObject2.city).then(okFx, notOkFx);

                function okFx(response) {
                    alert(JSON.stringify(response.data));
                    $scope.jsonArraySel = response.data;
                }

                function notOkFx(response) {
                    alert(response.data);
                }
            }
            $scope.showDetails = function(index) {
                $scope.txtdet = $scope.jsonArraySel[index];
            }
        })

    </script>
    <style>
    .doSelect{
        background-color: white;
        height: 20%;
        margin-top: 10%;
        width: 40%;
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
</head>

<body ng-app="ourmodule" ng-controller="mycontroller" ng-init="doFetchAllCat(); doFetchAllCity();">
    <div id="wait"></div>
    <div id="up"><h2 style="float:left;margin-left:2%">Search here for Worker<h3 style="float:right;margin-right:2%"><a href="Profile-citizen-front.php">Hi! <?php 
    echo $_SESSION["activeuser"];
        ?>   <img src="pics/user.png" style="float:left;height:48px;margin-right:10px"></a></h3></h2></div>
    <br>
    <center>
        <h4>Category:<select ng-model="selObject" ng-options="obj.category for obj in jsonArrayCat"></select></h4>
        <br>
        <h4>City:<select ng-model="selObject2" ng-options="obj.city for obj in jsonArrayCity"></select></h4>
        <br>
            <div class="btn btn-primary" ng-click="doFetchSel();">Show</div>
    </center>
    <div class="container">
        <div class="row">
            <div class="col-md-3" ng-repeat="obj in jsonArraySel">
                <div class="card">
                    <img src="uploads/{{obj.ppic}}" height="100" class="card-img-top" alt="...">
                    <div class="card-body">
                     <center>   <h5 class="card-title"> {{obj.wname}}</h5>
                        <p class="card-text">Specialization: {{obj.spl}}</p>
                        <p class="card-text">Experience: {{obj.exp}}</p>
                        <p class="card-text">Firm Name: 
                            {{obj.firmshop}}</p>
                        <div ng-click="showDetails($index)" class="btn btn-primary" data-toggle="modal" data-target="#modalDetails">More Details</div>
                        </center>
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
<center>
                        <div class="form-group">
                            Progile Pic: <img src="uploads/{{txtdet.ppic}}" height="100" style="width:100px" class="card-img-top" alt="...">
                            Aadhar Pic:
                            <img src="uploads/{{txtdet.apic}}" height="100"  style="width:100px" class="card-img-top" alt="...">
                            <br>
                            Name: {{txtdet.wname}}
                            <br> Firm Name: {{txtdet.firmshape}}
                            <br>
                            City: {{txtdet.city}}
                            <br>
                            Category: {{txtdet.category}}
                            <br>
                            Specialization: {{txtdet.spl}}
                            <br>
                            Experience: {{txtdet.exp}}
                            <br>
                            Other Info :{{txtdet.otherinfo}}
<br>
                            Rating: {{txtdet.total/txtdet.count}}

                        </div>
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
