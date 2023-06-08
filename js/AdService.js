var AdService = {

  // ici ce na check u confifrm delete modalu
  deleteCarAd: function(id) {
    var deleteData = {};
    deleteData.id = parseInt(id);
    $.ajax({
      type: "DELETE",
      url: ' rest/ads/del',
      data: JSON.stringify(deleteData),
      contentType: "application/json",
      dataType: "json",
      beforeSend: function (xhr) {
        xhr.setRequestHeader('Authorization', localStorage.getItem('token'));
      },
      success: function (data) {
        alert("Vehicle ad has been deleted!");
        window.location.reload();
      }

    });
  },

  updateCarAd: function(id, btn) {
    var adData = {};
    adData.button = parseInt(btn);
    adData.car_id = parseInt(id);
    $.ajax({
      type: "PUT",
      url: ' rest/ads/update',
      data: JSON.stringify(adData),
      contentType: "application/json",
      dataType: "json",
      beforeSend: function (xhr) {
          xhr.setRequestHeader('Authorization', localStorage.getItem('token'));
      },
      success: function (data) {
        alert("Vehicle's ad status has been updated!");
        window.location.replace("index.html");
      }

    });
  }
}  