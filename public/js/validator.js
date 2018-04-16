$(document).ready(function() {
    // Wait for the DOM to be ready
    $.validator.addMethod("passwordCheck",
        function(value, element, param) {
            if (this.optional(element)) {
                return true;
            } else if (!/[A-Z]/.test(value)) {
                return false;
            } else if (!/[a-z]/.test(value)) {
                return false;
            } else if (!/[0-9]/.test(value)) {
                return false;
            }

            return true;
        },
        "Le mot de passe doit contenir au moins 1 chiffre et 1 majuscule");

    $(function() {
        // Initialize form validation on the registration form.
        // It has the name attribute "registration"
        $("form[name='registration']").validate({
            // Specify validation rules
            rules: {
                // The key name on the left side is the name attribute
                // of an input field. Validation rules are defined
                // on the right side
                name: "required",
                surname: "required",
                email: {
                    required: true,
                    // Specify that email should be validated
                    // by the built-in "email" rule
                    email: true
                },
                password: {
                    required: true,
                    minlength: 8
                },
                passwordconfirm: {
                    equalTo: "#password"
                }
            },
            // Specify validation error messages
            messages: {
                name: "Vous devez indiquer votre prénom",
                surname: "Vous devez indiquer votre nom",
                passwordconfirm : "Les mots de passe ne correspondent pas",
                password: {
                    required: "Le mot de passe est necessaire",
                    minlength: "Votre mot de passe doit faire 8 caractères "
                },
                email: "Veuillez entrer un email valide"
            },
            // Make sure the form is submitted to the destination defined
            // in the "action" attribute of the form when valid
            submitHandler: function(form) {
                form.submit();
            }
        });
    });

});