<?php

namespace classes\Models\Author;

use classes\Models\Model;
use classes\Repositories\Author\AuthorRepository;
use classes\Repositories\Repository;

class AuthorModel implements Model
{
    private int $id = 0;

    private string $name = '';

    private string $secondName = '';

    private string $patronymic = '';

    private ?\DateTime $birthDate;

    private ?\DateTime $deathDate;

    /**
     * @return AuthorRepository
     */
    static public function getRepository(): Repository
    {
        return new AuthorRepository();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getSecondName(): string
    {
        return $this->secondName;
    }

    /**
     * @return string
     */
    public function getPatronymic(): string
    {
        return $this->patronymic;
    }

    /**
     * @return \DateTime|null
     */
    public function getBirthDate(): ?\DateTime
    {
        return $this->birthDate;
    }

    /**
     * @return \DateTime|null
     */
    public function getDeathDate(): ?\DateTime
    {
        return $this->deathDate;
    }

    /**
     * @return string
     */
    public function getFullName(): string
    {
        return "{$this->secondName} {$this->name} {$this->patronymic}";
    }

    /**
     * @return \DateInterval|null
     */
    public function getAge(): ?\DateInterval
    {
        if (!$this->getBirthDate()) {
            return null;
        }

        $now = new \DateTime('now');

        return $this->birthDate->diff($now);
    }

    /**
     * @param int $id
     *
     * @return AuthorModel
     */
    public function setId(int $id): AuthorModel
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @param string $patronymic
     *
     * @return AuthorModel
     */
    public function setPatronymic(string $patronymic): AuthorModel
    {
        $this->patronymic = $patronymic;

        return $this;
    }

    /**
     * @param string $secondName
     *
     * @return AuthorModel
     */
    public function setSecondName(string $secondName): AuthorModel
    {
        $this->secondName = $secondName;

        return $this;
    }

    /**
     * @param string $name
     *
     * @return AuthorModel
     */
    public function setName(string $name): AuthorModel
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @param \DateTime|null $birthDate
     *
     * @return AuthorModel
     */
    public function setBirthDate(?\DateTime $birthDate): AuthorModel
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    /**
     * @param \DateTime|null $deathDate
     *
     * @return AuthorModel
     */
    public function setDeathDate(?\DateTime $deathDate): AuthorModel
    {
        $this->deathDate = $deathDate;

        return $this;
    }
}