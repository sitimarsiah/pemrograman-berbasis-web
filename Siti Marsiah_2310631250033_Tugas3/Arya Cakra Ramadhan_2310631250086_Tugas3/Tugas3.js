
const fibonacci = (n) => {
    let fib = [0, 1];
    for (let i = 2; i < n; i++) {
        fib.push(fib[i - 1] + fib[i - 2]);
    }
    return fib;
};

console.log(fibonacci(20)); 


const calculator = (operator, ...numbers) => {
    switch (operator) {
        case '+':
            return numbers.reduce((acc, curr) => acc + curr, 0);
        case '-':
            return numbers.reduce((acc, curr) => acc - curr);
        case '*':
            return numbers.reduce((acc, curr) => acc * curr, 1);
        case '/':
            return numbers.reduce((acc, curr) => acc / curr);
        case '%':
            return numbers[0] * (numbers[1] / 100);
        default:
            return "Invalid operator";
    }
};

console.log(calculator('+', 20, 40, 30)); 
console.log(calculator('-', 200, 50, 30)); 
console.log(calculator('*', 3, 2, 3)); 
console.log(calculator('/', 500, 10, 5)); 
console.log(calculator('%', 400, 15)); 
