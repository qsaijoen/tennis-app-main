<?php

namespace App\Http\Livewire;

use App\Models\TennisGame;
use Livewire\Component;

class MatchScreen extends Component
{
    public TennisGame $game;
    public string $previousScore = '';
    protected $player1 = 'Piet Sampless';
    protected $player2 = 'Andre Legacy';

    protected $listeners = ['newGame' => '$refresh'];

    public function mount()
    {
        $this->game = TennisGame::create($this->player1, $this->player2);
    }

    public function render()
    {
        return view('livewire.match-screen');
    }

    public function scorePlayer1()
    {
        $this->game->wonPoint('player1');
        $this->game->refresh();

        if (str_contains($this->game->getScore(),'Win for')) {
            $this->newGame();
        }
    }

    public function scorePlayer2()
    {
        $this->game->wonPoint($this->player2);
        $this->game->refresh();

        if (str_contains($this->game->getScore(),'Win for')) {
            $this->newGame();
        }
    }

    public function newGame()
    {
        $this->previousScore = $this->game->getScore();
        $this->game = TennisGame::create($this->player1, $this->player2);
        $this->emit('newGame');
    }
}
