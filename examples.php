<?php

include_once('data-structures/stack.php');
include_once('data-structures/queue.php');
include_once('data-structures/linkedlist.php');

echo '<h3>stack</h3>';
$stack = new dsa\Stack(2);
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

echo '<hr>';

echo '<h3>queue</h3>';
$queue = new dsa\Queue(3);
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

echo '<hr>';

echo '<h3>linkedList</h3>';
$list = new dsa\LinkedList();
$list->insert('hola');
$list->insert('hole');
$list->insert('holi');
$list->insert('holo');
$list->insert('holu');
$list->print();
$list->deleteFromHead();
$list->print();
$list->delete();
$list->delete();
$list->print();
$list->deleteFromHead();
$list->delete();
$list->delete();
$list->deleteFromHead();
$list->deleteFromTail();
$list->print();
$list->insert('homo');
$list->insert('sapiens');
$list->insert('deus');
$list->insert('ex');
$list->insert('machina');
$list->print();
foreach(['deus', 'vice'] as $term) {
    if($list->search($term)) {
        $list->print($list->search($term));
    } else {
        echo "$term <i>not found</i><br>";
    }
}
$list->print();
$list->delete('ex');
$list->print();
$list->delete('homo');
$list->print();
if($list->reverse() == false) {
    echo "cannot reverse<br>";
}
$list->print();
$list->delete();
$list->delete();
$list->delete();
$list->delete();
$list->print();
if($list->reverse() == false) {
    echo "cannot reverse<br>";
}