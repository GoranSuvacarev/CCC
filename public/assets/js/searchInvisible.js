document.addEventListener('DOMContentLoaded', () => {
    const product1Input = document.getElementById('product1');
    const secondProductBox = document.getElementById('secondProductBox');

    product1Input.addEventListener('input', () => {
        const value = product1Input.value.trim();
        if (value) {
            // Make the second product box visible
            secondProductBox.classList.remove('d-none');
        } else {
            // Hide the second product box if the first input is cleared
            secondProductBox.classList.add('d-none');
        }
    });
});
