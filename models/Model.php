<?php
abstract class Model
{
    protected static string $table;
    protected static string $primary_key = "id";

    public static function find(mysqli $mysqli, int $id)
    {
        $sql = sprintf(
            "Select * from %s WHERE %s = ?",
            static::$table,
            static::$primary_key
        );

        $query = $mysqli->prepare($sql);
        $query->bind_param("i", $id);
        $query->execute();

        $data = $query->get_result()->fetch_assoc();

        return $data ? new static($data) : null;
    }

    public static function all(mysqli $mysqli)
    {
        $sql = sprintf(
            "SELECT * FROM %s",
            static::$table
        );

        $query = $mysqli->prepare($sql);
        $query->execute();
        $data = $query->get_result();

        $objects = [];
        while ($row = $data->fetch_assoc()) {
            $objects[] = new static($row);
        }
        return $objects;
    }

    public static function create(mysqli $mysqli, array $data)
    {
        $columns = array_keys($data);
        $placeholder = implode(", ", array_fill(0, count($columns), "?"));
        $columns_list = implode(", ", $columns);

        $sql = sprintf(
            "INSERT INTO %s ($columns_list) VALUES ($placeholder)",
            static::$table
        );
        $query = $mysqli->prepare($sql);

        $types = "";
        $values = [];

        foreach ($data as $value) {
            $types .= match (true) {
                is_int($value) => 'i',
                is_float($value) => 'd',
                default => 's',
            };
            $values[] = $value;
        }

        $query->bind_param($types, ...$values);

        return $query->execute();

    }

    public function update(mysqli $mysqli, array $data): bool
    {
        $columns = array_keys($data);
        $assignments = implode(", ", array_map(fn($col) => "$col = ?", $columns));

        $sql = sprintf(
            "UPDATE %s SET %s WHERE %s = ?",
            static::$table,
            $assignments,
            static::$primary_key
        );

        $query = $mysqli->prepare($sql);

        $types = "";
        $values = [];

        foreach ($data as $value) {
            $types .= match (true) {
                is_int($value) => 'i',
                is_float($value) => 'd',
                default => 's',
            };
            $values[] = $value;
        }

        $types .= 'i';
        $values[] = $this->{static::$primary_key};

        $query->bind_param($types, ...$values);
        return $query->execute();
    }

    public function delete(mysqli $mysqli, )
    {

        $sql = sprintf(
            "DELETE FROM %s WHERE %s = ?",
            static::$table,
            static::$primary_key
        );

        $query = $mysqli->prepare($sql);

        $query->bind_param("i", $this->{static::$primary_key});
        return $query->execute();

    }

}




//you have to continue with the same mindset
//Find a solution for sending the $mysqli everytime...
//Implement the following:
//1- update() -> non-static function - completing
//2- create() -> static function - done
//3- delete() -> non-static function

?>