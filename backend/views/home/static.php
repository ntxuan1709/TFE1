    <!-- Main content -->
    <section class="content">
    	<!-- Small boxes (Stat box) -->
    	<div class="row">
    		<div class="col-lg-3 col-xs-6">
    			<!-- small box -->
    			<div class="small-box bg-aqua">
    				<div class="inner">
    					<h3>
    						<?php 
                               echo $totaltr[0]['total'];
                            ?>
    					</h3>
    					<p>Bài hát</p>
    				</div>
    				<div class="icon">
    					<i class="ion ion-bag"></i>
    				</div>
    				<a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
    			</div>
    		</div>
    		<!-- ./col -->
    		<div class="col-lg-3 col-xs-6">
    			<!-- small box -->
    			<div class="small-box bg-green">
    				<div class="inner">
    					<h3><?php 
                               echo $totalpl[0]['total'];
                            ?>
            
                        </h3>

    					<p>Playlists</p>
    				</div>
    				<div class="icon">
    					<i class="ion ion-stats-bars"></i>
    				</div>
    				<a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
    			</div>
    		</div>
    		<!-- ./col -->
    		<div class="col-lg-3 col-xs-6">
    			<!-- small box -->
    			<div class="small-box bg-yellow">
    				<div class="inner">
    					<h3><?php 
                               echo $totalus[0]['total'];
                            ?>                        
                        </h3>

    					<p>Tài khoản </p>
    				</div>
    				<div class="icon">
    					<i class="ion ion-person-add"></i>
    				</div>
    				<a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
    			</div>
    		</div>
    		<!-- ./col -->
    		<div class="col-lg-3 col-xs-6">
    			<!-- small box -->
    			<div class="small-box bg-red">
    				<div class="inner">
    					<h3>
                            <!-- dem so luot xem trang -->
                            <?php
                        $fpath = "../view.txt";
                        $fo = fopen($fpath, 'r');
                        $fr = fread($fo, filesize($fpath));
                        $fc = fclose($fo);
                        echo $fr;
                        ?>
                            
                        </h3>

    					<p>Lượt truy cập</p>
    				</div>
    				<div class="icon">
    					<i class="ion ion-pie-graph"></i>
    				</div>
    				<a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
    			</div>
    		</div>
    		<!-- ./col -->
    	</div>
    	<!-- /.row -->


    </section>
    <!-- /.content -->
</div>
  <!-- /.content-wrapper -->