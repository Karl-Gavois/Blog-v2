<?php

namespace App\Entity;

use App\Repository\ArticlesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: ArticlesRepository::class)]
#[Vich\Uploadable]
class Articles
{
    
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $Title = null;

    #[ORM\Column(length: 255)]
    private ?string $Description = null;

    #[ORM\Column(length: 255)]
    private ?string $Readmore = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $imageName = null;

    // NOTE: This is not a mapped field of entity metadata, just a simple property.
    #[Vich\UploadableField(mapping: 'articles', fileNameProperty: 'imageName')]
    private ?File $imageFile = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\OneToMany(mappedBy: 'relArt', targetEntity: Comments::class)]
    private Collection $relCom;

    public function __construct()
    {
        $this->relCom = new ArrayCollection();
    }

     
// If manually uploading a file (i.e. not using Symfony Form) ensure an instance
// of 'UploadedFile' is injected into this setter to trigger the update. If this
// bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
// must be able to accept an instance of 'File' as the bundle will inject one here
// during Doctrine hydration.*
// @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $imageFile
    public function setImageFile(?File $imageFile = null): void{$this->imageFile = $imageFile;

        if (null !== $imageFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->Title;
    }

    public function setTitle(string $Title): static
    {
        $this->Title = $Title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): static
    {
        $this->Description = $Description;

        return $this;
    }

    public function getReadmore(): ?string
    {
        return $this->Readmore;
    }

    public function setReadmore(string $Readmore): static
    {
        $this->Readmore = $Readmore;

        return $this;
    }
    public function getImageName(): ?string
    {
        return $this->imageName;
    }

    public function setImageName(?string $imageName): static
    {
        $this->imageName = $imageName;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return Collection<int, Comments>
     */
    public function getRelCom(): Collection
    {
        return $this->relCom;
    }

    public function addRelCom(Comments $relCom): static
    {
        if (!$this->relCom->contains($relCom)) {
            $this->relCom->add($relCom);
            $relCom->setRelArt($this);
        }

        return $this;
    }

    public function removeRelCom(Comments $relCom): static
    {
        if ($this->relCom->removeElement($relCom)) {
            // set the owning side to null (unless already changed)
            if ($relCom->getRelArt() === $this) {
                $relCom->setRelArt(null);
            }
        }

        return $this;
    }

}
