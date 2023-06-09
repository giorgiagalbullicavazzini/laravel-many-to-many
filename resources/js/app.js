import './bootstrap';

// Import SCSS
import '~resources/scss/app.scss';

// Import Bootstrap JS
import * as bootstrap from 'bootstrap';

// Process all assets
import.meta.glob([
    '../img/**'
]);

// Show upload image preview
if (document.querySelector('.form-input-image')) {
    const imageInputContainer = document.getElementById('image-input-container');
    const imageInput = document.getElementById('image');
    const setImageInput = document.getElementById('set_image');

    imageInput.addEventListener('change', showPreview);
    setImageInput.addEventListener('change', function() {

        if (setImageInput.checked) {
            imageInputContainer.classList.remove('d-none');
            imageInputContainer.classList.add('d-block');
        } else {
            imageInputContainer.classList.remove('d-block');
            imageInputContainer.classList.add('d-none');
        }
    });
}

function showPreview(event) {
    if (event.target.files.length > 0) {
        const src = URL.createObjectURL(event.target.files[0]);
        const preview = document.getElementById('file-image-preview');
        preview.src = src;
        preview.style.display = 'block';
    }
}