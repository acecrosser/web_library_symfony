<?php

namespace App\Entity;

use App\Repository\BooksRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BooksRepository::class)
 */
class Books
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", nullable=false)
     */
    private $title;

    /**
     * @ORM\Column(type="string", nullable=false)
     */
    private $author;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $year;

    /**
     * @ORM\Column(type="string", nullable=false)
     */
    private $body;

    /**
     * @ORM\Column(type="string", nullable=false)
     */
    private $slug;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created;


    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }
    
    /**
    * @param mixed $title
    */
    public function setTitle($title): void
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }
    
    /**
    * @param mixed $author
    */
    public function setAuthor($author): void
    {
        $this->author = $author;
    }

    /**
     * @return mixed
     */
    public function getYear()
    {
        return $this->year;
    }
    
    /**
    * @param mixed $year
    */
    public function setYear($year): void
    {
        $this->year = $year;
    }

    /**
     * @return mixed
     */
    public function getBody()
    {
        return $this->body;
    }
    
    /**
    * @param mixed $body
    */
    public function setBody($body): void
    {
        $this->body = $body;
    }

    /**
     * @return mixed
     */
    public function getSlug()
    {
        return $this->slug;
    }
    
    /**
    * @param mixed $slug
    */
    public function setSlug($slug): void
    {
        $this->slug = $slug;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getCreated(): ?\DateTimeInterface
    {
        return $this->created;
    }
    
    /**
    * @param \DateTimeInterface $created
    */

    public function setCreated(\DateTimeInterface $created): void
    {
        $this->created = $created;
    }
}
