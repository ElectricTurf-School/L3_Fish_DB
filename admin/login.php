<div class="admin-form">
    <h2>Login</h2>
    <div style="left: 45%; position:relative;width: fit-content;">
    <form action="https://projectspace.nz/amyxrilg/DTI301/L3_Fish_DB/admin/adminlogin.php" method="post">
        
        <input placeholder="Username" name="username"/><br />
        <input placeholder="Password" name="password" type="password"/> <br />

        <?php if (isset($_GET["error"])) {
            ?>
            <span class="error">
                <?php echo $_GET['error']?>
            </span>
        <?php   
        }
        ?>
        <input style="width: 100%;" class="form-submit" type="submit" name="login" value="login" />
    </form>
    </div>
</div>