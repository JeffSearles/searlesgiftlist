<div class="outer">
        <div id="menu4">
                <ul>
                <li><a href="home.php" target="_self">Home</a></li>
               <!--  <li><a href="new.php" target="_self">View Your List</a></li> -->
                <li><a href="otherlists.php" target="_self">View Other Lists</a></li>
                <?php if ($_SESSION['user_level'] < 3) { ?>
                <li><a href="signup.php" target="_self">Add User</a></li>
                <li><a href="deleteusers.php" target="_self">View/Delete Users</a></li>
                <?php } ?>
                <li><a href="password.php" target="_self">Change Password</a></li>
                <li><a href="logout.php" target="_self">Logout</a></li>
        </ul>
</div>
</div>

