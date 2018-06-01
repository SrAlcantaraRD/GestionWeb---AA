<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserGroupPermission
 *
 * @ORM\Table(name="user_group_permission", indexes={@ORM\Index(name="fk_user_group_permission_user_group1_idx", columns={"user_group_id"})})
 * @ORM\Entity
 */
class UserGroupPermission
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=true)
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="string", length=200, nullable=true)
     */
    private $description;

    /**
     * @var string|null
     *
     * @ORM\Column(name="user_group_permissioncol", type="string", length=45, nullable=true)
     */
    private $userGroupPermissioncol;

    /**
     * @var \UserGroup
     *
     * @ORM\ManyToOne(targetEntity="UserGroup")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_group_id", referencedColumnName="id")
     * })
     */
    private $userGroup;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getUserGroupPermissioncol(): ?string
    {
        return $this->userGroupPermissioncol;
    }

    public function setUserGroupPermissioncol(?string $userGroupPermissioncol): self
    {
        $this->userGroupPermissioncol = $userGroupPermissioncol;

        return $this;
    }

    public function getUserGroup(): ?UserGroup
    {
        return $this->userGroup;
    }

    public function setUserGroup(?UserGroup $userGroup): self
    {
        $this->userGroup = $userGroup;

        return $this;
    }


}
