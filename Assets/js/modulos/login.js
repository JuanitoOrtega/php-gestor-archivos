const formLogin = document.querySelector('#formLogin');
const usuario = document.querySelector('#usuario');
const clave = document.querySelector('#clave');

document.addEventListener('DOMContentLoaded', function () {
    formLogin.addEventListener('submit', function (e) {
        e.preventDefault();
        if (usuario.value == '') {
            alertaPersonalizada('warning', 'El usuario es requerido!');
        } else if (clave.value == '') {
            alertaPersonalizada('warning', 'La contraseña es requerida!');
        } else {
            const url = base_url + 'principal/login';
            const data = new FormData(this);
            const http = new XMLHttpRequest();
            http.open('POST', url, true);
            http.send(data);
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    // console.log(this.responseText);
                    const res = JSON.parse(this.responseText);
                    alertaPersonalizada(res.type, res.msg);
                    if (res.type == 'success') {
                        setTimeout(() => {
                            window.location = base_url + 'admin';
                        }, 2000);
                    }
                }
            }
        }
    });
});