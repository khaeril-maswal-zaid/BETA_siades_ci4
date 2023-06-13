$(function () {
  //Model Aduan
  $(".modelAduan").on("click", function () {
    const idTanggapan = $(this).data("id");
    $.ajax({
      url: "http://localhost:8080/layanan-pengaduan/getTunggal",
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

  //HANYA SEMENTARA..................................
  //Api Data
  $.ajax({
    url: "https://idm.kemendesa.go.id/open/api/desa/rumusan/730207003/2022",
    success: function (data) {
      console.log(data);
    },
  });

  $.ajax({
    url: "https://sid.kemendesa.go.id/sdgs/searching/score-sdgs",
    type: "GET",
    dataType: "JSON",
    data: {
      location_code: "pakubalaho",
    },

    success: function (response) {
      console.log(response);
    },
  });
});
