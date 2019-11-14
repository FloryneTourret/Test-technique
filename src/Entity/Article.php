<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ArticleRepository")
 */
class Article
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $description;


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="article")
     */
    private $author;

    /**
     * @ORM\Column(type="datetime")
     */
    private $creation_date;

    /**
     * @ORM\Column(type="datetime")
     */
    private $modification_date;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\PictureArticle", inversedBy="article", cascade={"persist", "remove"})
     */
    private $pictureArticle;

    public function __construct()
    {
        $this->author = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getAuthor(): Collection
    {
        return $this->author;
    }

    public function addAuthor(User $author): self
    {
        if (!$this->author->contains($author)) {
            $this->author[] = $author;
            $author->setArticle($this);
        }

        return $this;
    }

    public function removeAuthor(User $author): self
    {
        if ($this->author->contains($author)) {
            $this->author->removeElement($author);
            // set the owning side to null (unless already changed)
            if ($author->getArticle() === $this) {
                $author->setArticle(null);
            }
        }

        return $this;
    }

    public function getCreationDate(): ?\DateTimeInterface
    {
        return $this->creation_date;
    }

    public function setCreationDate(\DateTimeInterface $creation_date): self
    {
        $this->creation_date = $creation_date;

        return $this;
    }

    public function getModificationDate(): ?\DateTimeInterface
    {
        return $this->modification_date;
    }

    public function setModificationDate(\DateTimeInterface $modification_date): self
    {
        $this->modification_date = $modification_date;

        return $this;
    }

    public function getPictureArticle(): ?PictureArticle
    {
        return $this->pictureArticle;
    }

    public function setPictureArticle(PictureArticle $pictureArticle): self
    {
        $this->pictureArticle = $pictureArticle;

        // set the owning side of the relation if necessary
        if ($pictureArticle->getArticle() !== $this) {
            $pictureArticle->setArticle($this);
        }

        return $this;
    }
}
