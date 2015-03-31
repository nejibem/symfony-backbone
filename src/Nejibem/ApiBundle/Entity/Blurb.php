<?php

namespace Nejibem\ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Blurb
 *
 * @ORM\Table(name="blurb")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Blurb
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="text", nullable=false)
     */
    private $text;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_date", type="datetime", nullable=false)
     */
    private $createdDate;

    /**
     * @var \Nejibem\ApiBundle\Entity\MyUser
     *
     * @ORM\ManyToOne(targetEntity="Nejibem\ApiBundle\Entity\MyUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;

    /**
     * @var \Nejibem\ApiBundle\Entity\Blurb
     *
     * @ORM\ManyToOne(targetEntity="Nejibem\ApiBundle\Entity\Blurb")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
     * })
     */
    private $parent;



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set text
     *
     * @param string $text
     * @return Blurb
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string 
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @ORM\PrePersist()
     */
    public function prePersist()
    {
        $this->createdDate = new \DateTime("now");
    }

    /**
     * Get createdDate
     *
     * @return \DateTime 
     */
    public function getCreatedDate()
    {
        return $this->createdDate;
    }

    /**
     * Set user
     *
     * @param \Nejibem\ApiBundle\Entity\MyUser $user
     * @return Blurb
     */
    public function setUser(\Nejibem\ApiBundle\Entity\MyUser $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Nejibem\ApiBundle\Entity\MyUser 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set parent
     *
     * @param \Nejibem\ApiBundle\Entity\Blurb $parent
     * @return Blurb
     */
    public function setParent(\Nejibem\ApiBundle\Entity\Blurb $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return \Nejibem\ApiBundle\Entity\Blurb 
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     *  Validate Entity
     */
    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('text', new Assert\NotBlank(array(
            'message' => 'This value must not be blank',
        )));

        $metadata->addPropertyConstraint('text', new Assert\Regex(array(
            'pattern' => '/^[a-zA-Z0-9\., ]+$/i',
            'message' => 'Blurb may only contain letters, numbers, spaces and basic punctuation (,.)',
        )));
    }

}
