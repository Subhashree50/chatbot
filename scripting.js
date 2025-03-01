$(document).ready(function() {
    $("#messageform").on("submit", async function(event) {
        event.preventDefault(); // Prevent form submission

        const date = new Date();
        const hour = date.getHours();
        const minute = date.getMinutes();
        const str_time = hour + ":" + (minute < 10 ? "0" : "") + minute;

        var rawText = $("#text").val().trim();

        if (rawText === "") return; // Ignore empty messages

        var userHtml = `<div class="d-flex justify-content-end mb-4">
            <div class="msg_cotainer_send">${rawText} 
            <span class="msg_time_send">${str_time}</span></div>
            <div class="img_cont_msg"><img src="https://i.ibb.co/d5b84Xw/Untitled-design.png" class="rounded-circle user_img_msg"></div></div>`;

        $("#text").val(""); // Clear input field
        $("#messageArea").append(userHtml); // Fixed ID to #messageArea
        $("#messageArea").scrollTop($("#messageArea")[0].scrollHeight);

        try {
            // Using Fetch API instead of jQuery $.ajax
            const response = await fetch('chatbot.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: 'message=' + encodeURIComponent(rawText)
            });

            const data = await response.json();

            var botHtml = `<div class="d-flex justify-content-start mb-4">
                <div class="img_cont_msg"><img src="https://cdn-icons-png.flaticon.com/512/387/387569.png" class="rounded-circle user_img_msg"></div>
                <div class="msg_cotainer">${data.response} 
                <span class="msg_time">${str_time}</span></div></div>`;

            $("#messageArea").append(botHtml);
            $("#messageArea").scrollTop($("#messageArea")[0].scrollHeight);

        } catch (error) {
            console.error('Fetch error:', error);
            var errorHtml = `
                <div class="d-flex justify-content-start mb-4">
                    <div class="msg_cotainer text-danger">
                        Error connecting to server. Please try again.
                        <span class="msg_time">${str_time}</span>
                    </div>
                </div>`;
            
            $("#messageArea").append(errorHtml);
        }
    });
});