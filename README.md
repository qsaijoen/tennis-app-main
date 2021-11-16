# Tennis App

We're developing an application to score tennis games and it is coming along great! However, the programmer who was working on it decided to pursue his lifelong dream of becoming a clown, so he left to join the circus.

The program almost meets the requirements but some things are not quite right yet. That's where **you** come in!

What we **MUST** have:
- ~~The names of the players must be displayed.~~
- ~~When one of the player has won, no further scoring shall be possible.~~
- ~~We need you to refactor the getScore function in TennisGame.php to be more easily maintainable in the future.~~

What we **SHOULD** have:
- ~~When a game is won by one of the players the next one is automatically started.~~
- ~~The previous game results between the same players are displayed along side the current game.~~

What we **COULD** have:
- Associate the individual games with a tennis match and determine the scoring per set.
- When a match is won by one of the players the next one is automatically started.

*Known bugs*:
- ~~A syntax error prevents the program from running~~
- ~~Scoring for player 2 does not seem to work properly~~

### Running the project:
If you are really at home with working with Laravel you'll probably figure it out. But if you are having trouble maybe this will help you out:

Install these things on your computer:
- PHP (7.4 or higher)
- Composer
- Docker
- Git Bash (**Windows Only**: comes as part of Git on Windows)

Now you can simply run (from Git Bash, if on Windows) from the project folder:
`bash ./vendor/bin/sail up`

Run `composer install`.

The app is running on http://localhost:80 (or the port number you set in `.env`)

***N.B.** If you are having trouble with port 80 or 3360 already being taken, check `.env` for a way to circumvent the problem.*

GOOD LUCK!
