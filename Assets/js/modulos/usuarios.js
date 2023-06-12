let tblUsuarios;

const registroModal = document.querySelector('#registroModal');
const modal = new bootstrap.Modal(registroModal);

const form = document.querySelector('#form');
const title = document.querySelector('#title');
const btnNuevo = document.querySelector('#btnNuevo');
const btnAccion = document.querySelector('#btnAccion');

document.addEventListener('DOMContentLoaded', function () {
    tblUsuarios = $('#tblUsuarios').DataTable({
        responsive: true,
        ordering: true,
        language: {
            url: esp_url
        },
        ajax: {
            url: base_url + 'usuarios/listar',
            dataSrc: ''
        },
        columns: [
            {data: 'id'},
            {data: 'usuario'},
            {data: 'nombre_completo'},
            {data: 'correo'},
            {data: 'telefono'},
            {data: 'created_at'},
            {data: 'acciones'},
        ],
        order: [[0, 'desc']],
        columnDefs: [
            {
                targets: [-2],
                render: function ( data, type, row ) {
                    return moment(data).format('DD/MM/YYYY HH:mm:ss');
                }
            },
            {
                targets: [-1],
                class: 'text-center',
                render: function ( data, type, row ) {
                    return data;
                }
            }
        ]
    });

    btnNuevo.addEventListener('click', function () {
        modal.show();
        form.reset();
        title.innerHTML = 'Registrar nuevo usuario';
        form.clave.removeAttribute('readonly');
        btnAccion.innerHTML = '<i class="material-icons">save</i> Registrar usuario';
    });

    // Registrar usuario con Ajax
    form.addEventListener('submit', function (e) {
        e.preventDefault();
        // console.log(form);
        if (form.nombre.value == '') {
            alertaPersonalizada('warning', 'El nombre es requerido');
        } else if (form.apellido.value == '') {
            alertaPersonalizada('warning', 'El apellido es requerido');
        } else if (form.correo.value == '') {
            alertaPersonalizada('warning', 'El correo electrónico es requerido');
        } else if (form.usuario.value == '') {
            alertaPersonalizada('warning', 'El nombre de usuario es requerido');
        } else if (form.clave.value == '') {
            alertaPersonalizada('warning', 'La contraseña es requerida');
        } else if (form.rol.value == '') {
            alertaPersonalizada('warning', 'Seleccionar el rol es requerido');
        } else {
            const url = base_url + 'usuarios/registrar';
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
                        form.reset();
                        modal.hide();
                        tblUsuarios.ajax.reload();
                    }
                }
            }
        }
    });
});

// Eliminar
function eliminar(idUsuario) {
    confirmarAccion('¡Notificación!', '¿Seguro que desea ejecutar esta acción?', function () {
        const url = base_url + 'usuarios/delete/' + idUsuario;
        const http = new XMLHttpRequest();
        http.open('GET', url, true);
        http.send();
        http.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                // console.log(this.responseText);
                const res = JSON.parse(this.responseText);
                alertaPersonalizada(res.type, res.msg);
                if (res.type == 'success') {
                    tblUsuarios.ajax.reload();
                }
            }
        }
    });
}

// Editar
function editar(idUsuario) {
    const url = base_url + 'usuarios/editar/' + idUsuario;
    const http = new XMLHttpRequest();
    http.open('GET', url, true);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            // console.log(this.responseText);
            const res = JSON.parse(this.responseText);
            form.id_usuario.value = res.id;
            form.usuario.value = res.usuario;
            form.nombre.value = res.nombre;
            form.apellido.value = res.apellido;
            form.correo.value = res.correo;
            form.telefono.value = res.telefono;
            form.direccion.value = res.direccion;
            form.clave.value = '0000000';
            form.clave.setAttribute('readonly', 'true');
            form.rol.value = res.rol;
            modal.show();
            title.innerHTML = 'Editar usuario';
            btnAccion.innerHTML = '<i class="material-icons">save</i> Guardar cambios';
            registroModal.addEventListener('hidden.bs.modal', function () {
                form.id_usuario.removeAttribute('value');
            });
            // alertaPersonalizada(res.type, res.msg);
            // if (res.type == 'success') {
            //     tblUsuarios.ajax.reload();
            // }
        }
    }
}