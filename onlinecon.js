document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('consultationForm');

    form.addEventListener('submit', function (e) {
        e.preventDefault(); // Prevent the form from submitting normally

        // Fetch form values
        const owner_name = document.getElementById('owner_name').value;
        const email = document.getElementById('email').value;
        const pet_name = document.getElementById('pet_name').value;
        const mess = document.getElementById('mess').value;

        // You can now do something with the form data, like sending it to a server or displaying it to the user

        // For this example, let's just display the data in an alert
        const consultationData = `Name: ${owner_name}\nEmail: ${email}\nPet's Name: ${pet_name}\nDescribe the issue: ${mess}`;
        alert('Consultation request submitted:\n' + consultationData);

        // Optionally, clear the form fields after submission
        form.reset();
    });
});