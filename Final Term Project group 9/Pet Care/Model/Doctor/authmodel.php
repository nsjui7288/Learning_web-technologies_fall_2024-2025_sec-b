<?php

class AuthModel {
    private $db;

    public function __construct($dbConnection) {
        $this->db = $dbConnection;
    }


    public function registerDoctor($name, $email, $password) {
        $Pass = base64_encode($password);

        $query = "INSERT INTO doctors (name, email, password) VALUES (:name, :email, :password)";
        $result = $this->db->prepare($query);

        if ($result->execute([':name' => $name, ':email' => $email, ':password' => $encodedPassword])) {
            return true;
        } else {
            return false;
        }
    }

    public function loginDoctor($email, $password) {
        $query = "SELECT * FROM doctors WHERE email = :email";
        $result = $this->db->prepare($query);
        $result->execute([':email' => $email]);

        $doctor = $result->fetch(PDO::FETCH_ASSOC);

        if ($doctor && base64_decode($doctor['password']) === $password) {
            return $doctor; 
        } else {
            return false;
        }
    }

    
    public function getDoctorById($id) {
        $query = "SELECT id, name, email FROM doctors WHERE id = :id";
        $result = $this->db->prepare($query);
        $result->execute([':id' => $id]);

        return $result->fetch(PDO::FETCH_ASSOC);
    }

    
    public function updateDoctor($id, $name, $email, $password = null) {
        if ($password) {
            $encodedPassword = base64_encode($password);
            $query = "UPDATE doctors SET name = :name, email = :email, password = :password WHERE id = :id";
            $result = $this->db->prepare($query);
            return $result->execute([':name' => $name, ':email' => $email, ':password' => $encodedPassword, ':id' => $id]);
        } else {
            $query = "UPDATE doctors SET name = :name, email = :email WHERE id = :id";
            $result = $this->db->prepare($query);
            return $result->execute([':name' => $name, ':email' => $email, ':id' => $id]);
        }
    }

    
    public function deleteDoctor($id) {
        $query = "DELETE FROM doctors WHERE id = :id";
        $result = $this->db->prepare($query);
        return $result->execute([':id' => $id]);
    }
}

?>
