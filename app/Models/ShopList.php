<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\App;
use App\Core\DB;

class ShopList
{
    protected DB $db;
    protected string $table;

    public function __construct(string $table)
    {
        $this->db = App::db();
        $this->table = $table;
    }

    public function init(): bool
    {
        $sql = "CREATE TABLE IF NOT EXISTS `list_items` ( 
  `id` bigint(20) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `qty` int(11) NOT NULL,
  `done` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;       
        ";

        $stmt = $this->db->prepare($sql);
//        if($stmt->execute())
//        {
//            $sql="ALTER TABLE `list_items`
//  ADD PRIMARY KEY (`id`);
//
//ALTER TABLE `list_items`
//  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT; ";
//            $stmt = $this->db->prepare($sql);
        return $stmt->execute();
//        }
//        return false;
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
        if (count($data) > 0) {
            $columns = implode(',', array_keys($data));
            //preg_filter(faster) or array_map
            //$prefixed_array = preg_filter('/^/', 'prefix_', $array);
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
        //todo:can improve generic
//        if (count($data) > 0) {
//            $kv = '';
//            foreach ($data as $key => $value) {
//                $kv .= $key . '=' . $value . ',';
//            }
//            $kv=substr($kv,0,strlen($kv-1));

//            $stmt = $this->db->prepare("UPDATE $this->table SET $kv WHERE id=" . $id);
//        }
            $stmt = $this->db->prepare("UPDATE $this->table SET name='".$data['name']."',qty=".$data['qty'].",done=".$data['done']." WHERE id=" . $id);
            return $stmt->execute();
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM $this->table WHERE id=" . $id);
        return $stmt->execute();
    }
}
