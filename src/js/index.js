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

document.addEventListener("DOMContentLoaded", function() {
    const fileInputs = document.querySelectorAll('.image-upload input[type="file"]');
  
    fileInputs.forEach(input => {
      input.addEventListener('change', function() {
        const label = input.parentElement;
        const icon = label.querySelector('i');
        const img = label.querySelector('img') || document.createElement('img');
        
        if (input.files && input.files[0]) {
          const reader = new FileReader();
          reader.onload = function(e) {
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