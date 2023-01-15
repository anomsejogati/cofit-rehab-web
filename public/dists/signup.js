function changePicture() {
    $('#picture').click();
}

function previewPicture(event) {
    var reader = new FileReader();
    var imageField = document.getElementById('preview_picture');
    reader.onload = function () {
        if (reader.readyState == 2) {
            imageField.src = reader.result;
        }
    }
    reader.readAsDataURL(event.target.files[0]);
}


createAccount = () => {

    $('.indicator-label').hide();
    $('.indicator-progress').show();
    $('.spinner-border').show();

    $.ajax({
        type: 'POST',
        url: site_url + 'Api/Users/createAccount',
        headers: { 'X-Requested-With': 'XMLHttpRequest' },
        data: new FormData($('#kt_sign_up_form')[0]),
        processData: false,
        contentType: false,
        cache: false,
        async: false,
        dataType: 'JSON',
        success: function (response) {

            if (response.status == true) {

                window.location.replace('/sign-up-success');

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


$(document).ready(function () {


    // $("#picture").change(function () {

    //     var validExtensions = ["jpg", "jpeg", "png"]
    //     var file = $(this).val().split('.').pop();
    //     if (validExtensions.indexOf(file) == -1) {
    //         swal('', 'Format foto yang didukung adalah jpg/jpeg/png', 'warning');
    //     } else {
    //         $('.picture-title').addClass('d-none');
    //         $('#preview_picture').removeClass('d-none');
    //     }

    // });


    $('#kt_sign_up_form').submit(function () {
        return false;
    })


    $('#kt_sign_up_submit').click(function () {

        var email_regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;

        var email = $('#email').val();

        if ($('#username').val() == '') {

            Swal.fire({
                text: "Mohon isi nama Anda..",
                icon: "error",
                buttonsStyling: !1,
                confirmButtonText: "OK",
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            })

        } else if (email == '') {

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

        } else if ($('#phone_no').val() == '') {

            Swal.fire({
                text: "Mohon isi No. HP..",
                icon: "error",
                buttonsStyling: !1,
                confirmButtonText: "OK",
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            })

        } else if ($('#password').val() == '') {

            Swal.fire({
                text: "Mohon isi kata sandi..",
                icon: "error",
                buttonsStyling: !1,
                confirmButtonText: "OK",
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            })

        } else if ($('#password').val().length < 6) {

            Swal.fire({
                text: "Gunakan minimal 6 karakter untuk kata sandi..",
                icon: "error",
                buttonsStyling: !1,
                confirmButtonText: "OK",
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            })

        } else if ($('#confirm_password').val() == '') {

            Swal.fire({
                text: "Mohon isi konfirmasi kata sandi..",
                icon: "error",
                buttonsStyling: !1,
                confirmButtonText: "OK",
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            })

        } else if ($('#confirm_password').val() != $('#password').val()) {

            Swal.fire({
                text: "Konfirmasi kata sandi tidak sesuai..",
                icon: "error",
                buttonsStyling: !1,
                confirmButtonText: "OK",
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            })

        } else {

            createAccount();

        }

    })



});

