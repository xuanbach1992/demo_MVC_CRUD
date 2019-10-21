
<form action="" method="post">
    <table>
        <tr>
            <td>Name</td>
            <td><input type="text" name="name" value="<?php echo $customer->name ?>"></td>
        </tr>
        <tr>
            <td>Address</td>
            <td><input type="text" name="address" value="<?php echo $customer->address ?>"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" name="email" value="<?php echo $customer->email ?>"></td>
        </tr>
        <tr>
            <td><input type="submit" value="Update"></td>
        </tr>
    </table>
</form>