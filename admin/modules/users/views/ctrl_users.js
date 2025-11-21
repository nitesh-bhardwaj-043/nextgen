//blank line is required
app.controller("ctrl_users", function ($scope, $http) {
  $http.get("login/check_valid_session").success(function (data) {
    if (data != 1) {
      window.location.assign('<?=site_url("login")?>');
    }
  });

  $scope.loader = function () {
    $http.get("users/view_data").success(function (data) {
      $scope.datadb = data;
    });
  };

  $scope.loader();
});
