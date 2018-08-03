<?php include '../view/header.php'; ?>
<main>
    <section>
        <h1>Size List</h1>
        <table>
            <tr>
                <th>Select Size</th>
                
            </tr>
          
            <?php 
            foreach ($sizes as $size) : ?>
                <tr>
                    <td>
                        <?php echo $size['size']; ?>
                    </td>
                    <td>
                    <form action="." method="post">
                    
                        <input type="submit" value="Delete">
                        
                        <input type="hidden" name="id" value="<?php echo $size['id']; ?>">
                        
                            <input type="hidden" name="action" value="delete_size">
                           
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <p>    
        <?php echo "<a href='size_add.php'>Add size</a>"?>   
        </p>
    </section>
</main>
<?php include '../view/footer.php'; 
