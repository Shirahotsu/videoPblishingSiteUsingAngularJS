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