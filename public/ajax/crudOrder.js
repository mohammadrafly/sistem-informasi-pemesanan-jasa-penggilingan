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

      const statusValue = respond.data[0].status;
      const statusSelect = $('#status');
      statusSelect.empty();

      const defaultOption = $('<option>').text('Pilih Status').attr('selected', 'selected');
      statusSelect.append(defaultOption);

      if (statusValue === 'menunggu_konfirmasi') {
        const dalamProgresOption = $('<option>').val('dalam_progres').text('Konfirmasi Order');
        const menungguKonfirmasi = $('<option>').val('menunggu_konfirmasi').text('Menunggu Konfirmasi');
        menungguKonfirmasi.attr('selected', 'selected');
        statusSelect.append(menungguKonfirmasi, dalamProgresOption);
      } else if (statusValue === 'dalam_progres') {
        const selesaiOption = $('<option>').val('selesai').text('Selesai');
        const dalamProgresOption = $('<option>').val('dalam_progres').text('Dalam Progres');
        dalamProgresOption.attr('selected', 'selected');
        statusSelect.append(dalamProgresOption, selesaiOption);
      }

      $('#addOrderModal').modal('show');
      $('.modal-title').text('Edit Orders');
      $('#select').remove();
      $('#status_order').removeAttr('hidden');
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
    const url = id ? base_url + 'dashboard/orders/update/' + id : base_url + 'dashboard/orders';
    
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


function deleteOrder(id) {
    const confirmationDialog = Swal.fire({
      title: 'Anda yakin?',
      text: "Aksi ini tidak dapat dipulihkan!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, Hapus!'
    });
  
    confirmationDialog.then((result) => {
      if (result.value) {
        $.ajax({
          url: `${base_url}dashboard/orders/delete/${id}`,
          type: 'GET',
          dataType: 'JSON',
          success: () => {
            Swal.fire({
              position: 'top-end',
              icon: 'success',
              title: 'Orders berhasil dihapus!',
              showConfirmButton: false,
              timer: 2000
            }).then(() => location.reload());
          },
          error: (error) => {
            Swal.fire({
              icon: error.icon,
              title: error.title,
              text: error.text,
            });
          }
        });
      }
    });
  }
  ``
  

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

$(function () {
    fetch(base_url + 'dashboard/orders/get/users')
      .then(response => response.json())
      .then(data => {
        if (!Array.isArray(data)) {
          console.error('Data is not an array!');
          return;
        }
        
        const selectizeOptions = {
          plugins: ["restore_on_backspace", "clear_button"],
          delimiter: " - ",
          persist: false,
          maxItems: null,
          valueField: "id",
          labelField: "name",
          searchField: ["id", "name"],
          options: data.map(item => ({ id: item.id, name: item.name }))
        };
        
        $("#id_user").selectize(selectizeOptions);
      })
      .catch(error => console.error(error))
});