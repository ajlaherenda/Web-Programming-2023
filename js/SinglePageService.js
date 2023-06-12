var SinglePageService = {
  showAboutUs: function() {
    $("#search").addClass("d-none");
    $("#container-home").addClass("d-none");
    $("#container-available").addClass("d-none");
    $("#container-incoming").addClass("d-none");
    $("#container-sale").addClass("d-none");
    $("#bottom-nav").addClass("d-none");
    $("#container-search-results").addClass("d-none");
    $("#container-test-drive").addClass("d-none");
    $("#container-admin-login").addClass("d-none"); 
    $("#aboutUs").removeClass("d-none");
  },

  showAvailableCarsUI: function() {
    $("#search").addClass("d-none");
    $("#aboutUs").addClass("d-none");
    $("#container-home").addClass("d-none");
    $("#container-incoming").addClass("d-none");
    $("#container-sale").addClass("d-none");
    $("#container-test-drive").addClass("d-none");
    $("#container-search-results").addClass("d-none");
    $("#bottom-nav").addClass("d-none");
    $("#container-admin-login").addClass("d-none");
    $("#container-available").removeClass("d-none");
  }, 

  showIncomingCarsUI : function() {
    $("#search").addClass("d-none");
    $("#aboutUs").addClass("d-none");
    $("#container-home").addClass("d-none");
    $("#container-available").addClass("d-none");
    $("#container-sale").addClass("d-none");
    $("#container-test-drive").addClass("d-none");
    $("#container-search-results").addClass("d-none");
    $("#bottom-nav").addClass("d-none");
    $("#container-admin-login").addClass("d-none");
    $("#container-incoming").removeClass("d-none");
  },

  showSaleCarsUI : function() {
    $("#search").addClass("d-none");
    $("#aboutUs").addClass("d-none");
    $("#container-home").addClass("d-none");
    $("#container-available").addClass("d-none");
    $("#container-search-results").addClass("d-none");
    $("#bottom-nav").addClass("d-none");
    $("#container-incoming").addClass("d-none");
    $("#container-test-drive").addClass("d-none");
    $("#container-admin-login").addClass("d-none");
    $("#container-sale").removeClass("d-none");
  },

  showSearchResults: function() {
    $("#container-home").addClass("d-none");
    $("#aboutUs").addClass("d-none");
    $("#container-available").addClass("d-none");
    $("#container-incoming").addClass("d-none");
    $("#container-sale").addClass("d-none");
    $("#container-test-drive").addClass("d-none");
    $("#bottom-nav").addClass("d-none");
    $("#container-admin-login").addClass("d-none");
    $("#container-search-results").removeClass("d-none");
  },

  showTestDriveUI: function() {
    $("#container-home").addClass("d-none");
    $("#aboutUs").addClass("d-none");
    $("#container-available").addClass("d-none");
    $("#container-incoming").addClass("d-none");
    $("#container-sale").addClass("d-none");
    $("#container-search-results").addClass("d-none");
    $("#bottom-nav").addClass("d-none");
    $("#search").addClass("d-none");
    $("#container-admin-login").addClass("d-none");
    $("#container-test-drive").removeClass("d-none");
  },

  showAdminLoginUI: function() {
    $("#container-home").addClass("d-none");
    $("#aboutUs").addClass("d-none");
    $("#container-available").addClass("d-none");
    $("#container-incoming").addClass("d-none");
    $("#container-sale").addClass("d-none");
    $("#container-search-results").addClass("d-none");
    $("#bottom-nav").addClass("d-none");
    $("#login-btn").addClass("d-none");
    $("#container-test-drive").addClass("d-none");
    $("#search").removeClass("d-none");
    $("#container-admin-login").removeClass("d-none");
  },

  showAdminParticularUI: function() {
    if (localStorage.getItem('token') == null) {
      $("#sign-out-btn-container").addClass("d-none");
      $(".div-for-update-del").addClass("d-none"); 
    } else {
      $("#sign-out-btn-container").removeClass("d-none");
      $(".div-for-update-del").removeClass("d-none");
    }     
  }
}

