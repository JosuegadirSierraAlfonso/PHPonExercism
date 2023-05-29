<?php

declare(strict_types=1);


class Tournament
{
    private $teams = [];
    public function tally($scores)
    {
        if ($scores) {
            $games = explode("\n", $scores);

            foreach ($games as $game) {
                $gameResult = explode(';', $game);
                switch ($gameResult[2]) {
                    case 'win':
                        $this->getTeam($gameResult[0])->addWin();
                        $this->getTeam($gameResult[1])->addLost();
                        break;
                    case 'loss':
                        $this->getTeam($gameResult[0])->addLost();
                        $this->getTeam($gameResult[1])->addWin();
                        break;
                    case 'draw':
                        $this->getTeam($gameResult[0])->addTied();
                        $this->getTeam($gameResult[1])->addTied();
                        break;
                }
            }

            usort($this->teams, function($teamA, $teamB) {
                if ($teamA->getPoints() == $teamB->getPoints()) {
                    return strcmp($teamA->getName(), $teamB->getName());
                }
                return ($teamA->getPoints() < $teamB->getPoints()) ? 1 : -1;
            });        
        }

        return $this->renderTable();
    }
    private function renderTable()
    {
        $result = sprintf("%-31s| MP |  W |  D |  L |  P", "Team");
        foreach ($this->teams as $team) {
            $result .= "\n";
            $result .= sprintf("%-31s| %2s | %2s | %2s | %2s | %2s", $team->getName(), $team->getMatches(), $team->getWins(), $team->getTieds(), $team->getLosts(), $team->getPoints());
        }
        return $result;
    }
    private function getTeam($name)
    {
        if (isset($this->teams[$name])) {
            $team = $this->teams[$name];
        } else {
            $team = new Team($name);
            $this->teams[$name] = $team;
        }
        return $team;
    }
}
class Team
{
    private $name;
    private $wins = 0;
    private $tieds = 0;
    private $losts = 0;
    private $matches = 0;
    public function __construct($name)
    {
        $this->name = $name;
    }
    public function addWin()
    {
        $this->wins++;
        $this->matches++;
    }
    public function addTied()
    {
        $this->tieds++;
        $this->matches++;
    }
    public function addLost()
    {
        $this->losts++;
        $this->matches++;
    }
    public function getPoints()
    {
        return $this->wins * 3 + $this->tieds;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getWins()
    {
        return $this->wins;
    }
    public function getTieds()
    {
        return $this->tieds;
    }
    public function getLosts()
    {
        return $this->losts;
    }
    public function getMatches()
    {
        return $this->matches;
    }
}


/* class Tournament
{
    public $MP = [];
    public $W = [];
    public $D = [];
    public $L = [];
    public function __construct($scores)
    {
        $this->equipos = explode(";", $scores);

    }
    public function asignacionPuntos(){
        var_dump($this->equipos);
       
        foreach ($this->equipos as $key => $value) {
            if($key%3 == 2){
                switch ($this->equipos[$key]) {
                    case 'win':
                        $nombreEquipo = $this->equipos[$key-2];
                        $nombreEquipo2 = $this->equipos[$key-1];
                        ($this->W[$nombreEquipo] ?? null) ? $this->W[$nombreEquipo] += 1 : $this->W[$nombreEquipo] = 1;
                        ($this->L[$nombreEquipo2] ?? null) ? $this->L[$nombreEquipo2] += 1 : $this->L[$nombreEquipo2] = 1;
                        break;
                    case 'draw':
                        $nombreEquipo = $this->equipos[$key-2];
                        $nombreEquipo2 = $this->equipos[$key-1];
                        ($this->D[$nombreEquipo] ?? null) ? $this->D[$nombreEquipo] += 1 : $this->D[$nombreEquipo] = 1;
                        ($this->D[$nombreEquipo2] ?? null) ? $this->D[$nombreEquipo2] += 1 : $this->D[$nombreEquipo2] = 1;
                        break;
                    case 'loss':
                        $nombreEquipo = $this->equipos[$key-1];
                        $nombreEquipo2 = $this->equipos[$key-2];
                        ($this->W[$nombreEquipo] ?? null) ? $this->W[$nombreEquipo] += 1 : $this->W[$nombreEquipo] = 1;
                        ($this->L[$nombreEquipo2] ?? null) ? $this->L[$nombreEquipo2] += 1 : $this->L[$nombreEquipo2] = 1;
                        break;
                }
            }else{
                ($this->MP[$this->equipos[$key]] ?? null) ? $this->MP[$this->equipos[$key]] += 1 : $this->MP[$this->equipos[$key]] = 1;
            }
        }
    }
}
$obj = new Tournament("Allegoric Alaskans;Blithering Badgers;win;Devastating Donkeys;Courageous Californians;draw;Devastating Donkeys;Allegoric Alaskans;win;Courageous Californians;Blithering Badgers;loss;Blithering Badgers;Devastating Donkeys;loss;Allegoric Alaskans;Courageous Californians;win");
$obj->asignacionPuntos();
var_dump($obj->MP);
var_dump($obj->W);
var_dump($obj->D);
var_dump($obj->L); */
?>