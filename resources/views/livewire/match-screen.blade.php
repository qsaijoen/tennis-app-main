<div>
    <h1>Players: {{ $game->player1 }} - {{ $game->player2}}
    <h1>Previous Game: {{ $previousScore }}</h1>
    <h1>Score: {{ $game->getScore() }}</h1>
    <button wire:click="scorePlayer1()" {{ $game->isDone() ? 'disabled' : '' }}>{{ $game->player1 }} scoort!</button>
    <button wire:click="scorePlayer2()" {{ $game->isDone() ? 'disabled' : '' }}>{{ $game->player2 }} scoort!</button>
</div>
