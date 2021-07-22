<?php

declare(strict_types=1);

namespace OOP\Principles\Other\LowCohesion;

// Game class has a low cohesion
class Game
{
    // first set of functions; their purpose is to deal with a game session
    public function signup(): void
    {
        echo 'Signing up...' . PHP_EOL;
    }

    public function login(): void
    {
        echo 'Logging in...' . PHP_EOL;
    }

    // second set of functions; their purpose is to deal with a character's actions
    public function moveCharacterLeft(): void
    {
        echo 'Character is moving left...' . PHP_EOL;
    }

    public function moveCharacterRight(): void
    {
        echo 'Character is moving right...' . PHP_EOL;
    }

    // third set of functions; their purpose is to deal with a player
    public function getPlayerName(): string
    {
        return "Unknown";
    }

    public function getPlayerScore(): int
    {
        return 0;
    }
}

$game = new Game();
$game->signup();
$game->login();
$game->moveCharacterLeft();
$game->moveCharacterRight();
echo "{$game->getPlayerName()} scored {$game->getPlayerScore()} points." . PHP_EOL;