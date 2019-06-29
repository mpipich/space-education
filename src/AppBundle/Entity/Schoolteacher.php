<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Schoolteacher
 *
 * @ORM\Table(name="schoolteacher", uniqueConstraints={@ORM\UniqueConstraint(name="id", columns={"id"})}, indexes={@ORM\Index(name="FK_schoolteacher_idSchool", columns={"idSchool"})})
 * @ORM\Entity
 */
class Schoolteacher
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
     * @var \School
     *
     * @ORM\ManyToOne(targetEntity="School")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idSchool", referencedColumnName="id")
     * })
     */
    private $idschool;



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
     * @return Schoolteacher
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
     * Set idschool.
     *
     * @param \AppBundle\Entity\School|null $idschool
     *
     * @return Schoolteacher
     */
    public function setIdschool(\AppBundle\Entity\School $idschool = null)
    {
        $this->idschool = $idschool;

        return $this;
    }

    /**
     * Get idschool.
     *
     * @return \AppBundle\Entity\School|null
     */
    public function getIdschool()
    {
        return $this->idschool;
    }
}
