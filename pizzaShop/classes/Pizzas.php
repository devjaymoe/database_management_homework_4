<?php

class Pizzas
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function addPizza($pizzaName, $pizzaToppings)
    {
        $sql = "INSERT INTO pizza_recipes (pizzaName, pizzaToppings) VALUES (?, ?)";
        $stmt = $this->conn->prepare($sql);
        // in order to avoid sql injections you are going to use preferreed statements
        // that when when ppl but data into the database it will not trigger sql
        $stmt->bind_param("ss", $pizzaName, $pizzaToppings);
        $stmt->execute();
    }

    public function getPizzas()
    {
        // make sql query
        $sql = "SELECT * FROM pizza_recipes";

        // make query and get results
        $result = $this->conn->query($sql);
        // fetch results in an array 
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
