<?php $this->extend('Layout/default'); ?>
<?php $this->section('content'); ?>

    <title>Clickable Boxes</title>

    <style>
        body {
            background: linear-gradient(180deg, #ff4b2b, #FFFFFF);
            margin-top: 100px;
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
</head><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        /* Add this to the existing styles */

        /* Container styles */
        body {
            background: #fea38b;
        }

        .table-container {
            padding: 20px;
            background: linear-gradient(0deg, #ff4b2b, #FFFFFF);
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            max-width: 1300px;
            margin: 20px auto;
            border-radius: 10px;
        }

        /* Table styles */
        .styled-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 18px;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .styled-table th,
        .styled-table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .styled-table th {
            background-color: #8093F1;
            color: #fff;
        }

        /* Hover effect */
        .styled-table tbody tr:hover {
            background-color: lightcoral;
            transform: scale(1.02);
            transition: background-color 0.3s, transform 0.3s;
        }

        .heading {
            color: blue;
            font-size: 50px;
            text-align: center;
        }
    </style>
</head>

<body>

    <div class="table-container">
        <div class="heading">Topics</div>
        <table class="styled-table">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Topic</th>
                    <th>Subtopic</th>
                    <th>Content</th>
                    <th>Remark</th>
                </tr>
            </thead>
            <tbody>
            <tbody>
                <?php foreach($pendingTopics as $data): ?>
                    <tr>
                        <td data-label="Column 1"><?php echo $data['user_id']; ?></td>
                        <td data-label="Column 2"><?php echo $data['topic_name']; ?></td>
                        <td data-label="Column 3"><?php echo $data['sub_topic_name']; ?></td>
                        <td data-label="Column 4"><?php echo $data['content']; ?></td>
                        <td data-label="Column 5"><?php echo $data['status']; ?></td>
                       
                       
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            </tbody>
        </table>
        <?php if(session()->has('success')): ?>
    <div class="alert alert-success" role="alert">
        <?php echo session()->getFlashdata('success'); ?>
    </div>
<?php endif; ?>
    </div>
<br>
<br>
<br>
<br>
<br>
<br>
    <?= $this->endsection() ?>

