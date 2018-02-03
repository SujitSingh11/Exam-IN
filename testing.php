<?php
    include 'db/database.php';
    session_start();

    $sql_stud = "SELECT users.user_id AS user_id, student.stud_id AS stud_id, users.first_name AS first_name, users.last_name AS last_name, users.username AS username, users.email AS email, users.active AS active
            FROM Users
            INNER JOIN student ON student.user_id = users.user_id";

    $sql_staff = "SELECT users.user_id AS user_id, staff.staff_id AS staff_id, users.first_name AS first_name, users.last_name AS last_name, users.username AS username, users.email AS email, users.active AS active
                FROM Users
                INNER JOIN staff ON staff.user_id = users.user_id";
    $result_stud = mysqli_query($conn,$sql_stud);
    $result_staff = mysqli_query($conn,$sql_staff);
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include 'include/meta_include.php' ?>
        <meta charset="utf-8">
        <title>Testing</title>
        <?php include 'include/css_include.php' ?>
    </head>
    <body>
        <div class="container">
            <h4>Student Users</h4>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">User ID</th>
                        <th scope="col">Student ID</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Account</th>
                        <th scope="col" colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while ($row = mysqli_fetch_assoc($result_stud)) {
                            $i = 0;
                            if ($row['active']==0) {
                                $active = "Unactive";
                            }
                            if ($row['active']==1) {
                                $active = "Active";
                            }
                            echo "<tr>
                                    <th scope='row'>".($i+1)."</th>
                                    <td>".$row['user_id']."</td>
                                    <td>".$row['stud_id']."</td>
                                    <td>".$row['first_name']."</td>
                                    <td>".$row['last_name']."</td>
                                    <td>".$row['username']."</td>
                                    <td>".$row['email']."</td>
                                    <td>".$active."</td>
                                    <td><a href='#'><i class='far fa-edit'></i></a></td>
                                    <td><a href='#'><i class='far fa-trash-alt'></i></a></td>
                                </tr>";
                        }
                    ?>
                </tbody>
            </table>
            <hr>
                <h4>Staff Users</h4>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">User ID</th>
                        <th scope="col">Staff ID</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Account</th>
                        <th scope="col" colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while ($row = mysqli_fetch_assoc($result_staff)) {
                            $i = 0;
                            if ($row['active']==0) {
                                $active = "Unactive";
                            }
                            if ($row['active']==1) {
                                $active = "Active";
                            }
                            echo "<tr>
                                    <th scope='row'>".($i+1)."</th>
                                    <td>".$row['user_id']."</td>
                                    <td>".$row['staff_id']."</td>
                                    <td>".$row['first_name']."</td>
                                    <td>".$row['last_name']."</td>
                                    <td>".$row['username']."</td>
                                    <td>".$row['email']."</td>
                                    <td>".$active."</td>
                                    <td><a href='#'><i class='far fa-edit'></i></a></td>
                                    <td><a href='#'><i class='far fa-trash-alt'></i></a></td>
                                </tr>";
                        }
                    ?>
        </tbody>
    </table>
        </div>
        <?php include 'include/js_include.php' ?>
    </body>
</html>
