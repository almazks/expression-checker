<?php

require __DIR__ . '/vendor/autoload.php';

use Test\ExpressionChecker;
use Test\TagContainer;


$tagContainer = new TagContainer();
$tagContainer->addTag('(', ')');
$tagContainer->addTag('{', '}');
$tagContainer->addTag('[', ']');

$expressionChecker = new ExpressionChecker($tagContainer);

$expression = '(1+2))-(([2*7]))*{5-3}';
echo "Is the expression {$expression} correct? ", $expressionChecker->check($expression) ? 'Yes' : 'No';
echo "\n";

$expression = '(1+2)-(([2*7])])*{{5-3}';
echo "Is the expression {$expression} correct? ", $expressionChecker->check($expression) ? 'Yes' : 'No';
echo "\n";

$expression = '(1+2)-(([2*7]))*{5-3}';
echo "Is the expression {$expression} correct? ", $expressionChecker->check($expression) ? 'Yes' : 'No';
echo "\n";

$expression = '[[(((1+2)-{{(([2*7]))*{5-3}}}))]]';
echo "Is the expression {$expression} correct? ", $expressionChecker->check($expression) ? 'Yes' : 'No';
echo "\n";
