function fibo(){

// Getting input from user using prompt, 
const n=parseInt(prompt("Enter the number of terms:")) //as prompt will take input as a string

let num1=0; //first number of fibonacci series
let num2=1; //second number of fibonacci series
let nextNum; 

console.log(`Fibonacci series of ${n} terms:`)
for(var i=1;i<=n;i++){
    console.log(num1);
    nextNum=num1+num2;
    num1=num2;
    num2=nextNum;
}}

//calling above function
fibo();
