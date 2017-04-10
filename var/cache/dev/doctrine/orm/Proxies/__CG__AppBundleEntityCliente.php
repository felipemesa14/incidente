<?php

namespace Proxies\__CG__\AppBundle\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Cliente extends \AppBundle\Entity\Cliente implements \Doctrine\ORM\Proxy\Proxy
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
            return ['__isInitialized__', '' . "\0" . 'AppBundle\\Entity\\Cliente' . "\0" . 'codigoClientePk', '' . "\0" . 'AppBundle\\Entity\\Cliente' . "\0" . 'codigoCiudadFk', '' . "\0" . 'AppBundle\\Entity\\Cliente' . "\0" . 'nombre', '' . "\0" . 'AppBundle\\Entity\\Cliente' . "\0" . 'direccion', '' . "\0" . 'AppBundle\\Entity\\Cliente' . "\0" . 'telefono', 'incidenciasClienteRel', 'ciudadRel', 'usuariosClienteRel'];
        }

        return ['__isInitialized__', '' . "\0" . 'AppBundle\\Entity\\Cliente' . "\0" . 'codigoClientePk', '' . "\0" . 'AppBundle\\Entity\\Cliente' . "\0" . 'codigoCiudadFk', '' . "\0" . 'AppBundle\\Entity\\Cliente' . "\0" . 'nombre', '' . "\0" . 'AppBundle\\Entity\\Cliente' . "\0" . 'direccion', '' . "\0" . 'AppBundle\\Entity\\Cliente' . "\0" . 'telefono', 'incidenciasClienteRel', 'ciudadRel', 'usuariosClienteRel'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Cliente $proxy) {
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
    public function getCodigoClientePk()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getCodigoClientePk();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCodigoClientePk', []);

        return parent::getCodigoClientePk();
    }

    /**
     * {@inheritDoc}
     */
    public function setCodigoCiudadFk($codigoCiudadFk)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCodigoCiudadFk', [$codigoCiudadFk]);

        return parent::setCodigoCiudadFk($codigoCiudadFk);
    }

    /**
     * {@inheritDoc}
     */
    public function getCodigoCiudadFk()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCodigoCiudadFk', []);

        return parent::getCodigoCiudadFk();
    }

    /**
     * {@inheritDoc}
     */
    public function setNombre($nombre)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNombre', [$nombre]);

        return parent::setNombre($nombre);
    }

    /**
     * {@inheritDoc}
     */
    public function getNombre()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNombre', []);

        return parent::getNombre();
    }

    /**
     * {@inheritDoc}
     */
    public function setDireccion($direccion)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDireccion', [$direccion]);

        return parent::setDireccion($direccion);
    }

    /**
     * {@inheritDoc}
     */
    public function getDireccion()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDireccion', []);

        return parent::getDireccion();
    }

    /**
     * {@inheritDoc}
     */
    public function setTelefono($telefono)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTelefono', [$telefono]);

        return parent::setTelefono($telefono);
    }

    /**
     * {@inheritDoc}
     */
    public function getTelefono()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTelefono', []);

        return parent::getTelefono();
    }

    /**
     * {@inheritDoc}
     */
    public function addIncidenciasClienteRel(\AppBundle\Entity\Incidencia $incidenciasClienteRel)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addIncidenciasClienteRel', [$incidenciasClienteRel]);

        return parent::addIncidenciasClienteRel($incidenciasClienteRel);
    }

    /**
     * {@inheritDoc}
     */
    public function removeIncidenciasClienteRel(\AppBundle\Entity\Incidencia $incidenciasClienteRel)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeIncidenciasClienteRel', [$incidenciasClienteRel]);

        return parent::removeIncidenciasClienteRel($incidenciasClienteRel);
    }

    /**
     * {@inheritDoc}
     */
    public function getIncidenciasClienteRel()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIncidenciasClienteRel', []);

        return parent::getIncidenciasClienteRel();
    }

    /**
     * {@inheritDoc}
     */
    public function setCiudadRel(\AppBundle\Entity\Ciudad $ciudadRel = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCiudadRel', [$ciudadRel]);

        return parent::setCiudadRel($ciudadRel);
    }

    /**
     * {@inheritDoc}
     */
    public function getCiudadRel()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCiudadRel', []);

        return parent::getCiudadRel();
    }

    /**
     * {@inheritDoc}
     */
    public function addUsuariosClienteRel(\AppBundle\Entity\Usuario $usuariosClienteRel)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addUsuariosClienteRel', [$usuariosClienteRel]);

        return parent::addUsuariosClienteRel($usuariosClienteRel);
    }

    /**
     * {@inheritDoc}
     */
    public function removeUsuariosClienteRel(\AppBundle\Entity\Usuario $usuariosClienteRel)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeUsuariosClienteRel', [$usuariosClienteRel]);

        return parent::removeUsuariosClienteRel($usuariosClienteRel);
    }

    /**
     * {@inheritDoc}
     */
    public function getUsuariosClienteRel()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUsuariosClienteRel', []);

        return parent::getUsuariosClienteRel();
    }

}
