<?php

namespace Kickstart;

class Analytics
{

    protected $db;

    public function __construct()
    {
        $path = realpath('../');
        $path .= '/analytics/analytics.db';

        $this->db = new \PDO('sqlite:' . $path);

        $this->createTable();
    }

    protected function createTable()
    {
        $this->db->query("CREATE TABLE IF NOT EXISTS analytics(install_id int, email text, type text not null, item text not null, created int)");
    }

    public function saveData($install_id, $email, $type, $item)
    {
        $statement = $this->db->prepare('INSERT INTO analytics VALUES(:install_id, :email, :type, :item, :date)');

        $statement->execute([
        ':install_id' => $install_id,
        ':email' => $email,
        ':type' => $type,
        ':item' => $item,
        ':date' => time(),
        ]);

        return $this->db->lastInsertId();
    }
}
