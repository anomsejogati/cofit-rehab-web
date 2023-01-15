function resetPassword() {

    $('.indicator-label').hide();
    $('.indicator-progress').show();
    $('.spinner-border').show();

    $.ajax({
        type: 'POST',
        url: site_url + 'Api/Users/resetPassword',
        headers: { 'X-Requested-With': 'XMLHttpRequest' },
        data: new FormData($('#kt_password_reset_form')[0]),
        processData: false,
        contentType: false,
        cache: false,
        async: false,
        dataType: 'JSON',
        success: function (response) {

            if (response.status == true) {

                window.location.replace('/reset-password-success');

            } else {

                Swal.fire({
                    text: response.message,
                    icon: "error",
                    buttonsStyling: !1,
                    confirmButtonText: "OK",
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                })

            }

            $('.indicator-label').show();
            $('.indicator-progress').hide();
            $('.spinner-border').hide();

        }
    });

}


$(document).on('click', '#kt_password_reset_submit', function () {

    var email_regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;

    var email = $('#email').val();

    if (email == '') {

        Swal.fire({
            text: "Mohon isi email Anda..",
            icon: "error",
            buttonsStyling: !1,
            confirmButtonText: "OK",
            customClass: {
                confirmButton: "btn btn-primary"
            }
        })

    } else if (!email_regex.test(email)) {

        Swal.fire({
            text: "Format penulisan email tidak sesuai..",
            icon: "error",
            buttonsStyling: !1,
            confirmButtonText: "OK",
            customClass: {
                confirmButton: "btn btn-primary"
            }
        })

    } else {

        resetPassword();

    }

})