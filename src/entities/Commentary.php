<?php

namespace Entity;

/**
 * @Entity
 * @Table(name="commentary")
 */
class Commentary
{
    /**
    * @ManyToOne(targetEntity="Article" , inversedBy="comments")
    * @JoinColumn(name="article", referencedColumnName="id")
    */
    private $article;

    /**
    * @OneToMany(targetEntity="Commentary", mappedBy="parent")
    */
    protected $children;

    /**
    * @ManyToOne(targetEntity="Commentary", inversedBy="children")
    * @JoinColumn(name="idResponse", referencedColumnName="id")
    */
    private $parent;

    /**
    * @var int
    * @Id
    * @Column(type="integer")
    * @GeneratedValue
    */
    protected $id;

    /**
    * @var string
    * @Column(type="text" , length=255)
    */
    protected $pseudo;

    /**
    * @var string
    * @Column(type="text")
    */
    protected $content;

    /**
    * @var datetime
    * @Column(type="datetime")
    */
    protected $dateCrea;

    /**
    * @var int
    * @Column(type="integer")
    */
    protected $idResponse;

    /**
    * @var int
    * @Column(type="integer")
    */
    protected $signalment;

    /**
    * @var int
    * @Column(type="integer")
    */
    protected $lvl;

    public function getId()
    {
        return $this->id;
    }

    public function getPseudo()
    {
        return $this->pseudo;
    }

    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function getDateCrea()
    {
        return $this->dateCrea;
    }

    public function setDateCrea($dateCrea)
    {
        $this->dateCrea = $dateCrea;
    }

    public function getSignalment()
    {
        return $this->signalment;
    }

    public function setSignalment($signalment)
    {
        $this->signalment = $signalment;
    }

    // relation entite

     public function setArticle(Article $article)
     {
       $this->article = $article;
     }

     public function getArticle()
     {
       return $this->article;
     }

     public function __construct()
     {
         $this->children = new \Doctrine\Common\Collections\ArrayCollection();
     }

     public function getParent() {
         return $this->parent;
     }

     public function getChildren() {
         return $this->children;
     }

    public function removeChildren(Commentary $child){
      $this->children->removeElement($child);
    }

     public function addChild(Commentary $child) {
        $this->children[] = $child;
        $child->setParent($this);
     }

     public function setParent(Commentary $parent) {
        $this->parent = $parent;
     }

         public function getLvl()
         {
             return $this->lvl;
         }

         public function setLvl($Lvl)
         {
             $this->lvl = $Lvl;
         }

}
