<?php
include_once "model/DBconnect.php";
include_once "model/Customers.php";
include_once "model/CustomerManager.php";
include_once "conntroller/ControllerCustomer.php";
$customControl = new \controller\ControllerCustomer();
$page = isset($_GET["page"]) ? ($_GET["page"]) : null;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        table, tr, td {
            border: solid 1px black;
        }
    </style>
    <title>Document</title>
</head>
<body>

<?php
switch ($page) {
    case "list":
        $customControl->getList();
        break;
    case "del":
        $customControl->destroy();
        break;
    case "add":
        $customControl->addCustomer();
        break;
    case "edit":
        $customControl->editCustomer();
        break;
    default:
        $customControl->getList();
        break;
}
?>
</body>
</html>
