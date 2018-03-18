angular.module("app")
    .controller("nMoviesCtrl",function ($scope, $http){
    $http.get("../newestMovies/newestMoviesOnSite.php")
        .then(function (response) {$scope.nMovies = response.data.records;});
    $scope.vidsOnSite = 10;
    $scope.loadMore = function () {
        $scope.vidsOnSite += 10;
    }

});