angular.module('info.service', [])
    // admin
    .factory('dashboardServices', dashboardServices)
    .factory('profileServices', profileServices)
    .factory('detailPesananServices', detailPesananServices)
    
    ;

function dashboardServices($http, $q, helperServices, AuthService) {
    var controller = helperServices.url + 'home/';
    var service = {};
    service.data = [];
    service.instance = false;
    return {
        get: get,
        getItem:getItem,
        readRekrutmen:readRekrutmen
    };

    function get() {
        var def = $q.defer();
        $http({
            method: 'get',
            url: controller + 'read',
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
            }
        );
        return def.promise;
    }

    function getItem(id) {
        var def = $q.defer();
        $http({
            method: 'get',
            url: controller + 'read_detail/' + id,
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
            }
        );
        return def.promise;
    }

    function readRekrutmen() {
        var def = $q.defer();
        $http({
            method: 'get',
            url: controller + 'read_rekrutmen',
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
            }
        );
        return def.promise;
    }

}

function profileServices($http, $q, helperServices, AuthService) {
    var controller = helperServices.url + 'profile/';
    var service = {};
    service.data = [];
    service.instance = false;
    return {
        get: get
    };

    function get() {
        var def = $q.defer();
        $http({
            method: 'get',
            url: controller + 'read',
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
            }
        );
        return def.promise;
    }
}

function detailPesananServices($http, $q, helperServices, AuthService) {
    var controller = helperServices.url + 'detail_pesanan/';
    var service = {};
    service.data = [];
    service.instance = false;
    return {
        get: get
    };

    function get(param) {
        var def = $q.defer();
        $http({
            method: 'get',
            url: controller + 'read/' + param,
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
            }
        );
        return def.promise;
    }
}



