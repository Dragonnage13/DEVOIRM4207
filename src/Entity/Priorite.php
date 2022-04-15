<?php

namespace App\Entity;

use App\Repository\PrioriteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PrioriteRepository::class)
 */
class Priorite
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $Faible;

    /**
     * @ORM\Column(type="integer")
     */
    private $Moyenne;

    /**
     * @ORM\Column(type="integer")
     */
    private $Haute;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFaible(): ?int
    {
        return $this->Faible;
    }

    public function setFaible(int $Faible): self
    {
        $this->Faible = $Faible;

        return $this;
    }

    public function getMoyenne(): ?int
    {
        return $this->Moyenne;
    }

    public function setMoyenne(int $Moyenne): self
    {
        $this->Moyenne = $Moyenne;

        return $this;
    }

    public function getHaute(): ?int
    {
        return $this->Haute;
    }

    public function setHaute(int $Haute): self
    {
        $this->Haute = $Haute;

        return $this;
    }
}
