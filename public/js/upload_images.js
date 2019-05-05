function refreshImage(file){
    if (file.files && file.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            var preview = document.getElementById("imagePreview");
            preview.src = e.target.result;
        }
        reader.readAsDataURL(file.files[0]);
      }
}