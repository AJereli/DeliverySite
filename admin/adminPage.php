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
                  <a href="logout.php" style="color:#fff;">Выйти</a>  

                </span>
            </div>
        </div>
        <!-- /. NAV TOP  -->
      <?
		printSideMenu();

		$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
		mysqli_query($conn, "SET NAMES 'utf8'"); 
		$resus = mysqli_query($conn,'SELECT * FROM `types`'); 

	  ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-lg-12">
                     <h2>Добавить позицию</h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
                    <div class="col-lg-12 ">
                        <div class="alert alert-info">
                             Для добавление информации заполните форму ниже
                        </div>
                       
                    </div>
                    </div>
                  <!-- /. ROW  --> 
				  <div class="row">
					<div class="col-sm-6 col-sm-offset-3">
						<div class="well" style="margin-top: 10%;">
						<h3>Добавить позицию</h3>
						<form enctype="multipart/form-data" role="form" method="post" action="addProcessing.php" id="contactForm" data-toggle="validator" class="shake">
							<div class="row">
								<div class="form-group col-sm-6">
									<label for="name" class="h4">Название</label>
									<input type="text" class="form-control" name="name" id="name" placeholder="Название" required data-error="NEW ERROR MESSAGE">
									<div class="help-block with-errors"></div>
								</div>
								<div class="form-group col-sm-6">
									<label for="text" class="h4">Цена</label>
									<input type="text" class="form-control" name="price" id="price" placeholder="100" required>
									<div class="help-block with-errors"></div>
								</div>
								<div class="form-group col-sm-6">
									<label for="text" class="h4">Вес</label>
									<input type="text" class="form-control" name="weight" id="weight" placeholder="150" required>
									<div class="help-block with-errors"></div>
								</div>
							</div>
							<div class="form-group">
								<label for="text" class="h4 ">Описание</label>
								<textarea id="description" class="form-control" name="description" rows="5" placeholder="Введите описание" required></textarea>
								<div class="help-block with-errors"></div>
							</div>
							
							<label class="btn btn-primary" for="my-file-selector">
							          <input type="file" name="file" id="file" >
							</label>
							
							<span class='label label-info' id="upload-file-info"></span>
							
							<select name="type" size="1"  form="contactForm">
							<?
							
								while($row = mysqli_fetch_array($resus))
								{
									//value=\"".$row["name"]."\"
									echo "<option>".$row["name"]."</option>";

									
								}
							?>
							
							
							</select>
							
							<button type="submit" id="form-submit" class="btn btn-success btn-lg pull-right ">Добавить</button>
							<div id="msgSubmit" class="h3 text-center hidden"></div>
							<div class="clearfix"></div>
						</form>
						</div>
					</div>
					</div>
					<div class="row">
                    <div class="col-lg-12">
                     <h2>Добавить тип продукта</h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
                    <div class="col-lg-12 ">
                        <div class="alert alert-info">
                             Для добавление информации заполните форму ниже
                        </div>
                       
                    </div>
                    </div>
                  <!-- /. ROW  --> 
				  <div class="row">
					<div class="col-sm-6 col-sm-offset-3">
						<div class="well" style="margin-top: 10%;">
						<h3>Добавить тип</h3>
						<form enctype="multipart/form-data" role="form" method="post" action="addType.php" id="contactForm" data-toggle="validator" class="shake">
							<div class="row">
								<div class="form-group col-sm-6">
									<label for="name" class="h4">Название</label>
									<input type="text" class="form-control" name="label" id="name" placeholder="Ролл" required data-error="NEW ERROR MESSAGE">
									<div class="help-block with-errors"></div>
								</div>
								<div class="form-group col-sm-6">
									<label for="text" class="h4">Бирка</label>
									<input type="text" class="form-control" name="name" id="name" placeholder="roll" required data-error="NEW ERROR MESSAGE">
									<div class="help-block with-errors"></div>
								</div>

							</div>
													
							<button type="submit" id="form-submit" class="btn btn-success btn-lg pull-right ">Добавить</button>
							<div id="msgSubmit" class="h3 text-center hidden"></div>
							<div class="clearfix"></div>
						</form>
						</div>
					</div>
					</div>	
					<div class="row">
                    <div class="col-lg-12">
                     <h2>Добавить Акцию</h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />

                <div class="row">
                    <div class="col-lg-12 ">
                        <div class="alert alert-info">
                             Для добавление информации заполните форму ниже
                        </div>
                       
                    </div>
                    </div>
                  <!-- /. ROW  --> 
				  <div class="row">
					<div class="col-sm-6 col-sm-offset-3">
						<div class="well" style="margin-top: 10%;">
						<h3>Добавить позицию</h3>
						<form enctype="multipart/form-data" role="form" method="post" action="addPromo.php" id="contactForm" data-toggle="validator" class="shake">
							<div class="row">
								<div class="form-group col-sm-6">
									<label for="name" class="h4">Название</label>
									<input type="text" class="form-control" name="name" id="name" placeholder="Заголовок" required data-error="NEW ERROR MESSAGE">
									<div class="help-block with-errors"></div>
								</div>
							</div>
							<div class="form-group">
								<label for="text" class="h4 ">Описание</label>
								<textarea id="description" class="form-control" name="description" rows="5" placeholder="Введите описание" required></textarea>
								<div class="help-block with-errors"></div>
							</div>
							
							<label class="btn btn-primary" for="my-file-selector">
							          <input type="file" name="file" id="file" >
							</label>
							
							<span class='label label-info' id="upload-file-info"></span>
							
														
							<button type="submit" id="form-submit" class="btn btn-success btn-lg pull-right ">Добавить</button>
							<div id="msgSubmit" class="h3 text-center hidden"></div>
							<div class="clearfix"></div>
						</form>
						</div>
					</div>
					</div>	
					
                  <div class="row text-center pad-top">
				  
							

				<!--
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
							   <a href="orders.php" >
	 <i class="fa fa-envelope-o fa-5x"></i>
						  <h4>Текущие заказы</h4>
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
                      -->
                     
                  </div>
				</div>
                 <!-- /. ROW  --> 
               
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
    <? printFooter(); ?>
	
   
</body>
