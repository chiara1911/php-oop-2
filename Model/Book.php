
<?php
include __DIR__ . "/Product.php";

class Book extends Product
{
    public string $title;

    public string $longDescription;

    public string $thumbnailUrl;
    public string $authors;

    function __construct($title, $longDescription, $thumbnailUrl, $price, $quantity)
    {
        parent::__construct($price, $quantity);
        $this->title = $title;
        $this->longDescription = $longDescription;
        $this->thumbnailUrl = $thumbnailUrl;

        // $this->authors = $authors;
    }

    function printCard()
    {
        $title = $this->title;
        $description = $this->longDescription;
        $image = $this->thumbnailUrl;
        // $authors = $this->authors;
        $price = $this->price;
        $quantity = $this->quantity;
        // $genres = $this->formatGenres();
        include __DIR__ . "/../View/cardBook.php";
    }
}

$BookList = file_get_contents(__DIR__ . "/books_db.json");

$BookEl = json_decode($BookList, true);

$Books = [];
foreach ($BookEl as $item) {
    $quantity = rand(0, 35);
    $price = rand(5, 50);
    $Books[] = new Book($item["title"], substr($item["longDescription"], 20), $item["thumbnailUrl"], $price, $quantity);
}
?>
