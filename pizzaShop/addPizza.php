<?php
require_once "classes/Database.php";
require_once "classes/Pizzas.php";
// connect to the database
$db = new Database();
$conn = $db->connect();

$pizzas = new Pizzas($conn);
?>

<!DOCTYPE html>
<html>

<?php include('templates/header.php') ?>

<h2>Add Pizza</h2>
<hr>
<section class="container grey-text">
    <form class="white" action="addPizza.php" method="POST">
        <label>Pizza Name:</label>
        <input type="text" name="pizzaName">
        <label>Pizza Toppings:</label>
        <input type="text" name="pizzaToppings">
        <div class="center">
            <input type="submit" name="submit" value="submit" class="btn brand">
        </div>
    </form>
</section>

<?php include('templates/footer.php') ?>

</html>

<?php
if (isset($_POST['submit'])) {

    if (!empty($_POST['pizzaName']) && !empty($_POST['pizzaToppings'])) {
        $pizzaName = $_POST["pizzaName"];
        $pizzaToppings = $_POST["pizzaToppings"];

        echo $_POST["pizzaName"] . "<br>";
        echo $_POST["pizzaToppings"] . "<br>";
        $pizzas->addPizza($pizzaName, $pizzaToppings);
        // header("Location: index.php");
    } else {
        echo "Missing pizzaToppings/pizzaName. <br>";
    }
}
?>