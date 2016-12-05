'use strict';


var app = angular.module('myApp', []);

app.controller('resizeCtrlr', function($scope) {
	$scope.notifyServiceOnChage = function(){
		console.log($scope.windowHeight);
	};
})

app.directive('resize', function ($window) {
	return function (scope, element, attr) {

		var w = angular.element($window);
		scope.$watch(function () {
			return {
				'h': window.innerHeight, 
				'w': window.innerWidth
			};
		}, function (newValue, oldValue) {
			console.log(newValue, oldValue);
			scope.windowHeight = newValue.h;
			scope.windowWidth = newValue.w;

			scope.resizeWithOffset = function (offsetH) {
				scope.$eval(attr.notifier);
				return { 
					'height': (newValue.h - offsetH) + 'px'                    
				};
			};

		}, true);

		w.bind('resize', function () {
			scope.$apply();
		});
	}
}); 

app.controller('articlesController', function($scope, $http) {

	$scope.$on('pictureSet',function(event,args){
		$scope.originalPic = args.original;
		$scope.size = args.size;
		$scope.item = args.item;
	});
	/** $scope.Vars*/
	$scope.articleTMPL = "/templates/article.htm";
	$scope.adminTMPL = "/templates/admin.htm";
	$scope.loginTMPL = "/templates/login.htm";
	$scope.picsTMPL = "/templates/pics.htm";
	$scope.rszrTMPL = "../templates/resizer.htm";
	$scope.mdlTMPL = "../templates/modal.html";
	$scope.checkboxModel = {
		value1 : true,
		value2 : 'YES'

	}
	/*end of $scope.vars*/
	$scope.cleanForm = function(){
		$scope.form = null;
		$scope.companyName = null;
		$scope.link = null;
		$scope.bigText = null;
		$scope.format = null;
	}
	$scope.adminka = function(state){
		if (state == false){ //С Админкой
			$scope.mainClass = "col-xs-12 	col-sm-9 col-sm-offset-3 	col-md-9 col-md-offset-3	col-lg-10 col-lg-offset-2 	main"
			$scope.artClass = "				col-sm-9 					col-md-3 					col-lg-4"
			$scope.sidebar = " 	col-xs-0 					col-sm-3 				 	col-md-3 					 col-lg-2 	nav nav-sidebar sidebar";
			$scope.adminVis = true;
		}else{ // Без Админки
			$scope.mainClass = "col-xs-12 	col-sm-12 col-md-11 col-md-offset-1  	col-lg-11  col-lg-offset-1  main"
			$scope.artClass =  "			col-sm-6  col-md-5 	 					col-lg-3 "// col-lg-offset-1"
			$scope.sidebar = "";
			$scope.adminVis =  false;
		}
	}
	// subDomainWork();	//Load the subdomain script
	function subDomainWork(){
		$http.post("/ajax/subDomainWork.php").success(function(data){
			$scope.domainInfo = data;
			console.log("Domain info: " , $scope.domainInfo);

		});
	};
	getArticle(); // Load all available articles 
	function getArticle(){
		$http.post("/ajax/getArticle.php").success(function(data){
			$scope.articles = data;
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
	$scope.addArticle = function(companyName,link,bigText,format) {
		$http.post (
					"ajax/addArticle.php?"
					+"companyName="+companyName
					+"&bigText="+bigText
					+"&link="+link
					+"&format="+format
					+"&pic=" + photo_url.value
					).then(
					function successfullyAdded(data){
						getArticle();
						$scope.articleInput = "";
					},
					function NotSuccessfullyAdded(data){
						console.log("Failure in adding Article(" , data);
					});
				};	
				$scope.deleteArticle = function(article) {
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
	};
	$scope.getRandomInt = function(){
		// return Math.floor((Math.random()*(3-1)*10));
		return Math.random() * (3 - 1) + 1;
	};
})

app.controller('photoEditorCtrlr', ['$scope' , '$http', '$q', '$window', function($scope, $http, $q, $window) {
	// $scope.crop_photo = function($scope){
	// 	return photo_url[0].value;
	// }
	$scope.photo_exchange = function(){
		console.log("Photo_exchange");
		var crop = {
			method: 'POST',
			url: 'ajax/crop_photo.php',
			headers: {'Content-Type': undefined},
			data: {},
		}
		var upPhoto = {
			method: 'POST',
			url: 'ajax/upload_photo.php',
			headers: {'Content-Type': undefined},
			data: {},
		}
		$http(crop).then(function successCallback(response){ // NOTE: successCallback
			console.log("$http is fine!", response);
			//	display the croped photo
			$('#photo_container').html(response);

		}, function errorCallback(response) { // NOTE: errorCallback
			console.log("Error!" , response);
		});

		$http(upPhoto).then(function successCallback(response){
			console.log("Success!" , response);
		}, function errorCallback(response) {
			console.log("Error!" , response);
		});
	}

	// $scope.changeSource = function($scope, newSource){
	// 	console.log("Change Source: ", $scope.previewUploadedFile);
	// }
	
	// $scope.showAllPhotos = function (){
	// 	console.log("ShowAllPhotos");
	// 	$http.post('/ajax/upload_photo.php')
	// 	.then(function successCallback(response) {		/** this callback will be called asynchronously*/
	// 		$scope.photos = response.data;				/*when the response is available*/
	// 		console.log("Success!:", $scope.photos);

	// 	}, function errorCallback(response) {	/* called asynchronously if an error occurs*/				
	// 		console.log("Error:",response);		/* or server returns response with an error status.*/	
	// 	});
	// }
	// // $scope.showAllPhotos();

	// // the target size
	// var TARGET_W = 600;
	// var TARGET_H = 300;

	// // show loader while uploading photo
	// $scope.submit_photo = function () {
	// 	console.log("Submit_photo");
	// 	// display the loading texte
	// 	$('#loading_progress').html('<img src="images/loader.gif"> Uploading your photo...');
	// }

	// // show_popup : show the popup
	// $scope.show_popup = function (id) {
	// 	// show the popup
	// 	console.log("Show Popup!");
	// 	$('#'+id).show();
	// }

	// // close_popup : close the popup
	// $scope.close_popup = function (id) {
	// 	console.log("Close_popup");
	// 	// hide the popup
	// 	$('#'+id).hide();
	// }

	// // show_popup_crop : show the crop popup
	// $scope.show_popup_crop = function (url) {
	// 	console.log("Show_popup_crop");
	// 	// change the photo source
	// 	$('#cropbox').attr('src', url);
	// 	// destroy the Jcrop object to create a new one
	// 	try {
	// 		jcrop_api.destroy();
	// 	} catch (e) {
	// 		// object not defined
	// 	}
	// 	// Initialize the Jcrop using the TARGET_W and TARGET_H that initialized before
	// 	$('#cropbox').Jcrop({
	// 		aspectRatio: TARGET_W / TARGET_H,
	// 		setSelect:   [ 100, 100, TARGET_W, TARGET_H ],
	// 		onSelect: updateCoords
	// 	},function(){
	// 		jcrop_api = this;
	// 	});

	// 	// store the current uploaded photo url in a hidden input to use it later
	// 	$('#photo_url').val(url);
	// 	// hide and reset the upload popup
	// 	$('#popup_upload').hide();
	// 	$('#loading_progress').html('');
	// 	$('#photo').val('');

	// 	// show the crop popup
	// 	$('#popup_crop').show();
	// }

	// // crop_photo : 
	// $scope.crop_photo = function () {
	// 	console.log("Crop_photo");

	// 	var x_ = $('#x').val();
	// 	var y_ = $('#y').val();
	// 	var w_ = $('#w').val();
	// 	var h_ = $('#h').val();
	// 	var photo_url_ = $('#photo_url').val();

	// 	// hide thecrop  popup
	// 	$('#popup_crop').hide();

	// 	// display the loading texte
	// 	$('#photo_container').html('<img src="images/loader.gif"> Processing...');
	// 	// crop photo with a php file using ajax call
	// 	var req = {
	// 		method: 'POST',
	// 		url: '../ajax/crop_photo.php',
	// 		headers: {'Content-Type': undefined},
	// 		data: {x:x_, y:y_, w:w_, h:h_, photo_url:photo_url_, targ_w:TARGET_W, targ_h:TARGET_H},
	// 	}
	// 	$http(req).then(function(){
	// 		console.log("Success!");
	// 		//	display the croped photo
	// 			$('#photo_container').html(data);

	// 	}, function(){
	// 		console.log("Failure");

	// 	});

		// $.ajax({
		// 	url: 'crop_photo.php',
		// 	type: 'POST',
		// 	data: {x:x_, y:y_, w:w_, h:h_, photo_url:photo_url_, targ_w:TARGET_W, targ_h:TARGET_H},
		// 	success:function(data){
		// 		// display the croped photo
		// 		$('#photo_container').html(data);
		// 	}
		// });
		// $.ajax({
		// 	url: 'crop_photo.php',
		// 	type: 'POST',
		// 	data: {x:x_, y:y_, w:w_, h:h_, photo_url:photo_url_, targ_w:TARGET_W, targ_h:TARGET_H},
		// 	success:function(data){
		// 		// display the croped photo
		// 		$('#photo_container').html(data);
		// 	}
		// });
	// }

	// updateCoords : updates hidden input values after every crop selection
	// $scope.updateCoords = function (c) {
	// 	console.log("UpdateCoords");
	// 	$('#x').val(c.x);

	// 	$('#y').val(c.y);
	// 	$('#w').val(c.w);
	// 	$('#h').val(c.h);
	// }

}]);