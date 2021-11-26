$(function () {
  $("modalTambah").on("click", function () {
    $("#formModalLabel").html("Tambah Data Mahasiswa");
    $(".modal-footer button[type=submit]").html("Tambah Data");
    $(".modal-body form").reset();
  });

  $(".modalUbah").on("click", function () {
    $("#formModalLabel").html("Ubah Data Mahasiswa");
    $(".modal-footer button[type=submit]").html("Ubah Data");
    $(".modal-body form").attr(
      "action",
      "http://localhost/phpmvc/public/mahasiswa/ubahDataMahasiswa"
    );
    const id = $(this).data("id");
    $.ajax({
      url: "http://localhost/phpmvc/public/mahasiswa/getUbah",
      data: { id: id },
      method: "post",
      dataType: "json",
      success: function (data) {
        $("#nama").val(data.nama);
        $("#npm").val(data.npm);
        $("#jurusan").val(data.jurusan);
        $("#alamat").val(data.alamat);
        $("#id").val(data.id);
      },
    });
  });

  //   Live Search
  $("#keyword").on("keyup", function () {
    //   $.ajax()
    let keyword = $("#keyword").val();

    $.ajax({
      url: "http://localhost/phpmvc/public/mahasiswa/livesearch",
      data: { keyword: keyword },
      method: "post",
      success: function (data) {
        // console.log(data);
        $("#table").html(data);
      },
    });
  });
});
