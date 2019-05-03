<?
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>CSS Website Layout</title>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

body {
  margin: 0;
}

/* Style the header */
.header {
  background-color: #f1f1f1;
  padding: 20px;
  text-align: center;
}

/* Style the top navigation bar */
.topnav {
  overflow: hidden;
  background-color: #333;
}

/* Style the topnav links */
.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

/* Change color on hover */
.topnav a:hover {
  background-color: #ddd;
  color: black;
}
</style>
</head>
<body>

<div class="header">
  <h1>Reservation</h1>
  <h3>Recieve your car from Cartholemeu Today!</h3>
</div>

<div class="topnav">
  <a href="index.php">Home</a>
  <a href="inventory.php">Inventory</a>
</div>
<div ng-app="myApp" ng-controller="myCtrl" ng-init="fetchData()">
    <form action="reservation-include/rent.php" method="POST">
        <label for="cars">Selects one car: </label>
        <select name="car">
            <option ng-repeat="x in names"  value="{{x.REGISTRATION_NUMBER}}">{{x.NAME}}</option>
        </select>
        <br>
        <button type="submit" name="rent_submit">Submit</button>

</div>

</form>

<?
include '../../footer.php';
?>
<script>
    var app = angular.module('myApp', []);
    app.controller('myCtrl', function($scope,$http) {
        // $scope.names = ["Emil", "Tobias", "Linus"];
        $scope.success=true;
        $http({
            type: 'GET',
            url: 'reservation-include/select.php',
            // headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function (response) {
            $scope.names =  response.data;
        })
    });
    window.addEventListener( "pageshow", function ( event ) {
        var historyTraversal = event.persisted ||
            ( typeof window.performance != "undefined" &&
                window.performance.navigation.type === 2 );
        if ( historyTraversal ) {
            // Handle page restore.
            window.location.reload();
        }
    });
</script>
<?php
exit();
?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
