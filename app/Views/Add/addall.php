<?php
if ($userDetails['user_type'] === 'admin') {
    $this->extend('Layout/adminheader');
} else {
    $this->extend('Layout/default');
}
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
            margin: 100px auto;

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

        h1 {
            font-size: 3em;
            text-align: center;
        }

        /* Hover effect */
        .box:hover {
            background-color: #ee5851;
        }
    </style>
</head>

<body>
    <h1>ADD</h1>
    <div class="container">

        <table>
            <tr>
                <td><a href="<?php echo base_url('add'); ?>" class="box">Topics</a></td>
                <td><a href="<?php echo base_url('show-subtopic'); ?>" class="box">Sub-topics</a></td>
                <td><a href="<?php echo base_url('show-content'); ?>" class="box">Content</a></td>
                <td><a href="<?php echo base_url('show-image'); ?>" class="box">Image</a></td>
            </tr>
        </table>
    </div>
 <?= $this->endsection() ?>
