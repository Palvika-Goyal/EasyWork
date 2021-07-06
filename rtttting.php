<html>

<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
-->
    <script src="JS/jquery-1.8.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/angular.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <style>
        .rating {
            color: #a9a9a9;
            margin: 0;
            padding: 0;
        }

        ul.rating {
            display: inline-block;
        }

        .rating li {
            list-style-type: none;
            display: inline-block;
            padding: 1px;
            text-align: center;
            font-weight: bold;
            cursor: pointer;
        }

        .rating .filled {
            color: #21568b;
        }

    </style>
    <script>
        angular.module('StarOfMonth', [])
            .controller('OodlesRatingCtrl', function($scope) {
                $scope.rating = 5;
                $scope.rateFunction = function(rating) {
                    alert('You selected - ' + rating + ' stars');
                };
            })
            .directive('starRating',
                function() {
                    return {
                        restrict: 'A',
                        template: '<ul class="rating">' +
                            '	<li ng-repeat="star in stars" ng-class="star" ng-click="toggle($index)">' +
                            '\u2605' +
                            '</li>' +
                            '</ul>',
                        scope: {
                            ratingValue: '=',
                            max: '=',
                            onRatingSelected: '&'
                        },
                        link: function(scope, elem, attrs) {
                            var updateStars = function() {
                                scope.stars = [];
                                for (var i = 0; i < scope.max; i++) {
                                    scope.stars.push({
                                        filled: i < scope.ratingValue
                                    });
                                }
                            };

                            scope.toggle = function(index) {
                                scope.ratingValue = index + 1;
                                scope.onRatingSelected({
                                    rating: index + 1
                                });
                            };

                            scope.$watch('ratingValue',
                                function(oldVal, newVal) {
                                    if (newVal) {
                                        updateStars();
                                    }
                                }
                            );
                        }
                    };
                }
            );

    </script>
</head>

<body ng-app="StarOfMonth" ng-controller="OodlesRatingCtrl">

    <h3>Rating</h3>
    <div ng-init="rating = star.rating + 1"></div>

    <div class="star-rating" star-rating rating-value="rating" data-max="5" on-rating-selected="rateFunction(rating)"></div>
</body>

</html>
