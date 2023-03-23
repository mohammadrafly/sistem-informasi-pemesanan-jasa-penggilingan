$(document).ready(function() {
    $("#NewPassword").submit(function(e) {
      e.preventDefault();
      const password = $('#password').val();
      const passwordConfirmation = $('#password_confirmation').val();
      const email = $('#email').val();
      const token = $('#token').val();
  
      if (password !== passwordConfirmation) {
        Swal.fire({
          icon: 'error',
          title: 'Peringatan!',
          text: 'Password tidak sama.'
        });
      } else {
        $.ajax({
          url: `${base_url}reset-password/v1/${email}/${token}`,
          type: 'POST',
          data: {
            password,
          },
          dataType: 'JSON'
        })
          .done((respond) => {
            if (respond.status === true) {
              Swal.fire({
                icon: respond.icon,
                title: respond.title,
                text: respond.text,
                timer: 3000,
                showCancelButton: false,
                showConfirmButton: false,
                allowOutsideClick: false,
              }).then(() => {
                window.location.href = `${base_url}login`;
              });
            } else if (respond.status === false) {
              Swal.fire({
                icon: respond.icon,
                title: respond.title,
                text: respond.text
              });
            }
          })
          .fail((jqXHR, textStatus, errorThrown) => {
            Swal.fire({
              icon: 'error',
              title: `Error ${errorThrown}`,
              text: 'Silahkan hubungi admin.'
            });
          });
      }
    });
  });
  