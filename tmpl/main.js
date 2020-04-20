
(() => {
    'use strict'
    var app = angular.module('test', ['ngRoute']);

    app.config($routeProvider => {
        $routeProvider.when('/', {templateUrl: '../modules/mod_angularjs/tmpl/ng-templates/phones.html'});
        $routeProvider.when('/new', {templateUrl: '../modules/mod_angularjs/tmpl/ng-templates/new.html'});
    });
        
    
    app.controller('testController', $scope => {
        $scope.message = 'Hello from angularJS!';
    });

    app.controller('listPhoneNumbersController', ($scope, $http) => {
        $http.get('index.php?option=com_ajax&module=angularjs&method=phoneNumbers&format=json')
            .then(response => {
                $scope.numbers = response.data.data;
                console.log(response);
            });
    });

    app.controller('phoneNumberController', ($scope, $http, $location) => {
        $scope.save = () => {
            let token = Joomla.getOptions('csrf.token');
            let obj = jQuery.param({
                name: $scope.name,
                surname: $scope.surname,
                phone: $scope.phone_number,
                [token] : 1
            });

            let data = JSON.stringify(obj);
            let config = { headers: { 'Content-Type' : 'application/x-www-form-urlencoded;charset=utf-8;'} };
            $http.post('index.php?option=com_ajax&module=angularjs&method=insertphonenumber&format=json', obj, config)
                .then(response => {
                    console.log(response);
                    $location.path('/');
                });
            console.log(obj);
        };

        $scope.cancel = () => {
            $location.path('/');
        };
    });
})();
