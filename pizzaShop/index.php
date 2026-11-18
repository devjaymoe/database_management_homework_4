<?php
require_once "classes/Database.php";
require_once "classes/Pizzas.php";
// connect to the database
$db = new Database();
$conn = $db->connect();

$pizzas = new Pizzas($conn);
$pizza_recipes = $pizzas->getPizzas();
?>

<!DOCTYPE html>
<html>

<?php include('templates/header.php') ?>

<h1>Welcome to Pizza Shop</h1>
<hr>
<h3>Pizza Recipes</h3>

<?php foreach ($pizza_recipes as $pizza_recipe): ?>
    <section class="container grey-text">
        <div class='white card center'>
            <p>
                <strong>
                    <?php echo htmlspecialchars($pizza_recipe['pizzaName']) ?>
                </strong>
            </p>
            <p>
                <?php echo htmlspecialchars($pizza_recipe["pizzaToppings"]) ?>
            </p>
        </div>
    </section>
<?php endforeach; ?>

<?php include('templates/footer.php') ?>

</html>