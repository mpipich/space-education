<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Medialibrary
 *
 * @ORM\Table(name="medialibrary", uniqueConstraints={@ORM\UniqueConstraint(name="id", columns={"id"})})
 * @ORM\Entity
 */
class Medialibrary
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"comment"="Идентификатор файла"})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255, nullable=false, options={"comment"="URL файла"})
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50, nullable=false, options={"comment"="Название файла"})
     */
    private $name;


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
     * Get url.
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set url.
     *
     * @param string $url
     *
     * @return Medialibrary
     */
    public function setUrl($url)
    {
        $this->url = $url;

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
     * Set name.
     *
     * @param string $name
     *
     * @return Medialibrary
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
}
