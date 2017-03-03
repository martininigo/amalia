var app = angular.module("app", ['ngRoute','xeditable']);

function RemoteResource($http, $q, baseUrl) {
// this.get = function(idSeguro) {
// var defered = $q.defer();
// var promise = defered.promise;
//
// $http({
// method: 'GET',
// url: baseUrl + '/api/SeguroMedico/' + idSeguro
// }).success(function(data, status, headers, config) {
// defered.resolve(data);
// }).error(function(data, status, headers, config) {
// if (status === 400) {
// defered.reject(data);
// } else {
// throw new Error("Fallo obtener los datos:" + status + "\n" + data);
// }
// });
//
// return promise;
//
// };

    this.list = function() {
        var defered = $q.defer();
        var promise = defered.promise;

        $http({
            method: 'GET',
            url: baseUrl + '/../api/v1/insumos'
        }).success(function(data, status, headers, config) {
            defered.resolve(data);
        }).error(function(data, status, headers, config) {
            if (status === 400) {
                defered.reject(data);
            } else {
                throw new Error("Fallo obtener los datos:" + status + "\n" + data);
            }
        });


        return promise;
    };

    this.insert = function(insumo) {
        var defered = $q.defer();
        var promise = defered.promise;

        $http({
            method: 'POST',
            url: baseUrl + '/../api/v1/insumos',
            data: insumo
        }).success(function(data, status, headers, config) {
            defered.resolve(data);
        }).error(function(data, status, headers, config) {
            if (status === 400) {
                defered.reject(data);
            } else {
                throw new Error("Fallo obtener los datos:" + status + "\n" + data);
            }
        });

        return promise;
    };

    this.update = function(id, insumo) {
        var defered = $q.defer();
        var promise = defered.promise;

        $http({
            method: 'PUT',
            url: baseUrl + '/../api/insumo/' + id,
            data: insumo
        }).success(function(data, status, headers, config) {
            defered.resolve(data);
        }).error(function(data, status, headers, config) {
            if (status === 400) {
                defered.reject(data);
            } else {
                throw new Error("Fallo obtener los datos:" + status + "\n" + data);
            }
        });

        return promise;
    };

 this.delete = function(id) {
 var defered = $q.defer();
 var promise = defered.promise;

 $http({
 method: 'DELETE',
 url: baseUrl + '/../api/insumo/' + id
 }).success(function(data, status, headers, config) {
 defered.resolve(data);
 }).error(function(data, status, headers, config) {
 if (status === 400) {
 defered.reject(data);
 } else {
 throw new Error("Fallo obtener los datos:" + status + "\n" + data);
 }
 });

 return promise;
 };

}

function RemoteResourceProvider() {
    var _baseUrl;
    this.setBaseUrl = function(baseUrl) {
        _baseUrl = baseUrl;
    };
    this.$get = ['$http', '$q', function($http, $q) {
            return new RemoteResource($http, $q, _baseUrl);
        }];
};

app.provider("remoteResource", RemoteResourceProvider);


app.value("urlLogo", "https://scontent-arn2-1.xx.fbcdn.net/v/t1.0-1/c70.0.200.200/p200x200/73612_213162408807358_389884659_n.jpg?oh=8fc720868b89c64878e621e6e136d709&oe=5905014D");
app.run(["$rootScope", "urlLogo", function($rootScope, urlLogo) {
        $rootScope.urlLogo = urlLogo;
    }]);

app.config(['$routeProvider', function($routeProvider) {

    $routeProvider.when('/', {
        templateUrl: "main.html",
        controller: "MainController"
    });

    $routeProvider.when('/insumo/list', {
        templateUrl: "insumo/insumo-list.html",
        controller: "InsumoListController",
        resolve: {
            insumos: ['remoteResource', function(remoteResource) {
                    return remoteResource.list();
                }]
        }
    });


    $routeProvider.otherwise({
        redirectTo: '/'
    });

}]);

app.controller("InsumoListController", ['$scope', 'insumos', 'remoteResource', function($scope, insumos, remoteResource) {
    $scope.insumos = insumos;
// $scope.insumo = insumo;

    $scope.delete = function(id) {
        remoteResource.delete(id).then(function() {
            remoteResource.list().then(function(insumos) {
                $scope.insumos = insumos;
            }, function(bussinessMessages) {
                $scope.bussinessMessages = bussinessMessages;
            });
        }, function(bussinessMessages) {
            $scope.bussinessMessages = bussinessMessages;
        });
    };
    
    $scope.save = function(id, insumo) {
    	if (id == null){
    	   	remoteResource.insert(insumo).then();
    	}else{
	    	remoteResource.update(id, insumo).then();
    	}
    };
    $scope.addInsumo = function() {
        $scope.inserted = {
          id: null,
          nombre: 'qqqq',
          descripcion: 'qq',
          unidad_id: 1,
          cantidad: 1,
          precio: 1
        };
        $scope.insumos.push($scope.inserted);
      };
      
      
      // cancel all changes
      $scope.cancel = function() {
        for (var i = $scope.insumos.length; i--;) {
          var insumo = $scope.insumos[i];    
          if (insumo.id == null) {
            $scope.insumos.splice(i, 1);
          }      
        };
      };

}]);

app.controller("MainController", ['$scope', function($scope) {

}]);