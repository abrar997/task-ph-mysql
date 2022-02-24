<!-- main file that contain construct of dashboard  admin-->
<?php
ob_start(); #to solve ANY PROBLEM IN  HEADER
session_start();

include './init.php'; #db.php , functions.php,header.php
include './Admin/includes/templates/navbar.php'; # navbar 



// statment to return all users 

$querusers = $connect->prepare("SELECT * FROM users");
$querusers->execute(); #تنفيذ
$numberuser = $querusers->rowCount(); #build in return nuber of rows
$allUsers = $querusers->fetchAll();

// statment to return all posts

$querposts = $connect->prepare("SELECT * FROM post");
$querposts->execute(); #تنفيذ
$numberpost = $querposts->rowCount(); #build in return nuber of rows
$allposts = $querposts->fetchAll();

?>




<!-- here ican write html code  -->
<div class="Admin-index">
    <h3 class="bg-primary text-white text-center p-2 ">Admin dashboard</h3>

    <div class="container">
        <?php echo "<h1 class='fs-3 session-email p-4 text-light' style='background-color: rgb(179, 10, 66);
        padding: 10px;'> your email is : "." " . $_SESSION['adminEmail'] . "</h1>"; ?>

        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="card mt-5 border border-2 border-secondary p-4 ">

                    <div class="card-header fw-bold fs-5">Users <span class="badge bg-primary"><?php echo $numberuser; ?> </span></div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">username</th>
                                    <th scope="col">email</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($numberuser > 0) {
                                    foreach ($allUsers as $users) {

                                        echo "<tr>";
                                        echo "<th scope='row'>" . $users['id'] . "</th>";
                                        echo "<td>" . $users['user_name'] . "</td>";
                                        echo "<td>" . $users['email'] . "</td>";
                                        echo
                                        "<td> <a href=''><i class='fa-solid fa-pen-to-square me-4'></i></a>  
                                        <a href=''><i class='fas fa-times danger'></i></a>";
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo  "<p class='bg-danget text-center'>  there is no users  </p>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



            <div class="col-lg-6">
                <div class="card mt-5 border border-2 border-secondary p-4">
                    <div class="card-header fw-bold fs-5">Posts <span class="badge bg-primary"><?php echo $numberpost ?> </span></div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">title</th>
                                    <th scope="col">body</th>
                                    <th scope="col">Author</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($numberpost > 0) {

                                    foreach ($allposts as $post) {

                                        echo "<tr>";
                                        echo "<th scope='row'>" . $post['id'] . "</th>";
                                        echo "<td>" . $post['title'] . "</td>";
                                        echo "<td>" . $post['body'] . "</td>";
                                        echo "<td>" . $post['user_id'] . "</td>";
                                        echo "<td> 
                                        <a href=''><i class='fa-solid fa-pen-to-square me-2'></i></a>  
                                        <a href=''><i class='fas fa-times'></i></a>";
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo  "<p class='bg-danget text-center'>  there is no posts  </p>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>


            </div>

        </div>
    </div>

</div>










<?php
// footer html code
include './Admin/includes/templates/footer.php';
ob_end_flush(); #Flush (send) the output buffer and turn off output buffering 
#solve redirect errors

?>


<!-- // steps of display data from database
// prepare,execute,fetchAll builds in languages
// 1-prepare and sql
// $statm = $connect->prepare(
// "SELECT * FROM users"
// );
// 2-execute
// $statm->execute();
// 3- fetchAll
// $allusers=$statm->fetchAll(); #hold all users data
// display by foreach or for loop
// foreach ($allusers as $users){
// echo "<h6>".$users['id']. "</h6>" ;
// echo "<h2>".$users['user_name']. "</h2>" ;
// echo "<h4>".$users['email']. "</h4>" ;
// } -->