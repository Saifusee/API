<!DOCTYPE html>
<html>
    <head>
        <title>
            Sort Program
        </title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/sort.css" type ="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="js/sort.js"></script>
        </head>
    <body>
        <div id="topbar">

                 <div class="topbar1">
                    <i style="font-size:18px" class="fa fa-search" aria-hidden="true"></i>
                <input type="text" id="searchfield" name="search" placeholder="Search">
                
                </div>
                <div class="topbar2">
                <button class="allcont">All</button>
                <button class="paidcont">Paid</button>
                <button class="unpaidcont">Unpaid</button>
                <button class="here">Add+</button>
                </div>
        </div>
            
        


        <div id="form1">
            Provide the Details of the Employee.
            <button class="close"><i class="fa fa-times" aria-hidden="true"></i></button>
            <div id="form2">
                <form id="form13" action="http://localhost:8000/api/employees">
                    <div class="fname">
                        <label for="fname">First name:</label><br>
                    <input type="text" id="fname" name="fname" ><br>
                    </div>
                    <div class="lname">

                    <label for="lname">Last name:</label><br>
                    <input type="text" id="lname" name="lname"><br>

                    </div>
                    <div class="email">
                        <label for="fname">E-mail:</label><br>
                    <input type="text" id="email" name="email"><br><br>
                    </div>
                    <div class="salary">
                        Salary Paid <input type="checkbox" id="status" name="status" value="1">
                    </div>
                    <div class="submit">

                        <input type="button"  class="submit_btn" value="Submit">

                    </div>
                    
                  </form> 
        

            </div>
        </div>

        <div id="form3" action="">
         Update the Details of the Employee.
            <button class="close"><i class="fa fa-times" aria-hidden="true"></i></button>
            <div id="form4">
                <form id="form14">
                    <div class="fname">
                        <label for="fname">First name:</label><br>
                    <input type="text" id="fnameupt" name="fname" ><br>
                    </div>
                    <div class="lname">

                    <label for="lname">Last name:</label><br>
                    <input type="text" id="lnameupt" name="lname"><br>

                    </div>
                    <div class="email">
                        <label for="fname">E-mail:</label><br>
                    <input type="text" id="emailupt" name="email"><br><br>
                    </div>
                    <div class="salary">
                        Salary Paid <input type="checkbox" id="statusupt" name="status" value="1">
                    </div>
                    <div class="update">
                        <input type="button" id="update" class="update_btn" value="Update">
                    </div>
                    
                  </form>
                  <input type="hidden" id="editid">
        

            </div>
        </div>



        <div class="list">
            
            <table class="table" style="width: 100%">
            
                <thead>
                    <tr>
                        <th>S.no.</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>E-mail</th>
                        <th>Salary Paid</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="tbody">

                </tbody>
            </table>


        </div>

        

            </body>
</html>