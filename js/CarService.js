var CarService = {
    getCarsHome: function () {
        $.ajax({
            type: "GET",
            url: ' rest/api/cars/home',
            success: function (data) {
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
                                            </ul>
                                            <img style="padding: 13px;" src="`+ data[i].imaging_path + `" class="card-img-top" alt="...">
                                            <br>    
                                            <p>Detailed vehicle description:</p>
                                            <p>`+ data[i].description + `</p>
                                        </div>
                                        <div class="modal-footer">
                                        <button class="btn" id="admin-db" aria-disabled="true"><i class="fa fa-database"></i></button>
                                        <button class="btn" id="admin-trash" aria-disabled="true"><i class="fa fa-trash"></i></button>
                                        </div>

                                    </div>
                          </div>
                    </div>`;
                }
                $('#carCardsHome').html(html);
            }
        });
    },

    showAvailableCars: function () {
        $.ajax({
            type: "GET",
            url: ' rest/api/cars/availability/AVAILABLE',
            success: function (data) {
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
                                            </ul>
                                            <img style="padding: 13px;" src="`+ data[i].imaging_path + `" class="card-img-top" alt="...">
                                            <br>    
                                            <p>Detailed vehicle description:</p>
                                            <p>`+ data[i].description + `</p>
                                        </div>
                                        <div class="modal-footer">
                                        <button class="btn" id="admin-db" aria-disabled="true"><i class="fa fa-database"></i></button>
                                        <button class="btn" id="admin-trash" aria-disabled="true"><i class="fa fa-trash"></i></button>
                                        </div>

                                    </div>
                         </div>
                    </div>`;

                }
                $('#carCardsAvailable').html(html);
            }

        });
    },

    showIncomingCars: function () {
        $.ajax({
            type: "GET",
            url: ' rest/api/cars/availability/INCOMING',
            success: function (data) {
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
                                            </ul>
                                            <img style="padding: 13px;" src="`+ data[i].imaging_path + `" class="card-img-top" alt="...">
                                            <br>    
                                            <p>Detailed vehicle description:</p>
                                            <p>`+ data[i].description + `</p>
                                        </div>
                                        <div class="modal-footer">
                                        <button class="btn" id="admin-db" aria-disabled="true"><i class="fa fa-database"></i></button>
                                        <button class="btn" id="admin-trash" aria-disabled="true"><i class="fa fa-trash"></i></button>
                                        </div>

                                    </div>
                         </div>
                    </div>`;
                };
                $('#carCardsIncoming').html(html);
            }

        });
    },

    showSaleCars: function () {
        $.ajax({
            type: "GET",
            url: ' rest/api/cars/availability/SALE',
            success: function (data) {
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
                                            </ul>
                                            <img style="padding: 13px;" src="`+ data[i].imaging_path + `" class="card-img-top" alt="...">
                                            <br>    
                                            <p>Detailed vehicle description:</p>
                                            <p>`+ data[i].description + `</p>
                                        </div>
                                        <div class="modal-footer">
                                        <button class="btn" id="admin-db" aria-disabled="true"><i class="fa fa-database"></i></button>
                                        <button class="btn" id="admin-trash" aria-disabled="true"><i class="fa fa-trash"></i></button>
                                        </div>

                                    </div>
                         </div>
                    </div>`;
                }
                $('#carCardsSale').html(html);
            }

        });
    },


    // ovo sam zamislila da options u formi za filter budu povlacene iz baze
    getCarBrands: function () {
        $.ajax({
            type: "GET",
            url: " rest/api/cars/brands",
            success: function (data) {
                var html = "";
                for (let i = 0; i < data.length; i++) {
                    html += `
                    <option value="`+ data[i].brand + `">` + data[i].brand + `</option>`
                }
                $('#car_brands').html(html);
            }

        });
    },


    searchForCars: function () {
        var searchParam = document.getElementById("searchInput");
        $.ajax({
            type: "GET",
            url: ' rest/api/cars/searchtool/' + searchParam.value,
            success: function (data) {
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
                                            </ul>
                                            <img style="padding: 13px;" src="`+ data[i].imaging_path + `" class="card-img-top" alt="...">
                                            <br>    
                                            <p>Detailed vehicle description:</p>
                                            <p>`+ data[i].description + `</p>
                                        </div>
                                        <div class="modal-footer">
                                        <button class="btn" id="admin-db" aria-disabled="true"><i class="fa fa-database"></i></button>
                                        <button class="btn" id="admin-trash" aria-disabled="true"><i class="fa fa-trash"></i></button>
                                        </div>

                                    </div>
                         </div>
                    </div>`;

                }
                $('#carCardsSearched').html(html);
            }
        });
    }
}