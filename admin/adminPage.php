<body>
     
    <div id="wrapper">
         <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="adjust-nav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">
                        <img src="assets/img/logo.png" />

                    </a>
                    
                </div>
              
                <span class="logout-spn" >
                  <a href="logout.php" style="color:#fff;">LOGOUT</a>  

                </span>
            </div>
        </div>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                 


                    <li class="active-link">
                        <a href="index.html" ><i class="fa fa-desktop "></i>Dashboard <span class="badge">Included</span></a>
                    </li>
                   

                    <li>
                        <a href="ui.html"><i class="fa fa-table "></i>UI Elements  <span class="badge">Included</span></a>
                    </li>
                    <li>
                        <a href="blank.html"><i class="fa fa-edit "></i>Blank Page  <span class="badge">Included</span></a>
                    </li>
              
                </ul>
                            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-lg-12">
                     <h2>ADMIN DASHBOARD</h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
                    <div class="col-lg-12 ">
                        <div class="alert alert-info">
                             <strong>Welcome Jhon Doe ! </strong> You Have No pending Task For Today.
                        </div>
                       
                    </div>
                    </div>
                  <!-- /. ROW  --> 
				  <div class="row">
					<div class="col-sm-6 col-sm-offset-3">
						<div class="well" style="margin-top: 10%;">
						<h3>Добавить позицию</h3>
						<form role="form" id="contactForm" data-toggle="validator" class="shake">
							<div class="row">
								<div class="form-group col-sm-6">
									<label for="name" class="h4">Название</label>
									<input type="text" class="form-control" id="name" placeholder="Название" required data-error="NEW ERROR MESSAGE">
									<div class="help-block with-errors"></div>
								</div>
								<div class="form-group col-sm-6">
									<label for="text" class="h4">Цена</label>
									<input type="text" class="form-control" id="price" placeholder="100" required>
									<div class="help-block with-errors"></div>
								</div>
							</div>
							<div class="form-group">
								<label for="text" class="h4 ">Описание</label>
								<textarea id="description" class="form-control" rows="5" placeholder="Введи описание, бро!" required></textarea>
								<div class="help-block with-errors"></div>
							</div>
							<button type="submit" id="form-submit" class="btn btn-success btn-lg pull-right ">ЩПЕК</button>
							<div id="msgSubmit" class="h3 text-center hidden"></div>
							<div class="clearfix"></div>
						</form>
						</div>
					</div>
					</div>		
                  <div class="row text-center pad-top">
				  
							

				
					  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
						  <div class="div-square">
							   <a href="blank.html" >
	 <i class="fa fa-circle-o-notch fa-5x"></i>
						  <h4>Check Data</h4>
						  </a>
						  </div>
						 
						 
					  </div> 
					 
					  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
						  <div class="div-square">
							   <a href="blank.html" >
	 <i class="fa fa-envelope-o fa-5x"></i>
						  <h4>Mail Box</h4>
						  </a>
						  </div>
						 
						 
					  </div>
					  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
						  <div class="div-square">
							   <a href="blank.html" >
	 <i class="fa fa-lightbulb-o fa-5x"></i>
						  <h4>New Issues</h4>
						  </a>
						  </div>
						 
						 
					  </div>
					  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
						  <div class="div-square">
							   <a href="blank.html" >
	 <i class="fa fa-users fa-5x"></i>
						  <h4>See Users</h4>
						  </a>
						  </div>
						 
						 
					  </div>
					  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
						  <div class="div-square">
							   <a href="blank.html" >
	 <i class="fa fa-key fa-5x"></i>
						  <h4>Admin </h4>
						  </a>
						  </div>
						 
						 
					  </div>
					  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="blank.html" >
 <i class="fa fa-comments-o fa-5x"></i>
                      <h4>Support</h4>
                      </a>
                      </div>
                     
                     
                  </div>
				</div>
                 <!-- /. ROW  --> 
               
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
    <div class="footer">
      
    
            <div class="row">
                <div class="col-lg-12" >
                    &copy;  2018 bestDelivey.ru | Design by: "Знакомые сестры"
                </div>
            </div>
        </div>
          

     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    <script  type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
	<script type="text/javascript" src="js/validator.min.js"></script>
	<script type="text/javascript" src="form-scripts.js"></script>
   
</body>
