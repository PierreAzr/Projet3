<?php

namespace Entity;

/**
 * @Entity
 * @Table(name="article")
 */
class Article
{

    //Relation OneToMany un article peux avoir plusieurs commantaires

    /**
     * @OneToMany(targetEntity="Commentary", mappedBy="article")
     */
     protected $comments;

    /**
     * @var int
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    protected $id;

    /**
    * @var int
    * @Column(type="integer")
    */
    protected $number;

     /**
     * @var string
     * @Column(type="string")
     */
    protected $title;

     /**
     * @var string
     * @Column(type="text")
     */
    protected $content;
    /**
    * @var datetime
    * @Column(type="datetime")
    */
    protected $dateArt;

    public function getId()
    {
        return $this->id;
    }

    public function getNumber()
    {
        return $this->number;
    }
    public function setNumber($number)
    {
        $this->number = $number;
    }

    public function getTitle()
    {
        return $this->title;
    }
    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getContent()
    {
        return $this->content;
    }
    public function setContent($content)
    {
        $this->content = $content;
    }

    public function getDateArt()
    {
        return $this->dateArt;
    }

    public function setDateArt($dateArt)
    {
        $this->dateArt = $dateArt;
    }

    //Relation entité
    public function getComments()
    {
        return $this->comments;
    }
    public function setComments(Commentary $comments)
    {
        $this->comments = $comments;
    }
    public function removeComments(Commentary $comments){
      $this->comments->removeElement($comments);
    }


}
