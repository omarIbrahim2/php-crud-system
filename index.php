<?php

require_once "models/user.php";
require_once "database/MySqldatabase.php";

session_start();

$user = new user();

$users = $user->select("name", "email", "id")->getAll();



?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>Dashboard</title>
</head>

<body>
    <div class="m-5">
        <div class="container">
            <?php if (isset($_SESSION['success'])) { ?>

                <div class="alert alert-danger"><?php echo $_SESSION['success'] ?></div>
                <?php session_destroy() ?>
            <?php } ?>
            <?php if (isset($_SESSION['createSUCC'])) { ?>

                <div class="alert alert-primary"><?php echo $_SESSION['createSUCC'] ?></div>
                <?php session_destroy() ?>
            <?php } ?>

            <?php if (isset($_SESSION['update'])) { ?>

                <div class="alert alert-primary"><?php echo $_SESSION['update'] ?></div>
                <?php session_destroy() ?>
            <?php } ?>
            <div class="row">
                <div class="col-md-6">
                    <h1>Users</h1>
                </div>
                <div class="col-md-6">
                    <a class="btn btn-primary" href="http://localhost/pdo/createForm.php">Create user</a>
                </div>
            </div>

            <table class="table">
                <thead>
                    <tr>

                        <th scope="col">Name</th>
                        <th scope="col">email</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user) { ?>

                        <tr>
                            <td><?php echo $user->name ?></td>
                            <td><?php echo $user->email ?></td>
                            <td>
                                <a class="btn btn-secondary" href="http://localhost/pdo/updateForm.php?id=<?php echo $user->id ?>">Edit</a>
                                <a class="btn btn-danger" href="http://localhost/pdo/UsersActions/delete.php?id=<?php echo $user->id ?>">Delete</a>
                            </td>

                        </tr>
                    <?php } ?>


                </tbody>
            </table>

        </div>

    </div>