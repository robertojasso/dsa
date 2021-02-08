<?php

namespace dsa;

class Node
{
    public $data;
    public $next;

    public function __construct($data = null)
    {
        $this->data = $data;
        $this->next = null;
    }

    public function setData($data = null)
    {
        $this->data = $data;
    }

    public function getData()
    {
        return $this->data;
    }
}

class LinkedList
{
    private $head;
    private $tail;
    const HEAD = 'HEAD';
    const TAIL = 'TAIL';

    public function __construct()
    {
        $this->head = new Node();
        $this->tail = new Node();
        $this->head->data = self::HEAD;
        $this->tail->data = self::TAIL;
        $this->head->next = $this->tail;
    }

    public function insertAtHead($data = null)
    {
        $newNode = new Node($data);
        $newNode->next = $this->head->next;
        $this->head->next = $newNode;
        return $newNode;
    }

    public function insertAtTail($data = null)
    {
        $newNode = new Node($data);
        $this->getLastNode()->next = $newNode;
        $newNode->next = $this->tail;
        return $newNode;
    }

    public function insert($data = null)
    {
        $this->insertAtTail($data);
        return true;
    }

    public function deleteFromHead()
    {
        // do not delete node if only head and tail exist
        if($this->isEmpty()) {
            return false;
        }
        $this->head->next = $this->head->next->next;
        return true;
    }

    public function deleteFromTail()
    {
        // do not delete node if only head and tail exist
        if($this->isEmpty()) {
            return false;
        }
        $this->getPreviousNode($this->getLastNode())->next = $this->tail;
        return true;
    }

    public function delete($data = false)
    {
        if($data != false) {
            $node = $this->search($data);
            $this->getPreviousNode($node)->next = $node->next;
        } else {
            $this->deleteFromTail();
        }
        return true;
    }

    private function getPreviousNode($node)
    {
        if($node == $this->head) {
            // no nodes exist before head
            return false;
        }
        $temp = $this->head;
        while($temp->next != $node) {
            $temp = $temp->next;
        }
        return $temp;
    }

    private function getLastNode()
    {
        return $this->getPreviousNode($this->tail);
    }

    public function search($data)
    {
        if($data == self::HEAD or $data == self::TAIL) {
            return false;
        }
        $node = $this->head;
        while($node->next->data != $data) {
            // data not found in list
            if($node->next == $this->tail) {
                return false;
            }
            $node = $node->next;
        }
        return $node->next;
    }

    public function print($node = false)
    {
        if($node !== false) {
            echo '<i>node: </i>'.$node->data;
            echo ' (<i>previous: </i>'.$this->getPreviousNode($node)->data.', ';
            echo '<i>next: </i>'.$node->next->data.')<br>';
        } else {
            $node = $this->head;
            while($node != $this->tail) {
                echo $node->data . ' -> ';
                $node = $node->next;
            }
            echo $this->tail->data . '<br>';
        }
        return true;
    }

    public function isEmpty()
    {
        if($this->head->next == $this->tail) {
            return true;
        }
        return false;
    }

    private function isLastNode($node)
    {
        if($node->next == $this->tail) {
            return true;
        }
        return false;
    }

    public function reverse()
    {
        $firstNode = $this->head->next;
        if($this->isEmpty() or $this->isLastNode($firstNode)) {
            return false;
        }
        $lastNode = $this->getLastNode();
        $temp = $lastNode;
        while($temp != $this->head) {
            $temp->next = $this->getPreviousNode($temp);
            $temp = $temp->next;
        }
        $firstNode->next = $this->tail;
        $this->head->next = $lastNode;
        return true;
    }
}
