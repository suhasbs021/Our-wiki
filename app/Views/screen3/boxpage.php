<?php
if ($userDetails['user_type'] === 'admin') {
    $this->extend('Layout/adminheader');
} else {
    $this->extend('Layout/default');
}
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
            margin-top: 100px;
            text-transform: uppercase;
        }
h3{
    text-transform: uppercase;
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
        .blur {
            filter: blur(1.5px); /* Adjust the blur radius as needed */
        }
        @media (max-width: 768px) {
            .box {
                flex-basis: calc(50% - 20px); /* Adjust for smaller screens */
            }
            
        /* Add underline to h1 */
        
    
        }

    </style>
</head>

<body>
<body>
    <h1><?php echo $contentDetails['topic_name'];?></h1>
    <div class="container">
    <?php foreach ($contentDetailss as $content): ?>
        <div class="box" onclick="fetchCId('<?php echo $content['c_id']; ?>')">
            <h3><?php echo $content['sub_topic_name']; ?></h3>
            <img src="<?= base_url($content['img'])  ?>" />
            <p class="card-text"><?php echo limit_letters($content['content_info'], 35); ?></p>
        </div>
    <?php endforeach; ?>
</div>

<script>
    function fetchCId(cId) {
        // Redirect to a new page with the c_id as a query parameter
        window.location.href = '<?php echo base_url('screen4/'); ?>' + cId;
    }
</script>

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

<script>
        // JavaScript to toggle the blur class on all boxes except the one being hovered
        const boxes = document.querySelectorAll('.box');

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