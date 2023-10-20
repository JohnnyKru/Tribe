
<nav class="nav" style="height: 100px; top:0px;">
        <div class="containerNav">
            <div class="logo">
                <a href=""><h1>Hello <?php echo $_SESSION['username'];?></h1></a>
            </div>
            <div id="mainListDiv" class="main_list">
                <ul class="navlinks">
                    <li><a href="#"></a></li>
                    <li><a href="friends.php">Members</a></li>
                    <li><a href="profilepage.php">My Profile</a></li>
                      <li id="sign-in"><a href="#"></a></li>
                     <li class="fas fa-power-off" id="sign-Up"><a href="logout.php"> logout</a></li>
                </ul>
            </div>
            <span class="navTrigger">
                <i>Test 1</i>
                <i>Test 1</i>
                <i>Test 1</i>
            </span>
        </div>
    </nav>