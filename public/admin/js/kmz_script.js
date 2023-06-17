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
