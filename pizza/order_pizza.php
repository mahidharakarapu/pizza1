<?php include '../view/header.php'; ?>
<main>
    <section>
    <h1> Order Pizza </h1>
    <form action="index.php" method="post" value="add_order" >
<h2>Choose Sizes</h2>
        
            
            <?php foreach ($sizes as $size) : ?>
                
                    <input type="radio" name="size" value="<?php echo $size['size'];?>" ><?php echo $size['size'];?>
               
            <?php endforeach; ?>
        
<h2>Choose Toppings</h2>
         
            
            <?php foreach ($toppings as $topping) : ?>
                
                    <input type="checkbox" name="topping" value="<?php echo $topping['topping']; ?>"><?php echo $topping['topping']; ?>
                
            <?php endforeach; ?>
                <h2>Room No</h2>
                <select name="room">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                </select>
                <input type="hidden" name="action" value="add_order">
                <input type="submit" value="Order Pizza">
    </form> <br>
    </section>
</main>
<?php include '../view/footer.php'; 