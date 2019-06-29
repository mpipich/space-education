<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Schoolsocialadapt
 *
 * @ORM\Table(name="schoolsocialadapt", uniqueConstraints={@ORM\UniqueConstraint(name="id", columns={"id"})}, indexes={@ORM\Index(name="FK_schoolsocialadapt_idItem", columns={"idItem"}), @ORM\Index(name="FK_schoolsocialadapt_variant_2", columns={"variant_no_2"}), @ORM\Index(name="FK_schoolsocialadapt_variant_o", columns={"variant_ok"}), @ORM\Index(name="FK_schoolsocialadapt_variant_3", columns={"variant_no_3"}), @ORM\Index(name="FK_schoolsocialadapt_variant_n", columns={"variant_no_1"})})
 * @ORM\Entity
 */
class Schoolsocialadapt
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
     * @ORM\Column(name="question", type="string", length=255, nullable=false)
     */
    private $question;

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
     * @var \Medialibrary
     *
     * @ORM\ManyToOne(targetEntity="Medialibrary")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="variant_no_2", referencedColumnName="id")
     * })
     */
    private $variantNo2;

    /**
     * @var \Medialibrary
     *
     * @ORM\ManyToOne(targetEntity="Medialibrary")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="variant_no_3", referencedColumnName="id")
     * })
     */
    private $variantNo3;

    /**
     * @var \Medialibrary
     *
     * @ORM\ManyToOne(targetEntity="Medialibrary")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="variant_no_1", referencedColumnName="id")
     * })
     */
    private $variantNo1;

    /**
     * @var \Medialibrary
     *
     * @ORM\ManyToOne(targetEntity="Medialibrary")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="variant_ok", referencedColumnName="id")
     * })
     */
    private $variantOk;

    /**
     * @var Schoolsocialgroup
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Schoolsocialgroup", inversedBy="tests")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_group", referencedColumnName="id")
     * })
     */
    private $schoolsocialgroup;


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
     * Get question.
     *
     * @return string
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * Set question.
     *
     * @param string $question
     *
     * @return Schoolsocialadapt
     */
    public function setQuestion($question)
    {
        $this->question = $question;

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
     * Set iditem.
     *
     * @param \AppBundle\Entity\Schoolitems|null $iditem
     *
     * @return Schoolsocialadapt
     */
    public function setIditem(\AppBundle\Entity\Schoolitems $iditem = null)
    {
        $this->iditem = $iditem;

        return $this;
    }

    /**
     * Get variantNo2.
     *
     * @return \AppBundle\Entity\Medialibrary|null
     */
    public function getVariantNo2()
    {
        return $this->variantNo2;
    }

    /**
     * Set variantNo2.
     *
     * @param \AppBundle\Entity\Medialibrary|null $variantNo2
     *
     * @return Schoolsocialadapt
     */
    public function setVariantNo2(\AppBundle\Entity\Medialibrary $variantNo2 = null)
    {
        $this->variantNo2 = $variantNo2;

        return $this;
    }

    /**
     * Get variantNo3.
     *
     * @return \AppBundle\Entity\Medialibrary|null
     */
    public function getVariantNo3()
    {
        return $this->variantNo3;
    }

    /**
     * Set variantNo3.
     *
     * @param \AppBundle\Entity\Medialibrary|null $variantNo3
     *
     * @return Schoolsocialadapt
     */
    public function setVariantNo3(\AppBundle\Entity\Medialibrary $variantNo3 = null)
    {
        $this->variantNo3 = $variantNo3;

        return $this;
    }

    /**
     * Get variantNo1.
     *
     * @return \AppBundle\Entity\Medialibrary|null
     */
    public function getVariantNo1()
    {
        return $this->variantNo1;
    }

    /**
     * Set variantNo1.
     *
     * @param \AppBundle\Entity\Medialibrary|null $variantNo1
     *
     * @return Schoolsocialadapt
     */
    public function setVariantNo1(\AppBundle\Entity\Medialibrary $variantNo1 = null)
    {
        $this->variantNo1 = $variantNo1;

        return $this;
    }

    /**
     * Get variantOk.
     *
     * @return \AppBundle\Entity\Medialibrary|null
     */
    public function getVariantOk()
    {
        return $this->variantOk;
    }

    /**
     * Set variantOk.
     *
     * @param \AppBundle\Entity\Medialibrary|null $variantOk
     *
     * @return Schoolsocialadapt
     */
    public function setVariantOk(\AppBundle\Entity\Medialibrary $variantOk = null)
    {
        $this->variantOk = $variantOk;

        return $this;
    }

    /**
     * Get schoolsocialgroup.
     *
     * @return \AppBundle\Entity\Schoolsocialgroup|null
     */
    public function getSchoolsocialgroup()
    {
        return $this->schoolsocialgroup;
    }

    /**
     * Set schoolsocialgroup.
     *
     * @param \AppBundle\Entity\Schoolsocialgroup|null $schoolsocialgroup
     *
     * @return Schoolsocialadapt
     */
    public function setSchoolsocialgroup(\AppBundle\Entity\Schoolsocialgroup $schoolsocialgroup = null)
    {
        $this->schoolsocialgroup = $schoolsocialgroup;

        return $this;
    }
}
