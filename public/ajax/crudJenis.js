function editJenis(id) {
    save_method = 'update';
    $('#form')[0].reset(); 
    $.ajax({
        url : base_url + 'dashboard/jenis/update/' + id,
        type: "GET",
        dataType: "JSON",
        success: function(respond)
        {
            $('[name="id"]').val(respond.data.id);
            $('[name="nama_tanaman"]').val(respond.data.nama_tanaman);
            $('#modal').modal('show');
            $('.modal-title').text('Edit Jenis'); 
        },
        error: function (respond, jqXHR, textStatus, errorThrown)
        {
            Swal.fire({
                icon: respond.icon,
                title: respond.title,
                text: respond.text,
            });
        }
    });
}

function saveJenis() {
    var url;
    var id = $("#id").val();
    if(!id) {
        url = base_url + 'dashboard/jenis';
    } else {
        url = base_url + 'dashboard/jenis/update/' + id;
    }

    $.ajax({
        url : url,
        type: 'POST',
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(respond){
            Swal.fire({
                icon: respond.icon,
                title: respond.title,
                text: respond.text,
                timer: 3000,
                showCancelButton: false,
                showConfirmButton: false
            }).then (function() {
                location.reload();
            });
        },
        error: function (respond, jqXHR, textStatus, errorThrown) {
            Swal.fire({
                icon: respond.icon,
                title: respond.title,
                text: respond.text,
            });
        }
    });
}

function deleteJenis(id) {
    Swal.fire({
        title: 'Anda yakin?',
        text: "Aksi ini tidak dapat dipulihkan!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus!'
    }).then(function (result) {
        if (result.value) {
            $.ajax({
                url: base_url + 'dashboard/jenis/delete/' + id,
                type: "GET",
                dataType: 'JSON',
                success: function (data) {
                    swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Jenis berhasil dihapus!',
                        showConfirmButton: false,
                        timer: 2000
                    }).then (function() {
                        location.reload();
                    });
                },
                error: function (respond, xhr, ajaxOptions, thrownError) {
                    Swal.fire({
                        icon: respond.icon,
                        title: respond.title,
                        text: respond.text,
                    });
                }
            });
        };
    });
}

var modal = document.getElementById("modal");
var closeBtn = document.getElementsByClassName("close")[0];

closeBtn.onclick = function() {
  modal.style.display = "none";
  location.reload();
}

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
    location.reload();
  }
}