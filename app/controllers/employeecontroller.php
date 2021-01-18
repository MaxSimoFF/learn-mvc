<?php
namespace PHPMVC\Controllers;

use PHPMVC\Lib\Database\Database;
use PHPMVC\Models\EmployeeModel;

class EmployeeController extends AbstractController {
    public function defaultAction()
    {
        $this->_data['employees'] = EmployeeModel::getAll();
        $this->_view();
    }

    public function addAction()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            if (isset($_POST['add_employee']))
            {
                $this->_data['input'] = [
                    'first_name' => $_POST['first_name'],
                    'last_name' => $_POST['last_name'],
                    'username' => $_POST['username'],
                ];
                if (empty($_POST['first_name'])) {
                    $this->_data['first_name_err'] = 'First name field is empty';
                } elseif (empty($_POST['last_name'])) {
                    $this->_data['last_name_err'] = 'Last name field is empty';
                } elseif (empty($_POST['username'])) {
                    $this->_data['username_err'] = 'Username field is empty';
                } elseif (empty($_POST['password'])) {
                    $this->_data['password_err'] = 'Password field is empty';
                } elseif (empty($_POST['confirm_password'])) {
                    $this->_data['confirm_password_err'] = 'Confirm password field is empty';
                } elseif ($_POST['password'] !== $_POST['confirm_password']) {
                    $this->_data['password_match_err'] = 'passwords does not match';
                } elseif (EmployeeModel::checkExistEmployee($_POST['username']) != 0) {
                    $this->_data['username_err'] = 'Username Already Exist';
                } else {
                    $firstName = filter_var($_POST['first_name'], FILTER_SANITIZE_STRING);
                    $lastName = filter_var($_POST['last_name'], FILTER_SANITIZE_STRING);
                    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
                    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                    $emp = EmployeeModel::addEmployee($firstName, $lastName, $username, $password);
                    if ($emp) {
                        $this->_data['success_add_employee'] = 'Employee Added Successfully';
                    } else {
                        $this->_data['error_add_employee'] = 'Something Went Wrong.';
                    }
                }
            }
        }
        $this->_view();
    }

    public function editAction() // work on this
    {
        $id = filter_var($this->getParams()[0], FILTER_SANITIZE_NUMBER_INT);
        if (empty($id)) {
            header('Location: /employee/');
            exit();
        }
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            if (empty($_POST['first_name'])) {
                $this->_data['first_name_err'] = 'First name field is empty';
            } elseif (empty($_POST['last_name'])) {
                $this->_data['last_name_err'] = 'Last name field is empty';
            } elseif (empty($_POST['username'])) {
                $this->_data['username_err'] = 'Username field is empty';
            } else {
                $firstName = filter_var($_POST['first_name'], FILTER_SANITIZE_STRING);
                $lastName = filter_var($_POST['last_name'], FILTER_SANITIZE_STRING);
                $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
                $emp = EmployeeModel::editEmployee($firstName, $lastName, $username, $id);
                if ($emp) {
                    $this->_data['success_add_employee'] = 'Edited Successfully.';
                } else {
                    $this->_data['warning_add_employee'] = 'You do not edit any of the information.';
                }
            }
        }
        $this->_data['employee'] = EmployeeModel::getEmployee($id);
        $this->_view();
    }

    public function deleteAction()
    {
        $id = filter_var($this->getParams()[0], FILTER_SANITIZE_NUMBER_INT);
        if (empty($id)) {
            header('Location: /employee/');
            exit();
        } else {
            $countRowDeleted = EmployeeModel::deleteEmployee($id);
            if ($countRowDeleted) {
                session_start();
                $_SESSION['success_deleted'] = 'Deleted Successfully';
                header('location: /employee/');
                exit();
            }
        }

    }



}