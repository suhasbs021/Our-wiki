<?php
if ($userDetails['user_type'] === 'admin') {
    $this->extend('Layout/adminheader');
} else {
    $this->extend('Layout/default');
}
?>
<?php $this->section('content');
?>
    <title>Your</title>
    <style>
        html,
        body {
            padding: 10px;
            background-color: #fbfbfb;
        }

        .container1 {
            border: 1px solid #ddd;
            font-family: Cambria;
            font-size: 20px;
            text-align: center;
            padding: 20px; /* Added padding */
        }

        .title {
            font-size: 300%;
            text-transform: uppercase;
            margin-top: 30px; /* Reduced margin */
            margin-bottom: 40px; /* Added margin */
        }

        .news-container {
            margin: 20px;
            padding: 20px;
            transform: scale(0.99);
            text-align: left;
            transition: all 0.4s;
            background-color: #fff; /* Added background color */
            border: 1px solid #ccc; /* Added border */
            border-radius: 10px; /* Added border radius */
        }

        .news-container:hover {
            box-shadow: #ccc 0px 0px 3px 5px;
            transform: scale(1.01);
        }

        .news-container .heading {
            font-size: 200%;
            margin-bottom: 20px;
            text-align: center; /* Center align heading */
        }

        .news-container .news {
        text-align: justify;
        column-gap: 20px; /* Reduced column gap */
        column-rule: none; /* Removed column rule */
        width: 100%; /* Occupy entire width */
    }


        .news-container .news img {
            width: 100%;
            margin-bottom: 20px; /* Added margin to image */
        }

        .news.col-2 {
            column-count: 2;
        }

        .news.col-3 {
            column-count: 3;
        }
        .heading{
            text-transform: uppercase;
            margin-right: 100%;
        }
    </style>
</head>
<body class="container1">
    <div class="title"><?php echo $contentDetails['topic_name']; ?></div>
    <div class="news-container">
        <div class="heading"><?php echo $contentDetails['sub_topic_name']; ?></div>
        <div class="news col-2">
            <img src="<?= base_url($contentDetails['img'])  ?>" />
            <p><?php echo $contentDetails['content_info']; ?></p>
        </div>
    </div>
</body>  
<?= $this->endsection() ?>