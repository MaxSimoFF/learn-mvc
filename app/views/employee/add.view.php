<div class="container register">
    <?php
    echo isset($success_add_employee) ? '<div class="alert alert-success">' . $success_add_employee . '</div>' : '';
    echo isset($error_add_employee) ? '<div class="alert alert-danger">' . $error_add_employee . '</div>' : '';
    ?>
    <div class="row">
        <div class="col-md-3 register-left">
            <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
            <h3>Welcome</h3>
            <a href="/employee/" class="btn btn-primary">Back</a>
        </div>
        <div class="col-md-9 register-right">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <h3 class="register-heading">Add new employee</h3>
                    <form action="/employee/add" method="post">
                        <div class="row register-form">
                            <div class="input-group mb-1">
                                <span class="input-group-text"><i class="fas fa-signature" style="font-size:15px;"></i></span>
                                <input type="text" class="form-control" placeholder="First name" name="first_name" value="<?= $input['first_name'] ?? ''; ?>">
                            </div>
                            <?php echo isset($first_name_err) ? '<small class="text-danger">' . $first_name_err . '</small>' : ''; ?>
                            <div class="input-group mb-1">
                                <span class="input-group-text"><i class="fas fa-signature" style="font-size:15px;"></i></span>
                                <input type="text" class="form-control" placeholder="Last name" name="last_name" value="<?= $input['last_name'] ?? '' ?>">
                            </div>
                            <?php echo isset($last_name_err) ? '<small class="text-danger">' . $last_name_err . '</small>' : ''; ?>
                            <div class="input-group mb-1">
                                <span class="input-group-text"><i class="fas fa-user" style="font-size:20px;"></i></span>
                                <input type="text" class="form-control" placeholder="Username" name="username" value="<?= $input['username'] ?? '' ?>">
                            </div>
                            <?php echo isset($username_err) ? '<small class="text-danger">' . $username_err . '</small>' : ''; ?>
                            <div class="input-group mb-1">
                                <span class="input-group-text"><i class="fas fa-key" style="font-size:20px;"></i></span>
                                <input type="password" class="form-control" placeholder="Password" name="password">
                            </div>
                            <?php echo isset($password_err) ? '<small class="text-danger">' . $password_err . '</small>' : ''; ?>
                            <div class="input-group mb-1">
                                <span class="input-group-text"><i class="fas fa-key" style="font-size:20px;"></i></span>
                                <input type="password" class="form-control" placeholder="Confirm password" name="confirm_password">
                            </div>
                            <?php echo isset($confirm_password_err) ? '<small class="text-danger">' . $confirm_password_err . '</small>' : ''; ?>
                            <?php echo isset($password_match_err) ? '<small class="text-danger">' . $password_match_err . '</small>' : ''; ?>
                            <input type="submit" name="add_employee" class="form-control btn-primary" value="Add">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>