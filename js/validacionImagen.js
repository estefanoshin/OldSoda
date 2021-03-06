//Validacion imagen + preview | front-end
function fileValidation(){
    var fileInput = document.getElementById('img');
    var filePath = fileInput.value;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    var imagePreview = document.getElementById('imagePreview');
    if(!allowedExtensions.exec(filePath)){
        alert('Solo se permiten subir imagenes');
        fileInput.value = '';
        return false;
    }else{
        //Image preview
        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                imagePreview.innerHTML = '<img id="pImage" src="'+e.target.result+'"/>';
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    }
}