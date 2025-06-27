<?php

require_once("Model.php");

class Ticket extends Model
{
    protected ?int $id;
    protected int $user_id;
    protected int $booking_id;
    protected int $seat_id;
    protected float $price;
    protected string $ticket_code;
    protected static string $table = "tickets";

    public function __construct(array $data)
    {
        $this->id = $data['id'] ?? null;
        $this->user_id = $data['user_id'] ?? 0;
        $this->booking_id = $data['booking_id'] ?? 0;
        $this->seat_id = $data['seat_id'] ?? 0;
        $this->price = $data['price'] ?? 0.00;
        $this->ticket_code = $data['ticket_code'] ?? '';
    }

    // Setters
    public function setUserId(int $user_id): void
    {
        $this->user_id = $user_id;
    }

    public function setBookingId(int $booking_id): void
    {
        $this->booking_id = $booking_id;
    }

    public function setSeatId(int $seat_id): void
    {
        $this->seat_id = $seat_id;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function setTicketCode(string $ticket_code): void
    {
        $this->ticket_code = $ticket_code;
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

    public function getBookingId(): int
    {
        return $this->booking_id;
    }

    public function getSeatId(): int
    {
        return $this->seat_id;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getTicketCode(): string
    {
        return $this->ticket_code;
    }

    // toArray method
    public function toArray(): array
    {
        $array = [
            'user_id' => $this->user_id,
            'booking_id' => $this->booking_id,
            'seat_id' => $this->seat_id,
            'price' => $this->price,
            'ticket_code' => $this->ticket_code,
        ];

        if (isset($this->id)) {
            $array['id'] = $this->id;
        }

        return $array;
    }
}
