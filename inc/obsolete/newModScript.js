// ------------- CHECKBOX TEMPORADA
var listaTmp = document.getElementById('temporada');
// var arrTmp = new Array();

var checkboxOi = document.getElementById('oi');
var checkboxPv = document.getElementById('pv');
checkboxOi.addEventListener('change', writeTmp);
checkboxPv.addEventListener('change', writeTmp);

function writeTmp(){
	if(this.checked) {
        // console.log('checked! '+this.value);
        listaTmp.value = this.value;
        // console.log(arrTmp);
        // listaTmp.value = arrTmp;
    }
}

// ------------------- IMAGEN
var nuevaImg = document.getElementById('imagePath');
var loadImg = document.getElementById('loadImg');
document.getElementById('adjImg').addEventListener('change',function imagePath(){
	var imagen = document.getElementById('adjImg').value.substr(12);
	// console.log(imagen);
	nuevaImg.value = imagen;
});

document.getElementById('adjImg').onchange = function (evt) {
    var tgt = evt.target || window.event.srcElement,
        files = tgt.files;

    // FileReader support
    if (FileReader && files && files.length) {
        var fr = new FileReader();
        fr.onload = function () {
            document.getElementById('loadImg').src = fr.result;
        }
        fr.readAsDataURL(files[0]);
    }}
