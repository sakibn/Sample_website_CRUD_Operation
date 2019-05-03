<?php
require "header_footer/header.php";
if($_SESSION['cat'] =! 'yeah'){
    header("location: ../index.php?error=ever_felt_like_you_are_in_a_wrong_place?");
    exit();
};
?>

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
                        <th>Username</th>
                        <th>Password</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Drivers License Number</th>
                        <th>Phone Number</th>
                        <th>Age</th>
                        <th>Street</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Zip</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <input type="text" ng-model="addData.CUSTOMER_USERNAME" class="form-control"
                                   placeholder="Enter Username" ng-required="true"/>
                        </td>
                        <td>
                            <input type="password" ng-model="addData.CUSTOMER_PWD" class="form-control" placeholder="Password"
                                   ng-required="true"/>
                        </td>
                        <td>
                            <input type="text" ng-model="addData.CUSTOMER_FIRST_NAME" class="form-control"
                                   placeholder="Enter First Name" ng-required="true"/>
                        </td>
                        <td>
                            <input type="text" ng-model="addData.CUSTOMER_LAST_NAME" class="form-control"
                                   placeholder="Enter Last Name" ng-required="true"/>
                        </td>
                        <td>
                            <input type="text" ng-model="addData.DRIVERS_LICENSE_NUMBER" class="form-control"
                                   placeholder="Enter DRIVERS_LICENSE_NUMBER" ng-required="true"/>
                        </td>
                        <td>
                            <input type="text" ng-model="addData.CUSTOMER_PHONE_NUMBER" class="form-control"
                                   placeholder="Enter DRIVERS_LICENSE_NUMBER" ng-required="true"/>
                        </td>
                        <td>
                            <input type="text" ng-model="addData.CUSTOMER_AGE" class="form-control"
                                   placeholder="Enter DRIVERS_LICENSE_NUMBER" ng-required="true"/>
                        </td>
                        <td>
                            <input type="text" ng-model="addData.CUSTOMER_STREET" class="form-control"
                                   placeholder="Enter Street Address" ng-required="true"/>
                        </td>
                        <td>
                            <input type="text" ng-model="addData.CUSTOMER_CITY" class="form-control"
                                   placeholder="Enter City" ng-required="true"/>
                        </td>
                        <td>
                            <input type="text" ng-model="addData.CUSTOMER_STATE" class="form-control"
                                   placeholder="Enter State" ng-required="true"/>
                        </td>
                        <td>
                            <input type="text" ng-model="addData.CUSTOMER_ZIP" class="form-control"
                                   placeholder="Enter Zip Code" ng-required="true"/>
                        </td>
                        <td>
                            <button type="submit" class="btn btn-success btn-sm" ng-disabled="testform.$invalid">Add
                            </button>
                        </td>
                    </tr>
                    <tr ng-repeat="data in namesData" ng-include="getTemplate(data)"></tr>
                    </tbody>
                </table>
            </form>
            <script type="text/ng-template" id="display">
                <td>{{data.CUSTOMER_USERNAME}}</td>
                <td>{{CUSTOMER_PWD}}</td>
                <td>{{data.CUSTOMER_FIRST_NAME}}</td>
                <td>{{data.CUSTOMER_LAST_NAME}}</td>
                <td>{{data.DRIVERS_LICENSE_NUMBER}}</td>
                <td>{{data.CUSTOMER_PHONE_NUMBER}}</td>
                <td>{{data.CUSTOMER_AGE}}</td>
                <td>{{data.CUSTOMER_STREET}}</td>
                <td>{{data.CUSTOMER_CITY}}</td>
                <td>{{data.CUSTOMER_STATE}}</td>
                <td>{{data.CUSTOMER_ZIP}}</td>


                <td>
                    <button type="button" class="btn btn-primary btn-sm" ng-click="showEdit(data)">Edit</button>
                    <button type="button" class="btn btn-danger btn-sm" ng-click="deleteData(data.CUSTOMER_ID)">Delete
                    </button>
                </td>
            </script>
            <script type="text/ng-template" id="edit">
                <td>
                    <input type="text" ng-model="formData.CUSTOMER_USERNAME" class="form-control"/>
                </td>
                <td>
                    <input type="password" ng-model="formData.CUSTOMER_PWD" class="form-control"/>
                </td>
                <td>
                    <input type="text" ng-model="formData.CUSTOMER_FIRST_NAME" class="form-control"/>
                </td>
                <td>
                    <input type="text" ng-model="formData.CUSTOMER_LAST_NAME" class="form-control"/>
                </td>
                <td>
                    <input type="text" ng-model="formData.DRIVERS_LICENSE_NUMBER" class="form-control"/>
                </td>
                <td>
                    <input type="text" ng-model="formData.CUSTOMER_PHONE_NUMBER" class="form-control"/>
                </td>
                <td>
                    <input type="text" ng-model="formData.CUSTOMER_AGE" class="form-control"/>
                </td>
                <td>
                    <input type="text" ng-model="formData.CUSTOMER_STREET" class="form-control"/>
                </td>
                <td>
                    <input type="text" ng-model="formData.CUSTOMER_CITY" class="form-control"/>
                </td>
                <td>
                    <input type="text" ng-model="formData.CUSTOMER_STATE" class="form-control"/>
                </td>
                <td>
                    <input type="text" ng-model="formData.CUSTOMER_ZIP" class="form-control"/>
                </td>

                <td>
                    <input type="hidden" ng-model="formData.data.CUSTOMER_ID"/>
                    <button type="button" class="btn btn-info btn-sm" ng-click="editData()">Save</button>
                    <button type="button" class="btn btn-default btn-sm" ng-click="reset()">Cancel</button>
                </td>
            </script>
        </div>
    </div>

    </body>
    </html>
    <script>
        var app = angular.module('liveApp', []);

        app.controller('liveController', function ($scope, $http) {
            $scope.fetchData = function () {
                $http.post('customer_mods/select.php').success(function (data) {
                    $scope.namesData = data;
                });
            };
            $scope.formData = {};
            $scope.getTemplate = function (data) {
                if (data.CUSTOMER_ID === $scope.formData.CUSTOMER_ID) {
                    return 'edit';
                } else {
                    return 'display';
                }
            };

            $scope.addData = {};

            $scope.success = false;

            $scope.insertData = function () {
                $http({
                    method: "POST",
                    url: "customer_mods/insert.php",
                    data: $scope.addData,
                }).success(function (data) {
                    $scope.success = true;
                    $scope.successMessage = data.message;
                    $scope.fetchData();
                    $scope.addData = {};
                });
            };
            $scope.closeMsg = function () {
                $scope.success = false;
            };
            $scope.showEdit = function (data) {
                $scope.formData = angular.copy(data);
            };

            $scope.reset = function () {
                $scope.formData = {};
            };

            $scope.editData = function () {
                $http({
                    method: "POST",
                    url: "customer_mods/edit.php",
                    data: $scope.formData,
                }).success(function (data) {
                    $scope.success = true;
                    $scope.successMessage = data.message;
                    $scope.fetchData();
                    $scope.formData = {};
                });
            };

            $scope.deleteData = function (CUSTOMER_ID) {
                if (confirm("Are you sure you want to remove it?")) {
                    $http({
                        method: "POST",
                        url: "customer_mods/delete.php",
                        data: {'CUSTOMER_ID': CUSTOMER_ID}
                    }).success(function (data) {
                        $scope.success = true;
                        $scope.successMessage = data.message;
                        $scope.fetchData();
                    });
                }
            }
        });
    </script>
<?php
//require 'header_footer/footer.php';
//?>