<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategoryRepository")
 */
class Category
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
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Reportage", mappedBy="category")
     */
    private $reportages;

    public function __construct()
    {
        $this->reportages = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|Reportage[]
     */
    public function getReportages(): Collection
    {
        return $this->reportages;
    }

    public function addReportage(Reportage $reportage): self
    {
        if (!$this->reportages->contains($reportage)) {
            $this->reportages[] = $reportage;
            $reportage->setCategory($this);
        }

        return $this;
    }

    public function removeReportage(Reportage $reportage): self
    {
        if ($this->reportages->contains($reportage)) {
            $this->reportages->removeElement($reportage);
            // set the owning side to null (unless already changed)
            if ($reportage->getCategory() === $this) {
                $reportage->setCategory(null);
            }
        }

        return $this;
    }

    public function __toString() {
    	return $this->getName();
    }
}
