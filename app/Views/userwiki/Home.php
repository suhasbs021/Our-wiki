<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to OurWiki</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: white;
            background-size: 600% 600%;
            animation: gradient 15s ease infinite;
        }
        .header {
            background: linear-gradient(45deg, #ff4b2b, #FFFFFF);
            background-size: 1400% 400%;
            animation: gradient 15s ease infinite;
            color: #fff;
            padding: 150px;
            display: flex;
            align-items: center;
            justify-content: space-between;
         
            animation: fadeIn 1s ease-out; /* Animation for fading in */
        }
        .title {
            font-size: 34px;
            text-align: center;
            margin-left:1px; /* Align title to the center */
        }
        .website-image {
            max-width: 1400%;
            height: 45vh;
            margin-top: 70px;
            margin-bottom:70px;
            margin-right: 20px; 
            margin-left:35px;/* Adjust margin for smaller screens */
        }
        .get-started-btn, .transparent-btn {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            font-size: 14px;
            margin-top: 40px; /* Adjust margin for smaller screens */
            transition: background-color 0.3s ease;
            animation: slideUp 1s ease-out;
        }
        .get-started-btn:hover, .transparent-btn:hover {
            background-color: #0056b3;
        }
        .trending-topics-container {
            background-color: #f5f5f5;
            padding: 20px;
            text-align: center;
            animation: fadeIn 1s ease-out;
            margin-top: 20px; /* Adjust margin for smaller screens */
        }
        .trending-topics h2 {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center; /* Align trending topics title to the center */
        }
        .topic-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center; /* Align topics to the center */
        }
        .topic {
            width: calc(33.33% - 20px); /* Adjusted width for three topics in a row */
            margin-right: 20px; /* Add some space between topics */
            margin-bottom: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            overflow: hidden;
            transition: transform 0.3s ease;
        }
        .cc{
            color: yellowgreen;
            text-align: center;
            font-size: 2em;
        }
        .topic:hover {
            transform: translateY(-5px);
        }
        .topic img {
            width: 100%;
            height: auto;
        }
        .topic-content {
            padding: 20px;
        }
        .topic-title {
            margin-top: 0;
            margin-bottom: 10px;
        }

        /* Keyframe animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
        @keyframes slideUp {
            from {
                transform: translateY(50px);
            }
            to {
                transform: translateY(0);
            }
        }
        @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }
        .transparent-btn {
            background-color: transparent;
            border: 1px solid #fff;
            color: #fff;
            padding: 10px 20px;
            border-radius: 20px;
            cursor: pointer;
            font-size: 14px;
            margin-left: 10px;
            transition: background-color 0.3s ease;
        }

        .transparent-btn:hover {
            background-color: rgba(255, 255, 255, 0.3);
        }

        /* Responsive adjustments */
        @media screen and (max-width: 768px) {
            .header {
                flex-direction: column;
                text-align: center;
            }
            .title {
                font-size: 20px;
                margin-top: 20px;
            }
            .website-image {
                margin-top: 20px;
            }
            .get-started-btn, .transparent-btn {
                margin-top: 20px;
            }
            .trending-topics-container {
                margin-top: 20px;
            }
            .topic-container {
                justify-content: center;
            }
            .topic {
                width: calc(50% - 20px);
            }
        }

        @media screen and (max-width: 480px) {
            .title {
                font-size: 18px;
            }
            .get-started-btn, .transparent-btn {
                padding: 8px 16px;
                font-size: 12px;
            }
            .topic {
                width: calc(100% - 20px);
            }
        }
    </style>
</head>
<body>
    <div class="header" id="header">
        <div class="title">
            <h1>Welcome to OurWiki</h1>
            <p>Your go-to destination for information and knowledge sharing.</p>
            <button class="get-started-btn" onclick="scrollToTrendingTopics()">Get Started</button>
            <a href="login" class="transparent-btn">Login</a>
            <a href="user-add" class="transparent-btn">Sign Up</a>
        </div>
        <img src="https://www.seoclerk.com/pics/t/000/019/141/1f0012ede6bbcadb41c74b47700603b2.jpg" alt="Website Image" class="website-image">
    </div>
    <div class="container">
    <div class="cc"> <h1>Trending Topics</h1></div>
    <div class="topic-container" id ="topic-container">
        <!-- Trending Topics Section -->
          
            
            

                <!-- Rest of the trending topics -->
                <?php foreach ($trendingTopics as $index => $topic): ?>
    
        <div class="topic" data-tid="<?php echo $topic['t_id']; ?>">
            <img src="<?php echo $topic['img']; ?>" alt="<?php echo $topic['topic_name']; ?>">
            <div class="topic-content">
                <h3 class="topic-title">#<?php echo $topic['topic_name']; ?></h3>
            </div>
        </div>
 
<?php endforeach; ?>

            </div>
        </div>
    </div>

    <!-- JavaScript for scrolling to trending topics -->
    <script>
        function scrollToTrendingTopics() {
    const trendingTopicsContainer = document.querySelector('.topic-container'); // Using class selector
    const headerHeight = document.getElementById('topic-container').offsetHeight;
    const trendingTopicsOffset = trendingTopicsContainer.offsetTop;
    const scrollTo = trendingTopicsOffset - headerHeight;
    window.scrollTo({
        top: scrollTo,
        behavior: 'smooth'
    });
}
    </script>
    <script>
    document.querySelectorAll('.topic-container').forEach(container => {
    container.addEventListener('click', function() {
        const tid = this.getAttribute('data-tid');
        increaseCount(tid);
    });
});

function increaseCount(tid) {
    // Make an AJAX request to your backend to increase the count
    fetch('/increaseCount/' + tid, {
        method: 'POST',
        // Add any necessary headers or data here
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        console.log('Count increased successfully:', data);
        // Optionally, update the UI to reflect the increased count
    })
    .catch(error => {
        console.error('There was a problem increasing the count:', error);
    });
}

</script>
</body>
</html>
