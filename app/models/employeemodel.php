<?php

namespace PHPMVC\Models;
use PHPMVC\Lib\Database\Database;

class EmployeeModel extends Database
{

   public static function getAll()
   {
       $data = self::query("SELECT * from employee");
       return $data;
   }

   public static function getEmployee($id)
   {
       return self::query("SELECT * from employee where id = ?", [$id]);
   }

   public static function addEmployee($firstName, $lastName, $username, $password)
   {
       $values = [$firstName, $lastName, $username, $password];
       $data = self::query("Insert into employee (first_name, last_name, username, password, date) VALUES(?, ?, ?, ?, NOW())", $values, 'count');
       return $data;
   }

   public static function checkExistEmployee($username)
   {
       $data = self::query("SELECT * from employee where username = ?", [$username], 'count');
       return $data;
   }

    public static function deleteEmployee($id)
   {
       $delete = self::query("DELETE FROM employee where id = ?", [$id], 'count');
       return $delete;
   }

   public static function editEmployee($firstname, $lastname, $username, $id)
   {
        $edit = self::query("UPDATE employee set first_name = ?, last_name = ?, username = ? where id = ?", [$firstname, $lastname, $username, $id], 'count');
        return $edit;
   }
}