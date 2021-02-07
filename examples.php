<?php

include_once('data-structures/stack.php');
include_once('data-structures/queue.php');

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