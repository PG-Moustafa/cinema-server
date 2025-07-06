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
        $sql = sprintf("Select * from %s", static::$table);

        $query = $mysqli->prepare($sql);
        $query->execute();

        $data = $query->get_result();

        $objects = [];
        while ($row = $data->fetch_assoc()) {
            $objects[] = new static($row); //creating an object of type "static" / "parent" and adding the object to the array
        }

        return $objects; //we are returning an array of objects!!!!!!!!
    }

    public static function deleteAll(mysqli $mysqli)
    {
        try {
            $sql = sprintf("DELETE FROM %s", static::$table);

            $query = $mysqli->prepare($sql);
            $query->execute();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public static function delete(mysqli $mysqli, int $id)
    {
        $sql = sprintf(
            "DELETE FROM %s WHERE %s = ?",
            static::$table,
            static::$primary_key
        );

        $query = $mysqli->prepare($sql);
        $query->bind_param("i", $id);
        $query->execute();
    }

    public static function add(mysqli $mysqli, $data)
    {
        $columns = array_keys($data);
        $columns_list = implode(", ", $columns);
        $placeholder = implode(", ", array_fill(0, count($columns), "?"));

        $sql = sprintf(
            "INSERT INTO %s (%s) VALUES (%s)",
            static::$table,
            $columns_list,
            $placeholder
        );

        $query = $mysqli->prepare($sql);
        $types = "";
        $values = [];

        // check datatypes of values
        foreach ($data as $value) {
            if (is_string($value)) {
                $types .= 's';
            } elseif (is_int($value)) {
                $types .= 'i';
            } elseif (is_double($value)) {
                $types .= 'd';
            } elseif (is_bool($value)) {
                $types .= 'i';
            } else {
                $types .= 's';
            }
            $values[] = $value;
        }

        $query->bind_param($types, ...$values);
        $query->execute();
        $query->close();
    }

    // should be implemented
    public static function update(mysqli $mysqli)
    {
        return 0;
    }


}



