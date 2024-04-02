<?php
    $this->extend('Layout/adminheader');
?>
<?php
$this->section('content');
?>
    <title>Document</title>

    <style>
        /* Add this to the existing styles */

        /* Container styles */
        body {
            background: #fea38b;
            margin: 0;
            padding: 0;
        }

        .table-container {
            padding: 20px;
            background-color: #88a67f;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            max-width: 1300px;
            margin: 20px auto;
            border-radius: 10px;
            overflow-x: auto;
            margin-top: 100px;
        }

        /* Table styles */
        .styled-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 18px;
            table-layout: fixed; /* Added to fix table size */
        }

        .styled-table th,
        .styled-table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            width: 25%; /* Equal width for each column */
            word-wrap: break-word; /* Added for long content */
        }

        .styled-table th {
            background-color: burlywood;
            color: #fff;
        }

        

        .heading {
            color: blue;
            font-size: 50px;
            text-align: center;
        }

        /* Larger font size and emphasis for column 2 */
        .styled-table td:nth-child(2) {
            font-size: 20px;
            font-weight: bold;
            color: navy;
        }
    </style>
</head>

<body>

    <div class="table-container">
        <div class="heading">Content</div>
        <table class="styled-table">
            <tbody>
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Topics</th>
                    <th>Remark</th>
                    <th>Action</th>
                </tr>
            </thead>
                <?php foreach($data as $data): ?>
                <tr>
                    <td data-label="Column 1"><?php echo $data['user_id']; ?></td>
                    <td data-label="Column 2"><?php echo $data['content_info']; ?></td>
                    <td data-label="Column 3"><?php echo $data['status']; ?></td>
                    <td data-label="Column 4">


                        <button type="button" class="btn btn-danger" onclick="window.location.href='<?php echo base_url('contapp/'.$data['c_id'])?>'">Approve</button>
                        <button type="button" class="btn btn-danger" onclick="window.location.href='<?php echo base_url('contdis/'.$data['c_id'])?>'">Disapprove</button>

                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
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
