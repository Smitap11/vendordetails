$(document).ready(function() {
    $('#contactInfoForm').on('submit', function(e) {
        e.preventDefault(); // Prevent the default form submission

        var formData = new FormData(this); // Create a FormData object from the form

        // Add the CSRF token to the FormData object
        formData.append(csrfName, csrfHash);

        for (var pair of formData.entries()) {
            console.log(pair[0] + ': ' + pair[1]);
        }
        

        $.ajax({
            type: "POST",
            url: saveFormDataUrl, // Make sure the URL is correct
            data: formData,
            processData: false, // Required for FormData
            contentType: false,  // Required for FormData
            success: function(response) {
                console.log('Form submitted successfully:', response);
            },
            error: function(xhr, status, error) {
                console.error('Error submitting form:', error);
            }
        });
    });
});
