<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Schoolclass
 *
 * @ORM\Table(name="schoolclass", uniqueConstraints={@ORM\UniqueConstraint(name="classnumber", columns={"classnumber"}), @ORM\UniqueConstraint(name="id", columns={"id"})}, indexes={@ORM\Index(name="FK_schoolclass_schoolid", columns={"schoolid"})})
 * @ORM\Entity
 */
class Schoolclass
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
     * @ORM\Column(name="classnumber", type="string", length=255, nullable=false)
     */
    private $classnumber;

    /**
     * @var \School
     *
     * @ORM\ManyToOne(targetEntity="School")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="schoolid", referencedColumnName="id")
     * })
     */
    private $schoolid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Schoolitems", inversedBy="idclass")
     * @ORM\JoinTable(name="schoolplan",
     *   joinColumns={
     *     @ORM\JoinColumn(name="idClass", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="idItem", referencedColumnName="id")
     *   }
     * )
     */
    private $iditem;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Dictation", inversedBy="idclass")
     * @ORM\JoinTable(name="schooldictantplan",
     *   joinColumns={
     *     @ORM\JoinColumn(name="idClass", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="IdDictant", referencedColumnName="id")
     *   }
     * )
     */
    private $idDictant;

    /**
     * @var
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Schoolkid",mappedBy="idclass", fetch="EAGER")
     */
    private $kids;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->iditem = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Get classnumber.
     *
     * @return string
     */
    public function getClassnumber()
    {
        return $this->classnumber;
    }

    /**
     * Set classnumber.
     *
     * @param string $classnumber
     *
     * @return Schoolclass
     */
    public function setClassnumber($classnumber)
    {
        $this->classnumber = $classnumber;

        return $this;
    }

    /**
     * Get schoolid.
     *
     * @return \AppBundle\Entity\School|null
     */
    public function getSchoolid()
    {
        return $this->schoolid;
    }

    /**
     * Set schoolid.
     *
     * @param \AppBundle\Entity\School|null $schoolid
     *
     * @return Schoolclass
     */
    public function setSchoolid(\AppBundle\Entity\School $schoolid = null)
    {
        $this->schoolid = $schoolid;

        return $this;
    }

    /**
     * Add iditem.
     *
     * @param \AppBundle\Entity\Schoolitems $iditem
     *
     * @return Schoolclass
     */
    public function addIditem(\AppBundle\Entity\Schoolitems $iditem)
    {
        $this->iditem[] = $iditem;

        return $this;
    }

    /**
     * Remove iditem.
     *
     * @param \AppBundle\Entity\Schoolitems $iditem
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeIditem(\AppBundle\Entity\Schoolitems $iditem)
    {
        return $this->iditem->removeElement($iditem);
    }

    /**
     * Get iditem.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIditem()
    {
        return $this->iditem;
    }

    /**
     * Add idDictant.
     *
     * @param \AppBundle\Entity\Dictation $idDictant
     *
     * @return Schoolclass
     */
    public function addIdDictant(\AppBundle\Entity\Dictation $idDictant)
    {
        $this->idDictant[] = $idDictant;

        return $this;
    }

    /**
     * Remove idDictant.
     *
     * @param \AppBundle\Entity\Dictation $idDictant
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeIdDictant(\AppBundle\Entity\Dictation $idDictant)
    {
        return $this->idDictant->removeElement($idDictant);
    }

    /**
     * Get idDictant.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdDictant()
    {
        return $this->idDictant;
    }

    /**
     * Add kid.
     *
     * @param \AppBundle\Entity\Schoolkid $kid
     *
     * @return Schoolclass
     */
    public function addKid(\AppBundle\Entity\Schoolkid $kid)
    {
        $this->kids[] = $kid;

        return $this;
    }

    /**
     * Remove kid.
     *
     * @param \AppBundle\Entity\Schoolkid $kid
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeKid(\AppBundle\Entity\Schoolkid $kid)
    {
        return $this->kids->removeElement($kid);
    }

    /**
     * Get kids.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getKids()
    {
        return $this->kids;
    }
}
