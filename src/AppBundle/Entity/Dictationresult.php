<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dictationresult
 *
 * @ORM\Table(name="dictationresult", uniqueConstraints={@ORM\UniqueConstraint(name="id", columns={"id"})}, indexes={@ORM\Index(name="FK_dictationresult_idDictant", columns={"idDictant"}), @ORM\Index(name="FK_dictationresult_IdKid", columns={"IdKid"})})
 * @ORM\Entity
 */
class Dictationresult
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
     * @var int
     *
     * @ORM\Column(name="countFail", type="integer", nullable=false)
     */
    private $countfail = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="userText", type="text", length=65535, nullable=true)
     */
    private $usertext;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ocenka", type="integer", nullable=true)
     */
    private $ocenka;

    /**
     * @var \Schoolkid
     *
     * @ORM\ManyToOne(targetEntity="Schoolkid")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IdKid", referencedColumnName="id")
     * })
     */
    private $idkid;

    /**
     * @var \Dictation
     *
     * @ORM\ManyToOne(targetEntity="Dictation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idDictant", referencedColumnName="id")
     * })
     */
    private $iddictant;


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
     * Set countfail.
     *
     * @param int $countfail
     *
     * @return Dictationresult
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
     * Set usertext.
     *
     * @param string|null $usertext
     *
     * @return Dictationresult
     */
    public function setUsertext($usertext = null)
    {
        $this->usertext = $usertext;

        return $this;
    }

    /**
     * Get usertext.
     *
     * @return string|null
     */
    public function getUsertext()
    {
        return $this->usertext;
    }

    /**
     * Set ocenka.
     *
     * @param int|null $ocenka
     *
     * @return Dictationresult
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
     * Set idkid.
     *
     * @param \AppBundle\Entity\Schoolkid|null $idkid
     *
     * @return Dictationresult
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

    /**
     * Set iddictant.
     *
     * @param \AppBundle\Entity\Dictation|null $iddictant
     *
     * @return Dictationresult
     */
    public function setIddictant(\AppBundle\Entity\Dictation $iddictant = null)
    {
        $this->iddictant = $iddictant;

        return $this;
    }

    /**
     * Get iddictant.
     *
     * @return \AppBundle\Entity\Dictation|null
     */
    public function getIddictant()
    {
        return $this->iddictant;
    }
}
