<?php include '../view/header.php'; ?>
<main>
    <section>
        <h1>Current Orders Report</h1>
        <h2>Orders Baked but not delivered</h2>
        <table>
            <tr>
                <th>id</th>
                
                <th>room_number</th>
                
                <th>day</th>
                
                <th>status</th>
            </tr>
            
            <?php foreach ($orderdetails as $order) : ?>
            <tr>
             <td>
                 <?php echo $order['id']; ?>
             </td>
             <td>
                 <?php echo $order['room_number']; ?>
             </td>
             <td>
                 <?php echo $order['day']; ?>
             </td>
             <td>
                 <?php echo $order['status']; ?>
             </td>
             
            <?php endforeach; ?>
             
            </tr>
        </table>
          
        <h2>Orders Preparing(in the oven): Any ready now?</h2>            
        <table>
              
            <tr>
                <th>id</th>
                <th>room_number</th>
                <th>day</th>
                <th>status</th>
            </tr>
            <?php foreach ($orders as $order) : ?>
            <tr>
             <td>
                 <?php echo $order['id']; ?>
             </td>
             <td>
                 <?php echo $order['room_number']; ?>
             </td>
             <td>
                 <?php echo $order['day']; ?>
             </td> 
             <td>
                 <?php echo $order['status']; ?>
             </td>
            <?php endforeach; ?>
            </tr>
            
        </table>
        
         <form action="index.php" method="post">
             
                     <input type="hidden" name="action" value="update_baked">
                     
                     <input type="submit" value="Mark oldest pizza Baked">
         </form>
        
        <br>  
      <!--<h2>Orders Finished</h2>-->
        
                    
      
    </section>
</main>
<?php include '../view/footer.php'; 