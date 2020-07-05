<?php
include('AppRoot/init.inc.php'); 
if($sessionULe != 'Admin' && $sessionULe != 'Librarian' ) :
    redirect('profile.php');
endif;
$title = 'Catalog Details';
if(isset($_POST['deleteCatalog'])){
    extract($_POST);
    deleteCatalog('catalog', 'CatalogID', $id);
}
$catStatus = 'Deleted'; $state = '0'; $catStatus1 = 'Lost'; $filter = '';
if(isset($_POST['search'])){
    extract($_POST);
}
if(isset($_POST['borrow'])){
    if(isset($_POST['selector']) && isset($_POST['dueDate']) ){
        $id = $_POST['selector'];
        $userID = $_POST['userID'];
        $dueDate = $_POST['dueDate'];
        borrowBook($userID, $dueDate, $id);
    }else{
        array_push($errors, 'Makesure you selected book(s), user and due date before click borrow');
    }
}
if(isset($_POST['search'])){
    extract($_POST);
}

?>

<!DOCTYPE HTML>
<html>
    <?php require_once 'AppRoot/Includes/head.inc';?>
    <body>
      <div id="main">
          <?php include 'AppRoot/Includes/header.inc'; ?>
          <?php include 'AppRoot/Includes/navigation.inc'; ?>
        <div id="site_content">
            <div class="my-title">Borrow book(s) </div>
            <?php include('AppRoot/Includes/searchForm.inc'); ?>
                <?php if(isset($_POST['borrow'])) include 'AppRoot/Includes/errors.php'; ?>
            <form  class="form-input" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="top-borrow">
                    <table  class="form-wrap">
                        <tr>
                            <td>User to borrow book</td><td>Due Date</td><td>Commit</td>
                        </tr>
                        <tr>
                            <td>
                                <select class="input-boxes" name="userID">
                                    <?php foreach (getDataFromTable('users') as $user) : extract($user); ?>
                                    <option value="<?php echo $userID; ?>"><?php echo $userNo .": ". $fName ." ". $sName; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                            <td>
                                <input class="input-boxes"  id="datepicker" type="text" name="dueDate" placeholder="Due date" readonly="readonly">
                            </td>
                            <td>
                                <input type="submit" value="Borrow now" class="form-button" name="borrow">
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="contents-manage">
                    <table class="data-table">
                        <tr>
                           <th>Select Books</th>
                           <th>Catalog Number</th><th>Book title</th><th>Publisher</th>
                           <th>Author</th><th>ISBN</th><th>Price</th><th>Classification</th><th>Catalog Status</th>
                        </tr>
                            <tbody>
                            <?php 
                            $number = 1;
                            foreach (viewCatalogs($catStatus, $catStatus1, $state, $filter) as $catalog) : 
                                extract($catalog);
                            ?>
                                <tr>
                                    <td><input type="checkbox" class="boxes" data-max="2" value="<?php echo $catalogID;?>" name="selector[]"></td>
                                    <td><?= $catalogNo; ?></td>
                                    <td><?= $bookTitle; ?></td>
                                    <td><?= $bookPub; ?></td>
                                    <td><?= $author; ?></td>
                                    <td><?= $ISBN; ?></td>
                                    <td><?= $price; ?></td>
                                    <td><?= getClassificationFromID($classID); ?></td>
                                    <td><?= $catStatus; ?></td>
                                </tr>
                            <?php
                                $number ++;
                                endforeach;
                            ?>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
        <?php include 'AppRoot/Includes/footer.inc'; ?>
<script type="text/javascript">
var picker = new Pikaday(
    {
        field: document.getElementById('datepicker'),
        firstDay: 1,
        minDate: new Date(),
        maxDate: new Date(2020, 12, 31),
        yearRange: [2000,2020]
    });
    
//The following script used to restrict checkbox and allow you to select only 2 books per borrow
function limit(){
        var count=0;
        //Get all elements with the class name of Boxes
        var boxes=document.getElementsByClassName('boxes');
        //					 Or   
        //Get all input elements with the type of checkbox.
        //var boxes=document.querySelectorAll("input[type=checkbox]");
        //(this) is used to target the element triggering the function.
        for(var i=0; i<boxes.length; i++){
                //If checkbox is checked AND checkbox name is = to (this) checkbox name +1 to count
                if(boxes[i].checked&&boxes[i].name==this.name){count++;}
        }
        //If count is more than data-max="" of that element, uncheck last selected element
        if(count>this.getAttribute("data-max")){
                this.checked=false;
                alert("Sorry Only 2 Books are allowed per Borrower");
        }
}
//----Stack Overflow Snippet use---\\
window.onload=function(){
        var boxes=document.getElementsByClassName('boxes');
        // Use if you don't want to add a class name to the elements
        //var boxes=document.querySelectorAll("input[type=checkbox]");
        for(var i=0; i<boxes.length; i++){
                boxes[i].addEventListener('change',limit,false);
        }
}
</script>
    </body>
</html>