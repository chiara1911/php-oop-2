
<?php
include __DIR__ ."/Product.php";

class Game extends Product
{  
    public string $name;

    public int $appid;

    


    function __construct( $name, $appid, $price, $quantity)
    {
       parent::__construct($price, $quantity);
        $this->name = $name;
        $this->appid = $appid;
       
      
        // $this->authors = $authors;
    }

    function printCard()
    {
        $name = $this->name;
        $appid = $this->appid;     
        $price = $this->price;
        $quantity = $this->quantity;       
        include __DIR__ . "/../View/cardGame.php";
    }
}

$GameList = file_get_contents(__DIR__ . "/steam_db.json");

$GameEl = json_decode($GameList, true);

$Games = [];
foreach ($GameEl as $item) 
{
    $quantity = rand (0,35);
    $price = rand(5,50);
    $Games[] = new Game ($item["name"], $item["appid"],  $price, $quantity);    
}
?>
