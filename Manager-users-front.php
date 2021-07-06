<html>

<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/angular.min.js"></script>
    <script>
      
                    var varModule = angular.module("ourmodule", []);
                    varModule.controller("ourController", function($scope, $http) {

                        //-=-=-=-=-=-=-=-= To fetch all category from table-=-=-=-=-=-//

                        $scope.jsonArray;
                        $scope.doFetchAll = function() {
                            $http.get("jsonFetchCat.php").then(okFx, notOkFx);

                            function okFx(response) {
                                $scope.jsonArray = response.data;
                                $scope.selObject = $scope.jsonArray[1];
                            }

                            function notOkFx(response) {
                                alert(response.data);
                            }
                        }



                        //-=-=-=-=-==-=--==- To fill the data in combo box-=-=-=-=-=//

                        $scope.doFetchSelected = function() {
                            $http.get("json-FetchSelected.php?category=" + $scope.selObject.category).then(okFx, notOkFx);

                            function okFx(response) {
                                alert(JSON.stringify(response.data));
                                $scope.jsonArraySelectedcategory = response.data;
                            }

                            function notOkFx(response) {
                                alert(response.data);
                            }
                        }

                        $scope.doblock = function(i) {
                            $scope.a = $scope.jsonArraySelectedcategory[i].uid;
                            alert($scope.a);
                            $http.get("json-block.php?uid=" + $scope.a).then(okFx, notOkFx);

                            function okFx(response) {
                                alert(JSON.stringify(response.data));
                                $scope.jsonArraySelectedstatus = response.data;
                            }

                            function notOkFx(response) {
                                alert(response.data);
                            }
                        }
                        $scope.doresume = function(i) {
                            $scope.a = $scope.jsonArraySelectedcategory[i].uid;
                            alert($scope.a);
                            $http.get("json-resume.php?uid=" + $scope.a).then(okFx, notOkFx);

                            function okFx(response) {
                                alert(JSON.stringify(response.data));
                                $scope.jsonArraySelectedstatus = response.data;
                            }

                            function notOkFx(response) {
                                alert(response.data);
                            }
                        }
                        $scope.doDel = function(i) {
                            $scope.r = $scope.jsonArraySelectedcategory[i].uid;
                            $http.get("JSON-deletee.php?uid=" + $scope.r).then(okFx, notOkFx);

                            function okFx(response) {
                                alert(JSON.stringify(response.data));
                                $scope.jsonArraySel = response.data;
                            }

                            function notOkFx(response) {
                                alert(response.data);
                            }

                        }
                    });

    </script>
    <style>
    table{
        width: 70%;
        }</style>
</head>

<body ng-app="ourmodule" ng-controller="ourController" ng-init="doFetchAll();">
    <center>
        <hr>

        CATEGORY:
        <select ng-model="selObject" ng-options="obj.category for obj in jsonArray"></select>

    </center>
    <center>
        <br>

        <br>


        <div class="btn btn-danger" ng-click="doFetchSelected();">FIND RECORD</div>
        <br>
        <br>
    </center>
    <center>
        <table class="table table-hover table-dark " style="width:70%">
            <font color="white">
                <tr>
                    <th>USER ID</th>
                    <th>MOBILE</th>

                </tr>
                <tr ng-repeat="obj in jsonArraySelectedcategory">
                    <td>{{obj.uid}}</td>
                    <td>{{obj.mobile}}</td>
                    <td>
                        <input value="Block" type="button" ng-click="doblock($index);">
                    </td>
                    <td>
                        <input value="Resume" type="button" ng-click="doresume($index);">
                    </td>

                    <td>
                        <input value="Delete" type="button" ng-click="doDel($index);">
                    </td>

                </tr>
            </font>
        </table>
    </center>



</body>

</html>
