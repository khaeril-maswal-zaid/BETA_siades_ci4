$(function () {
  //Model Aduan
  $(".modelAduan").on("click", function () {
    const idTanggapan = $(this).data("id");
    $.ajax({
      url: "/layanan-pengaduan/getTunggal",
      data: { id: idTanggapan },
      method: "post",
      dataType: "json",
      success: function (data) {
        $("#nama").text(data.name);
        $("#subjectm").text(data.subject);
        $("#status").text(data.status);
        $("#aduan").text(data.aduan);

        if (data.status == "Sedang diproses") {
          $("#status").removeClass("bg-secondary");
          $("#status").removeClass("bg-success");

          $("#status").addClass("bg-warning");
        } else if (data.status == "Selesai diproses") {
          $("#status").removeClass("bg-secondary");
          $("#status").removeClass("bg-warning");

          $("#status").addClass("bg-success");
        } else if (data.status == "Belum diproses") {
          $("#status").removeClass("bg-warning");
          $("#status").removeClass("bg-success");

          $("#status").addClass("bg-secondary");
        }

        if (data.file == "") {
          $("#lampiran").hide();
        } else {
          $("#lampiran img").attr("src", "/img/aduan/" + data.file);
          $("#lampiran").show();
        }
      },
    });
  });
});
