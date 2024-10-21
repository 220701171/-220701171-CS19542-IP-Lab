// Handle Donation Form Submission
document.getElementById("donation-form").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent form submission

    // Generate a rough donation ID
    const roughDonationID = "EW" + Math.floor(Math.random() * 1000000);

    // Display success message in the popup
    document.getElementById("success-message").innerText = "Successfully registered!";
    document.getElementById("generated-id").innerText = "Your Donation ID: " + roughDonationID;

    // Display the rough Donation ID below the condition field
    document.getElementById("donation-id-message").innerText = "Your Donation ID: " + roughDonationID;

    // Show the popup
    const modal = document.getElementById("success-modal");
    modal.style.display = "block";

    // Close the popup when the user clicks on the close button
    document.querySelector(".close-btn").onclick = function() {
        modal.style.display = "none";
    };

    // Close the popup when the user clicks outside of the modal
    window.onclick = function(event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    };

    // Reset the form fields
    document.getElementById("donation-form").reset();
});

// Handle User Details Form Submission
document.getElementById('user-form').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent default form submission

    // Do not store data in the database or show success message
    console.log('User details submitted, but not stored in the database.');

    // Optionally, you can show a message to the user
    alert("Your details have been submitted but will not be stored.");

    // Reset the form fields
    document.getElementById('user-form').reset();
});
