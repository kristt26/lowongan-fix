angular
  .module("adminctrl", [])
  // Admin
  .controller("dashboardController", dashboardController)
  .controller("bidangController", bidangController)
  .controller("tahapanController", tahapanController)
  .controller("periodeController", periodeController)
  .controller("lowonganController", lowonganController)
  .controller("profileController", profileController)
  .controller("daftarLowonganController", daftarLowonganController)
  .controller("lamaranSayaController", lamaranSayaController)
  .controller("lamaranController", lamaranController);

function dashboardController($scope, dashboardServices) {
  $scope.$emit("SendUp", "Beranda");
  $scope.datas = {};
  $scope.title = "Beranda";
}

function bidangController($scope, bidangServices, pesan) {
  $scope.$emit("SendUp", "Bidang");
  $scope.datas = [];
  $scope.title = "Beranda";
  $scope.model = {};
  $scope.tampil = "produk";

  bidangServices.get().then((res) => {
    $scope.datas = res;
  });

  $scope.save = () => {
    pesan.dialog("Yakin ingin melanjutkan?", "Ya", "Tidak").then((x) => {
      if (!$scope.model.id_bidang) {
        bidangServices.post($scope.model).then((res) => {
          pesan.Success("Berhasil menyimpan data");
          $scope.model = {};
        });
      } else {
        bidangServices.put($scope.model).then((res) => {
          pesan.Success("Berhasil mengubah data");
          $scope.model = {};
        });
      }
    });
  };

  $scope.edit = (item) => {
    $scope.model = angular.copy(item);
  };

  $scope.delete = (item) => {
    pesan.dialog("Yakin ingin menghapus?", "Ya", "Tidak").then((x) => {
      bidangServices.deleted(item).then((res) => {
        pesan.Success("Berhasil menghapus data");
        $scope.model = {};
      });
    });
  };
}

function tahapanController($scope, tahapanServices, pesan) {
  $scope.$emit("SendUp", "Tahapan Penerimaan");
  $scope.datas = [];
  $scope.title = "Beranda";
  $scope.model = {};
  $scope.tampil = "produk";

  tahapanServices.get().then((res) => {
    $scope.datas = res;
  });

  $scope.save = () => {
    pesan.dialog("Yakin ingin melanjutkan?", "Ya", "Tidak").then((x) => {
      if (!$scope.model.id_tahapan) {
        tahapanServices.post($scope.model).then((res) => {
          pesan.Success("Berhasil menyimpan data");
          $scope.model = {};
        });
      } else {
        tahapanServices.put($scope.model).then((res) => {
          pesan.Success("Berhasil mengubah data");
          $scope.model = {};
        });
      }
    });
  };

  $scope.edit = (item) => {
    $scope.model = angular.copy(item);
  };

  $scope.delete = (item) => {
    pesan.dialog("Yakin ingin menghapus?", "Ya", "Tidak").then((x) => {
      tahapanServices.deleted(item).then((res) => {
        pesan.Success("Berhasil menghapus data");
        $scope.model = {};
      });
    });
  };
}

function periodeController($scope, periodeServices, pesan, detailServices) {
  $scope.$emit("SendUp", "Periode Penerimaan");
  $scope.datas = [];
  $scope.title = "Beranda";
  $scope.model = {};
  $scope.tampil = "periode";

  periodeServices.get().then((res) => {
    $scope.datas = res;
    console.log(res);
  });

  $scope.save = () => {
    pesan.dialog("Yakin ingin melanjutkan?", "Ya", "Tidak").then((x) => {
      if (!$scope.model.id_periode) {
        periodeServices.post($scope.model).then((res) => {
          console.log(res);

          pesan.Success("Berhasil menyimpan data");
          $scope.model = {};
        });
      } else {
        periodeServices.put($scope.model).then((res) => {
          pesan.Success("Berhasil mengubah data");
          $scope.model = {};
        });
      }
    });
  };

  $scope.edit = (item) => {
    $scope.model = angular.copy(item);
  };

  $scope.delete = (item) => {
    pesan.dialog("Yakin ingin menghapus?", "Ya", "Tidak").then((x) => {
      periodeServices.deleted(item).then((res) => {
        pesan.Success("Berhasil menghapus data");
        $scope.model = {};
      });
    });
  };

  $scope.setTampilan = (param) => {
    $scope.tampil = "tahapan";
    $scope.tahapan = param;
    $scope.$emit(
      "SendUp",
      "Urutan Tahapan Penerimaan Periode " + param.periode
    );
  };

  $scope.sortableOptions = {
    handle: "td", // drag dengan klik di seluruh kolom
    stop: function (e, ui) {
      var ordered = $scope.tahapan.tahapan.map((item, index) => ({
        id_tahapan: item.id_tahapan,
        id_detail_tahapan: item.id_detail_tahapan,
        id_periode: item.id_periode,
        nama_tahapan: item.nama_tahapan,
        urutan: index + 1,
      }));
      detailServices.put(ordered).then((res) => {
        pesan.Success("Berhasil mengubah urutan");
      });
      console.log("Urutan diubah:", ordered);
    },
  };

  $scope.kembali = () => {
    $scope.tampil = "periode";
    $scope.model = {};
  };
}

function lowonganController($scope, lowonganServices, pesan, helperServices) {
  $scope.$emit("SendUp", "Data Lowongan");
  $scope.datas = [];
  $scope.title = "Beranda";
  $scope.model = {};

  lowonganServices.get().then((res) => {
    $scope.datas = res;
    console.log(res);
  });

  $scope.save = () => {
    pesan.dialog("Yakin ingin melanjutkan?", "Ya", "Tidak").then((x) => {
      var param = angular.copy($scope.model);
      param.tanggal_buka = helperServices.dateToString(
        $scope.model.tanggal_buka
      );
      param.tanggal_tutup = helperServices.dateToString(
        $scope.model.tanggal_tutup
      );
      if (!$scope.model.id_lowongan) {
        lowonganServices.post(param).then((res) => {
          console.log(res);
          pesan.Success("Berhasil menyimpan data");
          $scope.model = {};
          $scope.bidang = {};
          tinymce.get("keterangan").setContent("");
          $("#exampleModalCenter").modal("hide");
        });
      } else {
        lowonganServices.put(param).then((res) => {
          pesan.Success("Berhasil mengubah data");
          console.log(res);
          $scope.model = {};
          $scope.bidang = {};
          tinymce.get("keterangan").setContent("");
          $("#exampleModalCenter").modal("hide");
        });
      }
    });
  };

  $scope.edit = (item) => {
    item.tanggal_buka = new Date(item.tanggal_buka);
    item.tanggal_tutup = new Date(item.tanggal_tutup);
    item.kuota = parseInt(item.kuota);
    $scope.model = angular.copy(item);
    $scope.bidang = $scope.datas.bidang.find(
      (x) => x.id_bidang == item.id_bidang
    );
    console.log($scope.model);
    tinymce.get("keterangan").setContent(item.desc);
    $("#exampleModalCenter").modal("show");
  };

  $scope.delete = (item) => {
    pesan.dialog("Yakin ingin menghapus?", "Ya", "Tidak").then((x) => {
      lowonganServices.deleted(item).then((res) => {
        pesan.Success("Berhasil menghapus data");
        $scope.model = {};
      });
    });
  };
}

function profileController($scope, profileServices, pesan) {
  $scope.$emit("SendUp", "Tahapan Penerimaan");
  $scope.datas = [];
  $scope.title = "Beranda";
  $scope.model = {};
  $scope.tampil = "produk";

  profileServices.get().then((res) => {
    res.tanggal_lahir = res.tanggal_lahir
      ? new Date(res.tanggal_lahir)
      : res.tanggal_lahir;
    $scope.model = res;
    console.log(res);
  });

  $scope.save = () => {
    pesan.dialog("Yakin ingin melanjutkan?", "Ya", "Tidak").then((x) => {
      profileServices.put($scope.model).then((res) => {
        pesan.Success("Berhasil mengubah data");
        $scope.model = res;
      });
    });
  };

  $scope.edit = (item) => {
    $scope.model = angular.copy(item);
  };

  $scope.delete = (item) => {
    pesan.dialog("Yakin ingin menghapus?", "Ya", "Tidak").then((x) => {
      profileServices.deleted(item).then((res) => {
        pesan.Success("Berhasil menghapus data");
        $scope.model = {};
      });
    });
  };
}

function daftarLowonganController(
  $scope,
  lowonganServices,
  lamaranServices,
  profileServices,
  pesan,
  helperServices
) {
  $scope.$emit("SendUp", "Daftar Lowongan");
  $scope.datas = [];
  $scope.title = "Beranda";
  $scope.model = {};
  $scope.tampil = "produk";
  $scope.berkas = true;

  lowonganServices.aktif().then((res) => {
    $scope.datas = res;
    console.log(res);
  });

  profileServices.get().then((res) => {
    $scope.profile = res;
    if(!$scope.profile.ktp || !$scope.profile.kk || !$scope.profile.ijazah || !$scope.profile.skck || !$scope.profile.cv) $scope.berkas = false;
  });

  $scope.lamar = (item) => {
    if($scope.berkas){
      pesan
        .dialog("Yakin ingin melamar lowongan ini?", "Ya", "Tidak")
        .then((x) => {
          lamaranServices
            .post(item)
            .then((res) => {
              pesan.Success("Berhasil melamar");
              $scope.model = res;
            })
            .catch(function (err) {
              // Menangani agar tidak muncul di console
              pesan.dialog(err);
            });
        });
    }else{
      pesan.dialog("Ada berkas ya harus di upload, segera lengkapi berkas anda", 'OK', false).then(x=>{
        document.location.href = helperServices.url + 'profile'
      })
    }
  };
}

function lamaranSayaController(
  $scope,
  lowonganServices,
  lamaranServices,
  pesan
) {
  $scope.$emit("SendUp", "Daftar Lamaran Saya");
  $scope.datas = [];
  $scope.title = "Beranda";
  $scope.model = {};
  $scope.tampil = "produk";

  lamaranServices.saya().then((res) => {
    $scope.datas = res;
    console.log(res);
  });

  $scope.lamar = (item) => {
    pesan
      .dialog("Yakin ingin melamar lowongan ini?", "Ya", "Tidak")
      .then((x) => {
        lamaranServices
          .post(item)
          .then((res) => {
            pesan.Success("Berhasil melamar");
            $scope.model = res;
          })
          .catch(function (err) {
            // Menangani agar tidak muncul di console
            pesan.dialog(err);
          });
      });
  };
}

function lamaranController($scope, lowonganServices, lamaranServices, pesan) {
  $scope.$emit("SendUp", "Daftar Lamaran Saya");
  $scope.datas = [];
  $scope.title = "Beranda";
  $scope.model = {};
  $scope.tampil = "produk";

  lamaranServices.get().then((res) => {
    $scope.datas = res;
    console.log(res);
  });

  $scope.check = (id_lamaran, urutan, set, statusTerima) => {
    var item = {
      id_lamaran: id_lamaran,
      urutan: urutan,
      status: statusTerima,
      set: set,
    };
    pesan
      .dialog("Yakin ingin menyetujui lamaran ini?", "Ya", "Tidak")
      .then((x) => {
        lamaranServices
          .put(item)
          .then((res) => {
            var data = $scope.datas.lamaran.find(
              (x) => x.id_lamaran == res.id_lamaran
            );
            if (item.status) {
              if (data) data.status = res.status;
            } else {
              if (data) data.id_detail_tahapan = res.id_detail_tahapan;
            }
            pesan.Success("Proses berhasil");
          })
          .catch(function (err) {
            pesan.dialog(err);
          });
      });
  };
}
