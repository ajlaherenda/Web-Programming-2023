var SinglePageService = {
    showAboutUs: function () {
        $("#search").addClass("d-none");
        $("#container-home").addClass("d-none");
        $("#container-available").addClass("d-none");
        $("#container-incoming").addClass("d-none");
        $("#container-sale").addClass("d-none");
        $("#bottom-nav").addClass("d-none");
        $("#container-test-drive").addClass("d-none");
        $("#aboutUs").removeClass("d-none");
    },

    showAvailableCarsUI: function ()
    {   $("#search").addClass("d-none");
        $("#aboutUs").addClass("d-none");
        $("#container-home").addClass("d-none");
        $("#container-incoming").addClass("d-none");
        $("#container-sale").addClass("d-none");
        $("#container-test-drive").addClass("d-none");
        $("#bottom-nav").addClass("d-none");
        $("#container-available").removeClass("d-none");
    }, 

    showIncomingCarsUI : function ()
    {
        $("#search").addClass("d-none");
        $("#aboutUs").addClass("d-none");
        $("#container-home").addClass("d-none");
        $("#container-available").addClass("d-none");
        $("#container-sale").addClass("d-none");
        $("#container-test-drive").addClass("d-none");
        $("#bottom-nav").addClass("d-none");
        $("#container-incoming").removeClass("d-none");
    },

    showSaleCarsUI : function ()
    {
        $("#search").addClass("d-none");
        $("#aboutUs").addClass("d-none");
        $("#container-home").addClass("d-none");
        $("#container-available").addClass("d-none");
        $("#bottom-nav").addClass("d-none");
        $("#container-incoming").addClass("d-none");
        $("#container-test-drive").addClass("d-none");
        $("#container-sale").removeClass("d-none");
    },

    showSearchResults: function ()
    {
        $("#container-home").addClass("d-none");
        $("#aboutUs").addClass("d-none");
        $("#container-available").addClass("d-none");
        $("#container-incoming").addClass("d-none");
        $("#container-sale").addClass("d-none");
        $("#container-test-drive").addClass("d-none");
        $("#bottom-nav").addClass("d-none");
        $("#container-search-results").removeClass("d-none");
    },

    showTestDriveUI: function ()
    {
        $("#container-home").addClass("d-none");
        $("#aboutUs").addClass("d-none");
        $("#container-available").addClass("d-none");
        $("#container-incoming").addClass("d-none");
        $("#container-sale").addClass("d-none");
        $("#container-search-results").addClass("d-none");
        $("#bottom-nav").addClass("d-none");
        $("#container-test-drive").removeClass("d-none");
    }
    

}

