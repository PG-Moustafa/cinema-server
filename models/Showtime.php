<?php

require_once("Model.php");

class Showtime extends Model
{
    protected ?int $id;
    protected int $movie_id;
    protected int $auditorium_id;
    protected string $show_date; // Format: YYYY-MM-DD
    protected string $show_time; // Format: HH:MM:SS
    protected static string $table = "showtimes";


    public function __construct(array $data)
    {
        $this->id = $data['id'] ?? null;
        $this->movie_id = $data['movie_id'] ?? 0;
        $this->auditorium_id = $data['auditorium_id'] ?? 0;
        $this->show_date = $data['show_date'] ?? date('Y-m-d');
        $this->show_time = $data['show_time'] ?? date('H:i:s');
    }

    // Setters
    public function setMovieId(int $movie_id): void
    {
        $this->movie_id = $movie_id;
    }

    public function setAuditoriumId(int $auditorium_id): void
    {
        $this->auditorium_id = $auditorium_id;
    }

    public function setShowDate(string $show_date): void
    {
        $this->show_date = $show_date;
    }

    public function setShowTime(string $show_time): void
    {
        $this->show_time = $show_time;
    }

    // Getters
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMovieId(): int
    {
        return $this->movie_id;
    }

    public function getAuditoriumId(): int
    {
        return $this->auditorium_id;
    }

    public function getShowDate(): string
    {
        return $this->show_date;
    }

    public function getShowTime(): string
    {
        return $this->show_time;
    }

    // toArray method
    public function toArray(): array
    {
        $array = [
            'movie_id' => $this->movie_id,
            'auditorium_id' => $this->auditorium_id,
            'show_date' => $this->show_date,
            'show_time' => $this->show_time,
        ];

        if (isset($this->id)) {
            $array['id'] = $this->id;
        }

        return $array;
    }
}
