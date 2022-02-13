// Wait for the DOM to be ready
$(function() {
    // Initialize form validation on the registration form.
    // It has the name attribute "registration"
    $("form[name='formulaire']").validate({
    errorClass: "error fail-alert",
    validClass: "valid success-alert",
      // Specify validation rules
      rules: {     
        message: {
          required: true,
          maxlength: 300
        },
        titre: {
            required: true,
            maxlength: 60
        }
      },
      // Specify validation error messages
      messages: {
        message: {
          required: "veuillez laisser un message",
          minlength: "le message ne peut pas depasser 300 lettres"
        },
        titre: {
            required: "veuillez taper un titre",
            minlength: "le titre ne peut pas depasser 60 lettres"
          }
      },
      // Make sure the form is submitted to the destination defined
      // in the "action" attribute of the form when valid
      submitHandler: function(form) {
        form.submit();
      }
    });
  });