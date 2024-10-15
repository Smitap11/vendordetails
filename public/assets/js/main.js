$(document).ready(function() {

    const multiSelectInput = document.getElementById('multiSelectInput');
    const inputField = document.getElementById('vendor-heighlighted-concern');
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


    // Business Details Form

    
    $('#businessDetailsForm').on('submit', function(e) {
        e.preventDefault();

        console.log('inside ');


        // Serialize the form data
        var formData = $(this).serialize();

        console.log("saveBusinessDetailsUrl = ", saveBusinessDetailsUrl);

        // Send the AJAX request
        // $.ajax({
        //     url: saveBusinessDetailsUrl,  // URL for form submission
        //     type: 'POST',
        //     data: formData,
        //     success: function(response) {
        //         if (response.status === 'error') {
        //             // Display validation errors
        //             $.each(response.errors, function(field, error) {
        //                 $('#' + field).after('<span class="error" style="color:red;">' + error + '</span>');
        //             });
        //         } else if (response.status === 'success') {
        //             // Handle successful submission (if needed)
        //             var successToast = new bootstrap.Toast($('#successToast'));
        //             successToast.show();
        //         }
        //     },
        //     error: function(xhr, status, error) {
        //         console.log(xhr.responseText);
        //     }

        // });
    });




    //Contact Information form
    $('#contactInfoForm').on('submit',function(e) {
        e.preventDefault();

        console.log('form data = ',$(this).serialize());

        // AJAX call
        $.ajax({
            url: saveContactInfoUrl,
            type: "POST",
            data: $(this).serialize(),
            success: function(response) {
                console.log(response);
                // Optionally, show a success message to the user
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
            }
        });
    });


// shipping information form

    $('#shippingInfoForm').on('submit', function(e) {

        e.preventDefault();

        // Serialize the form data
        var formData = $(this).serialize();

        console.log("saveShippingInfoUrl = ", saveShippingInfoUrl);

        // Send the AJAX request
        $.ajax({
            url: saveShippingInfoUrl,  // URL for form submission
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
                    var successToast = new bootstrap.Toast($('#successToast'));
                    successToast.show();
                }
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
            }

        });
    });



});
