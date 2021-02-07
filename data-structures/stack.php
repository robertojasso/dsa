<?php

namespace dsa;

class Stack
{
    private $stack;
    private $index;
    private $verbose;

    public function __construct($size = 10, $verbose = true)
    {
        $this->index = -1;
        
        $this->stack = array_fill(0, $size, null);
        foreach($this->stack as $k => $v) {
            $this->stack[$k] = null;
        }

        $this->verbose = $verbose;
        $this->print('init', $size);
    }

    public function push($element)
    {
        $i = &$this->index;
        if ($this->isAvailable($i+1)) {
            $i++;
            $this->stack[$i] = $element;
            $this->print('push', $i, $element);
            return true;
        } else {
            $this->print('overflow', $i+1, $element);
            return false;
        }
    }

    public function pop()
    {
        $i = &$this->index;
        if ($this->isAvailable($i)) {
            $element = $this->stack[$i];
            $this->stack[$i] = null;
            $i--;
            $this->print('pop', $i+1, $element);
            return $element;
        } else {
            $this->print('underflow', $i);
        }
    }

    public function peek()
    {
        $i = $this->index;
        if ($this->isAvailable($i)) {
            $this->print('peek', $i, $this->stack[$i]);
            return $this->stack[$i];
        } else {
            $this->print('empty', $i);
            return false;
        }
    }

    public function isEmpty()
    {
        $i = $this->index;
        if($i < 0) {
            $this->print('empty', $i);
            return true;
        } else {
            $this->print('notempty', $i);
            return false;
        }
    }

    private function isAvailable($index)
    {
        // check if index is within array boundaries
        if ($index >= 0 and $index < count($this->stack)) {
            return true;
        }
        return false;
    }

    private function print($type, $i, $e = null)
    {
        if($this->verbose) {
            switch ($type) {
                case 'init':
                    echo "new stack[$i]: ";
                    print_r($this->stack);
                    echo '<br>';
                    break;
                case 'push':
                    echo "⤵️ push stack[$i] <- $e<br>";
                    break;
                case 'pop':
                    echo "🍾 pop stack[$i] -> $e<br>";
                    break;
                case 'peek':
                    echo "👀 peek: <i>$e</i><br>";
                    break;
                case 'empty':
                    echo '📭 stack is empty<br>';
                    break;
                case 'notempty':
                    echo '📚 stack is not empty<br>';
                    break;
                case 'overflow':
                    echo "💥 stack overflow (<strike>stack[$i] = $e</strike>)<br>";
                    break;
                case 'underflow':
                    echo "🌵 stack underflow (<strike>stack[$i]</strike>)<br>";
                    break;
                default:
                    break;
            }
        }
        return;
    }
}
