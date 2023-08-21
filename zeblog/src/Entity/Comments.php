<?php

namespace App\Entity;

use App\Repository\CommentsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommentsRepository::class)]
class Comments
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $title = null;

    #[ORM\Column(length: 255)]
    private ?string $paragraph = null;

    #[ORM\ManyToOne(inversedBy: 'relCom')]
    private ?Articles $relArt = null;

    #[ORM\ManyToOne(inversedBy: 'RelCom')]
    private ?User $relUser = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getParagraph(): ?string
    {
        return $this->paragraph;
    }

    public function setParagraph(string $paragraph): static
    {
        $this->paragraph = $paragraph;

        return $this;
    }

    public function getRelArt(): ?Articles
    {
        return $this->relArt;
    }

    public function setRelArt(?Articles $relArt): static
    {
        $this->relArt = $relArt;

        return $this;
    }

    public function getRelUser(): ?User
    {
        return $this->relUser;
    }

    public function setRelUser(?User $relUser): static
    {
        $this->relUser = $relUser;

        return $this;
    }
}
