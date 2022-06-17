const dialogBox = document.querySelector('.dialog-box');
const dialogMessage = document.querySelector('.dialog-message');

const emojiContainer = document.querySelector('.kras-container');
const emojiOutput = document.querySelectorAll('.emoji-output');

const winner = Math.floor(Math.random() * 3);
outputEmojis = a => emojiOutput.forEach((emoji, i) => emoji.textContent = a[i]),
shuffleArray = a => {
    for (let i = a.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [a[i], a[j]] = [a[j], a[i]];
    }

    return a;
}

let emojis = ['❌', '❌', '❌', '❌', '💳', '💎','❌','❌'];
let winningEmojisFound = 0;
let emojisRemaining = 0;
let winKraslot = 0;
let message = '';

function startGame() {
        if (winner) {
            emojis.push('💎');
            console.log(winningEmojisFound);
            message = "Congratulations!";
        } else {
            emojis.push('💳');
            message = 'vefrloren!';
        }
    
        outputEmojis(shuffleArray(emojis));
}


// Click on button
emojiContainer.addEventListener('click', e => {

    const target = e.target;

    if (target.classList.contains('emoji-btn') && !target.classList.contains('uncovered')) {

        emojisRemaining--;

        target.classList.add('uncovered');

        if (target.textContent === '💎') {

            target.classList.add('winning-emoji');
            console.log(emojisRemaining);

            winningEmojisFound++;
        }

        if(target.textContent === '💳') {

            winKraslot++;
            console.log(winKraslot);
        }


        if (winKraslot == 2) {
            console.log("Je hebt nog een kraslot gewonnen!")
            message = "Je hebt een kraslot gewonnen!";
        }

        if(emojisRemaining === -9) {


            setTimeout(() => {
                if (winningEmojisFound === 3) {
                    window.alert("Je hebt gewonnen!")
                } else {
                    window.alert("Je hebt verloren!")
                    console.log("Je hebt " + winningEmojisFound + " goeie emojis gevonden!");
                }
            }, 1500);


        }
    }
});

startGame()
// Start game