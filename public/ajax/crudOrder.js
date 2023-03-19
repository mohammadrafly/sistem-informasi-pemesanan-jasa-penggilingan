function editOrder(id) {
    save_method = 'update';
    $('#form')[0].reset(); 
    $.ajax({
        url : base_url + 'dashboard/orders/update/' + id,
        type: "GET",
        dataType: "JSON",
        success: function(respond)
        {
            changeOnUpdate();
            $('[name="id"]').val(respond.data.id);
            $('[name="name"]').val(respond.data.name);
            $('[name="tanggal_db"]').val(respond.data.tanggal_db);
            $('[name="alamat_db"]').val(respond.data.alamat_db);
            $('[name="nomor_user"]').val(respond.data.nomor_user);
            $('[name="luas_sawah"]').val(respond.data.luas_sawah);
            $('[name="jenis_tanaman"]').val(respond.data.jenis_tanaman);
            $('[name="admin"]').val(respond.data.admin);
            $('[name="status"]').val(respond.data.status);
            $('#modal').modal('show');
            $('.modal-title').text('Edit Orders'); 
        },
        error: function (respond)
        {
            Swal.fire({
                icon: respond.icon,
                title: respond.title,
                text: respond.text,
            });
        }
    });
}

function saveOrder() {
    var url;
    var id = $("#id").val();
    if(!id) {
        url = base_url + 'dashboard/orders';
    } else {
        url = base_url + 'dashboard/orders/update/' + id;
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
        error: function (respond) {
            if (respond.status == false) {
                Swal.fire({
                    icon: respond.icon,
                    title: respond.title,
                    text: respond.text,
                });
            }
        }
    });
}

function deleteOrder(id) {
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
                url: base_url + 'dashboard/orders/delete/' + id,
                type: "GET",
                dataType: 'JSON',
                success: function (data) {
                    swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Orders berhasil dihapus!',
                        showConfirmButton: false,
                        timer: 2000
                    }).then (function() {
                        location.reload();
                    });
                },
                error: function (respond) {
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

$(function () {
    fetch(base_url + 'dashboard/orders/get/users')
        .then(response => response.json())
        .then(data => {
            if (Array.isArray(data)) {
                data.forEach(item => {
                    $("#id_user").selectize({
                        plugins: ["restore_on_backspace", "clear_button"],
                        delimiter: " - ",
                        persist: false,
                        maxItems: null,
                        valueField: "id",
                        labelField: "name",
                        searchField: ["id", "name"],
                        options: [
                            { id: item.id, name: item.name },
                        ],
                    });
                });
            } else {
                console.error('Data is not an array!');
            }
        })
        .catch(error => console.error(error))
});

function changeOnUpdate() {
    var tanggal_db = document.getElementById("tanggal_db");
    var alamat_db = document.getElementById("alamat_db");
    var id_user = document.getElementById("id_user");
    var nomor_user = document.getElementById("nomor_user");
    var luas_sawah = document.getElementById("luas_sawah");
    var jenis_tanaman = document.getElementById("jenis_tanaman");
    var admin = document.getElementById("admin");
    var select = document.getElementById("select");

    tanggal_db.setAttribute("disabled", true);
    alamat_db.setAttribute("disabled", true);
    id_user.setAttribute("disabled", true);
    nomor_user.setAttribute("disabled", true);
    luas_sawah.setAttribute("disabled", true);
    jenis_tanaman.setAttribute("disabled", true);
    admin.setAttribute("disabled", true);

    select.style.display = "none";

    alamat_db.setAttribute("required", false);
    tanggal_db.setAttribute("required", false);
    id_user.setAttribute("required", false);
    nomor_user.setAttribute("required", false);
    luas_sawah.setAttribute("required", false);
    jenis_tanaman.setAttribute("required", false);
    admin.setAttribute("required", false);

    tanggal_db.setAttribute("type", "text");
    tanggal_db.setAttribute("data-language", false);
    tanggal_db.style.display= "form control";
}