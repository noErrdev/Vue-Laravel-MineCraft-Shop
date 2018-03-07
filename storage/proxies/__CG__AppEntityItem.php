<?php

namespace DoctrineProxies\__CG__\App\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Item extends \App\Entity\Item implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = [];



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return ['__isInitialized__', '' . "\0" . 'App\\Entity\\Item' . "\0" . 'id', '' . "\0" . 'App\\Entity\\Item' . "\0" . 'name', '' . "\0" . 'App\\Entity\\Item' . "\0" . 'description', '' . "\0" . 'App\\Entity\\Item' . "\0" . 'type', '' . "\0" . 'App\\Entity\\Item' . "\0" . 'image', '' . "\0" . 'App\\Entity\\Item' . "\0" . 'gameId', '' . "\0" . 'App\\Entity\\Item' . "\0" . 'extra', '' . "\0" . 'App\\Entity\\Item' . "\0" . 'products', '' . "\0" . 'App\\Entity\\Item' . "\0" . 'enchantmentItems'];
        }

        return ['__isInitialized__', '' . "\0" . 'App\\Entity\\Item' . "\0" . 'id', '' . "\0" . 'App\\Entity\\Item' . "\0" . 'name', '' . "\0" . 'App\\Entity\\Item' . "\0" . 'description', '' . "\0" . 'App\\Entity\\Item' . "\0" . 'type', '' . "\0" . 'App\\Entity\\Item' . "\0" . 'image', '' . "\0" . 'App\\Entity\\Item' . "\0" . 'gameId', '' . "\0" . 'App\\Entity\\Item' . "\0" . 'extra', '' . "\0" . 'App\\Entity\\Item' . "\0" . 'products', '' . "\0" . 'App\\Entity\\Item' . "\0" . 'enchantmentItems'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Item $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', []);
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', []);
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function getId(): int
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', []);

        return parent::getId();
    }

    /**
     * {@inheritDoc}
     */
    public function getName(): string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getName', []);

        return parent::getName();
    }

    /**
     * {@inheritDoc}
     */
    public function setName(string $name): \App\Entity\Item
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setName', [$name]);

        return parent::setName($name);
    }

    /**
     * {@inheritDoc}
     */
    public function getDescription(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDescription', []);

        return parent::getDescription();
    }

    /**
     * {@inheritDoc}
     */
    public function setDescription(?string $description): \App\Entity\Item
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDescription', [$description]);

        return parent::setDescription($description);
    }

    /**
     * {@inheritDoc}
     */
    public function getType(): string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getType', []);

        return parent::getType();
    }

    /**
     * {@inheritDoc}
     */
    public function setType(string $type): \App\Entity\Item
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setType', [$type]);

        return parent::setType($type);
    }

    /**
     * {@inheritDoc}
     */
    public function getImage(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getImage', []);

        return parent::getImage();
    }

    /**
     * {@inheritDoc}
     */
    public function setImage(?string $image): \App\Entity\Item
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setImage', [$image]);

        return parent::setImage($image);
    }

    /**
     * {@inheritDoc}
     */
    public function getGameId(): string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getGameId', []);

        return parent::getGameId();
    }

    /**
     * {@inheritDoc}
     */
    public function setGameId(string $gameId): \App\Entity\Item
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setGameId', [$gameId]);

        return parent::setGameId($gameId);
    }

    /**
     * {@inheritDoc}
     */
    public function getExtra(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getExtra', []);

        return parent::getExtra();
    }

    /**
     * {@inheritDoc}
     */
    public function setExtra(?string $extra): \App\Entity\Item
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setExtra', [$extra]);

        return parent::setExtra($extra);
    }

    /**
     * {@inheritDoc}
     */
    public function getProducts(): \Doctrine\Common\Collections\Collection
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getProducts', []);

        return parent::getProducts();
    }

    /**
     * {@inheritDoc}
     */
    public function addProduct(\App\Entity\Product $product): \App\Entity\Item
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addProduct', [$product]);

        return parent::addProduct($product);
    }

    /**
     * {@inheritDoc}
     */
    public function addEnchantmentItem(\App\Entity\EnchantmentItem $enchantmentItem): \App\Entity\Item
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addEnchantmentItem', [$enchantmentItem]);

        return parent::addEnchantmentItem($enchantmentItem);
    }

    /**
     * {@inheritDoc}
     */
    public function removeEnchantmentItem(\App\Entity\EnchantmentItem $element): bool
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeEnchantmentItem', [$element]);

        return parent::removeEnchantmentItem($element);
    }

    /**
     * {@inheritDoc}
     */
    public function getEnchantmentItems(): \Doctrine\Common\Collections\Collection
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEnchantmentItems', []);

        return parent::getEnchantmentItems();
    }

}
