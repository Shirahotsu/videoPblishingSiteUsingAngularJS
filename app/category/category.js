    angular.module('app')
    .controller("categoryCtrl",function ($scope, $http) {
    $scope.categories= [
        "Muzyka",
        "Gry",
        "Dokumentalne",
        "Moda",
        "Sport",
        "Motoryzacja",
        "Filozofia",
        "Religia",
        "Elektronika",
        "Vlogi",
        "Śmieszne",
        "Nauka",
        "Przyroda"

    ];
    $scope.catNum = NaN;
    $scope.setCatNum = function(i) {
        $scope.catNum = i;
    };
    $scope.reset = function() {
        $scope.catNum = NaN;
    }

});