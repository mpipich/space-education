<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Schoolkid
 *
 * @ORM\Table(name="schoolkid", uniqueConstraints={@ORM\UniqueConstraint(name="id", columns={"id"})}, indexes={@ORM\Index(name="FK_schoolkid_idClass", columns={"idClass"})})
 * @ORM\Entity
 */
class Schoolkid
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="fio", type="string", length=255, nullable=false)
     */
    private $fio;

    /**
     * @var string
     *
     * @ORM\Column(name="dr", type="string", length=255, nullable=false)
     */
    private $dr;

    /**
     * @var \Schoolclass
     *
     * @ORM\ManyToOne(targetEntity="Schoolclass")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idClass", referencedColumnName="id")
     * })
     */
    private $idclass;



    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set fio.
     *
     * @param string $fio
     *
     * @return Schoolkid
     */
    public function setFio($fio)
    {
        $this->fio = $fio;

        return $this;
    }

    /**
     * Get fio.
     *
     * @return string
     */
    public function getFio()
    {
        return $this->fio;
    }

    /**
     * Set dr.
     *
     * @param string $dr
     *
     * @return Schoolkid
     */
    public function setDr($dr)
    {
        $this->dr = $dr;

        return $this;
    }

    /**
     * Get dr.
     *
     * @return string
     */
    public function getDr()
    {
        return $this->dr;
    }

    /**
     * Set idclass.
     *
     * @param \AppBundle\Entity\Schoolclass|null $idclass
     *
     * @return Schoolkid
     */
    public function setIdclass(\AppBundle\Entity\Schoolclass $idclass = null)
    {
        $this->idclass = $idclass;

        return $this;
    }

    /**
     * Get idclass.
     *
     * @return \AppBundle\Entity\Schoolclass|null
     */
    public function getIdclass()
    {
        return $this->idclass;
    }
}
