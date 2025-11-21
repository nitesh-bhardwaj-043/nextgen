//blank line is required
app.controller("ctrl_request", function ($scope, $http) {
  $http.get("login/check_valid_session").success(function (data) {
    if (data != 1) {
      window.location.assign('<?=site_url("login")?>');
    }
  });
  $scope.loader = function () {
    // load deposit requests
    $http.get("request/view_data?table=d_request").success(function (data) {
      $scope.datadb_deposit = data;
    });
    // load withdraw requests
    $http.get("request/view_data?table=w_request").success(function (data) {
      $scope.datadb_withdraw = data;
    });
  };

  $scope.showImage = function (img) {
    $scope.modalImage = img;
    $("#imageModal").modal("show");
  };

  $scope.approveDeposit = function (id) {
    if (!confirm("Approve deposit?")) return;
    $http
      .post("request/approve_deposit", { req_id: id })
      .success(function (res) {
        alert(res);
        $scope.loader();
      });
  };

  $scope.disapproveDeposit = function (id) {
    if (!confirm("Disapprove deposit?")) return;
    $http
      .post("request/disapprove_deposit", { req_id: id })
      .success(function (res) {
        alert(res);
        $scope.loader();
      });
  };

  $scope.approveWithdraw = function (id) {
    if (!confirm("Approve withdrawal?")) return;
    $http
      .post("request/approve_withdraw", { req_id: id })
      .success(function (res) {
        alert(res);
        $scope.loader();
      });
  };

  $scope.disapproveWithdraw = function (id) {
    if (!confirm("Disapprove withdrawal?")) return;
    $http
      .post("request/disapprove_withdraw", { req_id: id })
      .success(function (res) {
        alert(res);
        $scope.loader();
      });
  };

  $scope.loader();
});
