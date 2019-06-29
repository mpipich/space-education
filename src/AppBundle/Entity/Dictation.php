<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dictation
 *
 * @ORM\Table(name="dictation", uniqueConstraints={@ORM\UniqueConstraint(name="id", columns={"id"})}, indexes={@ORM\Index(name="FK_dictation_idItem", columns={"idItem"}), @ORM\Index(name="FK_dictation_idAudio", columns={"idAudio"})})
 * @ORM\Entity
 */
class Dictation
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"comment"="Идентификатор диктанта"})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="dictationtext", type="text", length=65535, nullable=false)
     */
    private $dictationtext;

    /**
     * @var \Medialibrary
     *
     * @ORM\ManyToOne(targetEntity="Medialibrary")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idAudio", referencedColumnName="id")
     * })
     */
    private $idaudio;

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
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name.
     *
     * @param string $name
     *
     * @return Dictation
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set dictationtext.
     *
     * @param string $dictationtext
     *
     * @return Dictation
     */
    public function setDictationtext($dictationtext)
    {
        $this->dictationtext = $dictationtext;

        return $this;
    }

    /**
     * Get dictationtext.
     *
     * @return string
     */
    public function getDictationtext()
    {
        return $this->dictationtext;
    }

    /**
     * Set idaudio.
     *
     * @param \AppBundle\Entity\Medialibrary|null $idaudio
     *
     * @return Dictation
     */
    public function setIdaudio(\AppBundle\Entity\Medialibrary $idaudio = null)
    {
        $this->idaudio = $idaudio;

        return $this;
    }

    /**
     * Get idaudio.
     *
     * @return \AppBundle\Entity\Medialibrary|null
     */
    public function getIdaudio()
    {
        return $this->idaudio;
    }

    /**
     * Set iditem.
     *
     * @param \AppBundle\Entity\Schoolitems|null $iditem
     *
     * @return Dictation
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
}
