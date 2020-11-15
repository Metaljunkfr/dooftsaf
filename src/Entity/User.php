<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\UserRepository;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="app_user")
 * @UniqueEntity(fields={"email"}, message="This email is already registered!")
 * @UniqueEntity(fields={"username"}, message="This username already exists!")
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements UserInterface
{

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     *@Assert\Length(
     *      min = 4,
     *      max = 25,
     *      minMessage = "Username is too short, it has to contain at least {{ limit }} characters",
     *      maxMessage = "Username is too long, it has to contain maximum {{ limit }} characters"
     * )
     * @Assert\Regex(pattern="/^[a-z0-9_-]+$/i", message="Username has to contain only letters, numbers, underscores and dots!")
     * @Assert\NotBlank(message="Fill your username!")
     * @ORM\Column(type="string", length=25, unique=true)
     */
    private $username;

    /**
     * @var string
     *@Assert\NotBlank(message="Fill your last name!")
     * @ORM\Column(name="lastname", type="string", length=255)
     */
    private $lastName;
    /**
     * @var string
     *@Assert\NotBlank(message="Fill your first name!")
     * @ORM\Column(name="firstname", type="string", length=255)
     */
    private $firstName;

    /**
     * @Assert\Email(message="Email address is incorrect!")
     * @Assert\NotBlank(message="Fill your email address!")
     * @ORM\Column(type="string", length=60, unique=true)
     */
    private $email;

    /**
     * @Assert\Length(
     *      min = 8,
     *      max = 4096,
     *      minMessage = "Password is too short, it has to contain at least {{ limit }} characters",
     *      maxMessage = "Password is too long, it has to contain maximum {{ limit }} characters"
     * )
     * @Assert\NotBlank(message="Fill your password!")
     * @ORM\Column(type="string", length=64)
     */
    private $password;

    /**
     * @ORM\Column(type="datetime")
     */
    private $creationDate;

    /**
     * @ORM\Column(name="roles", type="string")
     */
    private $roles;


    //Getters et setters
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }



    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }



    /**
     * @return mixed
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * @param mixed $creationDate
     */
    public function setCreationDate($creationDate): void
    {
        $this->creationDate = $creationDate;
    }





    /**
     * @return mixed
     */
    public function getRoles()
    {
        return [$this->roles];
    }

    public function setRoles(string $roles)
    {
        if ($roles === null) {
            $this->roles = "ROLE_USER";
        } else {

        $this->roles = $roles;
        }
        return $this;
    }

    //Inutile...
    public function getSalt()
    {
        return null;
    }

    //Inutile...
    public function eraseCredentials()
    {

    }




}
