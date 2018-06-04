<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserGroupPermission
 *
 * @ORM\Table(name="user_group_permission", indexes={@ORM\Index(name="fk_user_group_permission_permission_idx", columns={"id_permission"}), @ORM\Index(name="fk_user_group_permission_user_group_idx", columns={"id_user_group"})})
 * @ORM\Entity(repositoryClass="App\Repository\UserGroupPermissionRepository")
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
     * @var \Permission
     *
     * @ORM\ManyToOne(targetEntity="Permission")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_permission", referencedColumnName="id")
     * })
     */
    private $idPermission;

    /**
     * @var \UserGroup
     *
     * @ORM\ManyToOne(targetEntity="UserGroup")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user_group", referencedColumnName="id")
     * })
     */
    private $idUserGroup;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdPermission(): ?Permission
    {
        return $this->idPermission;
    }

    public function setIdPermission(?Permission $idPermission): self
    {
        $this->idPermission = $idPermission;

        return $this;
    }

    public function getIdUserGroup(): ?UserGroup
    {
        return $this->idUserGroup;
    }

    public function setIdUserGroup(?UserGroup $idUserGroup): self
    {
        $this->idUserGroup = $idUserGroup;

        return $this;
    }


}
