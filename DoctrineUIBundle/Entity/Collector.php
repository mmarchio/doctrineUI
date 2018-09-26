<?php

namespace DoctrineUIBundle\Entity;

class Collector
{
    private $data;

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     *
     * @return Collector
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }
}