window.addEventListener("DOMContentLoaded", () => {

    // Function to search for country data
    function searchCountry() {
        // Get user input from the input field with class "searchinput"
        const country = document.querySelector("#country").value.trim();

        // Check if input is empty before making an AJAX request
        // if (!country) {
        //     alert("Please enter a country name.");
        //     return;
        // }

        // Make an AJAX GET request using jQuery
        $.ajax({
            url: "world.php",
            method: "GET",
            data: { country: country }, // Pass user input to the server
            dataType: "html", // Expect HTML response
            success: function (response) {
                // Update the content of the .result element
                document.querySelector("#result").innerHTML = response;
            },
            error: function (xhr, status, error) {
                // Log errors to the console and alert the user
                console.error("AJAX error:", status, error);
                alert("An error occurred while fetching the data. Please try again later.");
            },
        });
    }

    // Add event listener to the "Search" button
    document.querySelector("#lookup-Country").addEventListener("click", searchCountry);


    // Function to search for city data
    function searchCity() {
        // Get user input from the input field with class "searchinput"
        const country = document.querySelector("#country").value.trim();

        // // Check if input is empty before making an AJAX request
        // if (!country) {
        //     alert("Please enter a country name.");
        //     return;
        // }

        // Make an AJAX GET request using jQuery
        $.ajax({
            url: "world.php",
            method: "GET",
            data: { country: country, lookup: "cities" }, // Pass user input to the server
            dataType: "html", // Expect HTML response
            success: function (response) {
                // Update the content of the .result element
                document.querySelector("#result").innerHTML = response;
            },
            error: function (xhr, status, error) {
                // Log errors to the console and alert the user
                console.error("AJAX error:", status, error);
                alert("An error occurred while fetching the data. Please try again later.");
            },
        });
    }

    // Add event listener to the "Search" button
    document.querySelector("#lookup-City").addEventListener("click", searchCity);


});