<?php

namespace App\Models;

class User
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function all()
    {
        $sql = "SELECT * FROM users";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

