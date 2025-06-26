<?php
require_once("Model.php");

class Movie extends Model
{
    protected ?int $id;
    private string $title;
    private string $description;
    private string $rating;
    private string $release_date;
    private int $duration_minutes;
    private string $poster_url;
    protected static string $table = "movies";

    public function __construct(array $data)
    {
        $this->id = $data["id"] ?? null;
        $this->title = $data['title'] ?? '';
        $this->description = $data['description'] ?? '';
        $this->rating = $data['rating'] ?? '';
        $this->release_date = $data['release_date'] ?? '';
        $this->duration_minutes = $data['duration_minutes'] ?? 0;
        $this->poster_url = $data['poster_url'] ?? '';
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getRating(): string
    {
        return $this->rating;
    }

    public function getRelease_date(): string
    {
        return $this->release_date;
    }

    public function getDuration_Minutes(): int
    {
        return $this->duration_minutes;
    }

    public function getPoster_url(): string
    {
        return $this->poster_url;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function setRating(string $rating): void
    {
        $this->rating = $rating;
    }

    public function setRelease_Date(string $release_date): void
    {
        $this->release_date = $release_date;
    }

    public function setDuration_Minutes(int $duration_minutes): void
    {
        $this->duration_minutes = $duration_minutes;
    }

    public function setPoster_Url(string $poster_url): void
    {
        $this->poster_url = $poster_url;
    }

    public function toArray()
    {
        $data = [
            "title" => $this->title,
            "description" => $this->description,
            "rating" => $this->rating,
            "release_date" => $this->release_date,
            "duration_minutes" => $this->duration_minutes,
            "poster_url" => $this->poster_url
        ];

        if (isset($this->id)) {
            $data["id"] = $this->id;
        }

        return $data;
    }

}

?>