<?php


namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="schoolsocialgroup")
 * @ORM\Entity
 */
class Schoolsocialgroup
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
     * @var Schoolsocialadapt
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Schoolsocialadapt", mappedBy="schoolsocialgroup", fetch="EAGER")
     */
    private $tests;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tests = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Schoolsocialgroup
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Add test.
     *
     * @param \AppBundle\Entity\Schoolsocialadapt $test
     *
     * @return Schoolsocialgroup
     */
    public function addTest(\AppBundle\Entity\Schoolsocialadapt $test)
    {
        $this->tests[] = $test;

        return $this;
    }

    /**
     * Remove test.
     *
     * @param \AppBundle\Entity\Schoolsocialadapt $test
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeTest(\AppBundle\Entity\Schoolsocialadapt $test)
    {
        return $this->tests->removeElement($test);
    }

    /**
     * Get tests.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTests()
    {
        return $this->tests;
    }
}
