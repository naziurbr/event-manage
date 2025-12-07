<?php
// classes/User.php

class User {
    protected $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Find user by email
    public function findByEmail($email) {
        return $this->db->fetch("SELECT * FROM users WHERE email = ?", [$email]);
    }

    // Find user by ID
    public function findById($id) {
        return $this->db->fetch("SELECT * FROM users WHERE id = ?", [$id]);
    }

    // Verify password (hashed)
    public function verifyPassword($user, $password) {
        return password_verify($password, $user['password']);
    }

    // Create new user (expects 3 arguments)
    public function create($name, $email, $password) {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $this->db->insert(
            "INSERT INTO users (name, email, password, role, created_at) VALUES (?, ?, ?, 'user', NOW())",
            [$name, $email, $hash]
        );
        // Return last inserted ID
        return $this->db->fetch("SELECT LAST_INSERT_ID() AS id")['id'];
    }
}
