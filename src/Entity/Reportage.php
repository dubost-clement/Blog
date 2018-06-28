<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ReportageRepository")
 */

 /**
 * @ORM\Entity
 * @Vich\Uploadable
 */
class Reportage
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
    private $content;

    /**
     * @Vich\UploadableField(mapping="reportage_image", fileNameProperty="imageName")
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $imageName;

    /**
     * @Vich\UploadableField(mapping="reportage_image", fileNameProperty="carouselName1")
     * @var File
     */
    private $carouselFile1;

    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $carouselName1;

    /**
     * @Vich\UploadableField(mapping="reportage_image", fileNameProperty="carouselName2")
     * @var File
     */
    private $carouselFile2;

    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $carouselName2;

    /**
     * @Vich\UploadableField(mapping="reportage_image", fileNameProperty="carouselName3")
     * @var File
     */
    private $carouselFile3;

    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $carouselName3;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Category", inversedBy="reportages")
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;

    public function getId()
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

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    /**
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $image
     */
    public function setImageFile(?File $image = null): void
    {
        $this->imageFile = $image;
    }

    public function setImageName(?string $imageName): void
    {
        $this->imageName = $imageName;
    }

    public function getImageName(): ?string
    {
        return $this->imageName;
    }

    public function getCarouselFile1(): ?File
    {
        return $this->carouselFile1;
    }

    /**
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $carousel1
     */
    public function setCarouselFile1(?File $carousel1 = null): void
    {
        $this->carouselFile1 = $carousel1;
    }

    public function setCarouselName1(?string $carouselName1): void
    {
        $this->carouselName1 = $carouselName1;
    }

    public function getCarouselName1(): ?string
    {
        return $this->carouselName1;
    }

    public function getCarouselFile2(): ?File
    {
        return $this->carouselFile2;
    }

    /**
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $carousel2
     */
    public function setCarouselFile2(?File $carousel2 = null): void
    {
        $this->carouselFile2 = $carousel2;
    }

    public function setCarouselName2(?string $carouselName2): void
    {
        $this->carouselName2 = $carouselName2;
    }

    public function getCarouselName2(): ?string
    {
        return $this->carouselName2;
    }

    public function getCarouselFile3(): ?File
    {
        return $this->carouselFile3;
    }

    /**
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $carousel3
     */
    public function setCarouselFile3(?File $carousel3 = null): void
    {
        $this->carouselFile3 = $carousel3;
    }

    public function setCarouselName3(?string $carouselName3): void
    {
        $this->carouselName3 = $carouselName3;
    }

    public function getCarouselName3(): ?string
    {
        return $this->carouselName3;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function __toString() {
    	return $this->getTitle();
    }
}
