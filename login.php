<?php
// اثبتة بكل ملف 
ob_start();
session_start([]);
include './init.php';
// include './Admin/includes/templates/navbar.php';
// if u log in u couldn't back to login page unless you logout
if (isset($_SESSION['adminID'])) {
    header('Location:indexx.php');
    exit();    #Output a message and terminate the current script

}


// check if user exist in database users
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $email = $_POST["email"];
    $password = $_POST["password"];
    // $statm = $connect->prepare("INSERT INTO users (email,`password`) VALUES ('$email','$password')"); #inseart email to database 
    $statm = $connect->prepare("SELECT * FROM users WHERE email=? AND `password`=?  "); #search email in database
    $statm->execute(array($email, $password));
    $result = $statm->rowCount();


    if ($result > 0) {
        // after check browser work well that user in database or not 
        // echo "<div class='text-center fs-4 border border-2 border-secondary'>";
        // echo " user exist";
        // echo "<span class='badge bg-danger text-light ms-4 '>$result</span> ";
        // echo "</div>";
        // header("Location:indexx.php");
        // -------------------------------------------------
        // create admin session 
        // bcz emails ready in database so we don not need the apst way of session by $_POST['']  we have ready  info 
        $adminAccount = $statm->fetch(); #to get single row
        $_SESSION['adminID'] = $adminAccount['id'];
        $_SESSION['adminEmail'] = $adminAccount['email'];
    } else {
        echo "<div class='text-center fs-4 border fw-bold text-danger'>" .
            "there is no user like " .

        "</div>";
    }
}
//  else {
//     echo "you can not browse this page";
// }





?>


<!-- here html code -->
<div class="admin-login">
    <h3 class="bg-primary text-white text-center p-4  ">login page </h3>
    <div class="container">


        <div class="form bg-white border p-4 w-50 m-auto border border-3 border-primary mt-5">
            <form method="post" action="<?php htmlspecialchars($_SERVER['PHP_SELF']);  ?>">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" required>
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="for m-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                </div>

                <button type="submit" class="btn btn-primary " name="submit">Login</button>
            </form>
        </div>
    </div>

</div>






<?php
include './Admin/includes/templates/footer.php';
ob_end_flush();
?>