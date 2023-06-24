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
$(document).on("change", "#pictureartikel", function () {
  var name = document.getElementById("pictureartikel").files[0].name;
  var form_data = new FormData();
  var ext = name.split(".").pop().toLowerCase();

  var judulberita = document.getElementById("judulberita").value;
  var pesanerror = $("#pesan-error");

  if (judulberita == "") {
    pesanerror.removeClass("d-none");
    pesanerror.html("Isi judul terlebih dahulu");
    return false;
  }

  if (jQuery.inArray(ext, ["png", "jpg", "jpeg"]) == -1) {
    pesanerror.removeClass("d-none");
    pesanerror.html("Format gambar tidak sesusai");
    return false;
  }

  var oFReader = new FileReader();
  oFReader.readAsDataURL(document.getElementById("pictureartikel").files[0]);
  var f = document.getElementById("pictureartikel").files[0];
  var fsize = f.size || f.fileSize;

  if (fsize > 510000) {
    pesanerror.removeClass("d-none");
    pesanerror.html("Maks. file 500 KB");
    return false;
  } else {
    pesanerror.addClass("d-none");
    $(this).removeClass("is-invalid");

    form_data.append(
      "file",
      document.getElementById("pictureartikel").files[0]
    );

    $.ajax({
      url: "/postfotoajaxl/blog/" + judulberita,
      method: "POST",
      data: form_data,
      contentType: false,
      cache: false,
      processData: false,
      beforeSend: function () {
        $("#uploaded").html(
          "<label class='text-success'>Sedang Mengupload Gambar...</label>"
        );
      },
      success: function (data) {
        $("#uploaded").html(data);
        // console.log(data);
      },
    });
  }
});

$(document).ready(function () {
  $("#isinaArtikel").val($(".ck-editor__main div").html()); // Awal
});

$(document).on("keyup", ".ck-editor__main div", function () {
  $("#isinaArtikel").val($(this).html()); //timpa
});

//UNTUK DOUBLE CLIK EDIT ------------------------------------------------------
//-----------------------------------------------------------------------------
function doubleClickEdit(sTable, urlAjax) {
  var table = document.getElementById(sTable);
  if (table == null) {
    return;
  }
  var rows = table.getElementsByTagName("tr");

  // Tambahkan event listener double click pada setiap baris
  for (var i = 0; i < rows.length; i++) {
    rows[i].addEventListener("dblclick", function (event) {
      var target = event.target;

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
              console.log(xhr.responseText);
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
const idTable = $("h1.h3").text().toLowerCase().replace(/\s+/g, "-");
doubleClickEdit(idTable, "urlAjax");
//-----------------------------------------------------------------------------

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
