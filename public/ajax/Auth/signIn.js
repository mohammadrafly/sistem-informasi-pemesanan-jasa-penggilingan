$(document).ready(function() {
    $("#SignIn").submit( function (e) {
        e.preventDefault();
        var username = $('input[name="username"]').val()
        var password = $('input[name="password"]').val()
        var csrf = $('#csrf').val()
        console.log(password);
        if (username.length == "") {
            Swal.fire({
                icon: 'error',
                title: 'Peringatan!',
                text: 'Username tidak boleh kosong.'
            });
        } else if(password.length == "") {
            Swal.fire({
                icon: 'error',
                title: 'Peringatan!',
                text: 'Password tidak boleh kosong.'
            });
        } else {
            $.ajax({
                url : base_url + 'login',
                type: "POST",
                data: {
                    "username": username,
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