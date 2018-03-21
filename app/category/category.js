angular.module("app")
    .controller("categoryCrl",function ($scope, $http, Category){
        $scope.category = Category.data.records;
        $scope.vidsOnSite = 10;
        $scope.loadMore = function () {
            $scope.vidsOnSite += 10;
        }

    });