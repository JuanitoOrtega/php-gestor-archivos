const btnUpload = document.querySelector('#btnUpload');

const fileModal = document.querySelector('#fileModal');
const modal = new bootstrap.Modal(fileModal);

const btnNuevaCarpeta = document.querySelector('#btnNuevaCarpeta');
const file = document.querySelector('#file');
const btnSubirArchivo = document.querySelector('#btnSubirArchivo');

const carpetaModal = document.querySelector('#carpetaModal');
const modalCarpeta = new bootstrap.Modal(carpetaModal);

const formCarpeta = document.querySelector('#formCarpeta');

const compartirModal = document.querySelector('#compartirModal');
const modalShare = new bootstrap.Modal(compartirModal);
const id_carpeta = document.querySelector('#id_carpeta');
const btnSubir = document.querySelector('#btnSubir');

const btnVer = document.querySelector('#btnVer');

const carpetas = document.querySelectorAll('.carpetas');

document.addEventListener('DOMContentLoaded', function () {
    btnUpload.addEventListener('click', function () {
        modal.show();
    });

    btnNuevaCarpeta.addEventListener('click', function () {
        modal.hide();
        modalCarpeta.show();
    });

    formCarpeta.addEventListener('submit', function (e) {
        e.preventDefault();
        if (formCarpeta.nombre.value == '') {
            alertaPersonalizada('warning', 'El nombre es requerido');
        } else {
            const url = base_url + 'admin/crearCarpeta';
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
                            window.location.reload();
                        }, 2000);
                    }
                }
            }
        }
    });

    // Subir archivo
    btnSubirArchivo.addEventListener('click', () => {
        modal.hide();
        file.click();
    });

    file.addEventListener('change', (e) => {
        // console.log(e.target.files[0]);
        const url = base_url + 'admin/subirArchivo';
        const data = new FormData();
        data.append('id_carpeta', id_carpeta.value);
        data.append('file', e.target.files[0]);
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
                        window.location.reload();
                    }, 2000);
                }
            }
        }
    });

    carpetas.forEach(carpeta => {
        carpeta.addEventListener('click', function (e) {
            // console.log(e.target.id);
            id_carpeta.value = e.target.id;
            modalShare.show();
        });
    });

    btnSubir.addEventListener('click', () => {
        modalShare.hide();
        file.click();
    });

    btnVer.addEventListener('click', () => {
        window.location = base_url + 'admin/ver/' + id_carpeta.value;
    });
});