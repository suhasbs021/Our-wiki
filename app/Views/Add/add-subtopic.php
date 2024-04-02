<?php
if ($userDetails['user_type'] === 'admin') {
    $this->extend('Layout/adminheader');
} else {
    $this->extend('Layout/default');
}
?>
<?php
$this->section('content');
?>
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
      padding: 10vh;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 70vw;
      margin: 20px auto; /* Center the form horizontally */
      box-sizing: border-box; /* Ensure padding and border are included in the width */
      margin-top: 100px;
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

    .form-container input,
    .form-container textarea,
    .form-container select {
      width: 100%;
      padding: 10px;
      margin-bottom: 16px;
      box-sizing: border-box;
      border-radius: 8px; /* Make textboxes round */
      border: 1.5px solid 	#343434; /* Smoke white border color */
    }

    .form-container input[type="file"] {
      margin-bottom: 16px;
      width: calc(100% - 16px); /* Adjusted width to accommodate padding */
      display: inline-block;
      border-color: whitesmoke;
    }

    .form-container button {
      background-color: #4caf50;
      color: #fff;
      padding: 10px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      width: 20%; /* Make the button full width */
      display: block; /* Make the button a block element to center it */
      margin: auto; /* Center the button horizontally */
    }

    .form-container button:hover {
      background-color: #45a049;
    }

    /* Media query for responsiveness */
    @media screen and (max-width: 600px) {
      .form-container {
        width: 90%;
      }
    }
  </style>
</head>
<body>

<div class="form-container">
  <h2>Topic Submission Form</h2>
  <form action="<?= base_url('add-subtopic') ?>" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
    <label for="topic">Select Topic:</label>
    <select id="topic" name="topic">
      <?php foreach ($topics as $topic): ?>
          <option value="<?= $topic['t_id'] ?>"><?= $topic['topic_name'] ?></option>
      <?php endforeach; ?>
    </select>

    <label for="subtopic">Add Subtopic:</label>
    <input type="text" id="subtopic" name="subtopic" placeholder="Enter subtopic">
    <span id="subtopic-error" style="color: red; display: none;">Subtopic field cannot be empty</span>

    <button type="submit" id="submit-btn">Submit</button>
    <?php if (session()->has('success_message')) : ?>
    <div class="alert alert-success" role="alert">
        <?= session('success_message') ?>
        </div>
<?php endif ?>
  </form>
</div>

<script>
  function validateForm() {
    var subtopicInput = document.getElementById('subtopic');
    var subtopicError = document.getElementById('subtopic-error');

    // Check if the subtopic input is empty
    if (subtopicInput.value.trim() === '') {
      subtopicError.style.display = 'block'; // Show error message
      subtopicInput.focus(); // Focus on the input field
      return false; // Prevent form submission
    } else {
      subtopicError.style.display = 'none'; // Hide error message
      return true; // Allow form submission
    }
  }
</script>
<?= $this->endsection() ?>
