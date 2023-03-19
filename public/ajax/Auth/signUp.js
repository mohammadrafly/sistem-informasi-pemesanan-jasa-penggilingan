$(document).ready(function() {
    $("#SignUp").submit( function (e) {
        e.preventDefault();
        var username = $('#username').val()
        var password = $('#password').val()
        var email = $('#email').val()
        var name = $('#name').val()
        var password_confirmation = $('#password_confirmation').val()
        if (username.length == "") {
            Swal.fire({
                icon: 'error',
                title: 'Peringatan!',
                text: 'Username tidak boleh kosong.'
            });
        } else if(email.length == "") {
            Swal.fire({
                icon: 'error',
                title: 'Peringatan!',
                text: 'Email tidak boleh kosong.'
            });
        } else if(name.length == "") {
            Swal.fire({
                icon: 'error',
                title: 'Peringatan!',
                text: 'Nama tidak boleh kosong.'
            });
        } else if(password.length == "") {
            Swal.fire({
                icon: 'error',
                title: 'Peringatan!',
                text: 'Password tidak boleh kosong.'
            });
        } else if(password != password_confirmation) {
            Swal.fire({
                icon: 'error',
                title: 'Peringatan!',
                text: 'Password tidak sama.'
            });
        } else {
            $.ajax({
                url : base_url + 'register',
                type: "POST",
                data: {
                    "username": username,
                    "name": name,
                    "email": email,
                    "password": password,
                },
                dataType: "JSON",
                success: function(respond){
                    if (respond.status == true) {
                        Swal.fire({
                            icon: respond.icon,
                            title: respond.title,
                            text: respond.text,
                            timer: 3000,
                            showCancelButton: false,
                            showConfirmButton: false,
                            allowOutsideClick: false,
                        })
                        .then(
                            window.location.href = base_url + 'dashboard'
                        );
                    } else if (respond.status == false) {
                        Swal.fire({
                            icon: respond.icon,
                            title: respond.title,
                            text: respond.text
                        });
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    Swal.fire({
                        icon: 'error',
                        title: `Error ${errorThrown}`,
                        text: 'Silahkan hubungi admin.'
                    });
                }
            });
        }
    }); 
});