<?php include('session_start.php');?>

<!DOCTYPE HTML>
<html lang="en">
<?php 
    include("content/head.php")
?>
<body>
    
    <div class="wrapper">
    

        
        <div class="box banner">
            
    
            <h1><a style="color: white;" href="https://projectspace.nz/amyxrilg/DTI301/L3_Fish_DB">The Great Fishbase</a></h1>
        </div>    <!-- / banner -->

        <!-- Navigation goes here.  Edit BOTH the file name and the link name -->
        <?php include('content/navigation.php') ?>
        
        <div class="box main">        

            <?php 
                if(!isset($_REQUEST["page"])) {
                    include("content/home.php");
                }
                else {
                    $page = preg_replace('/[^0-9a-zA-Z]-/', '', $_REQUEST['page']);
                    include("content/$page.php");
                }
            ?>
        </div>    <!-- / main -->
        
        <?php include("content/footer.php") ?>
    
    </div>  <!-- / wrapper  -->
    
</body>        

<script>
    let selected_button = document.getElementById('name');
    const category_buttons = [document.getElementById('all'), document.getElementById('description'), document.getElementById('lifetime'), document.getElementById('country'), selected_button]
    for (let i = 0; i < category_buttons.length; i++) {
        category_buttons[i].onclick = function () {
            selected_button.style.removeProperty("background");
            selected_button = category_buttons[i];
            selected_button.style.background = "#8a8a8a";
            document.getElementById('action').value = selected_button.value;

        };
    }
    selected_button.style.background = "#8a8a8a";

</script>
