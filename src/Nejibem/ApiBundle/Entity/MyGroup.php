<?php

namespace Nejibem\ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MyGroup
 *
 * @ORM\Table(name="my_group", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_106F60157698A6A", columns={"role"})})
 * @ORM\Entity
 */
class MyGroup
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
     * @ORM\Column(name="name", type="string", length=30, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="role", type="string", length=20, nullable=false)
     */
    private $role;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Nejibem\ApiBundle\Entity\MyUser", mappedBy="group")
     */
    private $user;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->user = new \Doctrine\Common\Collections\ArrayCollection();
    }


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
     * Set name
     *
     * @param string $name
     * @return MyGroup
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set role
     *
     * @param string $role
     * @return MyGroup
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return string 
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Add user
     *
     * @param \Nejibem\ApiBundle\Entity\MyUser $user
     * @return MyGroup
     */
    public function addUser(\Nejibem\ApiBundle\Entity\MyUser $user)
    {
        $this->user[] = $user;

        return $this;
    }

    /**
     * Remove user
     *
     * @param \Nejibem\ApiBundle\Entity\MyUser $user
     */
    public function removeUser(\Nejibem\ApiBundle\Entity\MyUser $user)
    {
        $this->user->removeElement($user);
    }

    /**
     * Get user
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUser()
    {
        return $this->user;
    }
}
