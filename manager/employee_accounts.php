<?php
require "header_footer/header.php";
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
                        <th>DOB yyyy-mm-dd</th>
                        <th>Street</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Zip</th>
                        <th>Salary</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <input type="text" ng-model="addData.USERNAME" class="form-control"
                                   placeholder="Enter User Name" ng-required="true"/>
                        </td>
                        <td>
                            <input type="password" ng-model="addData.PWD" class="form-control" placeholder="Password"
                                   ng-required="true"/>
                        </td>
                        <td>
                            <input type="text" ng-model="addData.EMPLOYEE_FIRST_NAME" class="form-control"
                                   placeholder="Enter First Name" ng-required="true"/>
                        </td>
                        <td>
                            <input type="text" ng-model="addData.EMPLOYEE_LAST_NAME" class="form-control"
                                   placeholder="Enter Last Name" ng-required="true"/>
                        </td>
                        <td>
                            <input type="text" ng-model="addData.EMPLOYEE_DOB" class="form-control"
                                   placeholder="Enter DOB" ng-required="true"/>
                        </td>
                        <td>
                            <input type="text" ng-model="addData.EMPLOYEE_STREET" class="form-control"
                                   placeholder="Enter Street Address" ng-required="true"/>
                        </td>
                        <td>
                            <input type="text" ng-model="addData.EMPLOYEE_CITY" class="form-control"
                                   placeholder="Enter City" ng-required="true"/>
                        </td>
                        <td>
                            <input type="text" ng-model="addData.EMPLOYEE_STATE" class="form-control"
                                   placeholder="Enter State" ng-required="true"/>
                        </td>
                        <td>
                            <input type="text" ng-model="addData.EMPLOYEE_ZIP" class="form-control"
                                   placeholder="Enter Zip Code" ng-required="true"/>
                        </td>
                        <td>
                            <input type="text" ng-model="addData.EMPLOYEE_WAGE" class="form-control"
                                   placeholder="Enter Salary" ng-required="true"/>
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
                <td>{{data.USERNAME}}</td>
                <td>{{PWD}}</td>
                <td>{{data.EMPLOYEE_FIRST_NAME}}</td>
                <td>{{data.EMPLOYEE_LAST_NAME}}</td>
                <td>{{data.EMPLOYEE_DOB}}</td>
                <td>{{data.EMPLOYEE_STREET}}</td>
                <td>{{data.EMPLOYEE_CITY}}</td>
                <td>{{data.EMPLOYEE_STATE}}</td>
                <td>{{data.EMPLOYEE_ZIP}}</td>
                <td>{{data.EMPLOYEE_WAGE}}</td>

                <td>
                    <button type="button" class="btn btn-primary btn-sm" ng-click="showEdit(data)">Edit</button>
                    <button type="button" class="btn btn-danger btn-sm" ng-click="deleteData(data.EMPLOYEE_ID)">Delete
                    </button>
                </td>
            </script>
            <script type="text/ng-template" id="edit">
                <td>
                    <input type="text" ng-model="formData.USERNAME" class="form-control"/>
                </td>
                <td>
                    <input type="password" ng-model="formData.PWD" class="form-control"/>
                </td>
                <td>
                    <input type="text" ng-model="formData.EMPLOYEE_FIRST_NAME" class="form-control"/>
                </td>
                <td>
                    <input type="text" ng-model="formData.EMPLOYEE_LAST_NAME" class="form-control"/>
                </td>
                <td>
                    <input type="text" ng-model="formData.EMPLOYEE_DOB" class="form-control"/>
                </td>
                <td>
                    <input type="text" ng-model="formData.EMPLOYEE_STREET" class="form-control"/>
                </td>
                <td>
                    <input type="text" ng-model="formData.EMPLOYEE_CITY" class="form-control"/>
                </td>
                <td>
                    <input type="text" ng-model="formData.EMPLOYEE_STATE" class="form-control"/>
                </td>
                <td>
                    <input type="text" ng-model="formData.EMPLOYEE_ZIP" class="form-control"/>
                </td>
                <td>
                    <input type="text" ng-model="formData.EMPLOYEE_WAGE" class="form-control"/>
                </td>

                <td>
                    <input type="hidden" ng-model="formData.data.EMPLOYEE_ID"/>
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
                $http.get('select.php').success(function (data) {
                    $scope.namesData = data;
                });
            };
            $scope.formData = {};
            $scope.getTemplate = function (data) {
                if (data.EMPLOYEE_ID === $scope.formData.EMPLOYEE_ID) {
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
                    url: "employee_mods/insert.php",
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
                    url: "employee_mods/edit.php",
                    data: $scope.formData,
                }).success(function (data) {
                    $scope.success = true;
                    $scope.successMessage = data.message;
                    $scope.fetchData();
                    $scope.formData = {};
                });
            };

            $scope.deleteData = function (EMPLOYEE_ID) {
                if (confirm("Are you sure you want to remove it?")) {
                    $http({
                        method: "POST",
                        url: "employee_mods/delete.php",
                        data: {'EMPLOYEE_ID': EMPLOYEE_ID}
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
require 'header_footer/footer.php';
?>