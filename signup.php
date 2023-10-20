
<?php include 'header.php'; ?>

    <div class="wrapper">
        <div class="kru_Memebers" id="kru_Memebers">
            <h1>Become a Member.</h1>
            </br>
            <section class="formWrap">
                <form  action="SignUpHandler.php"  method="POST">
                    <p>First Name: <input type="text" name="firstname"></p>
                    <p>Last Name :  <input type="pasword" name="lastname"></p>

                    <p>Email: <input type="text" name="email"></p>
                    <p>Phone Number:  <input type="pasword" name="phone"></p>
                    </br>
                    </br>
                    </br>
                    <p>Username:<input type="text" name="username"></p>
                    <p>Password: <input type="pasword" name="psw"></p>
                    <p>Confirm Password: <input style="background-color:#E0FFFF"; type="pasword" placeholder="Confirm Password" name="psw-conf"> </p>
                    </br>
                    </br>
                    <button type="submit"> Submit </button>
                </form>
            </section>
        </div>
    <?php include 'footer.php';?>
    </div>