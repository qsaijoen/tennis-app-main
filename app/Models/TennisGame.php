<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TennisGame extends Model
{
    use HasFactory;

    protected $guarded = [];

    private $P1res = "";
    private $P2res = "";
    private $isDone = false;

    public static function create($player1Name, $player2Name)
    {
        $game = new self();
        $game->player1 = $player1Name;
        $game->player2 = $player2Name;
        $game->save();
        return $game;
    }

    public function getScore()
    {
        if ($this->P1point >= 4 && ($this->P1point - $this->P2point) >= 2) {
            $this->isDone = true;
            return "Win for {$this->player1}";
        }

        if ($this->P2point >= 4 && ($this->P2point - $this->P1point) >= 2) {
            $this->isDone = true;
            return "Win for {$this->player2}";
        }

        if ($this->P1point > $this->P2point && $this->P2point >= 3) {
            return "Advantage {$this->player1}";
        }

        if ($this->P2point > $this->P1point && $this->P1point >= 3) {
            return "Advantage {$this->player2}";
        }

        if ($this->P1point == $this->P2point && $this->P1point >= 3) {
            return "Deuce";
        }

        if ($this->P1point == $this->P2point) {
            return "{$this->pointsToScore( $this->P1point )}-All";
        }

        return "{$this->pointsToScore( $this->P1point )}-{$this->pointsToScore( $this->P2point )}";
    }

    private function pointsToScore($points)
    {
        switch ($points) {
            case 0:
                return 'Love';
            case 1:
                return 'Fifteen';
            case 2:
                return 'Thirty';
            case 3:
                return 'Forty';
        }
    }

    private function SetP1Score($number)
    {
        for ($i = 0; $i < $number; $i++) {
            $this->P1Score();
        }
    }

    private function SetP2Score($number)
    {
        for ($i = 0; $i < $number; $i++) {
            $this->P2Score();
        }
    }

    private function P1Score()
    {
        $this->update(['P1point' => $this->P1point + 1]);
        $this->refresh();
    }

    private function P2Score()
    {
        $this->update(['P2point' => $this->P2point + 1]);
        $this->refresh();
    }

    public function wonPoint($player)
    {
        if ($player == "player1") {
            $this->P1Score();
        } else {
            $this->P2Score();
        }
    }

    public function isDone()
    {
        return $this->isDone;
    }
}
