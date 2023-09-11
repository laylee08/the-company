<?php
require "Database.php";

// User is a child class of Database
class User extends Database {

    public function createUser($first_name, $last_name, $username, $password){

        $sql = "INSERT INTO users(first_name, last_name, username, `password`)
                VALUES('$first_name', '$last_name', '$username', '$password')";

        if($this->conn->query($sql)){
            //go to Login
            header("location: ../views"); //views/ index.php
            exit;
        }else{
            die("Error adding user: ". $this->conn->error);
        }
    }

    public function login($username, $password){

        $sql = "SELECT * FROM users WHERE username='$username'";

        $result = $this->conn->query($sql);

        // check if user is found
        if($result->num_rows == 1){
            $user_details = $result->fetch_assoc(); //get 1 row

            // check password (submitted password vs database password)
            if(password_verify($password, $user_details['password'])){
            //login (create session variable)
            session_start();
            $_SESSION['user_id'] = $user_details['id'];
            $_SESSION['username'] = $user_details['username'];

            // go to dashboard
            header("location:../views/dashboard.php");
            exit;
            }else{
                die("Incorrect password");
            }
        }else{
            die("Could not find user '$username'");
        }
    }

    public function getUsers(){
        $sql = "SELECT * FROM users";

        if($result = $this->conn->query($sql)){
            return $result;
        }else{
            die("Cannot retrieve users: ".$this->conn->error);
        }
    }

    public function getUser($id){
        $sql = "SELECT * FROM users WHERE id=$id";
        
        if($result = $this->conn->query($sql)){
            return $result->fetch_assoc(); //return 1 row
        }else{
            die("Cannot retrive user: ".$this->conn->error);
        }
    }

    public function updateUser($id, $first_name, $last_name, $username){
        $sql = "UPDATE users SET first_name='$first_name',
                                 last_name = '$last_name',
                                 username = '$username'
                            WHERE id = $id";
        if($this->conn->query($sql)){
            //go to dashboard
            header("location: ../views/dashboard.php");
            exit;
        }else{
            die("Error updating user: ".$this->conn->error);
        }

    }

    public function deleteUser($id){
        $sql = "DELETE FROM users WHERE id=$id";

        if($this->conn->query($sql)){
            //go to dashboard
            header("location: ../views/dashboard.php");
            exit;
        }else{
            die("Error deleting user: ".$this->conn->error);
        }
    }

    public function uploadPhoto($id, $file_name, $tmp_path){
        //update the photo column in the table
        $sql = "UPDATE users SET photo = '$file_name' WHERE id=$id";
        
        if($this->conn->query($sql)){
        // move the file from temporary location to images folder
        $destination = "../images/$file_name";
        if(move_uploaded_file($tmp_path, $destination)){
            //go to profile page
            header("location: ../views/profile.php");
            exit;
        }else{
            die("Cannot move file.");
        }
        
    }else{
        die("Error updating photo: ".$this->conn->error);
    }
    }

    public function deleteProfile($id){
        $sql = "DELETE FROM users WHERE id"= .$id;

        if($this->conn->query($sql)){
            //go to logout
            header("location: ../actions/logout.php");
            exit;
        }else{
            die("Error deleting profile: ".$this->conn->error);
        }
    }



    
}