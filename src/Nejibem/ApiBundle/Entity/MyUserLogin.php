<?php

namespace Nejibem\ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MyUserLogin
 *
 * @ORM\Table(name="my_user_login", indexes={@ORM\Index(name="IDX_BF4E361BA76ED395", columns={"user_id"})})
 * @ORM\Entity
 */
class MyUserLogin
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="ip_address", type="string", length=16, nullable=false)
     */
    private $ipAddress;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_date", type="datetime", nullable=true)
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set ipAddress
     *
     * @param string $ipAddress
     * @return MyUserLogin
     */
    public function setIpAddress($ipAddress)
    {
        $this->ipAddress = $ipAddress;

        return $this;
    }

    /**
     * Get ipAddress
     *
     * @return string 
     */
    public function getIpAddress()
    {
        return $this->ipAddress;
    }

    /**
     * Set createdDate
     *
     * @param \DateTime $createdDate
     * @return MyUserLogin
     */
    public function setCreatedDate($createdDate)
    {
        $this->createdDate = $createdDate;

        return $this;
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
     * @return MyUserLogin
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
}
