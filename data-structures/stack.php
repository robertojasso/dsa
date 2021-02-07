<?php
class Stack
{
    private $stack;
    private $index;

    public function __construct($size = 10)
    {
        $this->index = -1;
        $this->stack = array_fill(0, $size, null);
        foreach($this->stack as $k=>$v) {
            $this->stack[$k] = null;
        }
        echo "new stack[$size]: ";
        print_r($this->stack);
        echo '<br>';
    }

    public function push($element)
    {
        $i = &$this->index;
        if ($this->isAvailable($i+1)) {
            $i++;
            $this->stack[$i] = $element;
            echo "⤵️ push stack[$i] <- $element<br>";
        } else {
            echo "💥 stack overflow (<strike>stack[".($i+1)."] = $element</strike>)<br>";
        }
    }

    public function pop()
    {
        $i = &$this->index;
        if ($this->isAvailable($i)) {
            $element = $this->stack[$i];
            echo "🍾 pop stack[$i] -> $element<br>";
            $this->stack[$i] = null;
            $i--;
        } else {
            echo "🌵 stack underflow (<strike>stack[$i]</strike>)<br>";
        }
    }

    public function peek()
    {
        if ($this->isAvailable($this->index)) {
            echo '👀 peek: <i>' . $this->stack[$this->index] . '</i><br>';
        } else {
            echo '👀 peek: <i>empty stack</i><br>';
        }
    }

    public function isEmpty()
    {
        echo $this->index < 0 ? '📭 stack is empty<br>' : '📚 stack is not empty<br>';
    }

    public function isAvailable($index)
    {
        // check if index is within array boundaries
        if ($index >= 0 and $index < count($this->stack)) {
            return true;
        }
        return false;
    }
}

$stack = new Stack(2);
$stack->isEmpty();
$stack->push('holi');
$stack->isEmpty();
$stack->peek();
$stack->push('holo');
$stack->push('hola');
$stack->peek();
$stack->pop();
$stack->isEmpty();
$stack->pop();
$stack->isEmpty();
$stack->pop();
$stack->peek();
$stack->pop();