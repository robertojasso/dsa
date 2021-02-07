# data structures & algorithms

## stack
### code
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
### result
new stack[2]: Array ( [0] => [1] => )
📭 stack is empty  
⤵️ push stack[0] <- holi  
📚 stack is not empty  
👀 peek: holi  
⤵️ push stack[1] <- holo  
💥 stack overflow (stack[2] = hola)  
👀 peek: holo  
🍾 pop stack[1] -> holo  
📚 stack is not empty  
🍾 pop stack[0] -> holi  
📭 stack is empty  
🌵 stack underflow (stack[-1])  
👀 peek: empty stack  
🌵 stack underflow (stack[-1])  