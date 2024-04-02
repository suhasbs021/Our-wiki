<?php
// Assuming you're in some PHP controller where you handle form submission
// For example, add-topic.php



// Your view file:
if ($userDetails['user_type'] === 'admin') {
    $this->extend('Layout/adminheader');
} else {
    $this->extend('Layout/default');
}

$this->section('content');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Topic Submission Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #88a67f;
            margin: 0;
            padding: 0;
            /* display: flex; */
            justify-content: center;
            align-items: center;
            min-height: 100vh; /* Ensure a minimum height of 100% viewport height */
        }

        .form-container {
            background-color: white;
            padding: 50px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 50%;
            box-sizing: border-box; /* Ensure padding and border are included in the width */
            margin-top: 150px;
            margin-left: 25%;
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #4caf50;
        }

        .form-container label {
            display: block;
            margin-bottom: 8px;
            color: green;
        }

        .form-container input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border-radius: 8px; /* Make textboxes round */
            border: 1.5px solid #343434; /* Smoke white border color */
        }

        .form-container span {
            color: red;
            display: none;
        }

        .form-container button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            display: block; /* Make the button a block element to center it */
            margin-top: 20px;
        }

        .form-container button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<div class="form-container">
    <h2>Topic Submission Form</h2>
    <?php if(isset($success_message)): ?>
        <div style="color: green; text-align: center; margin-bottom: 20px;">
            <?= $success_message ?>
        </div>
    <?php endif; ?>
    <form action="<?= base_url('add-topic') ?>" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
        <label for="topic">Add Topic:</label>
        <input type="text" id="topic" name="topic" placeholder="Enter topic">
        <span id="topic-error">Topic field cannot be empty</span>

        <button type="submit" id="submit-btn">Submit</button>
        <?php if (session()->has('success_message')) : ?>
    <div class="alert alert-success" role="alert">
        <?= session('success_message') ?>
    </div>
<?php endif ?>

    </form>
</div>
<br>
<br>

<script>
    function validateForm() {
        var topicInput = document.getElementById('topic');
        var topicError = document.getElementById('topic-error');

        // Check if the topic input is empty
        if (topicInput.value.trim() === '') {
            topicError.style.display = 'block'; // Show error message
            topicInput.focus(); // Focus on the input field
            return false; // Prevent form submission
        } else {
            topicError.style.display = 'none'; // Hide error message
            return true; // Allow form submission
        }
    }
</script>
<?= $this->endsection() ?>
