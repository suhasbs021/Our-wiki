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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
      .form-container button {
        width: 40%; /* Adjust button width for smaller screens */
      }
    }
    .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 10px;
            padding: 10px;
        }
        .image {
            position: relative;
            width: 100%;
            overflow: hidden;
            padding-bottom: 100%; /* Maintain 1:1 aspect ratio */
        }
        .image img {
            position: absolute;
            top: 0;
            left: 0;
            width: 90%;
            height: 90%;
            object-fit: cover; /* Ensure the image covers the container */
        }
        .image input[type="radio"] {
            position: absolute;
            bottom: 5px;
            right: 5px;
        }
        #imageContainer {
          width: 200px;
          height: 200px;
          margin: 10px;
          padding: 10px;
          overflow: hidden; /* Ensure that the image does not exceed the container */
          display: flex; /* Use flexbox for centering */
          justify-content: center; /* Center horizontally */
          align-items: center;
        }
        #imageContainer img {
          width: 100%;
          height: 100%;
          object-fit: cover; 
          display: flex; /* Use flexbox for centering */
          justify-content: center; /* Center horizontally */
          align-items: center;/* Resize the image to cover the container */
        }
        .btn.btn-primary{
          margin-left: 20px;
        }
  </style>
</head>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<body>

<div class="form-container">
  <h2>Topic Submission Form</h2>
  <form action="<?= base_url('add-content') ?>" method="post" enctype="multipart/form-data">
    <label for="topic">Select Topic:</label>
    <select id="topic" name="topic">
      <?php foreach ($topics as $topic): ?>
        <option value="<?= $topic['t_id'] ?>"><?= $topic['topic_name'] ?></option>
      <?php endforeach; ?>
    </select>

    <label for="subtopic">Select Subtopic:</label>
    <select id="subtopic" name="subtopic">
      <?php foreach ($subtopics as $subtopic): ?>
        <option value="<?= $subtopic['s_id'] ?>"><?= $subtopic['sub_topic_name'] ?></option>
      <?php endforeach; ?>
    </select>

    <label for="content">Add Content:</label>
    <textarea id="content" name="content" placeholder="Enter content"></textarea>
    

    
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Show Images
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Image Gallery</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="gallery">
    <?php foreach ($images as $image): ?>
        <div class="image">
            <label>
                <img src="<?= esc($image['img']) ?>" alt="Image">
                <input type="radio" name="selected_image" value="<?= esc($image['img_id']) ?>" data-image-url="<?= esc($image['img']) ?>">
            </label>
        </div>
    <?php endforeach; ?>
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="insertSelectedImage()">Insert</button>
      </div>
    </div>
  </div>
</div>
<script>
function insertSelectedImage() {
    // Get the selected radio button
    var selectedRadioButton = document.querySelector('input[name="selected_image"]:checked');

    // Check if a radio button is selected
    if (selectedRadioButton) {
        // Get the value of the selected radio button
        var selectedImageId = selectedRadioButton.value;

        // Retrieve the corresponding image URL from the data attribute of the selected radio button
        var imageUrl = selectedRadioButton.getAttribute('data-image-url');

        // Display the selected image in the image container
        var imageContainer = document.getElementById('imageContainer');
        imageContainer.innerHTML = '<img src="' + imageUrl + '" alt="Selected Image">';
    } else {
        alert("Please select an image.");
    }
}
</script>
<br>  
  <div id="imageContainer">
    <!-- Images will be displayed here dynamically -->
   
  </div>

<br>

  <button type="submit">Submit</button>
  <?php if (session()->has('success_message')) : ?>
    <div class="alert alert-success" role="alert">
        <?= session('success_message') ?>
    </div>
<?php endif ?>
  </form>
</div>

<?= $this->endsection() ?>