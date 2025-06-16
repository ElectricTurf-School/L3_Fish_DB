<?php if (isset($_SESSION["admin"])) {
   // include("sub_author.php");
?>
    <h1 style="text-align:center;">
        Add A fish
    </h1>
    <form action="index.php?page=../admin/insert_fish" method="post">
    <p style="text-align: center;">    
    
    <input class="add_box" name="fish" placeholder="fish Name (Required)" required></input> <br />
    <input class="add_box" name="sci-name" placeholder="Scientific name (Required)" required/><br />
    <span class="autocomplete"><input class="add_box" name="subject1" id="subject1" placeholder="Subject 1 (Required)" required  /></span> <br />
    <span class="autocomplete"><input class="add_box" name="subject2" id="subject2" placeholder="Subject 2" /></span> <br />
    <b>Lifetime:</b> <br />
    <span class="range-container" style="  position: relative; display: inline-block;">
        <span style="position: absolute; font-weight: bold;">1</span>
        <span id="range_value" style="position: absolute;left: 10px;bottom: 5px;font: small-caption;">100</span>
        <input class="add_box" type="range" name="life" id="lifetime_range" min="1" max="100" value="50" />
        <span style="position: absolute;right: 0;font-weight: bold;">50 years</span> 
    </span> <br />
    
    <input class="add_box" class="form-submit" type="submit" name="submit" value="Submit fish"/></p> <br />

    </form>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const lifetime = document.getElementById('lifetime_range');
    const range = document.getElementById('range_value');

    lifetime.oninput = function() {
        range.innerHTML = lifetime.value + " years"
    }

    
});

</script>

<?php
   }
    else {
        $login_error = "Please login to acess this page";
        header("Location: index.php?page=../admin/login&error=$login_error");
    }

?>