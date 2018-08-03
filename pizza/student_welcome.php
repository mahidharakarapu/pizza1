<?php include '../view/header.php'; ?>
<main>
    <section>
        <h1>Welcome Student!</h1>
        
        <h2>Available Sizes</h2>
        <table>
            
            <?php foreach ($sizes as $size) : ?>
                <tr>
                    <td>
                        <?php echo $size['size']; ?>
                    </td>
                    
                </tr>
            <?php endforeach; ?>
        </table>

        <h2>Available Toppings</h2>
         <table>
            
            <?php foreach ($toppings as $topping) : ?>
                <tr>
                    <td>
                        <?php echo $topping['topping']; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <h2>Orders in progress for room </h2>
        <h2>Room No</h2>
        Select room number and click on check room to view status of order:
        <br>
        <form action="index.php" method="post" >
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
                <input type="hidden" name="action" value="progress">
                <input type="submit" value="Check Room">
                <br>
                
        </form>
        <br>
      <table>
              
            <tr>
                <th>id</th>
                <th>room_number</th>
                
                <th>day</th>
                <th>status</th>
            </tr>
            <?php foreach ($roomnumber as $order) : ?>
            <tr>
             <td><?php echo $order['id']; ?></td>
             <td><?php echo $order['room_number']; ?></td>
             <td>
                 <?php 
                 $toppings = $order['topping'];
                 foreach ($toppings as $Toppingss) echo $Toppingss['topping'];
                 ?>
             </td>
             <td><?php echo $order['day']; ?></td>
             <td><?php echo $order['status']; ?></td>
             
             
            <?php endforeach; ?>
            </tr>
            
            
            
        </table>
        <form action="." method="post">
            <input type="hidden" name="action" value="Acknowledge">
                     <input type="hidden" name="id" value="<?php echo $order['id']; ?>">
                     <input type="submit" value="Acknowledge Delivery of Baked Pizzas">
           </form> 
       
        <h2> Press the below Link to order a pizza </h2>
        <form action="." method="post">
            <input type="hidden" name="action" value="order">
                     <input type="hidden" name="id" value="<?php echo $size['id']; ?>">
                     
                     <input type="submit" value="Order Pizza">
                     
        </form>
        <br>
    </section>
    <br>
</main>
<?php include '../view/footer.php'; 