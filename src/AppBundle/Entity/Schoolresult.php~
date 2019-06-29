<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Schoolresult
 *
 * @ORM\Table(name="schoolresult", uniqueConstraints={@ORM\UniqueConstraint(name="id", columns={"id"})}, indexes={@ORM\Index(name="FK_schoolresult_idKid", columns={"idKid"}), @ORM\Index(name="FK_schoolresult_idItem", columns={"idItem"})})
 * @ORM\Entity
 */
class Schoolresult
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
     * @var int|null
     *
     * @ORM\Column(name="ocenka", type="integer", nullable=true)
     */
    private $ocenka;

    /**
     * @var int
     *
     * @ORM\Column(name="countFail", type="integer", nullable=false)
     */
    private $countfail = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=true)
     */
    private $description;

    /**
     * @var \Schoolitems
     *
     * @ORM\ManyToOne(targetEntity="Schoolitems")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idItem", referencedColumnName="id")
     * })
     */
    private $iditem;

    /**
     * @var \Schoolkid
     *
     * @ORM\ManyToOne(targetEntity="Schoolkid")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idKid", referencedColumnName="id")
     * })
     */
    private $idkid;



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
     * Set ocenka.
     *
     * @param int|null $ocenka
     *
     * @return Schoolresult
     */
    public function setOcenka($ocenka = null)
    {
        $this->ocenka = $ocenka;

        return $this;
    }

    /**
     * Get ocenka.
     *
     * @return int|null
     */
    public function getOcenka()
    {
        return $this->ocenka;
    }

    /**
     * Set countfail.
     *
     * @param int $countfail
     *
     * @return Schoolresult
     */
    public function setCountfail($countfail)
    {
        $this->countfail = $countfail;

        return $this;
    }

    /**
     * Get countfail.
     *
     * @return int
     */
    public function getCountfail()
    {
        return $this->countfail;
    }

    /**
     * Set description.
     *
     * @param string|null $description
     *
     * @return Schoolresult
     */
    public function setDescription($description = null)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description.
     *
     * @return string|null
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set iditem.
     *
     * @param \AppBundle\Entity\Schoolitems|null $iditem
     *
     * @return Schoolresult
     */
    public function setIditem(\AppBundle\Entity\Schoolitems $iditem = null)
    {
        $this->iditem = $iditem;

        return $this;
    }

    /**
     * Get iditem.
     *
     * @return \AppBundle\Entity\Schoolitems|null
     */
    public function getIditem()
    {
        return $this->iditem;
    }

    /**
     * Set idkid.
     *
     * @param \AppBundle\Entity\Schoolkid|null $idkid
     *
     * @return Schoolresult
     */
    public function setIdkid(\AppBundle\Entity\Schoolkid $idkid = null)
    {
        $this->idkid = $idkid;

        return $this;
    }

    /**
     * Get idkid.
     *
     * @return \AppBundle\Entity\Schoolkid|null
     */
    public function getIdkid()
    {
        return $this->idkid;
    }
}
