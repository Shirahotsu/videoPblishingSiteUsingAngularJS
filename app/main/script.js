var app = angular.module("app", ['ngRoute', 'ui.router']);

app.config(function($stateProvider, $urlRouterProvider){
    $stateProvider
        .state('newest', {
            url: '/newest',
            templateUrl: '../newestMovies/newestMovies.html',
            controller:"nMoviesCtrl"
        })
        .state('categories', {
            url: '/categories',
            templateUrl: '../categories/categories.html',
            controller:"categoryCtrl"
        })
        .state('addMovie', {
            url: '/addMovie',
            templateUrl: '../addMovie/addMovie.html'
        })
        .state('register', {
            url: '/register',
            templateUrl: '../register/register.php',
            controller:"RegisterCtrl"
        })
        .state('movie', {
            url: '/movie/:movie_id',
            templateUrl: '../movie/movie.html',
            controller: "SingleMovieController",
            resolve: {
              Movie : function($http, $stateParams) {
                return $http.get("../movie/movie.php?movie="+$stateParams.movie_id);

              }
            }
        })
        .state('category', {
            url: '/category/:category',
            templateUrl: '../category/category.html',
            controller: "categoryCrl",
            resolve: {
                Category : function($http, $stateParams) {
                    return $http.get("../category/category.php?category="+$stateParams.category);
                    //parematr nazwy kategorii dodany zrób teraz php z wystawaniem danych
                }
            }
        });

    $urlRouterProvider.otherwise('/newest');
});

//TODO zrobić kozystająć z materialize aby po zescrolowaniu wyświedlało kolejne filmy
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
angular.module("app")
    .controller("categoryCrl",function ($scope, $http, Category){
        $scope.category = Category.data.records;
        $scope.vidsOnSite = 10;
        $scope.loadMore = function () {
            $scope.vidsOnSite += 10;
        }

    });

    angular.module('app')
    .controller("SingleMovieController",function ($scope, $http, Movie) {
    $scope.mov ={
        tit : Movie.data.movieTitle,
        au : Movie.data.movieUser,
        date: Movie.data.movieDate,
        cat : Movie.data.movieCategory

    }
});

//jak się kliknie w napis danej kategorii to odpali wszytkie filmy w danej kategorii
//    jak się kliknie w usera to odpali wszytkie filmuu dane go usera
angular.module("app")
    .controller("nMoviesCtrl",function ($scope, $http){
    $http.get("../newestMovies/newestMoviesOnSite.php")
        .then(function (response) {$scope.nMovies = response.data.records;});
    $scope.vidsOnSite = 10;
    $scope.loadMore = function () {
        $scope.vidsOnSite += 10;
    }

});
angular.module('app')
.controller("RegisterCtrl", function ($scope) {

});