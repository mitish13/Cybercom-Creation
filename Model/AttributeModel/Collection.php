<?php

class Model_Attribute_Collection
{

    protected $data = [];

    public function setData(array $data)
    {
        $this->data = $data;
        return $this;
    }

    public function getData()
    {
        return $this->data;
    }

    public function count()
    {
        return count($this->data);
    }
}
