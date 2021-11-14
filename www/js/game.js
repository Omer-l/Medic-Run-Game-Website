//**********************      GLOBAL VARIABLES     ***********************
//get Player 2 buttons.
var p2ButtonLeft = document.getElementById("leftBtn");
var p2ButtonRight = document.getElementById("rightBtn");
var p2ButtonDown = document.getElementById("downBtn");
var p2ButtonUp = document.getElementById("upBtn"); 

//return player 1 to default position
function player1Shot()
{
    shotSound.play();
    moveToDefaultPos();
}

//Check if it two player
var is2Player = false;

//initial images and things on game loop
function initGame()
{
    //IF TIMER IS AT 0 END ALL LOOPS
    isGameOver();

    //Set the canvas each loop.
    var canvas = document.getElementById("gamePlaceholder");
    var context = canvas.getContext("2d");
    canvas.width = 900;
    canvas.height = 400;

    //************ DRAW ************ 

    // Draw background image before putting sprite
    let bgImg = document.getElementById("field");
    context.drawImage(bgImg,0,0);

    //Timer
    context.fillStyle = "#191970"; 
    context.font = "25px Comic Sans MS";
    context.fillText("Time Left: " + timeLeft, canvas.width/2 - 45,canvas.height-50);

    //Set score for player 1 on canvas:
    context.font = "50px Comic Sans MS";
    context.fillText("Score: " + player1Score, 0, canvas.height);


    let spriteImage = document.getElementById(currentImage);
    context.drawImage(spriteImage,avatarX,avatarY);

    //If the game is 2 player, draw the 2nd sprite and score
    if(is2Player == true) {

        context.fillText("Score: " + player2Score,canvas.width-250, canvas.height);

        let spriteImage2 = document.getElementById(currentImagePlayer2);
        context.drawImage(spriteImage2,avatar2X,avatar2Y);
    }
    //Draw bullet
    let bulletLeftToRight = document.getElementById("bulletLeftToRight");
    let bulletRightToLeft = document.getElementById("bulletRightToLeft");



    //BULLET LEFT TO RIGHT
    context.drawImage(bulletLeftToRight,bulletR1X, bulletR1Y, 60, 40);
    context.drawImage(bulletLeftToRight,bulletR2X, bulletR2Y, 60, 40);
    context.drawImage(bulletLeftToRight,bulletR3X, bulletR3Y, 60, 40);
    //BULLET RIGHT TO LEFT
    context.drawImage(bulletRightToLeft,bulletL1X, bulletL1Y, 60, 40);
    context.drawImage(bulletRightToLeft,bulletL2X, bulletL2Y, 60, 40);   
    context.drawImage(bulletRightToLeft,bulletL3X, bulletL3Y, 60, 40);

}


//Bullet coordinates, Math.random() is so that they come in different intervals.
//Bullets left to right
bulletR1X = Math.random() * -800;
bulletR1Y = 200;

bulletR2X = Math.random() * -800;
bulletR2Y = 130;

bulletR3X = Math.random() * -800;
bulletR3Y = 270;

//right to left
bulletL1X = Math.random() * (1700 - 970) + 970;
bulletL1Y = 10;

bulletL2X = Math.random() * (1700 - 970) + 970;
bulletL2Y = 240;

bulletL3X = Math.random() * (1700 - 970) + 970;
bulletL3Y = 100;


//Sprite 1 coordinates
avatarX = 360;
avatarY = 352;

//Sprite 2 coordinates
avatar2X = 540;
avatar2Y = 352;

//Sprite width and height for collision calculation
var spriteWidth = 30/2;
var spriteHeight = 48/2 - 5;

//Bullet's width and height for collision calculation
var bulletWidth = 60/2 + 12;
var bulletHeight = 20/2 + 5;

//Initial image of sprite
let currentImage = "up1";
let currentImagePlayer2 = "up1p2";

//class for bullet.
class Bullet
{
    constructor(name,bulletX,bulletY, avatarX, avatarY)
    {
        this.name = name;
        this.bulletX = bulletX;
        this.bulletY = bulletY;
        this.avatarX = avatarX;
        this.avatarY = avatarY;
    }

    //Using distance of x and y values then pythagoras theorem to find the distance from player to bullet
    distanceFromBullet()
    {
        return Math.sqrt(Math.pow(Math.abs(this.bulletY - this.avatarY),2) + Math.pow(Math.abs(this.bulletX - this.avatarX),2));
    }
}

//If players get hit by bullet
function playersShot()
{
    //Using class Bullet, solve distance.

    let bullet1 = new Bullet("bullet1R", bulletR1X, bulletR1Y, avatarX, avatarY);
    let bullet2 = new Bullet("bullet2R", bulletR2X, bulletR2Y, avatarX, avatarY);
    let bullet3 = new Bullet("bullet3R", bulletR3X, bulletR3Y, avatarX, avatarY);

    let bullet4 = new Bullet("bullet1L", bulletL1X, bulletL1Y, avatarX, avatarY);
    let bullet5 = new Bullet("bullet2L", bulletL2X, bulletL2Y, avatarX, avatarY);
    let bullet6 = new Bullet("bullet3L", bulletL3X, bulletL3Y, avatarX, avatarY);

    let bullet1P2 = new Bullet("bullet1R", bulletR1X, bulletR1Y, avatar2X, avatar2Y);
    let bullet2P2 = new Bullet("bullet2R", bulletR2X, bulletR2Y, avatar2X, avatar2Y);
    let bullet3P2 = new Bullet("bullet3R", bulletR3X, bulletR3Y, avatar2X, avatar2Y);

    let bullet4P2 = new Bullet("bullet1L", bulletL1X, bulletL1Y, avatar2X, avatar2Y);
    let bullet5P2 = new Bullet("bullet2L", bulletL2X, bulletL2Y, avatar2X, avatar2Y);
    let bullet6P2 = new Bullet("bullet3L", bulletL3X, bulletL3Y, avatar2X, avatar2Y);


    //If the distance between the player and a bullet is less than their distances to their outer sides added together,  then they are touching.
    if(spriteHeight/2 + bulletWidth > bullet1.distanceFromBullet() 
        || spriteHeight/2 + bulletWidth/2 > bullet4.distanceFromBullet()
        || spriteHeight/2 + bulletWidth > bullet2.distanceFromBullet() 
        || spriteHeight/2 + bulletWidth/2 > bullet5.distanceFromBullet()
        || spriteHeight/2 + bulletWidth/2 > bullet3.distanceFromBullet()
        || spriteHeight/2 + bulletWidth/2 > bullet6.distanceFromBullet())
    {
        player1Shot();
    }

    //If player 2 gets hit
    //RESET PLAYER LOCATION TO BASE
    if(spriteHeight/2 + bulletWidth > bullet1P2.distanceFromBullet() 
        || spriteHeight/2 + bulletWidth/2 > bullet4P2.distanceFromBullet()
        || spriteHeight/2 + bulletWidth > bullet2P2.distanceFromBullet()
        || spriteHeight/2 + bulletWidth/2 > bullet5P2.distanceFromBullet()
        || spriteHeight/2 + bulletWidth/2 > bullet3P2.distanceFromBullet()
        || spriteHeight/2 + bulletWidth/2 > bullet6P2.distanceFromBullet())
    {
        player2Shot();

    }
}


//Player 2 move up
p2ButtonUp.addEventListener('mouseover',player2moveUp,true);
function player2moveUp()
{
    avatar2Y -= 35;
    currentImagePlayer2 = "up1p2";
}
//Player 2 move left
p2ButtonLeft.addEventListener('mouseover',player2moveLeft,true);
function player2moveLeft()
{
    if(avatar2X >= 10)
        avatar2X -= 35;
    currentImagePlayer2 = "left1p2";
}
//Player 2 move right
p2ButtonRight.addEventListener('mouseover',player2moveRight,true);
function player2moveRight()
{
    if(avatar2X <= 859)
        avatar2X += 35;
    currentImagePlayer2 = "right1p2";
}
//Player 2 move down 
p2ButtonDown.addEventListener('mouseover',player2moveDown,true);
function player2moveDown()
{
    if(avatar2Y <= 340)
        avatar2Y +=35;
    currentImagePlayer2 = "down1p2";
}

// Player 1 moves
function arrowKey(e) {
    switch(e.keyCode) {
            //If it was left arrow key
        case 37:
            if(avatarX == -10)
            {
                break;
            }
            currentImage = "left1";
            avatarX -= 10;
            break;
            //If it was right arrow key
        case 39:
            if(avatarX >= 879)
            {
                break;
            }
            currentImage = "right1";
            avatarX += 10;
            break;
            //If it was down arrow key
        case 40:
            if(avatarY >= 352)
            {
                break;
            }
            currentImage = "down1";
            avatarY += 10;
            break;
            //If it was up arrow key
        case 38:
            avatarY -= 10;
            currentImage = "up1";
            break;
    }
}
//return player 1 to default position
function player1Shot()
{
    shotSound.play();
    movePlayer1ToDefaultPos();
}
function player2Shot()
{
    shotSound.play();
    movePlayer2ToDefaultPos();
}

//Player gets point:
function reachedTop()
{
    if(avatarY <= -30)
    {
        player1Score++;
        movePlayer1ToDefaultPos();
        pointSound.play();
    } else if (avatar2Y <= -30)
    {    
        player2Score++;
        movePlayer2ToDefaultPos();
        pointSound.play();
    }   
}
//Set player 1 position to starting position
function movePlayer1ToDefaultPos()
{
    avatarX = 360;
    avatarY = 352;
}

//Set player 2 position to starting position
function movePlayer2ToDefaultPos()
{
    avatar2X = 540;
    avatar2Y = 352;
}

var timeLeft = 30;

var restartBtn = document.getElementById("restartButton");
restartBtn.style.display = "none";

//if timer is 0 clear all intervals
function isGameOver()
{
    if(timeLeft == 0)
    {
        clearInterval(timerInterval);
        clearInterval(gameInterval);
        clearInterval(bulletPlayerInterval); 
        restartBtn.style.display = "block";
    }

    //Store score and a new score
    let newScore = player1Score;

    //If someone is logged in 
    if(sessionStorage.loggedInUsername !== "undefined")
    {
        //get logged in user
        let usrObj = sessionStorage.loggedInUsername;

        //if logged in person is not 'undefined' just in case.
        if(usrObj !== undefined)
        {

            // if logged in, see if it is higher than his current high score.
            let userObject = JSON.parse(localStorage[sessionStorage.loggedInUsername]);
            //then set user score as user highscore.
            if(userObject.highscore < newScore)
            {
                userObject.highscore = newScore;
                localStorage[userObject.username] = JSON.stringify(userObject);
            }
        }
    }


}


//initial scores
var player1Score = 0;
var player2Score = 0;

//mp3 sounds
var shotSound = document.getElementById("shot");
var pointSound = document.getElementById("point");

//if bullet reaches the coordinates:
function bulletLocationTracker()
{
    //BULLET LEFT TO RIGHT REACHES END
    if(bulletR1X >= 970)
    {
        bulletR1X = Math.random() * -800;
    }else
    {
        bulletR1X  += 15 + player1Score;
    }
    if(bulletR2X >= 970)
    {
        bulletR2X = Math.random() * -800;
    }else
    {
        bulletR2X += 15 + player1Score;
    }
    if(bulletR3X >= 970)
    {
        bulletR3X = Math.random() * -800;
    }else
    {
        bulletR3X += 15 + player1Score;
    }

    //BULLET RIGHT TO LEFT REACHES END
    if(bulletL1X <= -70)
    {
        bulletL1X = Math.random() * (1700 - 970) + 970;
    }else
    {
        bulletL1X -= 15 + player1Score;
    }
    if(bulletL2X <= -70)
    {
        bulletL2X = Math.random() * (1700 - 970) + 970;
    }else
    {
        bulletL2X -= 15 + player1Score;
    }
    if(bulletL3X <= -70)
    {
        bulletL3X = Math.random() * (1700 - 970) + 970;
    }else
    {
        bulletL3X -= 15 + player1Score;
    }
}
//TIMER
function timer()
{
    timeLeft--;
}

function initIntervals(gameLoop)
{
    //Event listender for player 1 arrow keys
    window.addEventListener('keydown',arrowKey,true);

    //Intervals to loop through at ms.
    timerInterval = setInterval(timer,1000);
    gameInterval = setInterval(gameLoop,20);
    bulletPlayerInterval = setInterval(bulletLocationTracker,50);
}

//************************ GAME FOR 2 PLAYERS*********************
function game2Player() 
{

    //set intervals and event listeners
    initIntervals(gameLoop);

    //LOOP THROUGHOUT ENTIRE GAME
    function gameLoop() 
    {
        is2Player = true;
        initGame();

        //************ CALCULATING COLLISIONS ************ 

        //RESET PLAYER LOCATION TO BASE
        playersShot(); 

        //if player makes it to the top
        reachedTop();
    }
}
//END OF 2 PLAYER GAME 


//***************** GAME FUNCTION FOR 1 PLAYER*********************
function game1Player (gameLoop)
{

    is2Player = false;

    //Event listeners and intervals
    initIntervals(gameLoop); 

    //LOOP THROUGHOUT ENTIRE GAME
    function gameLoop() 
    {
        initGame();

        //************ CALCULATING COLLISIONS ************ 
        //RESET PLAYER LOCATION
        playersShot(); 
        //IF PLAYER MAKES IT TO THE TOP
        reachedTop();
    }
}
//END OF 1 PLAYER GAME 
