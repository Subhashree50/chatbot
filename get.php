<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $message = strtolower(trim($_POST['message'])); // Get user input

    $response = "I'm sorry, I don't understand that."; // Default response

    // Simple predefined responses
    $responses = [
        "hello" => "Hello! How can I assist you today?",
        "how are you" => "I'm just a bot, but I'm doing great! How can I help?",
        "heart disease" => "Heart disease includes conditions like coronary artery disease and heart failure.",
        "cancer" => "Cancer is a disease where abnormal cells divide uncontrollably.",
        "fever" => "Fever includes body heat,and it drink more water.",
        "kidney disease" => "kidney disease is a major disease and it refers to the damage or disease.",
        "spleen disease" => "The spleen is particularly prone to injury during abdominal trauma. It may also become painfully inflamed when beset with infection or cancer. These conditions also lend themselves well to ultrasonic inspection and diagnosis.",
        "Pancreatic disease"=> "Inflammation and malformation of the pancreas are readily identified by ultrasound, as are pancreatic stones (calculi), which can disrupt proper funtioning.",
        "symptoms for chicken pox" => "the chicken pox may spreed high during summer and some symptoms are fever,head ache ,loss of apietite. ",
        "symptoms of covid-19" => "the symptoms of corana are same as chicken pox but in excess you have sore throat etc..,",
    
    ];

    // Check for response
    foreach ($responses as $key => $value) {
        if (strpos($message, $key) !== false) {
            $response = $value;
            break;
        }
    }

    echo $response;
}
?>