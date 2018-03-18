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