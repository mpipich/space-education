<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Schoolitems
 *
 * @ORM\Table(name="schoolitems", uniqueConstraints={@ORM\UniqueConstraint(name="UK_schoolitems_idTeacher", columns={"idTeacher"}), @ORM\UniqueConstraint(name="id", columns={"id"})})
 * @ORM\Entity
 */
class Schoolitems
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
     * @ORM\Column(name="name", type="string", length=50, nullable=false)
     */
    private $name;

    /**
     * @var \Schoolteacher
     *
     * @ORM\ManyToOne(targetEntity="Schoolteacher")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idTeacher", referencedColumnName="id")
     * })
     */
    private $idteacher;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Schoolclass", mappedBy="iditem")
     */
    private $idclass;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idclass = new \Doctrine\Common\Collections\ArrayCollection();
    }


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
     * @return Schoolitems
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
     * Set idteacher.
     *
     * @param \AppBundle\Entity\Schoolteacher|null $idteacher
     *
     * @return Schoolitems
     */
    public function setIdteacher(\AppBundle\Entity\Schoolteacher $idteacher = null)
    {
        $this->idteacher = $idteacher;

        return $this;
    }

    /**
     * Get idteacher.
     *
     * @return \AppBundle\Entity\Schoolteacher|null
     */
    public function getIdteacher()
    {
        return $this->idteacher;
    }

    /**
     * Add idclass.
     *
     * @param \AppBundle\Entity\Schoolclass $idclass
     *
     * @return Schoolitems
     */
    public function addIdclass(\AppBundle\Entity\Schoolclass $idclass)
    {
        $this->idclass[] = $idclass;

        return $this;
    }

    /**
     * Remove idclass.
     *
     * @param \AppBundle\Entity\Schoolclass $idclass
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeIdclass(\AppBundle\Entity\Schoolclass $idclass)
    {
        return $this->idclass->removeElement($idclass);
    }

    /**
     * Get idclass.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdclass()
    {
        return $this->idclass;
    }
}
