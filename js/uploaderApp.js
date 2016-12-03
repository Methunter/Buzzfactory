'use strict';

/* App Module */

angular.module('uploaderApp', ['ngResource','oi.list', 'oi.file', 'ui.sortable', 'ui.filters', 'ui.focusblur', 'ui.fancybox'])

.factory('Files', [ '$resource' , function ($resource) {
	return $resource('ajax/action.php/files/:fileId', {
    fileId:'@id'}, {
		update: {method: 'PUT'}
	});
}])

.controller('MyCtrl', ['$scope', 'Files', 'oiList', function ($scope, Files, oiList) {

	var url = 'ajax/action.php/files/';

	oiList($scope, url, Files, {fields: {thumb: 'Images/files_thumb/preloader.gif'}});

	$scope.uploadoptions = {
		change: function (file) {

            //Создаем пустой элемент для будущего файла
            $scope.add('after', function (i, data) {

            	file.$preview($scope.items[i]);

            	file.$upload(url + data.id, $scope.items[i], data.settings).catch(function (data) {
            		$scope.errors = angular.isArray($scope.errors) ? $scope.errors.concat(data.response) : [].concat(data.response);
            		$scope.del($scope.getIndexById(data.item.id));
            	});
            });
        }
    };

      //Выдаем либо абсолютный путь, либо относительный (data:... из fileReader) для кроссдоменных запросов
      $scope.getUrl = function (item, name) {
      	if (typeof item !== 'object') return '';
      	return item._file === undefined ? 'cms/uploader/' + item[name] : item[name];
      };
  }]);