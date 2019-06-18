<?php


namespace Test;


class Tag
{
    private $open;
    private $closed;

    public function __construct($open, $closed)
    {
        $this->open = $open;
        $this->closed = $closed;
    }

    public function isOpen($tag)
    {
        return $this->open === $tag;
    }

    public function isClosed($tag)
    {
        return $this->closed === $tag;
    }

}
