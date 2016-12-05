





angular.module('myApp',[]).directive("fileread", [function () {

return {
		scope: {
			fileread: "="
		},
		link: function (scope, element, attributes, $scope) {
			/*log*/		console.log("Link:", {"scope":scope}, {"element":element}, {"attributes":attributes});
			element.bind("change", function (changeEvent) {
				var reader = new FileReader();
				reader.onload = function (loadEvent) {
					console.log("loadEvent",loadEvent);
					scope.$apply(function () {
						scope.fileread = loadEvent.target.result;
					});
				}
				reader.readAsDataURL(changeEvent.target.files[0]);
				// $scope.uploadedFile = changeEvent.target.files[0];
				sendFiles(changeEvent.target.files[0]);
/*log*/			console.log("changeEvent.target.files[0]:" , changeEvent.target.files[0]);
			});
		}
	}
}]);

