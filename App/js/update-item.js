// get the form element
const form = document.querySelector('form');

// add a submit event listener to the form
form.addEventListener('submit', function(event) {
    // prevent the default form submission
    event.preventDefault();

    // get the form data as a FormData object
    const formData = new FormData(form);

    // send an AJAX request to update_item.php
    fetch('update_item.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        // check if the update was successful
        if (data === 'success') {
            // show a SweetAlert success message and redirect to items.php
            Swal.fire({
                icon: 'success',
                title: 'Item updated successfully!',
                showConfirmButton: false,
                timer: 1500
            }).then(() => {
                window.location.href = '../pages/items.php';
            });
        } else {
            // show a SweetAlert error message
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: data
            });
        }
    })
    .catch(error => {
        // show a SweetAlert error message
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: error.message
        });
    });
});
