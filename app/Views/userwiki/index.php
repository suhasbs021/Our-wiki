<div class="container">
    <div class="row">
        <div class="col-mid-12 mt-5">
            <?php
                if(session()->getFlashdata('status'))
                {
                    echo "<h4>".session()->getFlashdata('status')."</h4>";
                }
            ?>
            <div class="card">
                <div class="card-header">
                    <h2> User Wikipedia</h2>
                        
                </div>
                <a href="<?= base_url('user-add')?>" class="btn btn-primary float-right">Add User</a>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>user_type</th>
                                <th>Age</th>
                                <th>Gender</th>
                                <th>time_stamp</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($user as $row):?>

                            <tr>
                                <td><?= $row['user_id'] ?></td>
                                <td><?= $row['user_name'] ?></td>
                                <td><?= $row['email'] ?></td>
                                <td><?= $row['user_type'] ?></td>
                                <td><?= $row['age'] ?></td>
                                <td><?= $row['gender'] ?></td>
                                <td><?= $row['time_stamp'] ?></td>
                                <td>
                                    <a href="" class="btn btn-sucess btn-sm">Edit</a>
                                    <a href="" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                        </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>