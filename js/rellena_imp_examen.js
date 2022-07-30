function rellena_datos_pdf(){
    // Instanciamos el objeto Date, usando la palabra reservada new, en la constante date.
    const date = new Date();
    // Asignamos los valores que obtenemos de cada método en constantes.
    const day = date.getDate();
    const month = date.getMonth() + 1;
    const fullYear = date.getFullYear();
    const hours = date.getHours();
    const minutes = date.getMinutes();
    const seconds = date.getSeconds();

    $("#re_paciente").text(localStorage.apepaterno+" "+localStorage.apematerno+", "+localStorage.nombre);
    $("#re_sexo").text(localStorage.sexo);
    $("#re_dni").text(localStorage.dni);
    $("#re_fecha").text(day+"/"+month+"/"+fullYear);
    $("#re_hora").text(hours+":"+minutes+":"+seconds);
    $("#re_edad").text(localStorage.edad);
    }