var app = angular.module('myApp', []);


// app.controller('CheckboxController', function($scope) {
//   $scope.checkboxModel = {
//     value1 : false,
//     value2 : 'YES'
//   }
// });
    // article = {"title" = "",
    // "bigText" = "",
    // "width" = 0,
    // "height" = 0,
    // "pic" = ""};
var articlesController = function($scope){
  // size = 10
  //   $scope.title = "",
  //   $scope.bigText = "",
  //   $scope.width = 0,
  //   $scope.height = 0,
  //   $scope.pic = ""
  // rateW = $scope.getRandomInt()
  // rateH = $scope.getRandomInt()
  // $scope.width = size 
  // $scope.height = size
  // $scope.color = "#f00"
  // $scope.bgcol = "#00f"
  // $scope.title = article.title
  // $scope.p = "Lorem ipsum"
  // $scope.img = "/Images/pic.gif"
  // $scope.imgWidth = $scope.width * .9
  // $scope.imgHeight = $scope.width * .9
  // $scope.alt = "alt"
  // $scope.a = "link"
}

app.controller('articlesController', function($scope, $http) {
  getArticle(); // Load all available articles 
  function getArticle(){  
  $http.post("ajax/getArticle.php").success(function(data){
        $scope.articles = data;
       });
  };

  $scope.addArticle = function (title, bigText, width, height, pic) {
    // var article = {};
    // article.title = title
    // article.bigText = bigText
    // article.width = width
    // article.height = height
    // article.pic = pic
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

app.controller('checkboxController', function($scope) {
  $scope.checkboxModel = {
    value1 : true,
    value2 : 'YES'
  }
});

app.controller('updateController', function($scope){

})