<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ContactRepository")
 */
class Contact
{

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     *@Assert\NotBlank(message="Fill your last name!")
     * @ORM\Column(name="lastName", type="string", length=255)
     */
    private $lastName;
    /**
     * @var string
     *@Assert\NotBlank(message="Fill your first name!")
     * @ORM\Column(name="firstName", type="string", length=255)
     */
    private $firstName;
    /**
     * @var string
     * @Assert\NotBlank(message="Fill your email!")
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;
    /**
     * @var string
     * @Assert\NotBlank(message="Fill the object!")
     * @Assert\Length(
     *      min = 2,
     *      max = 250,
     *      minMessage = "Text is too short, it has to contain at least {{ limit }} characters",
     *      maxMessage = "Text is too long, it has to contain maximum {{ limit }} characters"
     * )
     * @ORM\Column(name="object", type="string", length=255)
     */
    private $object;
    /**
     * @var string
     * @Assert\NotBlank(message="Write a message!")
     * @Assert\Length(
     *      min = 2,
     *      max = 1000,
     *      minMessage = "Text is too short, it has to contain at least {{ limit }} characters",
     *      maxMessage = "Text is too long, it has to contain maximum {{ limit }} characters"
     * )
     * @ORM\Column(name="message", type="string", length=255)
     */
    private $message;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isPublished;

    //Getters et setters
    /**
     * @return mixed
     */
    public function getIsPublished()
    {
        return $this->isPublished;
    }

    /**
     * @param mixed $isPublished
     */
    public function setIsPublished($isPublished)
    {
        $this->isPublished = $isPublished;
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
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
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getObject(): string
    {
        return $this->object;
    }

    /**
     * @param string $object
     */
    public function setObject(string $object): void
    {
        $this->object = $object;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage(string $message): void
    {
        $this->message = $message;
    }



}