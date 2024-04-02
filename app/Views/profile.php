<?php
if ($userDetails['user_type'] === 'admin') {
    $this->extend('Layout/adminheader');
} else {
    $this->extend('Layout/default');
}
$this->section('content');
?>

    <title>User Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        /* Your existing CSS styles */
        body {
            background-color: #f9f9fa;
            font-family: Arial, sans-serif; 
        }

        .padding {
            padding: 3rem !important;
        }

        .user-card-full {
            overflow: hidden;
            margin-top: 50px;
        }

        .card {
            border-radius: 5px;
            box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
            border: none;
            margin-bottom: 30px;
            height: 400px;
        }

        .user-profile {
            border-radius: 5px 0 0 5px;
        }

        .bg-c-lite-green {
            background: linear-gradient(to right, #ee5a6f, #f29263);
        }

        .user-profile {
            padding: 20px 0;
        }

        .card-block {
            padding: 1.25rem;
        }

        h6 {
            font-size: 14px;
        }

        .card .card-block p {
            line-height: 25px;
        }

        @media only screen and (min-width: 768px) {
            .card-block {
                padding: 1.5rem;
            }
        }

        @media only screen and (min-width: 992px) {
            .user-card-full .row {
                display: flex;
            }
            .user-card-full .col-sm-4 {
                flex: 0 0 33.333333%;
                max-width: 33.333333%;
            }
            .user-card-full .col-sm-8 {
                flex: 0 0 66.666667%;
                max-width: 66.666667%;
            }
        }

        .info-box {
            background-color: #ffffff;
            border-radius: 5px;
            padding: 10px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin-bottom: 15px;
            min-width: fit-content; 
        }

        .img-container {
            display: flex;
            justify-content: center;
            cursor: pointer;
        }

        .img-radius {
            width: 180px; /* Adjust image width */
            height: 180px; /* Adjust image height */
            border-radius: 10%;
        }
        .img-fluid {
           max-width: 100%;
          height: 100px;
            }
        .edit-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: none;
            align-items: center;
            justify-content: center;
        }

        .edit-form {
            background-color: #f9f9fa;
            padding: 20px;
            border-radius: 5px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .edit-buttons {
            display: flex;
            justify-content: space-between;
            width: 100%;
            margin-top: 10px;
        }

        .edit-profile-pic-btn {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            width: 45%;
        }

        .cancel-btn {
            background-color: #f44336;
        }
        .content-box {
            background-color: #f0f0f0; /* Background color */
            padding: 20px; /* Padding around the content */
            border-radius: 10px; /* Rounded corners */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Box shadow for depth */
            text-align: center; /* Center align text */
        }

        /* CSS for the content text */
        .content-text {
            font-weight: bold; /* Bold text */
        }

        /* Apply hover effect to content boxes */
        .content-box .card {
            transition: transform 0.3s ease;
        }

        .content-box .card:hover {
            transform: scale(1.1); /* Scale up the box slightly on hover */
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2); /* Add a stronger box shadow */
        }

        .content-box .card:hover .card-body h5 {
            color: #ff4b2b; /* Change the color of h5 text on hover */
        }

        /* Apply blur effect to other content boxes on hover */
        .content-box .card.blur {
            filter: blur(1.5px); /* Adjust the blur radius as needed */
        }
        .bigger-text {
            font-size: 24px; /* Adjust the font size as needed */
            display: block; /* Ensure it takes the full width */
            padding: 10px; /* Adjust the padding as needed */
            margin-bottom: 20px; /* Add margin at the bottom for spacing */
            color: black; 
        }

    .btn.btn-primary{
        background-color: #4CAF50;
        border: none;
        color: white;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        font-size: 16px;
        border-radius: 5px;
        cursor: pointer;
        width: 30%; 
        margin-left: -10px;
    }
   
    </style>
</head>
<body>
<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-md-12">
                    <div class="card user-card-full" style="height: 350px;"> <!-- Increased height to 400px -->
                        <div class="row m-0">
                            <div class="col-sm-4 bg-c-lite-green user-profile">
                                <div class="card-block text-center text-white">
                                    <div class="img-container" onclick="showEditProfilePic('<?php echo base_url($userDetails['profile']); ?>')">
                                        <img src="<?php echo base_url($userDetails['profile']); ?>" class="img-radius" alt="Upload-Profile-Image">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="card-block">
                                    <h2 class="m-b-20 p-b-5 b-b-default f-w-600"> Profile</h2>
                                    <div class="row">
                                        <div class="col-sm-4 info-box">
                                            <p class="m-b-10 f-w-600">Name</p>
                                            <h6 class="text-muted f-w-400" id="user-name"><?php echo $userDetails['user_name']; ?></h6>
                                        </div>
                                        <div class="col-sm-4 info-box">
                                            <p class="m-b-10 f-w-600">Age</p>
                                            <h6 class="text-muted f-w-400" id="user-age"><?php echo $userDetails['age']; ?></h6>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4 info-box">
                                            <p class="m-b-10 f-w-600">Email</p>
                                            <h6 class="text-muted f-w-400" id="user-email"><?php echo $userDetails['email']; ?></h6>
                                        </div>
                                    </div>
                                    <!-- Button added here -->
                                    <button class="btn btn-primary" onclick="redirectToStatus()">Status</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



    <div class="edit-overlay" id="edit-overlay">
        <div class="edit-form">
            <h3>Edit Profile Picture</h3>
            <!-- Form to upload new profile picture -->
            <form action="<?php echo base_url('image'); ?>" method="post" enctype="multipart/form-data">
                <input type="file" accept="image/*" name="profile_pic" id="profile-pic-input">
                <div class="edit-buttons">
                    <button type="submit" class="edit-profile-pic-btn" id="save-profile-pic">Save</button>
                    <button type="button" class="edit-profile-pic-btn cancel-btn" onclick="hideEditProfilePic()">Cancel</button>
                </div>
            </form>
        </div>
    </div>

    <div class="content-box">
    <span class="content-text bigger-text">Content</span>
    <div class="row" id="content-card-container">
        <?php foreach ($contentDetails as $content): ?>
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body text-center">
                        <!-- Topic Name with Background -->
                        <h5 class="card-title bg-primary text-white p-2 mb-3"><?php echo $content['topic_name']; ?></h5>
                        <!-- Image -->
                        <img src="<?= base_url($content['img']) ?>" class="img-fluid rounded" alt="Content Image">
                        <!-- Subtopic Name with Background -->
                        <p class="card-text bg-secondary text-white p-2 mb-3"><?php echo $content['sub_topic_name']; ?></p>
                        <!-- Content -->
                        <p class="card-text"><?php echo limit_words($content['content_info'], 30); ?>
                            <a href="<?php echo base_url('screen4/') . $content['c_id']; ?>" style="color: blue;">Read more</a>
                        </p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<script>
    // No changes needed in the JavaScript code
    function redirectToStatus() {
        var statusUrl = '<?php echo base_url("userstatus"); ?>';
        window.location.href = statusUrl;
    }
</script>

<?php
// Function to limit the number of words in a string
function limit_words($string, $word_limit) {
    $words = explode(" ", $string);
    if (count($words) > $word_limit) {
        return implode(" ", array_slice($words, 0, $word_limit)) . "...";
    } else {
        return $string;
    }
}
?>


    <script>
        // JavaScript to toggle the blur class on all boxes except the one being hovered
        const boxes = document.querySelectorAll('.content-box .card');

        boxes.forEach(box => {
            box.addEventListener('mouseenter', () => {
                // Add blur class to all boxes except the one being hovered
                boxes.forEach(otherBox => {
                    if (otherBox !== box) {
                        otherBox.classList.add('blur');
                    }
                });
            });

            box.addEventListener('mouseleave', () => {
                // Remove blur class from all boxes
                boxes.forEach(otherBox => {
                    otherBox.classList.remove('blur');
                });
            });
        });
    </script>
 <?= $this->endsection() ?>

