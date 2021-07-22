<?php

declare(strict_types=1);

namespace OOP\Principles\Other\HighCohesion;

// All classes have a high cohesion because they are designed around a set of related functions:
class GameSession
{
    public function signup(): void
    {
        echo 'Signing up...' . PHP_EOL;
    }

    public function login(): void
    {
        echo 'Logging in...' . PHP_EOL;
    }
}

class Character
{
    public function moveLeft(): void
    {
        echo 'Character is moving left...' . PHP_EOL;
    }

    public function moveRight(): void
    {
        echo 'Character is moving right...' . PHP_EOL;
    }
}

class Player
{
    public function getName(): string
    {
        return "Unknown";
    }

    public function getScore(): int
    {
        return 0;
    }
}

$gameSession = new GameSession();
$gameSession->signup();
$gameSession->login();

$player = new Player();

$character = new Character();
$character->moveLeft();
$character->moveRight();

echo "{$player->getName()} scored {$player->getScore()} points." . PHP_EOL;