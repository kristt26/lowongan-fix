angular
  .module("infoctrl", [])
  // Admin
  .controller("dashboardController", dashboardController)
  .controller("detailController", detailController)
  .controller("rekrutmenController", rekrutmenController);

function dashboardController($scope, dashboardServices) {
  $scope.$emit("SendUp", "Beranda");
  $scope.datas = [];
  $scope.title = "Beranda";
  dashboardServices.get().then(function (response) {
    $scope.datas = response;
    console.log(response);
  });
}

function detailController(
  $scope,
  dashboardServices,
  pesan,
  AuthService,
  helperServices,
  $sce
) {
  // $scope.$emit("SendUp", "Beranda");
  $scope.datas = {};
  dashboardServices.getItem(window.location.pathname.split("/").pop()).then(function (response) {
    $scope.datas = response;
    $scope.datas.detail.desc = $sce.trustAsHtml($scope.datas.detail.desc);
    console.log(response);
  });
  $scope.selectSize = function (size, color) {
    $scope.selectedSize = size;
    $scope.itemVariant = $scope.datas.variant.find(
      (x) => x.ukuran == size && x.warna == color
    );
    $scope.totalStock = $scope.itemVariant.stok;
    console.log($scope.totalStock);
  };

  // Fungsi untuk memilih warna
  $scope.selectColor = function (color, size) {
    $scope.selectedColor = color;
    $scope.itemVariant = $scope.datas.variant.find(
      (x) => x.ukuran == size && x.warna == color
    );
    $scope.totalStock = $scope.itemVariant.stok;
    console.log($scope.itemVariant);
  };

  $scope.addToCart = async function () {
    let user = localStorage.getItem("user");

    if (!user) {
      try {
        const res = await AuthService.userIsLogin();
        localStorage.setItem("user", JSON.stringify(res));
      } catch (err) {
        pesan.error("Gagal memverifikasi login.");
        return;
      }
    }

    if (!$scope.selectedSize || !$scope.selectedColor) {
      pesan.error("Silakan pilih ukuran dan warna terlebih dahulu.");
      return;
    }

    if ($scope.quantity > $scope.totalStock) {
      pesan.error("Jumlah melebihi stok yang tersedia.");
      return;
    }

    const item = angular.copy($scope.itemVariant);
    item.qty = $scope.quantity;

    try {
      const response = await dashboardServices.addToCart(item);
      $scope.$emit("setKerangjang", item);
      pesan.Success(response.message);
    } catch (error) {
      pesan.error("Gagal menambahkan ke keranjang.");
    }
  };

  $scope.checkoutNow = async function () {
    await $scope.addToCart();
    document.location.href = helperServices.url + "checkout";
  };
}

function rekrutmenController($scope, dashboardServices, helperServices) {
  $scope.datas = [];
  $scope.title = "Beranda";
  $scope.model = {};
  $scope.tampil = "checkout";
  dashboardServices.readRekrutmen().then((res) => {
    $scope.datas = res;
    console.log(res);
  });

  $scope.descripsi = (param) => {
    $scope.model = param;
    $("#modalProduk1").modal("show");
  };
}
