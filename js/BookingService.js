var BookingService = {
  bookTestDrive: function(entity) {
    $.ajax({
      type: "POST",
      url: ' rest/booking', 
      data: JSON.stringify(entity),
      contentType: "application/json",
      dataType: "json",
      success: function (result) {
        if (Number.isInteger(result)) {
          alert("The vehicle has been reserved for that time and/or date. Try changing them!");
        } 
        else {
          alert("Test drive booked successfully!");
          window.location.replace("index.html");
        }
      },
      error: function (XMLHttpRequest, textStatus, errorThrown) {
        toastr.error(JSON.stringify(errorThrown, Object.getOwnPropertyNames(errorThrown)));
      }
    });
  },

  init: function() {
    $("#testDriveForm").validate({
      rules: {
        name: {
          required: true,
          minlength: 2
        },
        surname: {
          required: true,
          minlength: 2
        },
        email: {
          required: true,
          email: true
        },
        phone: {
          required: true,
          digits: true
        },
        vehicle: {
          required: true
        },
        date: {
          required: true,
          date: true
        },
        time: {
          required: true
        }
      },
      messages: {
        name: {
          required: "Please enter your name",
          minlength: "Name must be at least 2 characters long"
        },
        surname: {
          required: "Please enter your surname",
          minlength: "Surname must be at least 2 characters long"
        },
        email: {
          required: "Please enter your email",
          email: "Please enter a valid email address"
        },
        phone: {
          required: "Please enter your phone number",
          digits: "Please enter a valid phone number"
        },
        vehicle: {
          required: "Please select a vehicle"
        },
        date: {
          required: "Please enter a date",
          date: "Please enter a valid date"
        },
        time: {
          required: "Please select a time"
        }
      },
      submitHandler: function (form) {
        var entity = {};
        entity.name = $('#name').val();
        entity.surname = $('#surname').val();
        entity.email = $('#email').val();
        entity.phone = $('#phone').val();
        entity.vehicle = $('#vehicle').val();
        entity.date = $('#date').val();
        entity.time = $("[name='time']:checked").val();
        BookingService.bookTestDrive(entity);
      }
    }); 
  }
}