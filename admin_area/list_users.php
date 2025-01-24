<h1 class="text-center text-dark"> <b> View users </b></h1>
    <table class="table table-bordered mt-5">
        <thead class="bg-dark text-light">
            <tr class="text-center">
                <th> S.N</th>
                <th> Username</th>
                <th> Email</th>
                <th> Address</th>
                <th> Contact</th>
                <th> Delete </th>

            </tr>
        </thead>
        <tbody class="bg-secondary text-light">
            <?php
            include("../includes/connect.php");
            global $con;
            $select_user="select * from `user_table` ";
            $result=mysqli_query($con,$select_user);
            $number=0;
            while($row=mysqli_fetch_assoc($result)){
                $user_id=$row['user_id'];
                $username=$row['username'];
                $user_email=$row['user_email'];
                $user_password=$row['user_password'];
                $user_ip=$row['user_ip'];
                $user_address=$row['user_address'];
                $user_contact=$row['user_contact'];
                $number++;
          
            ?>
            <tr class="text-center">
                <td><?php echo $number;?></td>
                <td><?php echo $username;?></td>
                <td><?php echo $user_email;?></td>
                <td><?php echo $user_address;?></td>
                <td><?php echo $user_contact;?></td>
                <td><a href='index.php?delete_user=<?php echo $user_id?>' class='text-light'> <i class='fa-solid fa-trash'> </i> </a></td>
            </tr>
        <?php 
          }
          ?>
        </tbody>
    </table>
</body>
</html>

