$(document).ready(function() {

  const multiSelectInput = document.getElementById('multiSelectInput');
  const inputField = document.getElementById('vendorHeighConcern');
  const dropdownMenu = document.getElementById('dropdownMenu');
  const dropdownItems = document.querySelectorAll('.dropdown-item');
  const selectedValues = [];
  
  // Toggle dropdown visibility
  multiSelectInput.addEventListener('click', function(event) {
    dropdownMenu.classList.toggle('show');
  });
  
  // Handle item selection
  dropdownItems.forEach(item => {
    item.addEventListener('click', function(event) {
      const value = this.getAttribute('data-value');
  
      // Check if the value is already selected
      if (!selectedValues.includes(value)) {
        selectedValues.push(value); // Add value to selected list
        addTag(value); // Add tag for selected option
        this.classList.add('disabled'); // Disable the selected option
      }
    });
  });
  
  // Add selected option as tag in the input box
  function addTag(value) {
    const tag = document.createElement('div');
    tag.classList.add('multi-select-tag');
    tag.textContent = value;
  
    // Remove button for tag
    const removeButton = document.createElement('button');
    removeButton.textContent = 'x';
    removeButton.addEventListener('click', function(event) {
      event.stopPropagation();
      removeTag(value); // Remove tag and deselect value
    });
  
    tag.appendChild(removeButton);
    multiSelectInput.insertBefore(tag, inputField); // Insert tag before the input box
  
    updateInputField(); // Adjust input placeholder based on selection
  
    // Scroll to the end of the multi-select input to show the new tag
    multiSelectInput.scrollLeft = multiSelectInput.scrollWidth;
  }
  
  // Remove tag when 'x' is clicked
  function removeTag(value) {
    selectedValues.splice(selectedValues.indexOf(value), 1); // Remove value from selected list
    const tagToRemove = Array.from(multiSelectInput.querySelectorAll('.multi-select-tag')).find(tag => tag.textContent.includes(value));
    if (tagToRemove) {
      tagToRemove.remove();
    }
  
    // Find the dropdown item and enable it again
    const itemToDeselect = Array.from(dropdownItems).find(item => item.getAttribute('data-value') === value);
    if (itemToDeselect) {
      itemToDeselect.classList.remove('disabled'); // Enable the deselected option
    }
  
    updateInputField(); // Adjust input placeholder based on selection
  }
  
  // Update input placeholder text
  function updateInputField() {
    inputField.placeholder = selectedValues.length > 0 ? '' : 'Select Options';
  }
  
  // Close dropdown when clicking outside
  document.addEventListener('click', function(event) {
    if (!multiSelectInput.contains(event.target)) {
      dropdownMenu.classList.remove('show');
    }
  });
  
  // Function to get the selected options
  function getSelectedOptions() {
    return selectedValues;
  }

  /*  end of multi select box */
    var $carousel = $('#myCarousel'); // Carousel selector
    
    // Initialize carousel
    $carousel.carousel({
      interval: false // Prevent automatic sliding
    });
  
    // Function to update the state of arrows
    function updateArrowState() {
      var $prevArrow = $('.carousel-control-prev');
      var $nextArrow = $('.carousel-control-next');
      var $activeItem = $carousel.find('.carousel-item.active');
      var $firstItem = $carousel.find('.carousel-item').first();
      var $lastItem = $carousel.find('.carousel-item').last();
      var totalItems = $carousel.find('.carousel-item').length;
      var currentIndex = $carousel.find('.carousel-item.active').index();

      $prevArrow.removeClass('disabled');
      $nextArrow.removeClass('disabled');
  
      if (currentIndex === 0) {
          $prevArrow.addClass('disabled'); // Add 'disabled' class to the previous arrow
      }
  
      if (currentIndex === totalItems - 1) {
          $nextArrow.addClass('disabled'); // Add 'disabled' class to the next arrow
      }
  
  
      // Disable left arrow if at the first item
      if ($activeItem.is($firstItem)) {
        $prevArrow.css({
          'pointer-events': 'none',
          'cursor': 'not-allowed',
          'background-color': 'gray'
        });
      } else {
        $prevArrow.css({
          'pointer-events': 'auto',
          'cursor': 'pointer',
          'background-color': '#98b6e2'
        });
      }
  
      // Disable right arrow if at the last item
      if ($activeItem.is($lastItem)) {
        $nextArrow.css({
          'pointer-events': 'none',
          'background-color': 'gray',
          'opacity': '0.5',
          'cursor': 'default'  // Change cursor to default when disabled
        });
      } else {
        $nextArrow.css({
          'pointer-events': 'auto',
          'background-color': '#98b6e2'
        });
      }
    }
  
    // Update arrows on slide change
    $carousel.on('slid.bs.carousel', function () {
      updateArrowState();
    });
  
    // Initial check on page load
    updateArrowState();

  /* end of slider arrows functionality */

  function validateContactNumber(number) {
    const regex = /^\d{10}$/; // Regular expression to match exactly 10 digits
    return regex.test(number);  // Returns true if valid, false otherwise
  }

  function validateZipCode(zip) {
    const regex = /^\d{5}$/; // Matches 5 digits
    return regex.test(zip); // Returns true if valid, false otherwise
}



    // Business Details Form
    $('#businessDetailsForm').on('submit', function(e) {
        e.preventDefault();

        let vendorHighlightedConcern = getSelectedOptions();
  
        let formData = new FormData(this);

        // Convert FormData to a plain object
        let formDataObj = {};
        formData.forEach((value, key) => {
          formDataObj[key] = value;
        });

        // Append 'vendorHeighlightedConcern' to the plain object
        formDataObj['vendorHeighlightedConcern'] = vendorHighlightedConcern;

        // Send the AJAX request
        $.ajax({
            url: saveBusinessDetailsUrl,  // URL for form submission
            type: 'POST',
            data: JSON.stringify(formDataObj),  // Sending as JSON
            contentType: 'application/json; charset=utf-8',  // Specify the content type
            dataType: 'json',  // Expect JSON response from server
            success: function(response) { 
                if (response.status === 'error') {
                    // Display validation errors
                    $.each(response.errors, function(field, error) {
                        $('#' + field).after('<span class="error" style="color:red;">' + error + '</span>');
                    });
                } else if (response.status === 'success') {
                    // Handle successful submission (if needed)
                    var successToast = new bootstrap.Toast($('#businessSuccessToast'));
                    successToast.show();
                    setTimeout(() => {
                      document.getElementById('businessDetailsForm').reset();
                    }, 500);
                }
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
            }

        });
    });


    //Contact Information form
    $('#contactInfoForm').on('submit',function(e) {
        e.preventDefault();

        const contactNumber = $('#contactNumber').val();
        const alternateNumber = $('#alternateNumber').val();
        const inventoryContactNo = $('#inventoryContactNo').val();
        const zipcode = $('#contactZipcode').val();

        // Validate main contact number
        if (!validateContactNumber(contactNumber)) {
            $('#contactErrMsg').text('Please enter a valid 10-digit contact number.');
            $('#contactNumber').focus();
            return;
        }

        // Validate alternate number if provided
        if (alternateNumber && !validateContactNumber(alternateNumber)) {
            $('#contactErrMsg').text('Please enter a valid 10-digit alternate number.');
            $('#alternateNumber').focus();
            return;
        }

        // Validate inventory contact number if provided
        if (inventoryContactNo && !validateContactNumber(inventoryContactNo)) {
            $('#contactErrMsg').text('Please enter a valid 10-digit inventory contact number.');
            $('#inventoryContactNo').focus();
            return;
        }

        // Validate ZIP code if provided
        if (zipcode && !validateZipCode(zipcode)) {
            $('#contactErrMsg').text('Please enter a valid 5 digits ZIP code.');
            $('#contactZipcode').focus();
            return;
        }

        $('#contactErrMsg').text('');

       let formData = $(this).serialize();

        
        // Send data using AJAX
    $.ajax({
      url: saveContactInfoUrl,
      type: 'POST',
      data: formData,
      success: function(response) {
          if (response.status === 'error') {
              // Display validation errors
              $.each(response.errors, function(field, error) {
                  $('#' + field).after('<span class="error" style="color:red;">' + error + '</span>');
              });
          } else if (response.status === 'success') {
              // Handle successful submission (if needed)
              var successToast = new bootstrap.Toast($('#contactSuccessToast'));
              successToast.show();

              setTimeout(() => {
                document.getElementById('contactInfoForm').reset();
              }, 500);
    
          }
      },
      error: function(xhr, status, error) {
          console.log(xhr.responseText);
      }

  });


    });


// shipping information form
    $('#shippingInfoForm').on('submit', function(e) {
        e.preventDefault();

        var formData = $(this).serialize();

        $.ajax({
            url: saveShippingInfoUrl,
            type: 'POST',
            data: formData,
            success: function(response) {
                if (response.status === 'error') {
                    // Display validation errors
                    $.each(response.errors, function(field, error) {
                        $('#' + field).after('<span class="error" style="color:red;">' + error + '</span>');
                    });
                } else if (response.status === 'success') {
                    // Handle successful submission (if needed)
                    var successToast = new bootstrap.Toast($('#shippingSuccessToast'));
                    successToast.show();
                    setTimeout(() => {
                      document.getElementById('shippingInfoForm').reset();
                    }, 500);
                }
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
            }

        });
    });

    
  //Vendor Finanace Details Form
  $('#vendorFinanceForm').submit(function(e) {
    e.preventDefault(); 

    var formData = $(this).serialize();

    $.ajax({
      url: saveVendorFinanceUrl,
      type: 'POST',
      data: formData,
      success: function(response) {
          if (response.status === 'error') {
              // Display validation errors
              $.each(response.errors, function(field, error) {
                  $('#' + field).after('<span class="error" style="color:red;">' + error + '</span>');
              });
          } else if (response.status === 'success') {
              // Handle successful submission (if needed)
              var successToast = new bootstrap.Toast($('#financeSuccessToast'));
              successToast.show();
              setTimeout(() => {
                document.getElementById('vendorFinanceForm').reset();
              }, 500);
          }
      },
      error: function(xhr, status, error) {
          console.log(xhr.responseText);
      }

  });

  });

    
  //Finance/Payment Information Form
  $('#financePaymentInfo').submit(function(e) {
    e.preventDefault(); 

    const alternateNumber = $("#contactNumber").val();

    // Validate alternate number if provided
    if (alternateNumber && !validateContactNumber(alternateNumber)) {
      $('#financeErrMsg').text('Please enter a valid 10-digit alternate number.');
      $('#alternateNumber').focus();
      return;
    }

    $('#financeErrMsg').text('');

    var formData = $(this).serialize();
    
    $.ajax({
      url: saveFinancePayInfoUrl,
      type: 'POST',
      data: formData,
      success: function(response) {
          if (response.status === 'error') {
              // Display validation errors
              $.each(response.errors, function(field, error) {
                  $('#' + field).after('<span class="error" style="color:red;">' + error + '</span>');
              });
          } else if (response.status === 'success') {
              // Handle successful submission (if needed)
              var successToast = new bootstrap.Toast($('#paymentSuccessToast'));
              successToast.show();
              
              setTimeout(() => {
                document.getElementById('financePaymentInfo').reset();
              }, 500);
          }
      },
      error: function(xhr, status, error) {
          console.log(xhr.responseText);
      }

  });

  });

  
    
  //Vendor Setting Details Form
  $('#vendorSettingForm').submit(function(e) {
    e.preventDefault(); 

    // Capture form data
    var formData = $(this).serialize();

    // Send data using AJAX
    $.ajax({
      url: saveVendorSettingUrl,
      type: 'POST',
      data: formData,
      success: function(response) {
          if (response.status === 'error') {
              // Display validation errors
              $.each(response.errors, function(field, error) {
                  $('#' + field).after('<span class="error" style="color:red;">' + error + '</span>');
              });
          } else if (response.status === 'success') {
              // Handle successful submission (if needed)
              var successToast = new bootstrap.Toast($('#vendorSuccessToast'));
              successToast.show();
              setTimeout(() => {
                document.getElementById('vendorSettingForm').reset();
              }, 500);
          }
      },
      error: function(xhr, status, error) {
          console.log(xhr.responseText);
      }

  });

  });


  // Company RMA Information form
  $('#companyRmaInfoForm').submit(function(e) {
    e.preventDefault(); 

    const contactNumberInput = document.getElementById('rmaContactNumber');
    const contactNumber = contactNumberInput.value;
    const zipcode = $('#rmaZipcode').val();

    if (!validateContactNumber(contactNumber)) {
        document.getElementById('rma-error-message').textContent = 'Please enter a valid contact number.';
        contactNumberInput.focus();
        return false;
    }
    
    // Validate ZIP code if provided
    if (zipcode && !validateZipCode(zipcode)) {
      $('#rma-error-message').text('Please enter a valid 5 digits ZIP code.');
      $('#contactZipcode').focus();
      return false;
    }

    $('#rma-error-message').text('');


    var formData = $(this).serialize();

    console.log("url = ", saveCompanyRmaInfoUrl);
    console.log("formData = ", formData);

    // Send data using AJAX
    $.ajax({
      url: saveCompanyRmaInfoUrl,
      type: 'POST',
      data: formData,
      contentType: false,
      processData: false,
      success: function(response) {
          if (response.status === 'error') {
              // Display validation errors
              $.each(response.errors, function(field, error) {
                  $('#' + field).after('<span class="error" style="color:red;">' + error + '</span>');
              });
          } else if (response.status === 'success') {
              // Handle successful submission (if needed)
              var successToast = new bootstrap.Toast($('#rmaSuccessToast'));
              successToast.show();

              setTimeout(() => {
                document.getElementById('companyRmaInfoForm').reset();
              }, 500);
          }
      },
      error: function(xhr, status, error) {
          console.log(xhr.responseText);
      }

  });

  });


  // Inventory Update Information form
  $('#inventoryUpdateForm').submit(function(e) {
    e.preventDefault(); 

    const contactNumberInput = document.getElementById('contactNumber');
    const contactNumber = contactNumberInput.value;

    // Validate contact number
    if (!validateContactNumber(contactNumber)) {
        document.getElementById('inventoryErrMsg').textContent = 'Please enter a valid contact number.';
        contactNumberInput.focus();
        return false;
    } else {
        document.getElementById('inventoryErrMsg').textContent = '';
    }

    // Capture form data
    var formData = $(this).serialize();

    // Send data using AJAX
    $.ajax({
      url: saveInventoryUpdateUrl,
      type: 'POST',
      data: formData,
      success: function(response) {
          if (response.status === 'error') {
              // Display validation errors
              $.each(response.errors, function(field, error) {
                  $('#' + field).after('<span class="error" style="color:red;">' + error + '</span>');
              });
          } else if (response.status === 'success') {
              var successToast = new bootstrap.Toast($('#inventorySuccessToast'));
              successToast.show();

              setTimeout(() => {
                document.getElementById('inventoryUpdateForm').reset();
              }, 500);
    
          }
      },
      error: function(xhr, status, error) {
          console.log(xhr.responseText);
      }

  });

  });

  /* Initialize DataTables */

  var table = $('#vendorTable').DataTable({
    // AJAX call to fetch data from the server (you'll need to set this up)
    "ajax": {
        "url": "/path/to/server-side/data",
        "dataSrc": ""
    },
    "columns": [
        { "data": "businessUnit" },
        { "data": "type" },
        { "data": "companyName" },
        { "data": "orderProcessingEmail" },
        { "data": "website" },
        { "data": "category" },
        { "data": "assignSku" },
        { "data": "vendorManager" }
    ]
});

// Search Button functionality
$('#searchBtn').on('click', function() {
    var company = $('#company').val();
    var contact = $('#contact').val();
    var category = $('#category').val();
    var vendorManager = $('#vendorManager').val();
    var email = $('#email').val();
    var sku = $('#sku').val();
    var website = $('#website').val();
    var businessUnit = $('#businessUnit').val();

    // Implement search/filter logic using these variables
    table.column(2).search(company).draw(); // Search by company/brand name
    // Add more filters based on your columns
});






});
