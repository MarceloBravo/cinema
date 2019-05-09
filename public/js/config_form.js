function refreshLogo(file){
    if (file.files && file.files[0]) {        
        var reader = new FileReader();

        reader.onload = function(e) {
            console.log(e.target.result);
            var preview = document.getElementById("logoPreview");
            preview.src = e.target.result;
        }
        reader.readAsDataURL(file.files[0]);
      }
}