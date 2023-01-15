function login(user_id, password) {

    $('.indicator-label').hide();
    $('.indicator-progress').show();
    $('.spinner-border').show();

    $.ajax({
        type: 'POST',
        url: site_url + 'Api/Users/auth',
        headers: { 'X-Requested-With': 'XMLHttpRequest' },
        data: {
            user_id: user_id,
            password: password
        },
        dataType: 'JSON',
        success: function (response) {

            if (response.status == true) {

                window.location.replace('/dashboard');

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
    })

}


$(document).ready(function () {


    // $('#kt_sign_in_form').submit(function () {
    //     return false;
    // })


    $('#kt_sign_in_submit').click(function () {


        var user_id = $('#user_id').val();

        var password = $('#password').val();

        if (user_id == '') {

            Swal.fire({
                text: "Email atau No. HP belum diisi..",
                icon: "error",
                buttonsStyling: !1,
                confirmButtonText: "OK",
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            })

        } else if (password == '') {

            Swal.fire({
                text: "Kata sandi belum diisi..",
                icon: "error",
                buttonsStyling: !1,
                confirmButtonText: "OK",
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            })

        } else {

            // login(user_id, password);
            $('#kt_sign_in_form').submit();

        }

    })



});
