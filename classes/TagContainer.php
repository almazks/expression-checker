<?php


namespace Test;


class TagContainer implements TagContainerInterface
{
    private $tags = [];

    public function addTag($open, $closed)
    {
        $this->tags[] = new Tag($open, $closed);
    }

    public function isOpen($tag)
    {
        foreach ($this->tags as $_tag) {
            if ($_tag->isOpen($tag)) return true;
        }

        return false;
    }

    public function isClosed($tag)
    {
        foreach ($this->tags as $_tag) {
            if ($_tag->isClosed($tag)) return true;
        }

        return false;
    }

    public function isCouple($open, $closed)
    {
        foreach ($this->tags as $_tag) {
            if ($_tag->isOpen($open) && $_tag->isClosed($closed)) return true;
        }

        return false;
    }

}