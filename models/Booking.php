<?php

require_once("Model.php");

class Booking extends Model
{
    protected ?int $id;
    protected int $user_id;
    protected int $showtime_id;
    protected float $total_amount;
    protected string $status; // 'pending', 'confirmed', 'cancelled'
    protected string $created_at;

    public function __construct(array $data)
    {
        $this->id = $data['id'] ?? null;
        $this->user_id = $data['user_id'] ?? 0;
        $this->showtime_id = $data['showtime_id'] ?? 0;
        $this->total_amount = $data['total_amount'] ?? 0.00;
        $this->status = $data['status'] ?? 'pending';
        $this->created_at = $data['created_at'] ?? '';
    }

    // Setters
    public function setUserId(int $user_id): void
    {
        $this->user_id = $user_id;
    }

    public function setShowtimeId(int $showtime_id): void
    {
        $this->showtime_id = $showtime_id;
    }

    public function setTotalAmount(float $amount): void
    {
        $this->total_amount = $amount;
    }

    public function setStatus(string $status): void
    {
        $allowed = ['pending', 'confirmed', 'cancelled'];
        if (!in_array($status, $allowed)) {
            throw new InvalidArgumentException("Invalid status value.");
        }
        $this->status = $status;
    }

    // Getters
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function getShowtimeId(): int
    {
        return $this->showtime_id;
    }

    public function getTotalAmount(): float
    {
        return $this->total_amount;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getCreatedAt(): string
    {
        return $this->created_at;
    }

    public function toArray(): array
    {
        $array = [
            'user_id' => $this->user_id,
            'showtime_id' => $this->showtime_id,
            'total_amount' => $this->total_amount,
            'status' => $this->status,
            'created_at' => $this->created_at,
        ];

        if (isset($this->id)) {
            $array['id'] = $this->id;
        }

        return $array;
    }

}
