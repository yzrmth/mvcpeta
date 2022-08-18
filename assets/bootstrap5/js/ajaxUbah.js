$(function () {
  $(".UpdatePeta").on("click", function () {
    const id_peta = $(this).data("id");

    $.ajax({
      url: "http://localhost/mvcpeta/Peta/getUbah",
      data: { id_peta: id_peta },
      method: "post",
      dataType: "json",
      success: function (data) {
        $("#Nama_Proyek_Kegiatan").val(data.Nama_Proyek_Kegiatan);
        $("#Nomor").val(data.Nomor);
        $("#Tahun").val(data.Tahun);
        $("#Kecamatan").val(data.Kecamatan);
        $("#Desa").val(data.Desa);
        $("#Kondisi_Fisik_Peta").val(data.Kondisi_Fisik_Peta);
        $("#file_gambar").val(data.file_gambar);
      },
    });
  });
});
