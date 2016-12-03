'use strict';


angular.module('myApp',['ngResource', 'ngRoute','oi.list', 'oi.file', 'ui.sortable', 'ui.filters', 'ui.focusblur', 'ui.fancybox'])

.controller('articlesController', 
	function($scope, $http) {
		$scope.articleTMPL 		= "/templates/article.htm"
		$scope.adminTMPL 		= "/templates/admin.htm"
		$scope.loginTMPL 		= "/templates/login.htm"
		$scope.picsTMPL 		= "/templates/pics.htm"
		$scope.checkboxModel 	= {
			value1 : true,
			value2 : 'YES'
		}
		getArticle(); // Load all available articles 
		$scope.adminka = function(state){
			if (state == true){
				$scope.adminVis = true;
				$scope.artClass = "col-sm-9  col-md-12 col-lg-12  main"
				$scope.sidebar = "";
			}else{
				$scope.artClass = "col-sm-6  col-md-offset-4 col-md-8 col-lg-10 col-sm-offset-6 col-md-offset-4 col-lg-offset-2 main"
				$scope.adminVis =  false;
				$scope.sidebar = "sidebar col-sm-6  col-md-4 col-lg-2";
			}
		}
		function getArticle(){  
			$http.post("ajax/getArticle.php").success(function(data){
				$scope.articles = data;
			});
		};
		$scope.addArticle = function (title, bigText, width, height, pic) {

			$http.post("ajax/uploadPic.php")
			console.log("app.js: ",
			            {"title: " : title, 
			            "bigText: " : bigText, 
			            "width: " : width, 
			            "height: " : height, 
			            "pic: " : pic})
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
		$scope.getRandom = function(){
			// return Math.floor((Math.random()*(3-1)*10));
			return Math.floor(Math.random() * (10 - 5)) * 50 + 50;
		}
		$scope.getRandomInt = function(){
			// return Math.floor((Math.random()*(3-1)*10));
			return Math.random() * (3 - 1) + 1;
		}
	}
)

.factory('Files', function($resource) {
	// ['$resource', 
			return $resource(
				'ajax/action.php/files/:fileId',
				{fileId: '@id'},
				{action:
					{method: 'PUT'}
				}
			);
		}
	// ]
)

.controller('MyCtrl', 
	['$scope', 'Files', 'oiList', 
		function ($scope, Files, oiList) {
			var url = 'ajax/action.php/files/';

			oiList($scope, url, Files, {fields: {thumb: 'Images/files_thumb/preloader.gif'}});

			  //Выдаем либо абсолютный путь, либо относительный (data:... из fileReader) для кроссдоменных запросов
			$scope.getUrl = function (item, name) {
			  	if (typeof item !== 'object') return '';
			  	return item._file === undefined ? 'cms/uploader/' + item[name] : item[name];
			};
		}
	]
);



// factory('Files', function ($resource) {
//         return $resource('http://tamtakoe.ru/uploader/action.php/files/:fileId', {fileId:'@id'}, {
//             add: {method: 'PUT'}
//         });
//     })

