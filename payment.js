// Function to update amount based on selected service
function updateAmount() {
    var serviceInput = document.getElementById("service");
    var amountInput = document.getElementById("amount");

    // Set amount based on selected service
    var selectedService = serviceInput.value;
    var amount = 0; // Default amount
    switch (selectedService) {
        case "appointment":
            amount = 250; // Set amount for appointment
            break;
        case "vaccination":
            amount = 200; // Set amount for vaccination
            break;
        case "pet_grooming":
            amount = 300; // Set amount for appointment
            break;
        case "online_consult":
            amount = 500; // Set amount for appointment
            break;     
        // Add more cases for other services as needed
    }

    // Update amount field
    amountInput.value = amount;
}

// Attach function to service select change event
document.getElementById("service").addEventListener("change", updateAmount);

