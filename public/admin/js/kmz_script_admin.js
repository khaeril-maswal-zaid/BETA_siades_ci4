$(document).ready(function () {
  //UNTUK DOUBLE CLIK EDIT ------------------------------------------------------
  //-----------------------------------------------------------------------------

  function doubleClickEdit(sTable, urlAjax) {
    var table = document.getElementById(sTable);
    var rows = table.getElementsByTagName("tr");

    // Tambahkan event listener double click pada setiap baris
    for (var i = 0; i < rows.length; i++) {
      rows[i].addEventListener("dblclick", function (event) {
        var target = event.target;
        var isLastColumn =
          target.cellIndex === target.parentNode.cells.length - 1;

        // Periksa apakah target adalah sel td dan bukan kolom terakhir
        if (target.tagName.toLowerCase() === "td" && !isLastColumn) {
          var cellValue = target.textContent;

          target.innerHTML =
            '<textarea name="" id="">' + cellValue + "</textarea>";

          var input = target.querySelector("textarea");

          // Fokuskan input saat pertama kali diubah
          input.focus();

          // Tambahkan event listener blur pada input untuk menyimpan perubahan saat kehilangan fokus
          input.addEventListener("blur", function () {
            target.textContent = input.value;
          });

          // Tambahkan event listener keypress pada input untuk mengembalikan mode non-input saat tombol Enter ditekan
          input.addEventListener("keypress", function (event) {
            if (event.key === "Enter") {
              target.textContent = input.value;
            }
          });
        }
      });
    }
  }

  //ambil val h1 yg dijadikan id di table
  const idTable = $("h1.h3").text().toLowerCase().replace(/\s+/g, "-");
  doubleClickEdit(idTable, "urlAjax");
  // doubleClickEdit("sdgs-table", "urlAjax");

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
});
