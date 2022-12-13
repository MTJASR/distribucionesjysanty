function frmLogin(e) {
    e.prevenDefault();
    const usaurio = document.getElementById("usuario");
    const clave = document.getElementById("clave");
    if (usaurio.value == "") {
        clave.classList.remove("is-invalid");
        usaurio.classList.add("is-invalid");
        usaurio.focus();
    } else if (clave.value == "") {
        usaurio.classList.remove("is-invalid");
        clave.classList.add("is-invalid");
        clave.focus();
    }else{
        const url = base_url + "Usuarios/validar";
        const frm = document.getElementById("frmLogin");
        const hhtp = new XMLHttpRequest();
        http.open("POST", url,true);
        http.send(new FormData(frm));
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                   console.log(this.responseText);
            }
        }
    }
}