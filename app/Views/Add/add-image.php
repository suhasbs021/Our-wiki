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
  <title>Content Submission Form</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #88a67f;
      margin: 0;
      padding: 0;
      /* display: flex; */
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }

    .form-container {
      background-color: white;
      padding: 10vh;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 70vw;
      margin: 20px auto;
      box-sizing: border-box;
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
      border-radius: 8px;
      border: 1.5px solid #343434;
    }

    .form-container input[type="file"] {
      margin-bottom: 16px;
      width: calc(100% - 16px);
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
      width: 20%;
      display: block;
      margin: auto;
    }

    .form-container button:hover {
      background-color: #45a049;
    }

    @media screen and (max-width: 600px) {
      .form-container {
        width: 90%;
      }
    }
  </style>
</head>
<body>

<div class="form-container">
  <h2>Content Submission Form</h2>
  <form action="<?= base_url('add-image') ?>" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
    <!-- <label for="content">Add Content:</label>
    <textarea id="content" name="content" placeholder="Enter content"></textarea> -->

    <label for="file">Choose File:</label>
    <input type="file" id="file" name="file">
    <span id="file-error" style="color: red; display: none;">Please select a file</span>

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
    var fileInput = document.getElementById('file');
    var fileError = document.getElementById('file-error');

    // Check if a file is selected
    if (fileInput.files.length === 0) {
      fileError.style.display = 'block'; // Show error message
      fileInput.focus(); // Focus on the file input
      return false; // Prevent form submission
    } else {
      fileError.style.display = 'none'; // Hide error message
      return true; // Allow form submission
    }
  }
</script>
<?= $this->endsection() ?>