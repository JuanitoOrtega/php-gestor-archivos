// Here goes your custom javascript
const esp_url = base_url + 'Assets/plugins/DataTables/lang/es-ES.json';

function alertaPersonalizada(type, message) {
    Swal.fire({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        icon: type,
        title: message,
        timerProgressBar: true,
        timer: 2000,
    });
}

function confirmarAccion(title, message, callback) {
    $.confirm({
        theme: 'material',
        title: title,
        content: message,
        type: 'red',
        typeAnimated: true,
        draggable: false,
        dragWindowBorder: false,
        buttons: {
            info: {
                text: "Si",
                btnClass: 'btn-danger',
                action: function () {
                    callback();
                }
            },
            danger: {
                text: "Cancelar",
                btnClass: 'btn-info',
                action: function () {
                }
            }
        }
    });
}