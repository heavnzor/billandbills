<?php

namespace App\Model;

use App\Model\Base;
use App\Model\CRUDClient;

class Client implements CRUDClient
{
    private int $idClient;
    private string $lastName;
    private string $firstName;
    private string $email;
    private ?string $phoneNumber;


    /*
    public function __construct(array $data = array())
    {
        if (!empty($data)) {
            foreach ($data as $key => $value) {
                // One gets the setter's name matching the attribute.
                $method = 'set' . ucfirst($key);

                // If the matching setter exists
                if (method_exists($this, $method)) {
                    // One calls the setter.
                    $this->$method($value);
                }
            }
        }
    }
*/


    /**
     * Get the value of idClient
     */
    public function getIdClient()
    {
        return $this->idClient;
    }


    /**
     * Get the value of lastName
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * Set the value of lastName
     *
     * @return  self
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get the value of firstName
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * Set the value of firstName
     *
     * @return  self
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get the value of phoneNumber
     */
    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    /**
     * Set the value of phoneNumber
     *
     * @return  self
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }
}