document.getElementById('consultationForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the default form submission

    var owner_name = document.getElementById('owner_name').value;
    var email = document.getElementById('email').value;
    var pet_name = document.getElementById('pet_name').value;
    var mess = document.getElementById('mess').value;

    // Create a FormData object to send form data to PHP script
    var formData = new FormData();
    formData.append('owner_name', owner_name);
    formData.append('email', email);
    formData.append('pet_name', pet_name);
    formData.append('mess', mess);

    // Send form data to PHP script using fetch API
    fetch('onlinecon.php', {
        method: 'POST',
        body: formData
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.text();
    })
    .then(data => {
        console.log(data); // Log response from PHP script
        // You can handle success response here
        alert('Consultation request submitted:\n' + FormData);
        document.getElementById('consultationForm').reset();
    })
    .catch(error => {
        console.error('There was a problem with the fetch operation:', error);
        // Handle errors here
    });
});
