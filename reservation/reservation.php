<?php
include '../../header.php';
?>

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
var_dump($data);
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
