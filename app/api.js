'use strict';


angular.module('buzzfactory', [])
.controller('articlesController', function($scope, $http) {
	$scope.hello = "Hello!)"
	getArticle(); // Load all available articles 
	function getArticle(){
		$http.post("http://www.cms.com/ajax/getArticle.php").then(function(data){
			$scope.allArticles = data;
			$scope.articles = $scope.allArticles.data;
			console.log("Articles: " , $scope.articles);
			/**	Есть такие штуки в нём:
				$scope.article[i].title			-	Заголовок			
				$scope.article[i].smallText		-	Короткий текст		
				$scope.article[i].bigText		-	Полный текст			
				$scope.article[i].pic			-	Адрес картинки			
				$scope.article[i].original		-	Оригинал картинки	
				$scope.article[i].thumb			-	Миниатюра картинки
				$scope.article[i].link			-	Ссылка на статью
				$scope.article[i].size			-	Размер картинки
				$scope.article[i].format		-	Размер новости
				$scope.article[i].date			-	Дата
				$scope.article[i].conpanyName	-	Название компании	*/			
			});
	};
})

