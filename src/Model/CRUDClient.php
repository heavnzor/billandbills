<?php

namespace App\Model;

interface CRUDClient
{
    /**
     * Get the value of idClient
     */
    public function getIdClient();

    /**
     * Get the value of lastName
     * 
     * @return self
     */
    public function getLastName();

    /**
     * Set the value of lastName
     *
     * @return  self
     */
    public function setLastName(string $lastName);

    /**
     * Get the value of firstName
     */
    public function getFirstName();

    /**
     * Set the value of firstName
     *
     * @return  self
     */
    public function setFirstName(string $firstName);

    /**
     * Get the value of phoneNumber
     * @return self
     */
    public function getPhoneNumber();

    /**
     * Set the value of phoneNumber
     *
     * @return  self
     */
    public function setPhoneNumber(string $phoneNumber);

    /**
     * Get the value of Email
     * @return self
     */
    public function getEmail();

    /**
     * Set the value of Email
     *
     * @return  self
     */
    public function setEmail($email);

    /**
     * Hydrate the client
     *
     * @return  self
     */
}