<?php


namespace Test;


class ExpressionChecker
{
    private $tagContainer;
    private $expressionStack = [];

    public function __construct(TagContainerInterface $tagContainer)
    {
        $this->tagContainer = $tagContainer;
    }

    private function pushStack($expression)
    {
        array_push($this->expressionStack, $expression);
        return $expression;
    }

    private function popStack()
    {
        return array_pop($this->expressionStack);
    }

    public function check($expression)
    {
        $strlen = strlen($expression);

        for ($i = 0; $i < $strlen; $i++) {

            if ($this->tagContainer->isOpen($expression[$i])) {

                $this->pushStack($expression[$i]);

            } elseif ($this->tagContainer->isClosed($expression[$i])) {

                if (!$this->tagContainer->isCouple($this->popStack(), $expression[$i])) return false;

            }
        }

        return true;

    }

}
