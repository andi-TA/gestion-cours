<?php

namespace Core\Table;

class Table
{
    protected $table;
    protected $db;

    public function __construct(\Core\Database\Mysqldatabase $db)
    {
        $this->db = $db;
        
        if ($this->table === null) 
        {
            $parts = explode('\\', get_called_class());
            $class_name = end($parts);
            $this->table = strtolower(str_replace('Table', '', $class_name) . 's');
        }
    }
    public function query($statement, $attributes = null, $one = false)
    {
        if ($attributes)
            return $this->db->prepare($statement, $attributes, str_replace('Table', 'Entity', get_class($this)), $one);
        else
            return $this->db->query($statement, str_replace('Table', 'Entity', get_class($this)), $one);
    }
    public function all()
    {
        return $this->query("SELECT * FROM " . $this->table);
    }
    public function rowCount()
    {
        return $this->query("SELECT COUNT(*) as rowCount FROM ".$this->table,null,true);
    }
    public function find($id)
    {
        return $this->query("SELECT * FROM $this->table WHERE id = ?", [$id], true);
    }
    public function update($id, $fields)
    {
        $sql_parts = [];
        $attributes = [];
        foreach ($fields as $k => $v) {
            $sql_parts[] =  "$k = ?";
            $attributes[] = $v;
        }
        $attributes[] = $id;
        $sql_part = implode(',', $sql_parts);
        return $this->query("UPDATE {$this->table} SET $sql_part WHERE id = ?", $attributes, true);
    }

    public function AllException($selection = null)
    {
        if (is_null($selection))
            return $this->query("SELECT * FROM " . $this->table, null, true);
        else
            return $this->query("SELECT " . $selection . " FROM " . $this->table, null, true);
    }

    public function etudiantPC($id)
    {
        $etudiant = [];
        $i = 0;
        foreach ($id as $id) {
            $etudiant[$i] =  $this->query("SELECT * FROM {$this->table} WHERE id = ? ", [$id]);
            $i++;
        }
        return $etudiant;
    }
    public function parseTableId($table,$key)
    {
        $tab = [];
        $i = 0;
        foreach ($table as $table) {
            $tab[$i] = $table->$key;
            $i++;
        }

        return $tab;
    }
    public function delete($id,$multiple = false)
    {
        if($multiple)
            return $this->query("DELETE FROM {$this->table} WHERE ? ", [$id]);
        
        return $this->query("DELETE FROM {$this->table} WHERE id = ?", [$id], true);     
    }
    
    public function insert($fields)
    {
        $sql_parts = [];
        $attributes = [];
        foreach ($fields as $k => $v) {
            $sql_parts[] =  "$k = ?";
            $attributes[] = $v;
        }
        $sql_part = implode(',', $sql_parts);
        return $this->query("INSERT INTO {$this->table} SET $sql_part", $attributes, true);
    }
    public function extract($key, $value)
    {
        $records = $this->all();
        $return = [];
        foreach ($records as $v) {
            $return[$v->$key] = $v->$value;
        }
        return $return;
    }
}
