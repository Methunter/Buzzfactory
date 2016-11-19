'use strict';


var app = angular.module('myApp', ['uploaderApp', 'oi.file']);

var articlesController = function($scope){

}

app.controller('articlesController', function($scope, $http) {


	



$scope.articleTMPL = "/templates/article.htm"
$scope.adminTMPL = "/templates/admin.htm"
$scope.loginTMPL = "/templates/login.htm"
$scope.picsTMPL = "/templates/pics.htm"
$scope.checkboxModel = {
	value1 : true,
	value2 : 'YES'

}
$scope.adminka = function(state){
	if (state == true){
		$scope.adminVis = true;
		$scope.artClass = "col-sm-9  col-md-12 col-lg-12  main"
		$scope.sidebar = "";
	}else{
		$scope.artClass = "col-sm-9 col-sm-offset-3 col-md-10 col-lg-10 col-md-offset-2 col-lg-offset-2 main"
		$scope.adminVis =  false;
		$scope.sidebar = "sidebar";
	}
}
	getArticle(); // Load all available articles 
	function getArticle(){  
		$http.post("ajax/getArticle.php").success(function(data){
			$scope.articles = data;
		});
	};

	$scope.addArticle = function (title, bigText, width, height, pic) {

		$http.post("ajax/uploadPic.php")
		console.log("app.js: "+title+"     "+ bigText+"     "+ width+"     "+ height+"     "+ pic)
		$http.post("ajax/addArticle.php?title="+title+"&bigText="+bigText+"&width="+width+"&height="+height+"&pic=" + pic).success(function(data){
			getArticle();
			$scope.articleInput = "";
			console.log("data: " + data)
		});
		$scope.title = null;
		title = null;
	};
	$scope.deleteArticle = function (article) {
		if(confirm("Are you sure to delete this article?")){
			$http.post("ajax/deleteArticle.php?articleID="+article).success(function(data){
				getArticle();
			});
		}
	};

	$scope.toggleStatus = function(item, status, article) {
		if(status=='2'){status='0';}else{status='2';}
		$http.post("ajax/updateArticle.php?articleID="+item+"&status="+status).success(function(data){
			getArticle();
		});
	};
	$scope.getRandom = function(){
		// return Math.floor((Math.random()*(3-1)*10));
		return Math.floor(Math.random() * (10 - 5)) * 50 + 50;
	}
	$scope.getRandomInt = function(){
		// return Math.floor((Math.random()*(3-1)*10));
		return Math.random() * (3 - 1) + 1;
	}



});


app.controller('updateController', function($scope){

})
