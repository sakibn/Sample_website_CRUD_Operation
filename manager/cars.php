<?php
require "header_footer/header.php";
if($_SESSION['cat']!= "yeah" ) {
    header("location: ../index.php?error=wrong_place_yeah");
//    var_dump($_SESSION);
    exit();
}
//elseif($_SESSION['dog']!= 2){
//    header("location: ../index.php?error=wrong_place");
//}
?>
    <body>
    <div class="container" ng-app="liveApp" ng-controller="liveController" ng-init="fetchData()">
        <br>
        <div class="table-responsive">
            <div class="alert alert-success alert-dismissible" ng-show="success">
                <a href="#" class="close" data-dismiss="alert" ng-click="closeMsg()" aria-label="close">&times;</a>
                {{successMessage}}
            </div>
            <form name="testform" ng-submit="insertData()">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Model</th>
                        <th>Shop Location</th>
                        <th>Mileage</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <input type="text" ng-model="addData.MODEL" class="form-control" placeholder="Car Model" ng-required="true" required />
                        </td>
                        <td>
                            <input type="number" ng-model="addData.SHOP_ID" class="form-control" placeholder="Shop ID" ng-required="true" required/>
                        </td>
                        <td>
                            <input type="number" ng-model="addData.MILEAGE" class="form-control" placeholder="Mileage" ng-required="true" required/>
                        </td>
                        <td>
                            <button type="submit" class="btn btn-success btn-sm" ng-disabled="testform.$invalid">Add</button>
                        </td>
                    </tr>
                    <tr ng-repeat="data in namesData" ng-include="getTemplate(data)"></tr>
                    </tbody>
                </table>
            </form>
            <script type="text/ng-template" id="display">
                <td>{{data.MODEL}}</td>
                <td>{{data.SHOP_ID}}</td>
                <td>{{data.MILEAGE}}</td>
                <td>
                    <button type="button" class="btn btn-primary btn-sm" ng-click="showEdit(data)">Edit</button>
                    <button type="button" class="btn btn-danger btn-sm" ng-click="deleteData(data.REGISTRATION_NUMBER)">Delete</button>
                </td>
            </script>
            <script type="text/ng-template" id="edit">
                <td>
                    <input type="text" ng-model="formData.MODEL" class="form-control"/>
                </td>
                <td>
                    <input type="password" ng-model="formData.SHOP_ID" class="form-control"/>
                </td>
                <td>
                    <input type="text" ng-model="formData.MILEAGE" class="form-control"/>
                </td>
                <td>
                    <input type="hidden" ng-model="formData.data.REGISTRATION_NUMBER"/>
                    <button type="button" class="btn btn-info btn-sm" ng-click="editData()">Save</button>
                    <button type="button" class="btn btn-default btn-sm" ng-click="reset()">Cancel</button>
                </td>
            </script>
        </div>
    </div>

    </body>

    <script>
        var app = angular.module('liveApp', []);

        app.controller('liveController', function ($scope, $http) {
            $scope.fetchData = function () {
                $http.get('car_mods/select.php').success(function (data) {
                    $scope.namesData = data;
                });
            };
            $scope.formData = {};
            $scope.getTemplate = function (data) {
                if (data.REGISTRATION_NUMBER === $scope.formData.REGISTRATION_NUMBER) {
                    return 'edit';
                } else {
                    return 'display';
                }
            };

            $scope.addData = {};

            $scope.success = false;

            $scope.insertData = function()
            {
                $http({
                    method: "POST",
                    url: "car_mods/insert.php",
                    data:$scope.addData,
                }).success(function(data){
                    $scope.success = true;
                    $scope.successMessage = data.message;
                    $scope.fetchData();
                    $scope.addData = {};
                });
            };
            $scope.closeMsg = function(){
                $scope.success = false;
            };
            $scope.showEdit = function(data)
            {
                $scope.formData = angular.copy(data);
            };

            $scope.reset = function()
            {
                $scope.formData = {};
            };

            $scope.editData = function()
            {
                $http({
                    method:"POST",
                    url:"car_mods/edit.php",
                    data:$scope.formData,
                }).success(function(data){
                    $scope.success = true;
                    $scope.successMessage = data.message;
                    $scope.fetchData();
                    $scope.formData = {};
                });
            };

            $scope.deleteData = function(REGISTRATION_NUMBER)
            {
                if(confirm("Are you sure you want to remove it?"))
                {
                    $http({
                        method:"POST",
                        url:"car_mods/delete.php",
                        data:{'REGISTRATION_NUMBER':REGISTRATION_NUMBER}
                    }).success(function(data){
                        $scope.success = true;
                        $scope.successMessage = data.message;
                        $scope.fetchData();
                    });
                }
            }
        });
    </script>
<?php
require "header_footer/footer.php";
