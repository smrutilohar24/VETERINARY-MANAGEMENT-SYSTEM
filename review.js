document.getElementById('reviewForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the default form submission

    var name = document.getElementById('name').value;
    var rating = document.getElementById('rating').value;
    var comment = document.getElementById('comment').value;

    // Create a FormData object to send form data to PHP script
    var formData = new FormData();
    formData.append('name', name);
    formData.append('rating', rating);
    formData.append('comment', comment);
    

    // Send form data to PHP script using fetch API
    fetch('review.php', {
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
            console.log(data); // Log response from server
            // Display popup after successful insertion
            alert('Review request submitted:\n' + FormData);
            document.getElementById('reviewForm').reset();
        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
            // Handle errors here
        });
    });