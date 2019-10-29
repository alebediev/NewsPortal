<?php

namespace App\Model;

final class Article
{
    private $id;
    private $category;
    private $image;
    private $title;
    private $description;
    private $body;
    private $publishedAt;
    public function __construct(int $id, string $category, string $title, \DateTimeImmutable $publishedAt)
    {
        $this->id = $id;
        $this->category = $category;
        $this->title = $title;
        $this->publishedAt = $publishedAt;
    }
    public function getId(): int
    {
        return $this->id;
    }
    public function getCategory(): string
    {
        return $this->category;
    }
    public function getImage(): string
    {
        return $this->image ?? 'default.png';
    }
    public function setImage(string $image): void
    {
        $this->image = $image;
    }
    public function getTitle(): string
    {
        return $this->title;
    }
    public function getDescription(): ?string
    {
        return $this->description;
    }
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }
    public function getBody(): ?string
    {
        return $this->body;
    }
    public function setBody(string $body): void
    {
        $this->body = $body;
    }
    public function getPublishedAt(): \DateTimeImmutable
    {
        return $this->publishedAt;
    }
}