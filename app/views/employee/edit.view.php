<div class="container register">
<?php
    echo isset($success_add_employee) ? '<div class="alert alert-success alert-dismissible fade show mb-1 w-50 text-center float-right" role="alert">' . $success_add_employee . '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button></div>' : '';
    echo isset($warning_add_employee) ? '<div class="alert alert-warning alert-dismissible fade show mb-1 w-50 text-center float-right" role="alert">' . $warning_add_employee . '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button></div>' : '';
?>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-3 register-left">
            <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
            <h3>Welcome</h3>
            <a href="/employee/" class="btn btn-primary">Back</a>
        </div>
        <div class="col-md-9 register-right">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <h3 class="register-heading">Edit employee info</h3>
                    <form action="<?= $_SERVER['REQUEST_URI'] ?>" method="post">
                        <div class="row register-form">
                            <div class="input-group mb-1">
                                <span class="input-group-text"><i class="fas fa-signature" style="font-size:15px;"></i></span>
                                <input type="text" class="form-control" placeholder="First name" name="first_name" value="<?= $employee[0]['first_name'] ?? ''; ?>">
                            </div>
                            <?php echo isset($first_name_err) ? '<small class="text-danger">' . $first_name_err . '</small>' : ''; ?>
                            <div class="input-group mb-1">
                                <span class="input-group-text"><i class="fas fa-signature" style="font-size:15px;"></i></span>
                                <input type="text" class="form-control" placeholder="Last name" name="last_name" value="<?= $employee[0]['last_name'] ?? '' ?>">
                            </div>
                            <?php echo isset($last_name_err) ? '<small class="text-danger">' . $last_name_err . '</small>' : ''; ?>
                            <div class="input-group mb-1">
                                <span class="input-group-text"><i class="fas fa-user" style="font-size:20px;"></i></span>
                                <input type="text" class="form-control" placeholder="Username" name="username" value="<?= $employee[0]['username'] ?? '' ?>">
                            </div>
                            <?php echo isset($username_err) ? '<small class="text-danger">' . $username_err . '</small>' : ''; ?>
                            <input type="submit" name="edit_employee" class="form-control btn-primary" value="Edit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
