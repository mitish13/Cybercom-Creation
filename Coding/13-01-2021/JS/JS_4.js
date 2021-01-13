class data{
    constructor(fName,mass,height){
        this.fName=fName;
        this.mass=mass;
        this.height=height;
    }
    calcBMI(){
        this.BMI=this.mass/(this.height*this.height);
        return `${this.fName}'s BMI is ${this.BMI}`;
    }
}
var obj1=new data("Mark",60,1.6);
var obj2=new data("John",80,1.75);

function higherBMI(){
if(obj1.BMI>obj2.BMI){
    console.log(`${obj1.fName} has higher BMI and it is ${obj1.BMI}`);
}
else if(obj2.BMI>obj1.BMI){
    console.log(`${obj2.fName} has higher BMI and it is ${obj2.BMI}`);
}
else{
    console.log(`Both ${obj1.fName} and ${obj2.fName} has equal BMI and it is ${obj1.BMI}`);
}}