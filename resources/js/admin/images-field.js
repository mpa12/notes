(() => {
    const imagesFields = document.querySelectorAll('.images-upload');

    imagesFields.forEach(fieldsHandler);

    function fieldsHandler(imagesField) {
        // Input button
        const inputElement = imagesField.querySelector('[type="file"]');

        // Input button wrapper
        const inputButtonElement = imagesField.querySelector('.images-upload__images__item--button');

        const inputHandler = (event) => {
            const files = event.target.files;

            if (files.length === 0) {
                return;
            }

            if (getCountImages() >= 10) {
                return;
            }

            Array.from(files).forEach(file => {
                if (!file.type.startsWith('image/')) {
                    return;
                }

                const reader = new FileReader();
                reader.onload = (e) => {
                    appendImage(e.target.result);
                    setRemoveEvents();
                };

                reader.readAsDataURL(file);
            });
        };
        inputElement.addEventListener('change', inputHandler);

        setRemoveEvents();

        /*
        | Functions
        */

        function getImages() {
            const imagesElements = imagesField.querySelectorAll(
                '.images-upload__images__item:not(.images-upload__images__item--button)'
            );
            return imagesElements;
        }

        function getCountImages() {
            const imagesElements = getImages();
            const imagesElementsCount = Array.from(imagesElements).length;
            return imagesElementsCount;
        }

        function appendImage(imageSrc) {
            const html = `
                <div class="images-upload__images__item">
                    <img alt="" src="${imageSrc}">
                    <span class="images-upload__images__item__close bi bi-x"></span>
                </div>
            `;
            inputButtonElement.insertAdjacentHTML('beforebegin', html);
        }

        function removeImage(imageElement) {
            imageElement.remove();
        }

        function setRemoveEvents() {
            const imagesElements = getImages();
            imagesElements.forEach((imageElement) => {
                const removeButton = imageElement.querySelector('.images-upload__images__item__close');
                removeButton.addEventListener('click', removeImage.bind(null, imageElement));
            });
        }
    }
})();