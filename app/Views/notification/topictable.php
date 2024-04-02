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
        }

        .table-container {
            padding: 20px;
            background-color: #88a67f;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            max-width: 1300px;
            margin: 20px auto;
            border-radius: 10px;
            margin-top: 100px;
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
                    <th>Topics</th>
                    <th>Remark</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($pendingTopics as $data): ?>
                    <tr>
                        <td data-label="Column 1"><?php echo $data['user_id']; ?></td>
                        <td data-label="Column 2"><?php echo $data['topic_name']; ?></td>
                        <td data-label="Column 3"><?php echo $data['status']; ?></td>
                        <td data-label="Column 4">
                       
                        <button type="button" class="btn btn-danger" onclick="window.location.href='<?php echo base_url('topicapp/'.$data['t_id'])?>'">Approve</button>
                        <button type="button" class="btn btn-danger" onclick="window.location.href='<?php echo base_url('topicdis/'.$data['t_id'])?>'">Disapprove</button>
                            
                        </td>
                    </tr>
                <?php endforeach; ?>
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
        <br>
<?= $this->endsection() ?>