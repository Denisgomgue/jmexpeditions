document.querySelectorAll('.dropzone').forEach((dropzone) => {
  const input = dropzone.querySelector('.custom-file-input');
  const label = dropzone.querySelector('.custom-file-label');

  dropzone.addEventListener('dragover', (e) => {
    e.preventDefault();
    dropzone.classList.add('dragover');
  });

  dropzone.addEventListener('dragleave', () => {
    dropzone.classList.remove('dragover');
  });

  dropzone.addEventListener('drop', (e) => {
    e.preventDefault();
    dropzone.classList.remove('dragover');
    const files = e.dataTransfer.files;
    if (files.length) {
      input.files = files;
      label.textContent = files[0].name;
    }
  });

  input.addEventListener('change', () => {
    if (input.files.length) {
      label.textContent = input.files[0].name;
    }
  });
});

/*CODIGO DE LOS INPUT DE SUBIDA  DE IMAGENES*/
document.addEventListener("DOMContentLoaded", function () {
  const fileInputs = document.querySelectorAll('.image-upload input[type="file"]');

  fileInputs.forEach(input => {
    input.addEventListener('change', function () {
      const label = input.parentElement;
      const icon = label.querySelector('i');
      const img = label.querySelector('img') || document.createElement('img');

      if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function (e) {
          img.src = e.target.result;
          img.style.display = 'block';
          icon.style.display = 'none';
          label.appendChild(img);
        }
        reader.readAsDataURL(input.files[0]);
      } else {
        img.style.display = 'none';
        icon.style.display = 'block';
      }
    });
  });
});
/*FIN CODIGO DE LOS INPUT DE SUBIDA  DE IMAGENES*/

/**CODIGO DE DESTINO */
function generarCodigo() {
  var destino = document.getElementById('nombre').value;
  var ubicacion = document.getElementById('ubicacion').value;
  var categoria = document.getElementById('categoria').value;

  var codigo = '';

  var destinoPartes = destino.trim().split(' ');
  var ubicacionPartes = ubicacion.trim().split(' ');

  if (destinoPartes.length >= 2) {
      var primeraParteDestino = destinoPartes[0].substring(0, 2).toUpperCase();
      var segundaParteDestino = destinoPartes[1].substring(0, 2).toUpperCase();
      codigo += primeraParteDestino + segundaParteDestino;
  } else if (destinoPartes.length === 1 && destinoPartes[0].length >= 4) {
      codigo += destinoPartes[0].substring(0, 4).toUpperCase();
  } else {
      codigo += destinoPartes[0].substring(0, 2).toUpperCase();
  }

  if (ubicacionPartes.length >= 2) {
      var primeraParteUbicacion = ubicacionPartes[0].substring(0, 2).toUpperCase();
      var segundaParteUbicacion = ubicacionPartes[1].substring(0, 2).toUpperCase();
      codigo += primeraParteUbicacion + segundaParteUbicacion;
  } else if (ubicacionPartes.length === 1 && ubicacionPartes[0].length >= 4) {
      codigo += ubicacionPartes[0].substring(0, 4).toUpperCase();
  } else {
      codigo += ubicacionPartes[0].substring(0, 2).toUpperCase();
  }

  var randomNum = Math.floor(Math.random() * 100).toString().padStart(2, '0');
  codigo += randomNum;

  document.getElementById('codigo').value = codigo;
}

/**FIN CODIGO DE DESTINO */

/****Codigo de categorias */
function generarCodigoCategoria() {
  document.getElementById('id_categoria').value = "";
  var nombre = document.getElementById('nombre_categoria').value.trim();
  var codigo = 'CA';
  
  if (nombre) {
      var palabras = nombre.split(' ');
      if (palabras.length > 1) {
          // Más de una palabra
          var parte1 = palabras[0].substring(0, 2).toUpperCase();
          var parte2 = palabras[1].substring(0, 2).toUpperCase();
          codigo += parte1 + parte2;
      } else {
          // Solo una palabra
          var parte = nombre.substring(0, 4).toUpperCase();
          codigo += parte;
      }
  }
  
  // Limitar el código a 6 caracteres
  if (codigo.length > 6) {
      codigo = codigo.substring(0, 6);
  }
  
  document.getElementById('id_categoria').value = codigo;
}

/****FIN Codigo de categorias */