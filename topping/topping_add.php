<?php include '../view/header.php';?>
<main>
    <h1>Add toppings to your pizza</h1>
    <form action="index.php" method="post" id="add_topping_form">
        <input type="hidden" name="action" value="add_topping">
        <label>Topping name:</label>
        <input type="text" name="topping_name"/>
        <br>
        <label style="margin-left: 120px;margin-top: 15px;">&nbsp;&nbsp;</label>
        <input type="submit" value="add topping"/>
        <br>
    </form>
    <p class="last_paragraph" style="margin-left: 120px;">
  <a href="index.php?action=list_toppings">View Topping List</a>
    </p>
</main>
<?php include '../view/footer.php';

