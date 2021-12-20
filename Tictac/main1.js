window.addEventListener('DOMContentLoaded', () => {
    const baloks = Array.from(document.querySelectorAll('.balok'));
    const playerDisplay = document.querySelector('.display-player');
    const resetButton = document.querySelector('#reset');
    const announcer = document.querySelector('.announcer');

    const form = document.querySelector('form');
    const xInput = document.querySelector('#playerX');
    const oInput = document.querySelector('#playerO');
    const startButton = document.querySelector('#start');
    const permainan = document.querySelector('#permainan');
    const scoreX = document.querySelector('.scoreX');
    const scoreO = document.querySelector('.scoreO');
    let playerX = null;
    let playerO = null;
    let xScore = 0;
    let oScore = 0;

    let board = ['', '', '', '', '', '', '', '', ''];
    let currentPlayer = 'X';
    let isGameActive = true;

    const PLAYERX_WON = 'PLAYERX_WON';
    const PLAYERO_WON = 'PLAYERO_WON';
    const TIE = 'TIE';

    const winningConditions = [
        [0, 1, 2],
        [3, 4, 5],
        [6, 7, 8],
        [0, 3, 6],
        [1, 4, 7],
        [2, 5, 8],
        [0, 4, 8],
        [2, 4, 6]
    ];

    function handleResultValidation() {
        let roundWon = false;
        for (let i = 0; i <= 7; i++) {
            const winCondition = winningConditions[i];
            const a = board[winCondition[0]];
            const b = board[winCondition[1]];
            const c = board[winCondition[2]];
            if (a === '' || b === '' || c === '') {
                continue;
            }
            if (a === b && b === c) {
                roundWon = true;
                break;
            }
        }

        if (roundWon) {
            announce(currentPlayer === 'X' ? PLAYERX_WON : PLAYERO_WON);
            isGameActive = false;
            return;
        }

        if (!board.includes(''))
            announce(TIE);
    }

    const announce = (type) => {
        switch (type) {
            case PLAYERO_WON:
                announcer.innerHTML = `<span class="playerO">${playerO}</span> Won`;
                ++oScore;
                scoreO.querySelector('td').innerHTML = oScore;
                break;
            case PLAYERX_WON:
                announcer.innerHTML = `<span class="playerX">${playerX}</span> Won`;
                ++xScore;
                scoreX.querySelector('td').innerHTML = xScore;
                break;
            case TIE:
                announcer.innerText = 'Tie';
        }
        announcer.classList.remove('hide');
    };

    const isValidAction = (balok) => {
        if (balok.innerText === 'X' || balok.innerText === 'O') {
            return false;
        }

        return true;
    };

    const updateBoard = (index) => {
        board[index] = currentPlayer;
    }

    const changePlayer = () => {
        playerDisplay.classList.remove(`player${currentPlayer}`);
        currentPlayer = currentPlayer === 'X' ? 'O' : 'X';
        switch (currentPlayer) {
            case 'X':
                playerDisplay.innerHTML = playerX;
                break;
            case 'O':
                playerDisplay.innerHTML = playerO;
                break;
        }
        playerDisplay.classList.add(`player${currentPlayer}`);
    }

    const userAction = (balok, index) => {
        if (isValidAction(balok) && isGameActive) {
            balok.innerText = currentPlayer;
            balok.classList.add(`player${currentPlayer}`);
            updateBoard(index);
            handleResultValidation();
            changePlayer();
        }
    }

    const resetBoard = () => {
        board = ['', '', '', '', '', '', '', '', ''];
        isGameActive = true;
        announcer.classList.add('hide');

        if (currentPlayer === 'O') {
            changePlayer();
        }

        baloks.forEach(balok => {
            balok.innerText = '';
            balok.classList.remove('playerX');
            balok.classList.remove('playerO');
        });
    }

    baloks.forEach((balok, index) => {
        balok.addEventListener('click', () => userAction(balok, index));
    });

    resetButton.addEventListener('click', resetBoard);

    startButton.addEventListener('click', function(event) {
        event.preventDefault();
        playerX = xInput.value;
        playerO = oInput.value;
        form.classList.add('hide');
        permainan.classList.remove('hide');

        playerDisplay.innerText = playerX;
        scoreX.querySelector('th').innerText = playerX;
        scoreO.querySelector('th').innerText = playerO;
    })
});