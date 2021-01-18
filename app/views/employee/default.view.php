<div class="btn-toolbar">
    <a href="/employee/add" class="btn btn-primary text-light">New User</a>
    <?php
    session_start();
    if (isset($_SESSION['success_deleted']))
        echo '<div class="alert alert-success alert-dismissible fade show mb-0 w-25 text-center m-auto" role="alert">' . $_SESSION["success_deleted"] . '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button></div>';
        unset($_SESSION['success_deleted']);
    ?>
</div>
<table class="table table-hover text-dark">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Username</th>
        <th scope="col">Date</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 1; ?>
    <?php foreach ($employees as $emp => $value) { ?>
        <tr>
            <th scope="row"><?= $i++ ?></th>
            <td><?= $value['first_name'] ?></td>
            <td><?= $value['last_name'] ?></td>
            <td><?= $value['username'] ?></td>
            <td><?= $value['date'] ?></td>
            <td>
                <a href="/employee/edit/<?= $value['id'] ?>"><i class="fa fa-edit"></i></a>
                <i class="fa fa-times delete" data-id="<?= $value['id'] ?>"></i>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>