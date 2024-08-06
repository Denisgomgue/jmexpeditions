$(document).ready(function() {
    const message = new URLSearchParams(window.location.search).get("message");
    console.log('Message:', message); // Añade esta línea para depurar
    if (message) {
        $.notify({
            icon: "icon-bell",
            title: "Éxito",
            message: decodeURIComponent(message)
        }, {
            type: "success",
            placement: {
                from: "top",
                align: "center"
            },
            time: 5000
        });
    }
});
