var app = angular.module("npApp", []);

app.controller("npCtrl", function($scope,  $http) {
	$scope.appDisplay = 'none';
    $scope.user = [];

    
	$http({
	    url: "/ajax/get_logged_user_data",
	    method: "POST"
	}).then(function successCallback(response) {
	        $scope.user = response.data.data;
	        $scope.appDisplay = 'block';
	    }, function errorCallback(response) {
	        $scope.error = response.statusText;
	});
});