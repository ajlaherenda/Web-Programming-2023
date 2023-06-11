var CarService = {
  getCarsHome: function() {
    $.ajax({
      type: "GET",
      url: ' rest/cars/home',
      success: function(data) {
        var html = "";
        for (let i = 0; i < data.length; i++) {
          html += `
            <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
              <div class="card h-100 text-dark bg-light" style="width: 18rem;">
                <img src="`+ data[i].imaging_path + `" class="card-img-top" alt="...">
                  <div class="card-body flex-direction-column">
                    <h5 class="card-title">`+ data[i].brand + ` ` + data[i].model + `</h5>
                    <h6 class="card-subtitle mb-2 text-muted">`+ data[i].year + `</h6>
                    <p class="card-text flex-grow-1">`+ data[i].title + `</p>
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item">Price `+ data[i].price + `.00 KM</li>
                      <li class="list-group-item">PDV price `+ data[i].pdv_price + `.00 KM</li>
                    </ul> 
                  </div>
                  <div class="card-footer text-end">
                    <button class="align-self-end btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#carHomeModal`+ data[i].car_id + `">View</button> 
                  </div>                       
              </div>
            </div>                 
            <div class="modal" role="dialog" style="width:90%" tabindex="-1" id="carHomeModal`+ data[i].car_id + `" aria-labelledby="modal-title" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">`+ data[i].brand + ` ` + data[i].model + `</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item">Year: ` + data[i].year + `</li>
                      <li class="list-group-item">Mileage: ` + data[i].mileage + ` km</li>
                      <li class="list-group-item">Engine power: ` + data[i].engine_power + `</li>
                      <li class="list-group-item">Transmission: ` + data[i].transmission + `</li>
                      <li class="list-group-item">Location: ` + data[i].location_name + `</li>
                    </ul>
                    <img style="padding: 13px;" src="`+ data[i].imaging_path + `" class="card-img-top" alt="...">
                    <br>    
                    <p>Detailed vehicle description:</p>
                    <p>`+ data[i].description + `</p>
                  </div>
                  <div class="modal-footer">
                  <div class="d-none div-for-update-del">
                    <button class="btn" data-bs-toggle="modal" data-bs-target="#carHomeUpdateModal`+ data[i].car_id + `" id="admin-db" aria-disabled="true"><i class="fa fa-database"></i></button>
                    <button class="btn" data-bs-toggle="modal" data-bs-target="#carHomeDelModal`+ data[i].car_id + `" id="admin-trash" aria-disabled="true"><i class="fa fa-trash"></i></button>
                  </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal" role="dialog" tabindex="-1" id="carHomeDelModal`+ data[i].car_id + `" aria-labelledby="modal-title" aria-hidden="true">
              <div class="modal-dialog modal-xs">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Are you sure that you want to remove ` + data[i].brand + ` ` + data[i].model + `?</h5>  
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                  <p>Disclaimer:</p>
                  <p>Once you delete this entry there is no way to undo this operation.</p>
                  </div>
                  <div class="modal-footer">
                    <button class ="btn"><i class="fa fa-check" onclick="AdService.deleteCarAd(` + data[i].car_id + `);" style="font-size:48px;color:rgb(152,251,152)"></i></button>
                    <button class="btn"><i class="fa fa-close" data-bs-dismiss="modal" style="font-size:48px;color:red"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal" role="dialog" tabindex="-1" id="carHomeUpdateModal`+ data[i].car_id + `" aria-labelledby="modal-title" aria-hidden="true">
              <div class="modal-dialog modal-xs">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">How do you want to update the status of the car ` + data[i].brand + ` ` + data[i].model + `?</h5>  
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <p>Set the status as:</p>
                      <button type="button" class="btn btn-outline-success btn-lg" onclick="AdService.updateCarAd(` + data[i].car_id + `, 1)" style="width:300px; margin: 12px;">AVAILABLE</button>
                      <button type="button" class="btn btn-outline-danger btn-lg" onclick="AdService.updateCarAd(` + data[i].car_id + `, 2)" style="width:300px; margin: 12px;">SALE</button>
                      <button type="button" class="btn btn-outline-primary btn-lg" onclick="AdService.updateCarAd(` + data[i].car_id + `, 3)" style="width:300px; margin: 12px;">INCOMING</button>
                      <button type="button" class="btn btn-outline-warning btn-lg" onclick="AdService.updateCarAd(` + data[i].car_id + `, 4)" style="width:300px; margin: 12px;">RESERVED</button>
                  </div>
                  <div class="modal-footer">
                    <p>Current status is: ` + data[i].status + `</p>
                  </div>
                </div>
              </div>
            </div>`;
        } 
        $('#carCardsHome').html(html);
        SinglePageService.showAdminParticularUI();
      }  
    });
  },

  showAvailableCars: function() {
    $.ajax({
      type: "GET",
      url: ' rest/cars/availability/AVAILABLE',
      success: function(data) {
        var html = "";
        for (let i = 0; i < data.length; i++) {
          html += `
            <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
              <div class="card h-100" style="width: 18rem;">
              <img src="`+ data[i].imaging_path + `" class="card-img-top" alt="...">
              <div class="card-body h-100 d-flex flex-column">
                <h5 class="card-title">`+ data[i].brand + ` ` + data[i].model + `</h5>
                <h6 class="card-subtitle mb-2 text-muted">`+ data[i].year + `</h6>
                <p class="card-text">`+ data[i].title + `</p>
                <ul class="list-group list-group-flush">
                <li class="list-group-item">Price `+ data[i].price + `.00 KM</li>
                <li class="list-group-item">PDV price `+ data[i].pdv_price + `.00 KM</li>
                </ul>
              </div>
              <div class="card-footer text-end">
                  <button class="align-self-end btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#carAvailableModal`+ data[i].car_id + `">View</button> 
              </div>
              </div>
            </div>
            <div class="modal" role="dialog" style="width:90%" tabindex="-1" id="carAvailableModal`+ data[i].car_id + `" aria-labelledby="modal-title" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                  <h5 class="modal-title">`+ data[i].brand + ` ` + data[i].model + `</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">Year: ` + data[i].year + `</li>
                    <li class="list-group-item">Mileage: ` + data[i].mileage + ` km</li>
                    <li class="list-group-item">Engine power: ` + data[i].engine_power + `</li>
                    <li class="list-group-item">Transmission: ` + data[i].transmission + `</li>
                    <li class="list-group-item">Location: ` + data[i].location_name + `</li>

                  </ul>
                  <img style="padding: 13px;" src="`+ data[i].imaging_path + `" class="card-img-top" alt="...">
                  <br>    
                  <p>Detailed vehicle description:</p>
                  <p>`+ data[i].description + `</p>
                  </div>
                  <div class="modal-footer">
                  <div class="d-none div-for-update-del">
                  <button class="btn" data-bs-toggle="modal" data-bs-target="#carAvailableUpdateModal`+ data[i].car_id + `" id="admin-db" aria-disabled="true"><i class="fa fa-database"></i></button>
                  <button class="btn" data-bs-toggle="modal" data-bs-target="#carAvailableDelModal`+ data[i].car_id + `" id="admin-trash" aria-disabled="true"><i class="fa fa-trash"></i></button>
                  </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal" role="dialog" tabindex="-1" id="carAvailableDelModal`+ data[i].car_id + `" aria-labelledby="modal-title" aria-hidden="true">
              <div class="modal-dialog modal-xs">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Are you sure that you want to remove ` + data[i].brand + ` ` + data[i].model + `?</h5>  
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                  <p>Disclaimer:</p>
                  <p>Once you delete this entry there is no way to undo this operation.</p>
                  </div>
                  <div class="modal-footer">
                    <button class ="btn"><i class="fa fa-check" onclick="AdService.deleteCarAd(` + data[i].car_id + `);" style="font-size:48px;color:rgb(152,251,152)"></i></button>
                    <button class="btn"><i class="fa fa-close" style="font-size:48px;color:red"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal" role="dialog" tabindex="-1" id="carAvailableUpdateModal`+ data[i].car_id + `" aria-labelledby="modal-title" aria-hidden="true">
              <div class="modal-dialog modal-xs">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">How do you want to update the status of the car ` + data[i].brand + ` ` + data[i].model + `?</h5>  
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <p>Set the status as:</p>
                    <button type="button" class="btn btn-outline-success btn-lg" onclick="AdService.updateCarAd(` + data[i].car_id + `, 1)" style="width:300px; margin: 12px;">AVAILABLE</button>
                    <button type="button" class="btn btn-outline-danger btn-lg" onclick="AdService.updateCarAd(` + data[i].car_id + `, 2)" style="width:300px; margin: 12px;">SALE</button>
                    <button type="button" class="btn btn-outline-primary btn-lg" onclick="AdService.updateCarAd(` + data[i].car_id + `, 3)" style="width:300px; margin: 12px;">INCOMING</button>
                    <button type="button" class="btn btn-outline-warning btn-lg" onclick="AdService.updateCarAd(` + data[i].car_id + `, 4)" style="width:300px; margin: 12px;">RESERVED</button>
                  </div>
                  <div class="modal-footer">
                    <p>Current status is: ` + data[i].status + `</p>
                  </div>
                </div>
              </div>
            </div>`;
        }
        $('#carCardsAvailable').html(html);
        SinglePageService.showAdminParticularUI();
      }
    });
  },

  showIncomingCars: function() {
    $.ajax({
      type: "GET",
      url: ' rest/cars/availability/INCOMING',
      success: function(data) {
        var html = "";
        for (let i = 0; i < data.length; i++) {
          html += `
            <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
              <div class="card h-100" style="width: 18rem;">
                <img src="`+ data[i].imaging_path + `" class="card-img-top" alt="...">
                <div class="card-body h-100 d-flex flex-column">
                  <h5 class="card-title">`+ data[i].brand + ` ` + data[i].model + `</h5>
                  <h6 class="card-subtitle mb-2 text-muted">`+ data[i].year + `</h6>
                  <p class="card-text">`+ data[i].title + `</p>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">Price `+ data[i].price + `.00 KM</li>
                    <li class="list-group-item">PDV price `+ data[i].pdv_price + `.00 KM</li>
                  </ul>
                </div>
                <div class="card-footer text-end">
                  <button class="align-self-end btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#carIncomingModal` + data[i].car_id + `">View</button> 
                </div> 
              </div>
            </div>
            <div class="modal" role="dialog" style="width:90%" tabindex="-1" id="carIncomingModal`+ data[i].car_id + `" aria-labelledby="modal-title" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">`+ data[i].brand + ` ` + data[i].model + `</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item">Year: ` + data[i].year + `</li>
                      <li class="list-group-item">Mileage: ` + data[i].mileage + ` km</li>
                      <li class="list-group-item">Engine power: ` + data[i].engine_power + `</li>
                      <li class="list-group-item">Transmission: ` + data[i].transmission + `</li>
                      <li class="list-group-item">Location: ` + data[i].location_name + `</li>
                    </ul>
                    <img style="padding: 13px;" src="`+ data[i].imaging_path + `" class="card-img-top" alt="...">
                    <br>    
                    <p>Detailed vehicle description:</p>
                    <p>`+ data[i].description + `</p>
                  </div>
                  <div class="modal-footer">
                  <div class="d-none div-for-update-del">
                    <button class="btn" data-bs-toggle="modal" data-bs-target="#carIncomingUpdateModal`+ data[i].car_id + `" id="admin-db" aria-disabled="true"><i class="fa fa-database"></i></button>
                    <button class="btn" data-bs-toggle="modal" data-bs-target="#carIncomingDelModal`+ data[i].car_id + `" id="admin-trash" aria-disabled="true"><i class="fa fa-trash"></i></button>
                  </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal" role="dialog" tabindex="-1" id="carIncomingDelModal`+ data[i].car_id + `" aria-labelledby="modal-title" aria-hidden="true">
              <div class="modal-dialog modal-xs">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Are you sure that you want to remove ` + data[i].brand + ` ` + data[i].model + `?</h5>  
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                  <p>Disclaimer:</p>
                  <p>Once you delete this entry there is no way to undo this operation.</p>
                  </div>
                  <div class="modal-footer">
                    <button class ="btn"><i class="fa fa-check" onclick="AdService.deleteCarAd(` + data[i].car_id + `);" style="font-size:48px;color:rgb(152,251,152)"></i></button>
                    <button class="btn"><i class="fa fa-close" style="font-size:48px;color:red"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal" role="dialog" tabindex="-1" id="carIncomingUpdateModal`+ data[i].car_id + `" aria-labelledby="modal-title" aria-hidden="true">
              <div class="modal-dialog modal-xs">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">How do you want to update the status of the car ` + data[i].brand + ` ` + data[i].model + `?</h5>  
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <p>Set the status as:</p>
                    <button type="button" class="btn btn-outline-success btn-lg" onclick="AdService.updateCarAd(` + data[i].car_id + `, 1)" style="width:300px; margin: 12px;">AVAILABLE</button>
                    <button type="button" class="btn btn-outline-danger btn-lg" onclick="AdService.updateCarAd(` + data[i].car_id + `, 2)" style="width:300px; margin: 12px;">SALE</button>
                    <button type="button" class="btn btn-outline-primary btn-lg" onclick="AdService.updateCarAd(` + data[i].car_id + `, 3)" style="width:300px; margin: 12px;">INCOMING</button>
                    <button type="button" class="btn btn-outline-warning btn-lg" onclick="AdService.updateCarAd(` + data[i].car_id + `, 4)" style="width:300px; margin: 12px;">RESERVED</button>
                  </div>
                  <div class="modal-footer">
                    <p>Current status is: ` + data[i].status + `</p>
                  </div>
                </div>
              </div>
            </div>`;
        }
        $('#carCardsIncoming').html(html);
        SinglePageService.showAdminParticularUI();
      }
    });
  },

  showSaleCars: function() {
    $.ajax({
      type: "GET",
      url: ' rest/cars/availability/SALE',
      success: function(data) {
        var html = "";
        for (let i = 0; i < data.length; i++) {
          html += `
            <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
              <div class="card h-100" style="width: 18rem;">
              <img src="`+ data[i].imaging_path + `" class="card-img-top" alt="...">
              <div class="card-body h-100 d-flex flex-column">
                <h5 class="card-title">`+ data[i].brand + ` ` + data[i].model + `</h5>
                <h6 class="card-subtitle mb-2 text-muted">`+ data[i].year + `</h6>
                <p class="card-text">`+ data[i].title + `</p>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">Price `+ data[i].price + `.00 KM</li>
                  <li class="list-group-item">PDV price `+ data[i].pdv_price + `.00 KM</li>
                </ul>
              </div>
              <div class="card-footer text-end">
                <button class="align-self-end btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#carSaleModal` + data[i].car_id + `">View</button> 
              </div> 
              </div>
            </div>
            <div class="modal" role="dialog" style="width:90%" tabindex="-1" id="carSaleModal`+ data[i].car_id + `" aria-labelledby="modal-title" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">`+ data[i].brand + ` ` + data[i].model + `</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item">Year: ` + data[i].year + `</li>
                      <li class="list-group-item">Mileage: ` + data[i].mileage + ` km</li>
                      <li class="list-group-item">Engine power: ` + data[i].engine_power + `</li>
                      <li class="list-group-item">Transmission: ` + data[i].transmission + `</li>
                      <li class="list-group-item">Location: ` + data[i].location_name + `</li>
                    </ul>
                    <img style="padding: 13px;" src="`+ data[i].imaging_path + `" class="card-img-top" alt="...">
                    <br>    
                    <p>Detailed vehicle description:</p>
                    <p>`+ data[i].description + `</p>
                  </div>
                  <div class="modal-footer">
                  <div class="d-none div-for-update-del">
                    <button class="btn" data-bs-toggle="modal" data-bs-target="#carSaleUpdateModal`+ data[i].car_id + `" id="admin-db" aria-disabled="true"><i class="fa fa-database"></i></button>
                    <button class="btn" data-bs-toggle="modal" data-bs-target="#carSaleDelModal`+ data[i].car_id + `" id="admin-trash" aria-disabled="true"><i class="fa fa-trash"></i></button>
                  </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal" role="dialog" tabindex="-1" id="carSaleDelModal`+ data[i].car_id + `" aria-labelledby="modal-title" aria-hidden="true">
              <div class="modal-dialog modal-xs">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Are you sure that you want to remove ` + data[i].brand + ` ` + data[i].model + `?</h5>  
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                  <p>Disclaimer:</p>
                  <p>Once you delete this entry there is no way to undo this operation.</p>
                  </div>
                  <div class="modal-footer">
                    <button class ="btn"><i class="fa fa-check" onclick="AdService.deleteCarAd(` + data[i].car_id + `);" style="font-size:48px;color:rgb(152,251,152)"></i></button>
                    <button class="btn"><i class="fa fa-close" style="font-size:48px;color:red"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal" role="dialog" tabindex="-1" id="carSaleUpdateModal`+ data[i].car_id + `" aria-labelledby="modal-title" aria-hidden="true">
              <div class="modal-dialog modal-xs">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">How do you want to update the status of the car ` + data[i].brand + ` ` + data[i].model + `?</h5>  
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <p>Set the status as:</p>
                    <button type="button" class="btn btn-outline-success btn-lg" onclick="AdService.updateCarAd(` + data[i].car_id + `, 1)" style="width:300px; margin: 12px;">AVAILABLE</button>
                    <button type="button" class="btn btn-outline-danger btn-lg" onclick="AdService.updateCarAd(` + data[i].car_id + `, 2)" style="width:300px; margin: 12px;">SALE</button>
                    <button type="button" class="btn btn-outline-primary btn-lg" onclick="AdService.updateCarAd(` + data[i].car_id + `, 3)" style="width:300px; margin: 12px;">INCOMING</button>
                    <button type="button" class="btn btn-outline-warning btn-lg" onclick="AdService.updateCarAd(` + data[i].car_id + `, 4)" style="width:300px; margin: 12px;">RESERVED</button>
                  </div>
                  <div class="modal-footer">
                    <p>Current status is: ` + data[i].status + `</p>
                  </div>
                </div>
              </div>
            </div>`;
        }
        $('#carCardsSale').html(html);
        SinglePageService.showAdminParticularUI();
      }
    });
  },

  getTestDriveCars: function() {
    $.ajax({
      type: "GET",
      url: ' rest/cars/testdrive',
      success: function(data) {
        var html = "";
        for (let i = 0; i < data.length; i++) {
          html += `
            <div>
            <option>` + data[i].brand + ` ` + data[i].model + ` ` + data[i].year + ` Serial number: ` + data[i].serial_number + ` in ` + data[i].location_name + `</option>
            </div>`;
        }
        $("#vehicle").html(html);
      }
    });
  },

  searchForCars: function() {
    var searchParam = document.getElementById("searchInput");
      $.ajax({
        type: "GET",
        url: ' rest/cars/searchtool/' + searchParam.value,
        success: function(data) {
          if (data == 0) {
            alert("No cars suiting your search.");
          } else {
            var html = "";
            for (let i = 0; i < data.length; i++) {
              html += `
                <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                    <div class="card h-100" style="width: 18rem;">
                        <img src="`+ data[i].imaging_path + `" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">`+ data[i].brand + ` ` + data[i].model + `</h5>
                          <h6 class="card-subtitle mb-2 text-muted">`+ data[i].year + `</h6>
                          <p class="card-text">`+ data[i].title + `</p>
                          <ul class="list-group list-group-flush">
                            <li class="list-group-item">Price `+ data[i].price + `.00 KM</li>
                            <li class="list-group-item">PDV price `+ data[i].pdv_price + `.00 KM</li>
                          </ul>
                        </div>
                        <div class="card-footer text-end">
                            <button class="align-self-end btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#carSearchModal` + data[i].car_id + `">View</button> 
                        </div> 
                    </div>
                </div>
                <div class="modal" role="dialog" style="width:90%" tabindex="-1" id="carSearchModal`+ data[i].car_id + `" aria-labelledby="modal-title" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">`+ data[i].brand + ` ` + data[i].model + `</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <ul class="list-group list-group-flush">
                          <li class="list-group-item">Year: ` + data[i].year + `</li>
                          <li class="list-group-item">Mileage: ` + data[i].mileage + ` km</li>
                          <li class="list-group-item">Engine power: ` + data[i].engine_power + `</li>
                          <li class="list-group-item">Transmission: ` + data[i].transmission + `</li>
                          <li class="list-group-item">Location: ` + data[i].location_name + `</li>
                        </ul>
                        <img style="padding: 13px;" src="`+ data[i].imaging_path + `" class="card-img-top" alt="...">
                        <br>    
                        <p>Detailed vehicle description:</p>
                        <p>`+ data[i].description + `</p>
                      </div>
                      <div class="modal-footer">
                      <div class="d-none div-for-update-del">
                        <button class="btn" data-bs-toggle="modal" data-bs-target="#carSearchUpdateModal`+ data[i].car_id + `" id="admin-db" aria-disabled="true"><i class="fa fa-database"></i></button>
                        <button class="btn" data-bs-toggle="modal" data-bs-target="#carSearchDelModal`+ data[i].car_id + `" id="admin-trash" aria-disabled="true"><i class="fa fa-trash"></i></button>
                      </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal" role="dialog" tabindex="-1" id="carSearchDelModal`+ data[i].car_id + `" aria-labelledby="modal-title" aria-hidden="true">
                <div class="modal-dialog modal-xs">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Are you sure that you want to remove ` + data[i].brand + ` ` + data[i].model + `?</h5>  
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <p>Disclaimer:</p>
                    <p>Once you delete this entry there is no way to undo this operation.</p>
                    </div>
                    <div class="modal-footer">
                      <button class ="btn"><i class="fa fa-check" onclick="AdService.deleteCarAd(` + data[i].car_id + `);" style="font-size:48px;color:rgb(152,251,152)"></i></button>
                      <button class="btn"><i class="fa fa-close" style="font-size:48px;color:red"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal" role="dialog" tabindex="-1" id="carSearchUpdateModal`+ data[i].car_id + `" aria-labelledby="modal-title" aria-hidden="true">
                <div class="modal-dialog modal-xs">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">How do you want to update the status of the car ` + data[i].brand + ` ` + data[i].model + `?</h5>  
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <p>Set the status as:</p>
                      <button type="button" class="btn btn-outline-success btn-lg" onclick="AdService.updateCarAd(` + data[i].car_id + `, 1)" style="width:300px; margin: 12px;">AVAILABLE</button>
                      <button type="button" class="btn btn-outline-danger btn-lg" onclick="AdService.updateCarAd(` + data[i].car_id + `, 2)" style="width:300px; margin: 12px;">SALE</button>
                      <button type="button" class="btn btn-outline-primary btn-lg" onclick="AdService.updateCarAd(` + data[i].car_id + `, 3)" style="width:300px; margin: 12px;">INCOMING</button>
                      <button type="button" class="btn btn-outline-warning btn-lg" onclick="AdService.updateCarAd(` + data[i].car_id + `, 4)" style="width:300px; margin: 12px;">RESERVED</button>
                    </div>
                    <div class="modal-footer">
                      <p>Current status is: ` + data[i].status + `</p>
                    </div>
                  </div>
                </div>
              </div>`;
            }
            $('#carCardsSearched').html(html);
            SinglePageService.showAdminParticularUI();
          }
        }
      });
  }

}