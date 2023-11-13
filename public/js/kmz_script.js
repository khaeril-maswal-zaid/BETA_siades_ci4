$(function () {
  //Model Aduan
  $(".modelAduan").on("click", function () {
    const idTanggapan = $(this).data("id");

    //ALAMAT RESPON
    $("#formrespon").attr("action", "/adm-proses/aduan-respon/" + idTanggapan);

    $.ajax({
      url: "/layanan-pengaduan/getTunggal",
      data: { id: idTanggapan },
      method: "post",
      dataType: "json",
      success: function (data) {
        $("#nama").text(data.name);
        $("#subjectm").text("Subjek: " + data.subject);
        $("#status").text(data.status);
        $("#aduan").text(data.aduan);
        $("#emailtanggapan").html(data.email);

        if (data.status == "Sedang diproses") {
          $("#status").removeClass("bg-dark");
          $("#status").removeClass("bg-success");

          $("#status").addClass("bg-info");
        } else if (data.status == "Selesai diproses") {
          $("#status").removeClass("bg-dark");
          $("#status").removeClass("bg-info");

          $("#status").addClass("bg-success");
        } else if (data.status == "Belum diproses") {
          $("#status").removeClass("bg-info");
          $("#status").removeClass("bg-success");

          $("#status").addClass("bg-dark");
        }

        if (data.file == "") {
          $("#lampiran").hide();
        } else {
          $("#lampiran img").attr("src", "/img/aduan/" + data.file);
          $("#lampiran").show();
        }

        //Tampilkan hasil respon admin
        $("#noaduan").html(data.nomoraduan);
        $("#respon").html(data.respon);
      },
    });
  });
});
