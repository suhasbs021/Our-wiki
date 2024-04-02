<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table>
    <thead>
        <tr>
            <a href ="<?php echo base_url('employee-add')?>">Add employee</a>
            <th>username</th>
            <th>password</th>
            <th>Email</th>
            <th>Action</th>
          
        </tr>
    </thead>
    <tbody>
        <?php foreach($employee as $row):?>
        <tr>
            <td> <?php echo $row['id'] ?> </td>
            <td> <?php echo $row['username'] ?> </td>
           <td><a href ="<?php echo base_url('employee/edit/'.$row['id'])?>">Edit</a></td> 
           <td><a href ="<?php echo base_url('employee/deletes/'.$row['id'])?>">delete</a></td> 
        </tr> 
        <?php endforeach;?>
        <!-- Additional rows can be added here -->
       
    </tbody>
</table>    

</body>
</html>