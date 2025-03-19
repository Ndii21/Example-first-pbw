console.log("DERET FIBONACCI");
function fibonacci(n) {
    let fibo = [0, 1]; 
    for (let i = 2; i < n; i++) {
        fibo.push(fibo[i - 1] + fibo[i - 2]);
    }
    return fibo;
}

console.log(fibonacci(20));

console.log("====================================");

console.log("KALKULATOR");
const calculator = (operator, ...numbers) => {
    switch (operator) {
        case '+': 
        return numbers.reduce((a, b) => a + b);
        case '-': 
        return numbers.reduce((a, b) => a - b);
        case '*': 
        return numbers.reduce((a, b) => a * b);
        case '/': 
        return numbers.reduce((a, b) => a / b);
        case '%': 
        return numbers.reduce((a, b) => a % b);
        default: 
        return "Operator tidak valid!";
    }
};

console.log(calculator('+', 10, 5, 3)); 
console.log(calculator('*', 2, 4, 3)); 
console.log(calculator('/', 20, 5));
console.log(calculator('%', 10, 2));
console.log(calculator('-', 10, 3, 2));
