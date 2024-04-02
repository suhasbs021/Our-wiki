<?php
    $this->extend('Layout/adminheader');
?>
<?php
$this->section('content');
?>
    <title>Clickable Boxes</title>

    <style>
        body {
            background-color: #88a67f;
        }

        /* Container styles */
        .container {
            text-align: center;
            margin: -10px auto 100px auto;

        }



        /* Table styles */
        .container table {
            border-collapse: separate;
            border-spacing: 2px;
            margin: auto;
            /* Center the table horizontally */
        }

        /* Box styles */
        .box {
            width: 30vh;
            height: 60vh;
            cursor: pointer;
            transition: background-color 0.3s;
            font-size: 1.5em;
            font-weight: bold;
            display: table-cell;
            vertical-align: middle;
            text-decoration: none;
            text-align: center;
            border-radius: 10px;
            background: #FFB7AB;
        }

        .first {
    font-size: 3em;
    padding-left: 530px;
    padding-top: 150px;
    margin-bottom: 20px; /* Add margin bottom */
    border-spacing: 2px;

}

       
        
        /* Hover effect */
        .box:hover {
            background-color: #ee5851;
        }
    </style>
</head>

<body>
    
   <h1 class="first"><?php echo $counttopics; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $countsubtopics; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $countcontent; ?></h1>

    <div class="container">
        
        <table>
            <tr>
                <td><a href="<?php echo base_url('topic'); ?>" class="box">Topics</a></td>
                <td><a href="<?php echo base_url('subtopic'); ?>" class="box">Sub-topics</a></td>
                <td><a href="<?php echo base_url('content'); ?>" class="box">Content</a></td>
            </tr>
        </table>
    </div>
    <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
    <?= $this->endsection() ?>