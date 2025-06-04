angular
  .module("admin.service", [])
  // admin
  .factory("dashboardServices", dashboardServices)
  .factory("bidangServices", bidangServices)
  .factory("tahapanServices", tahapanServices)
  .factory("periodeServices", periodeServices)
  .factory("detailServices", detailServices)
  .factory("lowonganServices", lowonganServices)
  .factory("profileServices", profileServices)
  .factory("lamaranServices", lamaranServices)

function dashboardServices($http, $q, helperServices, AuthService) {
  var controller = helperServices.url + "beranda/";
  var service = {};
  service.data = [];
  service.instance = false;
  return {
    get: get,
    toko: toko,
  };

  function get() {
    var def = $q.defer();
    $http({
      method: "get",
      url: controller + "read",
      headers: AuthService.getHeader(),
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

  function toko() {
    var def = $q.defer();
    $http({
      method: "get",
      url: helperServices.url + "admin/toko/read",
      headers: AuthService.getHeader(),
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

function bidangServices($http, $q, helperServices, AuthService, pesan) {
  var controller = helperServices.url + "bidang/";
  var service = {};
  service.data = [];
  return {
    get: get,
    post: post,
    put: put,
    deleted: deleted,
  };

  function get() {
    var def = $q.defer();
    $http({
      method: "get",
      url: controller + "read",
      headers: AuthService.getHeader(),
    }).then(
      (res) => {
        service.data = res.data;
        def.resolve(res.data);
      },
      (err) => {
        pesan.error(err.data.message);
        def.reject(err);
      }
    );
    return def.promise;
  }

  function post(param) {
    var def = $q.defer();
    $http({
      method: "post",
      url: controller + "add",
      data: param,
      headers: AuthService.getHeader(),
    }).then(
      (res) => {
        service.data.push(res.data);
        def.resolve(res.data);
      },
      (err) => {
        $.LoadingOverlay("hide");
        pesan.Error(err.data.status);
        def.reject(err);
      }
    );
    return def.promise;
  }

  function put(param) {
    var def = $q.defer();
    $http({
      method: "put",
      url: controller + "edit",
      data: param,
      headers: AuthService.getHeader(),
    }).then(
      (res) => {
        var data = service.data.find((x) => x.id_bidang == param.id_bidang);
        if (data) {
          data.nama_bidang = param.nama_bidang;
          data.singkatan = param.singkatan;
        }
        def.resolve(res.data);
      },
      (err) => {
        def.reject(err);
      }
    );
    return def.promise;
  }

  function deleted(param) {
    var def = $q.defer();
    $http({
      method: "delete",
      url: controller + "/delete/" + param.id_bidang,
      headers: AuthService.getHeader(),
    }).then(
      (res) => {
        service.data.splice(service.data.indexOf(param), 1);
        def.resolve(res.data);
      },
      (err) => {
        def.reject(err);
        message.error(err.data.message);
      }
    );
    return def.promise;
  }
}

function tahapanServices($http, $q, helperServices, AuthService, pesan) {
  var controller = helperServices.url + "tahapan/";
  var service = {};
  service.data = [];
  return {
    get: get,
    post: post,
    put: put,
    deleted: deleted,
  };

  function get() {
    var def = $q.defer();
    $http({
      method: "get",
      url: controller + "read",
      headers: AuthService.getHeader(),
    }).then(
      (res) => {
        service.data = res.data;
        def.resolve(res.data);
      },
      (err) => {
        pesan.error(err.data.message);
        def.reject(err);
      }
    );
    return def.promise;
  }

  function post(param) {
    var def = $q.defer();
    $http({
      method: "post",
      url: controller + "add",
      data: param,
      headers: AuthService.getHeader(),
    }).then(
      (res) => {
        service.data.push(res.data);
        def.resolve(res.data);
      },
      (err) => {
        $.LoadingOverlay("hide");
        pesan.Error(err.data.status);
        def.reject(err);
      }
    );
    return def.promise;
  }

  function put(param) {
    var def = $q.defer();
    $http({
      method: "put",
      url: controller + "edit",
      data: param,
      headers: AuthService.getHeader(),
    }).then(
      (res) => {
        var data = service.data.find((x) => x.id_tahapan == param.id_tahapan);
        if (data) {
          data.nama_tahapan = param.nama_tahapan;
          data.keterangan = param.keterangan;
          data.status = param.status;
        }
        def.resolve(res.data);
      },
      (err) => {
        def.reject(err);
      }
    );
    return def.promise;
  }

  function deleted(param) {
    var def = $q.defer();
    $http({
      method: "delete",
      url: controller + "/delete/" + param.id_tahapan,
      headers: AuthService.getHeader(),
    }).then(
      (res) => {
        service.data.splice(service.data.indexOf(param), 1);
        def.resolve(res.data);
      },
      (err) => {
        def.reject(err);
        message.error(err.data.message);
      }
    );
    return def.promise;
  }
}

function periodeServices($http, $q, helperServices, AuthService, pesan) {
  var controller = helperServices.url + "periode/";
  var service = {};
  service.data = [];
  return {
    get: get,
    post: post,
    put: put,
    deleted: deleted,
  };

  function get() {
    var def = $q.defer();
    $http({
      method: "get",
      url: controller + "read",
      headers: AuthService.getHeader(),
    }).then(
      (res) => {
        service.data = res.data;
        def.resolve(res.data);
      },
      (err) => {
        pesan.error(err.data.message);
        def.reject(err);
      }
    );
    return def.promise;
  }

  function post(param) {
    var def = $q.defer();
    $http({
      method: "post",
      url: controller + "add",
      data: param,
      headers: AuthService.getHeader(),
    }).then(
      (res) => {
        service.data.map(function (item, index) {
          return (item.status = "0");
        });
        service.data.push(res.data);
        def.resolve(res.data);
      },
      (err) => {
        $.LoadingOverlay("hide");
        pesan.Error(err.data.status);
        def.reject(err);
      }
    );
    return def.promise;
  }

  function put(param) {
    var def = $q.defer();
    $http({
      method: "put",
      url: controller + "edit",
      data: param,
      headers: AuthService.getHeader(),
    }).then(
      (res) => {
        service.data.map(function (item, index) {
          return (item.status = "0");
        });
        var data = service.data.find((x) => x.id_periode == param.id_periode);
        if (data) {
          data.periode = param.periode;
          data.status = param.status;
        }
        def.resolve(res.data);
      },
      (err) => {
        def.reject(err);
      }
    );
    return def.promise;
  }

  function deleted(param) {
    var def = $q.defer();
    $http({
      method: "delete",
      url: controller + "/delete/" + param.id_periode,
      headers: AuthService.getHeader(),
    }).then(
      (res) => {
        service.data.splice(service.data.indexOf(param), 1);
        def.resolve(res.data);
      },
      (err) => {
        def.reject(err);
        message.error(err.data.message);
      }
    );
    return def.promise;
  }
}

function detailServices($http, $q, helperServices, AuthService, pesan) {
  var controller = helperServices.url + "detail/";
  var service = {};
  service.data = [];
  return {
    put: put,
    deleted: deleted,
  };

  function put(param) {
    var def = $q.defer();
    $http({
      method: "put",
      url: controller + "edit",
      data: param,
      headers: AuthService.getHeader(),
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

  function deleted(param) {
    var def = $q.defer();
    $http({
      method: "delete",
      url: controller + "/delete/" + param.id_periode,
      headers: AuthService.getHeader(),
    }).then(
      (res) => {
        service.data.splice(service.data.indexOf(param), 1);
        def.resolve(res.data);
      },
      (err) => {
        def.reject(err);
        message.error(err.data.message);
      }
    );
    return def.promise;
  }
}

function lowonganServices($http, $q, helperServices, AuthService, pesan) {
  var controller = helperServices.url + "lowongan/";
  var service = {};
  service.data = [];
  return {
    get: get,
    aktif: aktif,
    post: post,
    put: put,
    deleted: deleted,
  };

  function get() {
    var def = $q.defer();
    $http({
      method: "get",
      url: controller + "read",
      headers: AuthService.getHeader(),
    }).then(
      (res) => {
        service.data = res.data;
        def.resolve(res.data);
      },
      (err) => {
        pesan.error(err.data.message);
        def.reject(err);
      }
    );
    return def.promise;
  }

  function aktif() {
    var def = $q.defer();
    $http({
      method: "get",
      url: controller + "aktif",
      headers: AuthService.getHeader(),
    }).then(
      (res) => {
        service.data = res.data;
        def.resolve(res.data);
      },
      (err) => {
        pesan.error(err.data.message);
        def.reject(err);
      }
    );
    return def.promise;
  }

  function post(param) {
    var def = $q.defer();
    $http({
      method: "post",
      url: controller + "add",
      data: param,
      headers: AuthService.getHeader(),
    }).then(
      (res) => {
        service.data.lowongan.push(res.data);
        def.resolve(res.data);
      },
      (err) => {
        $.LoadingOverlay("hide");
        pesan.Error(err.data.status);
        def.reject(err);
      }
    );
    return def.promise;
  }

  function put(param) {
    var def = $q.defer();
    $http({
      method: "put",
      url: controller + "edit",
      data: param,
      headers: AuthService.getHeader(),
    }).then(
      (res) => {
        var data = service.data.lowongan.find((x) => x.id_lowongan == param.id_lowongan);
        if (data) {
          data.tanggal_buka = param.tanggal_buka;
          data.tanggal_tutup = param.tanggal_tutup;
          data.posisi = param.posisi;
          data.jenis_pekerjaan = param.jenis_pekerjaan;
          data.perkiraan_gaji = param.perkiraan_gaji;
          data.pekerjaan = param.pekerjaan;
          data.kuota = param.kuota;
          data.nama_bidang = param.nama_bidang;
        }
        def.resolve(res.data);
      },
      (err) => {
        def.reject(err);
      }
    );
    return def.promise;
  }

  function deleted(param) {
    var def = $q.defer();
    $http({
      method: "delete",
      url: controller + "/delete/" + param.id_lowongan,
      headers: AuthService.getHeader(),
    }).then(
      (res) => {
        service.data.lowongan.splice(service.data.lowongan.indexOf(param), 1);
        def.resolve(res.data);
      },
      (err) => {
        def.reject(err);
        message.error(err.data.message);
      }
    );
    return def.promise;
  }
}

function profileServices($http, $q, helperServices, AuthService, pesan) {
  var controller = helperServices.url + "profile/";
  var service = {};
  service.data = [];
  return {
    get: get,
    put: put
  };

  function get() {
    var def = $q.defer();
    $http({
      method: "get",
      url: controller + "read",
      headers: AuthService.getHeader(),
    }).then(
      (res) => {
        service.data = res.data;
        def.resolve(res.data);
      },
      (err) => {
        pesan.error(err.data.message);
        def.reject(err);
      }
    );
    return def.promise;
  }


  function put(param) {
    var def = $q.defer();
    $http({
      method: "put",
      url: controller + "edit",
      data: param,
      headers: AuthService.getHeader(),
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

function lamaranServices($http, $q, helperServices, AuthService, pesan) {
  var controller = helperServices.url + "lamaran/";
  var service = {};
  service.data = [];
  return {
    get: get,
    saya: saya,
    post: post,
    put: put
  };

  function get() {
    var def = $q.defer();
    $http({
      method: "get",
      url: controller + "read",
      headers: AuthService.getHeader(),
    }).then(
      (res) => {
        service.data = res.data;
        def.resolve(res.data);
      },
      (err) => {
        pesan.error(err.data.message);
        def.reject(err);
      }
    );
    return def.promise;
  }

  function saya() {
    var def = $q.defer();
    $http({
      method: "get",
      url: controller + "saya",
      headers: AuthService.getHeader(),
    }).then(
      (res) => {
        service.data = res.data;
        def.resolve(res.data);
      },
      (err) => {
        pesan.error(err.data.message);
        def.reject(err);
      }
    );
    return def.promise;
  }


  function post(param) {
    var def = $q.defer();
    $http({
      method: "post",
      url: controller + "add",
      data: param,
      headers: AuthService.getHeader(),
    }).then(
      (res) => {
        def.resolve(res.data);
      },
      (err) => {
        def.reject(err.data.message);
      }
    );
    return def.promise;
  }

  function put(param) {
    var def = $q.defer();
    $http({
      method: "put",
      url: controller + "edit",
      data: param,
      headers: AuthService.getHeader(),
    }).then(
      (res) => {
        def.resolve(res.data);
      },
      (err) => {
        def.reject(err.data.message);
      }
    );
    return def.promise;
  }

}
