<?php

require_once("Model.php");

class Payment extends Model
{
    protected ?int $id;
    protected int $booking_id;
    protected int $payer_user_id;
    protected float $amount_paid;
    protected string $method;
    protected string $paid_at;

    public function __construct(array $data)
    {
        $this->id = $data['id'] ?? null;
        $this->booking_id = $data['booking_id'] ?? 0;
        $this->payer_user_id = $data['payer_user_id'] ?? 0;
        $this->amount_paid = $data['amount_paid'] ?? 0.00;
        $this->method = $data['method'] ?? '';
        $this->paid_at = $data['paid_at'] ?? date('Y-m-d H:i:s');
    }

    // Setters
    public function setBookingId(int $booking_id): void
    {
        $this->booking_id = $booking_id;
    }

    public function setPayerUserId(int $payer_user_id): void
    {
        $this->payer_user_id = $payer_user_id;
    }

    public function setAmountPaid(float $amount_paid): void
    {
        $this->amount_paid = $amount_paid;
    }

    public function setMethod(string $method): void
    {
        $this->method = $method;
    }

    public function setPaidAt(string $paid_at): void
    {
        $this->paid_at = $paid_at;
    }

    // Getters
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBookingId(): int
    {
        return $this->booking_id;
    }

    public function getPayerUserId(): int
    {
        return $this->payer_user_id;
    }

    public function getAmountPaid(): float
    {
        return $this->amount_paid;
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getPaidAt(): string
    {
        return $this->paid_at;
    }

    // toArray
    public function toArray(): array
    {
        $array = [
            'booking_id' => $this->booking_id,
            'payer_user_id' => $this->payer_user_id,
            'amount_paid' => $this->amount_paid,
            'method' => $this->method,
            'paid_at' => $this->paid_at,
        ];

        if (isset($this->id)) {
            $array['id'] = $this->id;
        }

        return $array;
    }
}
