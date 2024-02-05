<?php

class Guestbook
{
    private $conn;

    public function __construct($host, $username, $password, $database)
    {
        $this->conn = new mysqli($host, $username, $password, $database);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function getEntries($sort = 'timestamp', $search = '')
    {
        $entries = '';

        $sql = "SELECT * FROM entries ";

        if (!empty($search)) {
            $searchTerm = $this->conn->real_escape_string($search);
            $sql .= "WHERE name LIKE '%$searchTerm%' ";
        }

        $sql .= "ORDER BY $sort DESC";

        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $entries .= "<p><strong>{$row['name']}</strong> ({$row['email']}): {$row['message']} - Pievienots: {$row['timestamp']}</p>";
            }
        } else {
            $entries = "Nav ierakstu.";
        }

        return $entries;
    }

    public function closeConnection()
    {
        $this->conn->close();
    }
}
?>
