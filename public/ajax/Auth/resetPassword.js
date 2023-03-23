$(document).ready(function() {
  const resetPasswordForm = $("#ResetPassword");

  resetPasswordForm.submit(function(e) {
      e.preventDefault();

      const emailInput = $('#email');
      const email = emailInput.val().trim();

      if (email.length == 0) {
          Swal.fire({
              icon: 'error',
              title: 'Peringatan!',
              text: 'Email tidak boleh kosong.'
          });

          return;
      }
      Swal.fire({
        title: 'Sending..',
        allowEscapeKey: false,
        allowOutsideClick: false,
        timer: 5000,
        onOpen: () => {
          swal.showLoading();
        }
      }).then(
        () => {},
        (dismiss) => {
          if (dismiss === 'timer') {
            console.log('closed by timer!!!!');
            swal({ 
              title: 'Finished!',
              type: 'success',
              timer: 2000,
              showConfirmButton: false
            })
          }
        }
      )
      $.ajax({
          url: `${base_url}reset-password`,
          type: 'POST',
          data: { email },
          dataType: 'json',
          success: function(respond) {
              const { status, icon, title, text } = respond;

              if (status == true) {
                  Swal.fire({
                      icon,
                      title,
                      text,
                      timer: 3000,
                      showCancelButton: false,
                      showConfirmButton: false,
                      allowOutsideClick: false,
                  })
                  .then(function() {
                      window.location.href = `${base_url}dashboard`;
                  });
              } else {
                  Swal.fire({ icon, title, text });
              }
          },
          error: function(jqXHR, textStatus, errorThrown) {
              Swal.fire({
                  icon: 'error',
                  title: `Error ${errorThrown}`,
                  text: 'Silahkan hubungi admin.'
              });
          }
      });
  });
});
