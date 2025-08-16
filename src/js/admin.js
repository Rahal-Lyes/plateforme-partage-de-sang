
        /* SHOW PASSWORD HIDDEN */
        function hidePassword(e) {
            pass_field = document.getElementById("password");
            eye = e.target;
            if (pass_field.type == "password") {
                pass_field.type = "text";
                eye.innerHTML = "Hide";
            } else {
                pass_field.type = "password";
                eye.innerHTML = "Show";
            }
        }

       