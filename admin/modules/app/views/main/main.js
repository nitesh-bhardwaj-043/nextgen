var app = angular.module("groveusCms", [
  "ui.bootstrap",
  "ui.router",
  "summernote",
  "angularUtils.directives.dirPagination",
]);
app.config(function ($stateProvider, $urlRouterProvider) {
  $urlRouterProvider.otherwise("/home");
  $stateProvider
    .state("home", {
      url: "/home",
      templateUrl: "dashboard/admin",
      controller: "ctrl_dashboard",
    })
    .state("admin_profile", {
      url: "/admin_profile",
      templateUrl: "admin_profile",
      controller: "ctrl_admin",
    })
    .state("change_logo", {
      url: "/change_logo",
      templateUrl: "change_logo",
      controller: "ctrl_change_logo",
    })

    .state("change_password", {
      url: "/change_password",
      templateUrl: "login/change_password",
      controller: "ctrl_login",
    })
    .state("logs", {
      url: "/logs",
      templateUrl: "logs",
      controller: "ctrl_logs",
    })

    // Newly added states 
    
    // .state("complaints", {
    //   url: "/complaints",
    //   templateUrl: "complaints",
    //   controller: "ctrl_complaints",
    // })
    // .state("fcomplaints", {
    //   url: "/fcomplaints",
    //   templateUrl: "fcomplaints",
    //   controller: "ctrl_fcomplaints",
    // })
    // .state("ccomplaints", {
    //   url: "/ccomplaints",
    //   templateUrl: "ccomplaints",
    //   controller: "ctrl_ccomplaints",
    // })
    // .state("dealership", {
    //   url: "/dealership",
    //   templateUrl: "dealership",
    //   controller: "ctrl_dealership",
    // })
    // .state("expenses", {
    //   url: "/expenses",
    //   templateUrl: "expenses",
    //   controller: "ctrl_expenses",
    // })
    ;
});
