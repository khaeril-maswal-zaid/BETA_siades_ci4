const baseUrl = window.location.protocol + "//" + window.location.host;
// console.log(baseUrl);

//Atur penulis artikel
$(document).on("change", "#olehselect", function () {
  if ($("#olehselect").val() === "") {
    $("#penuliscustom").removeAttr("disabled");
    $("#penuliscustom").attr("placeholder", "Isikan identitas penulis");
  } else {
    $("#penuliscustom").attr("disabled", "disabled");
    $("#penuliscustom").attr("placeholder", "Jika memilih penulis custom");
  }
});

//Post foto ajax
//..................................
var inputFile = document.getElementsByClassName("imgtarget");

// Tambahkan event listener CHANGER pada setiap input file foto
for (let i = 0; i < inputFile.length; i++) {
  inputFile[i].addEventListener("change", function (dataEvent) {
    var pilih = dataEvent.target;

    // Tangkap model yang sesuai jika lebih dari 1 model
    var pcpo = pilih.closest(".parent-control-post-foto");
    var pesanerror = pcpo.querySelector(".pesan-error");

    var name = pilih.files[0].name;
    var form_data = new FormData();
    var ext = name.split(".").pop().toLowerCase();

    var judulberita = pcpo.querySelector(".labelimgajax").value;

    if (judulberita === "") {
      pesanerror.classList.remove("d-none");
      pesanerror.innerHTML = "Isi judul terlebih dahulu";
      return false;
    }

    if (["png", "jpg", "jpeg"].indexOf(ext) === -1) {
      pesanerror.classList.remove("d-none");
      pesanerror.innerHTML = "Format gambar tidak sesuai";
      return false;
    }

    var oFReader = new FileReader();
    oFReader.readAsDataURL(pilih.files[0]);
    var f = pilih.files[0];
    var fsize = f.size || f.fileSize;

    if (fsize > 510000) {
      pesanerror.classList.remove("d-none");
      pesanerror.innerHTML = "Maks. file 500 KB";
      return false;
    } else {
      pesanerror.classList.add("d-none");
      pilih.classList.remove("is-invalid");

      form_data.append("file", pilih.files[0]);

      let uploaded = pcpo.querySelector(".uploaded");

      $.ajax({
        url: "/postfotoajax/" + judulberita,
        method: "POST",
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
          uploaded.innerHTML =
            "<label class='text-success'>Sedang Mengupload Gambar...</label>";
        },
        success: function (data) {
          uploaded.innerHTML = data;
          // console.log(data);
        },
      });
    }
  });
}

//UNTUK DOUBLE CLIK EDIT ------------------------------------------------------
//-----------------------------------------------------------------------------
function doubleClickEdit(sTable) {
  var table = document.getElementById(sTable);
  if (table == null) {
    return;
  }
  var rows = table.getElementsByTagName("tr");

  // Tambahkan event listener double click pada setiap baris
  for (var i = 0; i < rows.length; i++) {
    rows[i].addEventListener("dblclick", function (event) {
      var target = event.target;

      console.log("ok");

      if (
        target.tagName.toLowerCase() === "td" &&
        target.classList.contains("edit-dbClick")
      ) {
        var cellValue = target.textContent;

        target.innerHTML =
          '<textarea class="dibuat-oleh-ajax">' + cellValue + "</textarea>";

        var input = target.querySelector("textarea");

        // Fokuskan input saat pertama kali diubah
        input.focus();

        function updateClickEdit() {
          target.textContent = input.value;

          // console.log(table.dataset.tabelsiades);

          // Mengirim data ke server menggunakan AJAX
          var newValue = input.value;
          var xhr = new XMLHttpRequest();
          xhr.open(
            "POST",
            `${baseUrl}/adm-proses/update-dbclick-ajax/${table.dataset.tabelsiades}`,
            true
          );
          xhr.setRequestHeader(
            "Content-type",
            "application/x-www-form-urlencoded"
          );
          xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
              // Tanggapan dari server
              // console.log(xhr.responseText);
            }
          };

          xhr.send(
            `idUpdate=${target.dataset.id}&targetColum=${target.dataset.colum}&newvalue=${newValue}`
          );
        }

        // Tambahkan event listener blur pada input untuk menyimpan perubahan saat kehilangan fokus
        input.addEventListener("blur", function () {
          updateClickEdit();
        });

        // Tambahkan event listener keypress pada input untuk mengembalikan mode non-input saat tombol Enter ditekan
        input.addEventListener("keypress", function (event) {
          if (event.key === "Enter") {
            updateClickEdit();
          }
        });
      }
    });
  }
}

//ambil val h1 yg dijadikan id di table
const idTable = $("h1.id-table").text().toLowerCase().replace(/\s+/g, "-");
doubleClickEdit(idTable);
//-----------------------------------------------------------------------------

//View Struktur-----------------------
$(".viewStruktur").on("click", function () {
  const idTanggapan = $(this).data("id");

  $.ajax({
    url: "/adm-proses/getAjaxOne-struktur",
    data: { id: idTanggapan },
    method: "post",
    dataType: "json",
    success: function (data) {
      $(".vwFoto").attr("src", "/img/personil/" + data.foto);

      $("#vwForm").attr(
        "action",
        "/adm-proses/updatefoto-personil/" +
          idTanggapan +
          "/" +
          $("h1.id-table").data("bakalslug")
      );
      // $("#vwForm").attr("action", "/adm-proses/updatefoto-struktur/" + data.id);

      $("#vwNama").html(": " + data.nama);
      $("#vwJabatan").html(": " + data.jabatan);
      $("#vwAlamat").html(": " + data.alamat);
      $("#vwPendidikan").html(": " + data.pendidikan);
      $("#vwKontak").html(": " + data.kontak);
      $("#vwBy").html(": " + data.updated_by);
      $("#vwDate").html(": " + data.updated_at);

      $("#labelimgajax").val(data.nama);

      setTimeout(function () {
        $("#blockspinner").addClass("d-none");
        // console.log("ok");
      }, 1750);
    },
  });
});

$("#closeView").on("click", function () {
  $("#blockspinner").removeClass("d-none");
  $(".uploaded img").addClass("vwFoto");

  const resetFwFile = document.querySelector("#vwImgtarget");
  resetFwFile.value = null;
});

//HANYA SEMENTARA..................................
//Api Data
// $.ajax({
//   url: "https://idm.kemendesa.go.id/open/api/desa/rumusan/730207003/2022",
//   success: function (data) {
//     console.log(data);
//   },
// });
// $.ajax({
//   url: "https://sid.kemendesa.go.id/sdgs/searching/score-sdgs",
//   type: "GET",
//   dataType: "JSON",
//   data: {
//     location_code: "pakubalaho",
//   },
//   success: function (response) {
//     console.log(response);
//   },
// });
