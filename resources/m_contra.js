var ojo_ico = document.getElementById('ojo');
var input = document.getElementById('text_contrasena');

ojo_ico.addEventListener("click", function(){
    if(input.type == "password"){
        input.type = "text"
        ojo_ico.style.opacity = 0.8
    }else{
        input.type = "password"
        ojo_ico.style.opacity = 1
    }
})