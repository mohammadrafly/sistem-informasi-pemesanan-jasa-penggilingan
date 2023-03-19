function editOrder(id) {
    save_method = 'update';
    $('#form')[0].reset();
    $.ajax({
      url: `${base_url}dashboard/orders/update/${id}`,
      type: 'GET',
      dataType: 'JSON',
      success: function(respond) {
        $('#id').val(respond.data[0].id);
        $('#tanggal_db').val(respond.data[0].tanggal_db);
        $('#alamat_db').val(respond.data[0].alamat_db);
        $('#nomor_user').val(respond.data[0].nomor_user);
        $('#luas_sawah').val(respond.data[0].luas_sawah);
        $('#jenis_tanaman').val(respond.data[0].jenis_tanaman);
        $('#admin').val(respond.data[0].admin);
        $('#modal').modal('show');
        $('.modal-title').text('Edit Order');
        $('#select').remove();
      },
      error: function(respond) {
        const { icon, title, text } = respond;
        Swal.fire({
          icon,
          title,
          text,
        });
      }
    });
  }
  

  function saveOrder() {
    const id = $("#id").val();
    const username = $("#username").val();
    const url = id ? base_url + 'dashboard/orders/update/' + id : base_url + 'dashboard/client/' + username;
    
    $.post(url, $('#form').serialize())
        .done(respond => {
            Swal.fire({
                icon: respond.icon,
                title: respond.title,
                text: respond.text,
                timer: 3000,
                showCancelButton: false,
                showConfirmButton: false
            }).then(() => location.reload());
        })
        .fail(respond => {
            if (respond.status == false) {
                Swal.fire({
                    icon: respond.icon,
                    title: respond.title,
                    text: respond.text,
                });
            }
        });
} 

const modal = document.getElementById("modal");
const closeBtn = document.getElementsByClassName("close")[0];

function closeModal() {
  modal.style.display = "none";
  location.reload();
}

closeBtn.onclick = closeModal;

window.onclick = function(event) {
  if (event.target == modal) {
    closeModal();
  }
}