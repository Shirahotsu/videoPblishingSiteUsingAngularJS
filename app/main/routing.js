var app = angular.module("app", ['ngRoute', 'ui.router']);

app.config(function($stateProvider, $urlRouterProvider){
    $stateProvider
        .state('newest', {
            url: '/newest',
            templateUrl: '../newestMovies/newestMovies.html',
            controller:"nMoviesCtrl"
        })
        .state('category', {
            url: '/category',
            templateUrl: '../category/category.html',
            controller:"categoryCtrl"
        })
        .state('addMovie', {
            url: '/addMovie',
            templateUrl: '../addMovie/addMovie.html'
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
        });

    $urlRouterProvider.otherwise('/newest');
});
