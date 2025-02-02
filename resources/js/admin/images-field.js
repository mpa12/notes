(() => {
    const MAIN_IMAGE_TEXT = 'основное фото';

    const imagesFields = document.querySelectorAll('.images-upload');

    imagesFields.forEach(fieldsHandler);

    function fieldsHandler(imagesField) {
        // Input button
        const inputElement = imagesField.querySelector('[type="file"]');

        // Input button wrapper
        const inputButtonElement = imagesField.querySelector('.images-upload__images__item--button');

        const inputHandler = (event) => {
            const files = event.target.files;

            if (!files.length || getCountImages() >= 10) return;

            Array.from(files).forEach(file => {
                if (!file.type.startsWith('image/')) return;

                const reader = new FileReader();
                reader.onload = (e) => {
                    appendImage(e.target.result);
                    setRemoveEventListeners();
                };

                reader.readAsDataURL(file);
            });

            inputElement.value = '';
        };
        inputElement.addEventListener('change', inputHandler);

        setRemoveEventListeners();
        updateImagesJson();

        /*
        | Functions
        */

        function getImages() {
            return imagesField.querySelectorAll(
                '.images-upload__images__item:not(.images-upload__images__item--button)'
            );
        }

        function getCountImages() {
            return getImages().length;
        }

        function appendImage(imageSrc) {
            const isMainImage = getCountImages() === 0;

            const html = `
                <div class="images-upload__images__item">
                    <img alt="" src="${imageSrc}">
                    <span class="images-upload__images__item__text">${isMainImage ? MAIN_IMAGE_TEXT : ''}</span>
                    <span class="images-upload__images__item__close bi bi-x"></span>
                </div>
            `;
            inputButtonElement.insertAdjacentHTML('beforebegin', html);
            updateImagesJson();
        }

        function removeImage(imageElement) {
            imageElement.remove();
            updateMainImage();
            updateImagesJson();
        }

        function setRemoveEventListeners() {
            const imagesElements = getImages();
            imagesElements.forEach((imageElement) => {
                const removeButton = imageElement.querySelector('.images-upload__images__item__close');
                removeButton.addEventListener('click', removeImage.bind(null, imageElement));
            });
        }

        function updateMainImage() {
            const images = getImages();
            images.forEach((imageElement, index) => {
                const text = index === 0 ? MAIN_IMAGE_TEXT : '';
                const textElement = imageElement.querySelector('.images-upload__images__item__text');
                textElement.innerHTML = text;
            });
        }

        function updateImagesJson(){
            const imagesJsonInput = imagesField.querySelector('[name="images-json"]');
            const images = getImages();

            const imagesJson = Array.from(images).map((imageElement, index) => {
                const imgSrc = imageElement.querySelector('img').src;
                return {
                    src: imgSrc,
                    number: index,
                };
            });

            imagesJsonInput.value = JSON.stringify(imagesJson);
        }
    }
})();
