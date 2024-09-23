<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // Función para confirmar eliminación
    $(document).on("click", ".btn_eliminar", function(e) {
        e.preventDefault();
        const href = $(this).attr("href");
        const entity = $(this).data("entity");

        

        Swal.fire({
            title: `¿Estás seguro de eliminar ${entity}?`,
            text: "¡No podrás revertir esto!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Sí, eliminar",
            cancelButtonText: "No, cancelar",
            customClass: {
                confirmButton: "btn btn-success g-2 m-2",
                cancelButton: "btn btn-danger g-2 m-2"
            },
            buttonsStyling: false
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: "¡Eliminado!",
                    text: `${entity} ha sido eliminado.`,
                    icon: "success",
                    customClass: {
                        confirmButton: "btn btn-success"
                    },
                    buttonsStyling: false
                }).then(() => {
                    window.location.href = href;
                });
            } else {
                Swal.fire({
                    title: "Cancelado",
                    text: `Tu ${entity} está a salvo.`,
                    icon: "error",
                    customClass: {
                        confirmButton: "btn btn-success"
                    },
                    buttonsStyling: true
                });
            }
        });
    });

    // Función para manejar notificaciones de CRUD
    $(document).ready(function() {
        const urlParams = new URLSearchParams(window.location.search);
        const status = urlParams.get('status');
        const message = urlParams.get('message');
        const entity = urlParams.get('entity');

        if (status && message && entity) {
            let alertTitle = status === 'success' ? 'Éxito' : 'Error';
            let alertMessage = '';

            switch (message) {
                case 'registrado':
                    alertMessage = `${entity} registrada con éxito.`;
                    break;
                case 'move_error':
                    alertMessage = `Error al mover ${entity}.`;
                    break;
                case 'upload_error':
                    alertMessage = `Error al subir ${entity}.`;
                    break;
                case 'db_error':
                    alertMessage = `Error en la base de datos para ${entity}.`;
                    break;
                default:
                    alertMessage = `Operación en ${entity} completada con éxito.`;
            }

            Swal.fire({
                title: alertTitle,
                text: alertMessage,
                icon: status === 'success' ? 'success' : 'error',
                customClass: {
                    confirmButton: "btn btn-success"
                },
                buttonsStyling: true
            }).then(() => {
                // Limpiar parámetros de la URL
                window.history.replaceState(null, null, window.location.pathname);
            });
        }
    });

    // Función para cancelar la actualización
    function cancelarActualizacion(entity) {
        Swal.fire({
            title: "Cancelado",
            text: `${entity} no actualizada.`,
            icon: "info",
            confirmButtonText: "Aceptar",
            customClass: {
                confirmButton: "btn btn-primary"
            },
            buttonsStyling: false
        }).then(() => {
            // Ocultar el formulario de actualización y mostrar el de registro
            document.getElementById('form_actualizar').style.display = 'none';
            document.getElementById('form_registrar').style.display = 'block';
            document.getElementById('form_registrar').scrollIntoView({ behavior: 'smooth' });
        });
    }

    function cancelarActualizar(entity) {
        Swal.fire({
            title: "Cancelado",
            text: `${entity} no actualizado.`,
            icon: "info",
            confirmButtonText: "Aceptar",
            customClass: {
                confirmButton: "btn btn-primary"
            },
            buttonsStyling: false
        }).then(() => {
            window.location.href = '../../pages/destinos/index.php';
        });
    }
</script>
