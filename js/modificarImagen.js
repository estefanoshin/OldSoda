var agregarImgContainer = document.querySelector('div[class=custom-file]');
var inputShowImg = document.querySelector('input[name=nuevaImagen]')
var previewImage = document.getElementById('pImage');
var btnNewImg = document.getElementById('newImg');
var btnDelImg = document.getElementById('delImg');
var inputImg = document.getElementById('img');

agregarImgContainer.style.display = 'none';

function agregarImagen(){
    if (agregarImgContainer.style.display === "none") {
        agregarImgContainer.style.display = "block"; //show image input
        inputShowImg.value = 'changes';
        previewImage.style.display = 'none';
        btnNewImg.style.display = 'none';
        btnDelImg.style.display = 'none';
        inputImg.click();
    }
}

function borrarImagen(){
        agregarImgContainer.style.display = "block"; //show image input
        inputShowImg.value = 'changes';
        previewImage.src = 'img/site/noImage.jpg';
        btnDelImg.style.display = 'none';
        btnNewImg.style.display = 'none';
    if (agregarImgContainer.style.display === "none") {
    }
}