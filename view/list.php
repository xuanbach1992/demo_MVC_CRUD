<a href="index.php?page=add">ADD</a><br>
<label><h1>Danh sach khach hang</h1></label>
<table>
    <tr>
        <td>ID</td>
        <td>Name</td>
        <td>Address</td>
        <td>Email</td>
    </tr>
    <?php foreach ($customers as $value): ?>
    <tr>
        <td><?php echo $value->id ?></td>
        <td><?php echo $value->name ?></td>
        <td><?php echo $value->address ?></td>
        <td><?php echo $value->email ?></td>
        <td><a href="index.php?page=del&id=<?php echo $value->id ?>" onclick="return confirm('Are you sure?')">DELETE</a></td>
        <td><a href="index.php?page=edit&id=<?php echo $value->id ?>"onclick="return confirm('Edit?')" >EDIT</a></td>
        <?php endforeach; ?>
</table>
