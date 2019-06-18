<?php


namespace Test;


interface TagContainerInterface
{
    public function isOpen($tag);

    public function isClosed($tag);

    public function isCouple($open, $closed);

}
