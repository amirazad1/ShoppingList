<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\App;
use App\Core\DB;

class ShopList
{
    protected DB $db;
    //todo:hard coded must be changed
    protected string $table="list_items";

    public function __construct()
    {
        $this->db = App::db();
    }


    public function init(): string
    {
        //for creating table
        //todo:It's better to separate this function and move to a class for creating database structure or migration
        try {
            $sql = "CREATE TABLE ".$this->table." ( 
                       `id` bigint(20) NOT NULL,
                       `name` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
                       `qty` int(11) NOT NULL,
                       `done` tinyint(1) NOT NULL DEFAULT 0
                 ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();

            $sql = "ALTER TABLE `list_items`
                     ADD PRIMARY KEY (`id`);";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();

            $sql = "ALTER TABLE `list_items`
                   MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
        }
        catch(\Exception $e){
            return $e->getMessage();
        }
        return 'Table Create Successfully';
    }

    public function get(array $cols = [])
    {
        $columns = count($cols) === 0 ? '*' : implode(',', $cols);
        $stmt = $this->db->prepare("SELECT $columns FROM $this->table");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function create(array $data = [])
    {
        //todo:very important: check sql injection
        if (count($data) > 0) {
            $columns = implode(',', array_keys($data));
            $values = implode(',', array_map(function ($val) {
                return "'$val'";
            }, array_values($data)));
            // MUST Bind values later
            // LIKE: $this->db->->bind(':title', $data['title']);
            $stmt = $this->db->prepare("INSERT $this->table ($columns) VALUES ($values)");
            return $stmt->execute();
        }

        return false;
    }

    public function update(int $id, array $data = [])
    {
        //todo:can improve and make it generic
        //todo:very important: check sql injection
            $stmt = $this->db->prepare("UPDATE $this->table SET name='".$data['name']."',qty=".$data['qty'].",done=".$data['done']." WHERE id=" . $id);
            return $stmt->execute();
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM $this->table WHERE id=" . $id);
        return $stmt->execute();
    }
}
