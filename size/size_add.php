<?php include '../view/header.php';?>
<main>
    <section>
    <h1>Add sizes to your pizza</h1>
    <form action="index.php" method="post" id="add_size_form">
        <input type="hidden" name="action" value="add_size">
        <label>size name:</label>
        <input type="text" name="size_name"/>
        <br>
        <label style="margin-left: 120px;margin-top: 15px;">&nbsp;&nbsp;
        </label>
        <input type="submit" value="select size"/>
        <br>
    </form>
    <p>
        <a href="index.php?action=list_sizes">view Pizza size</a>
   </p>
    </section>
</main>
<?php include '../view/footer.php';