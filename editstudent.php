<!DOCTYPE html>
<html>
	
<!-- links/head here -->
<?php
		require_once('includes/links.php');
	?>



<body >
    <!-- All our code. write here   -->

    <!-- header here -->
    <?php
        require_once('includes/header.php');
    ?>

    <!-- sidebar here -->
    <?php
        require_once('includes/sidebar.php');

    //FETCH STUDENT RECORDS USING WHERE CLAUSE
    require_once('dbconnection.php');

        $fetchStudentsRecords=mysqli_query($Conn, "SELECT * FROM enrollments WHERE id='".$_GET['id']."' ");

        while($row=mysqli_fetch_array($fetchStudentsRecords)){
        $studentId=$row['id'];
        $studentName=$row['name'];
        $studentPhone=$row['phone'];
        $studentEmail=$row['email'];
        $studentRegNumber=$row['reg_number'];
        $studentCourse=$row['course'];
       
        }

    ?>

    <?php
    // isset function
    if(isset($_POST['updateEnrollments'])){
        $name=$_POST['name'];
        $regNumber=$_POST['reg_number'];
        $phone=$_POST['phone'];
        $email=$_POST['email'];
        $course=$_POST['course'];
    
    $updateStudent=mysqli_query($Conn,"UPDATE enrollments SET name='$name', reg_number='$regNumber',phone='$phone',
    email='$email', course='$course' WHERE id='" .$_GET['id']."'");

    if($updateStudent){
        echo 'data updated success';
    }
    else{
        echo 'error occured';
    }
}
    ?>

    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header bg-dark text-white text-center">
                            <span>update Students</span>
                            
                        </div>
                        <div class="card-body">
                            <form action="editstudent.php?id=<?php echo $studentId ?> " method="post">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" name="name"id="" value="<?php echo $studentName?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="reg_number">Reg Number</label>
                                            <input type="text" class="form-control" name="reg_number"id="" value="<?php echo $studentRegNumber?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="phone">Phone</label>
                                            <input type="tel" class="form-control" name="phone"id="" value="<?php echo $studentPhone?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" name="email"id="" value="<?php echo $studentEmail?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="course">Course</label>
                                            <select  class="form-control" name="course" id="">
                                                <option><?php echo $studentCourse?></option>
                                                <option value="Web Design & Development">Web Design & Development</option>
                                                <option value="Data Analysis">Data Analysis</option>
                                                <option value="Android Application Development">Android Application Development</option>
                                            </select>
                                        </div>
                                    </div>                                
                                </div>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <button type="update" class="btn btn-success" name="updateEnrollments">update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            


        


        </div>
        

            
    </div>

<script src="jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>