<!-- Sidebar -->

		<div class="sidebar sidebar-style-2">			

			<div class="sidebar-wrapper scrollbar scrollbar-inner">

				<div class="sidebar-content">
				<a href="index.html" class="logo">
					<img src="../assets/img/logo.jpg" style="width: 43%;padding: 3%; margin-left: 25%;" alt="navbar brand" class="">
				</a>
					<ul class="nav nav-primary">

						<li class="nav-item active">

							<a href="../pages/index.php">

								<i class="flaticon-stopwatch"></i>

								<span class="sub-item">Inventory Dashboard</span>

							</a>

							

						</li>
                        
                        <li class="nav-item active">

							<a href="../pages/web_dashboard.php">

								<i class="flaticon-chart-pie"></i>

								<span class="sub-item">Web Dashboard</span>

							</a>

							

						</li>



						<li class="nav-section">

							<span class="sidebar-mini-icon">

								<i class="fa fa-ellipsis-h"></i>

							</span>

							<h4 class="text-section">MIS</h4>

						</li>

						
                        <?php
						
						$test = 'select f.feature_name,f.div_id,m.feature,m.id,f.icons from feature f, menu m, menu_permission p where m.id=p.menu_id and m.feature=f.id and p.user_id="'.$_SESSION['user_id'].'" and p.status="ACTIVE" group by m.feature';
						
						 $features = $conn->query($test);
						 
                         while($mainMenu=$features->fetch_assoc()){
							 
						?>
						<li class="nav-item">

							<a data-toggle="collapse" href="#<?=$mainMenu['div_id']?>">

								<i class="<?=$mainMenu['icons']?>"></i>

								<p><?=$mainMenu['feature_name']?></p>

								<span class="caret"></span>

							</a>
                         <?php
						  $t2 = 'select m.menu_name,m.link from menu m, menu_permission p where m.id=p.menu_id and p.user_id="'.$_SESSION['user_id'].'" and m.feature="'.$mainMenu['feature'].'" and p.status="ACTIVE"';
						 $pages = $conn->query($t2);
						?>
							<div class="collapse <?php while($p=$pages->fetch_assoc()){if($page_name=='Dashboard') $p['menu_name']='Dashboard';if($page_name==$p['menu_name']){ echo 'show' ;}  }?>" id="<?=$mainMenu['div_id']?>" >
                             
								<ul class="nav nav-collapse">
                                
                                  <?php
						 $tt = 'select m.menu_name,m.link from menu m, menu_permission p where m.id=p.menu_id and p.user_id="'.$_SESSION['user_id'].'" and m.feature="'.$mainMenu['feature'].'" and p.status="ACTIVE"';
						 $sql2 = $conn->query($tt);
                         while($data2=$sql2->fetch_assoc()){
						?>

									<li class="<?php if($page_name==$data2['menu_name']){ echo 'nav-item active' ;
	// Visited Pages Start								
	/*$count = 0;
    $sql = "SELECT visit_count FROM `most_visited_pages` WHERE page_name = '$page_name' AND user_id = ".$_SESSION['user_id']." ";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($query);
    $count = $row['visit_count'];
    $entry_at = date("Y-m-d H:i:s");
    if($count == 0){
        $sql = "INSERT INTO `most_visited_pages` (page_name, page_link, user_id, visit_count,entry_at) VALUES ('".$page_name."', '".$data2['link']."', '".$_SESSION['user_id']."', 1, '$entry_at')";
        $query = mysqli_query($conn, $sql);
    }else{
        $sql = "UPDATE `most_visited_pages` SET visit_count = '".($count+1)."', entry_at = '$entry_at'  WHERE page_name = '$page_name' AND user_id = ".$_SESSION['user_id']." ";
        $query = mysqli_query($conn, $sql);
    }*/
	//// Visited Pages END	
									} ?>">

										<a href="../<?=$data2['link']?>">

											<span class="sub-item"><?=$data2['menu_name']?></span>

										</a>

									</li>

									<?php } ?>

								</ul>

							</div>

						</li>

                     <?php } ?>

					</ul>

				</div>

			</div>

		</div>

		<!-- End Sidebar -->

