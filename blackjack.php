<?php
function getCardValue($card)
{
    if ($card == 'K' || $card == 'Q' || $card == 'J') {
        return 10;  
    } elseif ($card == 'A') {
        return 1;  //Ace
    } else {
        return $card;  
    }
}

function drawCards()
{
    $cards = array('2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K', 'A');
    shuffle($cards);
    $drawnCards = array($cards[0], $cards[1]);  
    return $drawnCards;
}

function calculateScore($hand)
{
    $total = 0;
    foreach ($hand as $card) {
        $total += getCardValue($card);  
    }
    return $total;
}

$playerCards = drawCards();
$dealerCards = drawCards();

$playerScore = calculateScore($playerCards);
$dealerScore = calculateScore($dealerCards);

echo "Spielerkarten: " . $playerCards[0] . ", " . $playerCards[1] . " (Gesamtwert: " . $playerScore . ")<br>";
echo "Dealerkarten: " . $dealerCards[0] . ", " . $dealerCards[1] . " (Gesamtwert: " . $dealerScore . ")<br>";

if ($playerScore > $dealerScore) {
    echo "Spieler gewinnt!<br>";
} elseif ($dealerScore > $playerScore) {
    echo "Dealer gewinnt!<br>";
} else {
    echo "Unentschieden!<br>";
}
