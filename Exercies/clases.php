<?php
declare(strict_types=1);
class superhero{
//propiedades y metodos


public function __construct(
     public readonly string $name, 
    public array $powers,
    public string $race,
    public string $planet
    ){}

public function attack(){
    
 return "$this->name ataca con sus poderes!";
}

 public function description(){
$powers = implode (",", $this->powers); //convertir el array a string
   return "$this->name es un superheroe de raza $this->race
    y tiene los siguientes poderes: $powers
     y viene del planeta $this->planet \n";


 }

 
public function show_all(){


return get_object_vars($this);
}
} 
 //Onjeto de la clase
$superhero1 = new superhero("spider-man", ["telarañas", "agilidad", "fuerza"], "mutante", "Tierra");
echo $superhero1->description();
echo $superhero1->attack();

var_dump($superhero1->show_all());