var tip; //this variable holds the tip accoring to bill 
var totalAmount; //this variable holds the total amount after adding  tip
var tipArray=[]; //this array holds tips for all orders
var paidAmountArray=[]; //this array holds all the amounts that has been paid after adding tips

function tipCalc(amount){
    if(amount<=50){
        tip=Math.round(amount*20/100);
        totalAmount=amount+tip;
        tipArray.push(tip);
        paidAmountArray.push(totalAmount);
        return null;  
    }
    else if(amount<=200){
        tip=Math.round(amount*15/100);
        totalAmount=amount+tip;
        tipArray.push(tip);
        paidAmountArray.push(totalAmount);
        return null; 
    }
    else{
        tip=Math.round(amount*10/100);
        totalAmount=amount+tip;
        tipArray.push(tip);
        paidAmountArray.push(totalAmount); 
    }
}

// Calculating tips for given 3 orders
tipCalc(124);
tipCalc(48);
tipCalc(268);

