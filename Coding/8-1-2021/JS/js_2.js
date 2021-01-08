var johnAvg=(89+120+103)/3;
var mikeAvg=(116+94+123)/3;
var isSame=johnAvg==mikeAvg?true:false;

//using ternary operator

var isHighest=johnAvg>mikeAvg?console.log("John's team is a winner with "+johnAvg+" scores"):isSame?console.log("It's a draw, Both team's score is same and it is "+mikeAvg): console.log("Mike's team is a winner with "+mikeAvg+" scores");

// Extraa excercise

var maryAvg=(97+134+105)/3;

if(johnAvg>mikeAvg && johnAvg>maryAvg){
    console.log("John's team is a winner with "+johnAvg+" scores")
}
else if(mikeAvg>johnAvg && mikeAvg>maryAvg){
    console.log("Mike's team is a winner with "+mikeAvg+" scores")
}
else if(maryAvg>mikeAvg && maryAvg>johnAvg){
    console.log("Mary's team is a winner with "+maryAvg+" scores")
}
else{
    if(isSame){
        if(mikeAvg>maryAvg){
            console.log("We have two winners, It's draw between Mike's team and John's team, both scored "+mikeAvg);
        }
        else if(maryAvg>mikeAvg){
            console.log("Mary's team is a winner with "+maryAvg+" scores");
        }
        else{
            console.log("It's a draw, All three teams scores are same and it is "+mikeAvg);
        }
    }
}