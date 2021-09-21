$(document).on("change", 'input[type="file"]', function () {
  // this.files[0].size recupera el tamaño del archivo
  

  var fileName = this.files[0].name;
  var fileSize = this.files[0].size;

  if (fileSize > 5000000) {
    alert("El archivo no debe superar los 5MB");
    this.value = "";
    this.files[0].name = "";
  } else {
    // recuperamos la extensión del archivo
    var ext = fileName.split(".").pop();

    // Convertimos en minúscula porque
    // la extensión del archivo puede estar en mayúscula
    ext = ext.toLowerCase();

    // console.log(ext);
    switch (ext) {
      case "xlsx":
        break;
      default:
        alert(
          "El archivo no tiene la extensión adecuada, debe ser extensión .xlsx"
        );
        this.value = ""; // reset del valor
        this.files[0].name = "";
    }
  }
});
