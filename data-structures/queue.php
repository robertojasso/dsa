<?php

class Queue
{
    private $queue;
    private $index;
    private $verbose;

    public function __construct($size = 10, $verbose = true)
    {
        $this->index = 0;
        
        $this->queue = array_fill(0, $size, null);
        foreach ($this->queue as $k => $v) {
            $this->queue[$k] = null;
        }

        $this->verbose = $verbose;
        $this->print('init', $size);
    }

    public function enqueue($element)
    {
        $i = &$this->index;
        if($this->isAvailable($i)) {
            $this->queue[$i] = $element;
            $this->print('enqueue', $i, $element);
            $i++;
            return true;
        } else {
            $this->print('overflow', $i, $element);
            return false;
        }
    }

    public function dequeue()
    {
        if(!is_null($this->queue[0])) {
            $element = $this->queue[0];
            $this->queue[0] = null;
            $this->index--;
            $this->requeue();
            $this->print('dequeue', 0, $element);
            return $element;
        } else {
            $this->print('underflow', 0);
            return false;
        }
    }

    private function requeue()
    {
        for($x = 0; $x < $this->index; $x++) {
            $this->queue[$x] = $this->queue[$x+1];
        }
        $this->queue[$this->index] = null;
    }

    public function peek()
    {
        if(!is_null($this->queue[0])) {
            $element = $this->queue[0];
            $this->print('peek', 0, $element);
            return $element;
        } else {
            $this->print('empty', 0);
        }
    }

    public function isEmpty()
    {
        if(is_null($this->queue[0])) {
            $this->print('empty', 0);
            return true;
        }
        $this->print('notempty', 0);
        return false;
    }

    private function isAvailable($index)
    {
        // check if index is within array boundaries
        if ($index >= 0 and $index < count($this->queue)) {
            return true;
        }
        return false;
    }

    private function print($type, $i, $e = null)
    {
        if($this->verbose) {
            switch ($type) {
                case 'init':
                    echo "new queue[$i]: ";
                    print_r($this->queue);
                    echo '<br>';
                    break;
                case 'enqueue':
                    echo "⤵️ enqueue queue[$i] <- $e<br>";
                    break;
                case 'dequeue':
                    echo "🍾 dequeue queue[$i] -> $e<br>";
                    break;
                case 'peek':
                    echo "👀 peek: <i>$e</i><br>";
                    break;
                case 'empty':
                    echo '📭 queue is empty<br>';
                    break;
                case 'notempty':
                    echo '📚 queue is not empty<br>';
                    break;
                case 'overflow':
                    echo "💥 queue overflow (<strike>queue[$i] = $e</strike>)<br>";
                    break;
                case 'underflow':
                    echo "🌵 queue underflow (<strike>queue[$i]</strike>)<br>";
                    break;
                default:
                    break;
            }
        }
        return;
    }
}

$queue = new Queue(3);
$queue->isEmpty();
$queue->enqueue('equis');
$queue->peek();
$queue->enqueue('yolo');
$queue->enqueue('swag');
$queue->enqueue('badabum');
$queue->peek();
$queue->dequeue();
$queue->peek();
$queue->isEmpty();
$queue->dequeue();
$queue->dequeue();
$queue->dequeue();
$queue->peek();