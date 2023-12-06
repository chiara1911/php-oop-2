
<?php
include __DIR__ . "/Product.php";

class Game extends Product
{
    public string $name;

    public string $apiUrl;




    function __construct($name, $apiUrl, $price, $quantity)
    {
        parent::__construct($price, $quantity);
        $this->name = $name;
        $this->apiUrl = $apiUrl;
    }

    function printCard()
    {
        $title = $this->name;
        $image = $this->apiUrl;
        $price = $this->price;
        $quantity = $this->quantity;
        $sconto = $this->getDiscount();
        include __DIR__ . "/../View/card.php";
    }
    public static function fetchAll()
    {
        $GameList = file_get_contents(__DIR__ . "/steam_db.json");
        $GameEl = json_decode($GameList, true);
        $Games = [];
        foreach ($GameEl as $item) {
            $quantity = rand(0, 35);
            $price = rand(5, 50);
            $Games[] = new Game($item["name"], $item["apiUrl"],  $price, $quantity);
        }

        return $Games;
    }
}

?>
