<?php

require("Model.php");

class Seat extends Model
{

    protected ?int $id;
    protected int $auditorium_id;
    protected string $row_label;
    protected int $seat_number;
    protected string $seat_type;

    public function __construct(array $data)
    {
        $this->id = $data['id'] ?? null;
        $this->auditorium_id = $data['auditorium_id'] ?? 0;
        $this->row_label = $data['row_label'] ?? '';
        $this->seat_number = $data['seat_number'] ?? 0;
        $this->seat_type = $data['seat_type'] ?? 'regular';
    }

    // Getters
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAuditoriumId(): int
    {
        return $this->auditorium_id;
    }

    public function getRowLabel(): string
    {
        return $this->row_label;
    }

    public function getSeatNumber(): int
    {
        return $this->seat_number;
    }

    public function getSeatType(): string
    {
        return $this->seat_type;
    }

    // Setters
    public function setAuditoriumId(int $auditorium_id): void
    {
        $this->auditorium_id = $auditorium_id;
    }

    public function setRowLabel(string $row_label): void
    {
        $this->row_label = $row_label;
    }

    public function setSeatNumber(int $seat_number): void
    {
        $this->seat_number = $seat_number;
    }

    public function setSeatType(string $seat_type): void
    {
        if (!in_array($seat_type, ['regular', 'vip', 'accessible'])) {
            throw new InvalidArgumentException("Invalid seat type.");
        }
        $this->seat_type = $seat_type;
    }

    public function toArray(): array
    {
        $array = [
            "auditorium_id" => $this->auditorium_id,
            "row_label" => $this->row_label,
            "seat_number" => $this->seat_number,
            "seat_type" => $this->seat_type
        ];

        if (isset($this->id)) {
            $array["id"] = $this->id;
        }

        return $array;
    }

}