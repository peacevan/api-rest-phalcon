<?php
namespace App\Models;
use Phalcon\Mvc\Model;
class Products extends Model
{
    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=20, nullable=false)
     */
    protected $id;
	/**
     *
     * @var integer
     * @Column(type="integer", length=20, nullable=false)
     */
    protected $tenant_id;
	
    /**
     *
     * @var string
     * @Column(type="string", length=36, nullable=true)
     */
    protected $uuid;
    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    protected $title;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    protected $flag;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    protected $image;

     /**
      *
      * @var double
      * @Column(type="double", length=20, nullable=false)
      */
     protected $price;
     /**
      *
      * @var string
      * @Column(type="string", length=255, nullable=false)
      */
     public $description;

     /**
      * Undocumented variable
      * @column(type="datetime", nullable=false)
     */
     protected $created_at;
     
     /**
      * Undocumented variable
      * @column(type="datetime", nullable=false)
     */
     protected $updated_at; 
    /**
     * Method to set the value of field id
     *
     * @param integer $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
    /**
     * Returns the value of field id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
    public function getTenantId()
    {
        return $this->tenant_id;
    }

    public function setTenantId($tenant_id)
    {
        $this->tenant_id = $tenant_id;
        return $this;
    }
    
    public function getUuid()   
    {
        return $this->uuid; 
    }

    public function setUuid($uuid)
    {
        $this->uuid = $uuid;
        return $this;
    }

    public function getTitle()
    {
        return $this->title;
    }
    public function setTitle($title)
    {
        $this->title = $title;
    }
    public function getFlag()   
    {
        return $this->flag; 
    }
    public function setFlag($flag)
    {
        $this->flag = $flag;
        return $this;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
	   // $this->setSchema("laravel");
       $this->setSource('products');
    }
	/**
	 * Returns table name mapped in the model.
	 *
	 * @return string
	 */
    public function getSource2()
    {
        return 'products';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     *
     * @return Products[]|Products
     */
	public static function findProducts($parameters =null)
    {
     // return $this->find($parameters);
     return parent::find($parameters);
    }
    
    public function setImage($image)
    {
        $this->image = $image;
        return $this;
    }

     public function getImage()
    {
        return $this->image;

    }

    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setDescription($description)
    {
        $this->description = $description;  
        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }
    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;
        return $this;
    }


	/**
	 * Allows to query the first record that match the specified conditions
	 *
	 * @param mixed $parameters
	 * @return Products
	 */
	public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    public function saveProduct($data)
	{
        $products = Products::findFirst("id = '$data[id]'");
        $products->description = 'updated';
        $products->update();
    }

}
