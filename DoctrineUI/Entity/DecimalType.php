<?php

namespace AppBundle\Entity;

class DecimalType extends type
{
    public function __construct(object $d)
    {
        $this->name = $d->name;
        $this->type = "decimal";
        $this->precision = $d->precision ?? 10;
        $this->scale = $d->scale ?? null;
        $this->nullable = $d->nullable ?? false;
        $this->unique = $d->unique ?? false;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getNullable()
    {
        return $this->nullable;
    }

    /**
     * @param mixed $nullable
     */
    public function setNullable($nullable)
    {
        $this->nullable = $nullable;
    }

    /**
     * @return mixed
     */
    public function getUnique()
    {
        return $this->unique;
    }

    /**
     * @param mixed $unique
     */
    public function setUnique($unique)
    {
        $this->unique = $unique;
    }

    /**
     * @return mixed
     */
    public function getPrecision()
    {
        return $this->precision;
    }

    /**
     * @param mixed $precision
     */
    public function setPrecision($precision)
    {
        $this->precision = $precision;
    }

    /**
     * @return mixed
     */
    public function getScale()
    {
        return $this->scale;
    }

    /**
     * @param mixed $scale
     */
    public function setScale($scale)
    {
        $this->scale = $scale;
    }
}