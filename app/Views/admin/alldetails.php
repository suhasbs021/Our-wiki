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
    <title>Responsive Flexbox Layout</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Existing styles */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(45deg, #d21404, #a29b94);
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            align-items: center;
            max-width: 1600px;
            margin: 20px auto;
            margin-top: 100px;
        }

        .box {
            flex: 0 0 calc(20% - 20px);
            background-color: white;
            padding: 20px;
            margin: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;

            border-radius: 15px;
            /* Add transition for smooth effect */
        }

        .box img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            margin-bottom: 10px;
        }

        h1 {
            color: white;
            text-align: center;
            font-size: 5em;
            font-family: "Lucida Console", Monaco, monospace;
        }

        @media (max-width: 768px) {
            .box {
                flex-basis: calc(50% - 20px);
            }
        }

        /* New styles for box hover */
        .box:hover {
            transform: scale(1.1);
            /* Scale up the box slightly on hover */
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            /* Add a stronger box shadow */
        }

        .box:hover h3 {
            color: #ff4b2b;
            /* Change the color of h3 text on hover */
        }
        
        @media (max-width: 768px) {
            .box {
                flex-basis: calc(50% - 20px); /* Adjust for smaller screens */
            }
        }
        .wrong-button {
    background-color: #ff0000; /* Red background color */
    color: #ffffff; /* White text color */
    border: none;
    padding: 5px 15px;
    border-radius: 5px;
    cursor: pointer;
    position: absolute;
    right: 0;
    top: 0; 
}

.wrong-button:hover {
    background-color: #cc0000;
    
    /* Darker red on hover */
}
.confirmation-bar {
    display: none;
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    background-color: #fff;
    border-top: 1px solid #ccc;
    padding: 10px 20px;
    box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
}

.confirmation-text {
    margin-right: 10px;
}

.confirm-btn, .cancel-btn {
    padding: 5px 10px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
}

.confirm-btn {
    background-color: #4CAF50;
    color: white;
}

.cancel-btn {
    background-color: #f44336;
    color: white;
}
.wrong-button {
    background-color: #ff0000; /* Red background color */
    color: #ffffff; /* White text color */
    border: none;
    padding: 5px 10px;
    border-radius: 5px;
    cursor: pointer;
}

.wrong-button:hover {
    background-color: #cc0000; /* Darker red on hover */
}
.view{
    padding-left: 2px;
}

    </style>
</head>

<body>
<body>

<div class="container">
    <?php foreach ($contentDetailss as $content): ?>
        <div class="box">
            <!-- Delete Button -->
            <button class="wrong-button" onclick="deleteContent('<?php echo $content['c_id']; ?>')">Delete</button>
            <br>
            <!-- View Button -->
            <button class="view" onclick="viewContent('<?php echo $content['c_id']; ?>')">View</button>

            <h3><?php echo $content['sub_topic_name']; ?></h3>
            <img src="<?= base_url($content['img'])  ?>" />
            <p class="card-text"><?php echo limit_letters($content['content_info'], 35); ?></p>
        </div>
    <?php endforeach; ?>
</div>
<?php if (session()->has('success')): ?>
        <div class="success-message">
            <?php echo session('success'); ?>
        </div>
    <?php endif; ?>

<script>
    // Function to delete content
    function deleteContent(cId) {
        // Construct the URL to delete content
        var deleteUrl = '<?php echo base_url('delete/content/'); ?>' + cId;
        // Redirect to the delete URL
        window.location.href = deleteUrl;
    }

    // Function to view content
    function viewContent(cId) {
        // Construct the URL to view content
        var viewUrl = '<?php echo base_url('screen4/'); ?>' + cId;
        // Redirect to the view URL
        window.location.href = viewUrl;
    }
</script>






 <button class="redirect-button" onclick="redirectToContent('<?php echo $content['c_id']; ?>')">
        View Content
      </button>





   
</body>
<?php
// Function to limit the number of letters in a string
function limit_letters($string, $letter_limit) {
    if (strlen($string) > $letter_limit) {
        return substr($string, 0, $letter_limit) . "...Read more";
    } else {
        return $string;
    }
}
?>

<?= $this->endsection() ?>