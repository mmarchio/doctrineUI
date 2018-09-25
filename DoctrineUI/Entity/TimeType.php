<?php

namespace AppBundle\Entity;

class TimeType extends type
{
    public function __construct(object $d)
    {
        $this->setName($d->name);
        $this->setType("time");
        $this->setNullable($d->nullable ?? false);
        $this->setUnique($d->unique ?? false);
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
    private function setName($name)
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
    private function setType($type)
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
    private function setNullable($nullable)
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
    private function setUnique($unique)
    {
        $this->unique = $unique;
    }
}