//get size of localStorage users
let localStorageSize = Object.keys(localStorage).length;

//Make an array of objects
var usrAndScores = [];

//create objects of usernames and scores.
for(i = localStorageSize - 1; i >= 0; i--)
{
    //Get user object from local storage
    let key = Object.keys(localStorage)[i];
    let usrObj = JSON.parse(localStorage[key]);

    //Get user object username
    let username = usrObj.username;

    //get user object highscore
    let score = usrObj.highscore;

    //Add object to UsrAndScores array.
    usrAndScores.push({username, score});
}

//Use bubble sort to order the array of users.

//loop from the end of the array
for(i = usrAndScores.length - 1; i >= 0; i--)
{
    //j is the iteration for comparing and swapping from current i
    for(j = 1; j <= i; j++)
    {
        //if the score after is less than score before it, swap
        if(usrAndScores[j-1].score < usrAndScores[j].score)
        {
            let tmp = usrAndScores[j - 1];
            usrAndScores[j - 1] = usrAndScores[j];
            usrAndScores[j] = tmp;
        }
        //else if the next usr score is not more than, then keep their positions.
    }
}

//Load leaderboard on to leaderboard.php file
function loadLeaderboard() 
{
    //output row
    let row = "<table><tr><th><h3>Name</h3></th><th><h3>Score</h3></th></tr>";
    //loop through each element
    for(let i = 0; i < usrAndScores.length; i++){

        //Output row contents
        row += "<tr><td>" + usrAndScores[i].username + "</td><td>" + usrAndScores[i].score + "</td></tr>";
    }

    //end row
    row += "</table>";

    //Add row to the leaderboardTable <div> in leaderboard.php
    document.getElementById("leaderboardTable").innerHTML = row;
}
window.onload = function() 
{
    loadLeaderboard();
}



