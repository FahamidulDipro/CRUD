<!-- <form action="/CRUD/test.php" method="POST">
     Password: <input type="password" name="password">
     <input type="submit">
</form> -->

<?php
// echo $_POST["password"];
?>
 <!-- Form  Starts-->
 <div class="container my-5">
        <h1 class="text-center">Add Your Notes</h1>
        <form action="/CRUD/test.php" method="post">
            <div class="mb-3">
                <label for="note_title" class="form-label">Note Title</label>
                <input type="text" name="note_title" class="form-control" id="note_title">

            </div>
            <div class="mb-3">
                <label for="note_desc" class="form-label">Note Description</label>
                <textarea class="form-control " name="note_desc" id="note_desc" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-info">Add Note</button>
        </form>
    </div>
    <!-- Form  Endss-->
    <?php
    $tit = $_POST['note_title'];
    $desc = $_POST['note_desc'];
    echo $tit;
    echo"<br>";
    echo $desc;
    ?>