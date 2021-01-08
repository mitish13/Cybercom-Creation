// mass is in kg and height is in metre
var heightJohn=1.55;
var massJohn=64;

var heightMark=1.61;
var massMark=80;

var BMI_John= massJohn/(heightJohn * heightJohn);
var BMI_Mark= massMark/(heightMark*heightMark);

var isHigher= BMI_Mark>BMI_john; //stores wether mark has higher BMI than john
console.log("Is Mark's BMI is higher than John's BMI?: "+isHigher);

