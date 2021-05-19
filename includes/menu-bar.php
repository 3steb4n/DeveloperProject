<div class="header-nav animate-dropdown" style="background: black;">
    <div class="container">
        <div class="yamm navbar navbar-default" role="navigation">
            <div class="nav-bg-class">
                <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse"  style="background: black;">
	<div class="nav-outer" style="background: black;">
		<ul class="nav navbar-nav">
			<li class="active dropdown yamm-fw"  style="background: black;"> 
				<a href="index.php" data-hover="dropdown" class="dropdown-toggle">Inicio</a>
				
			</li>
              <?php $sql=mysqli_query($con,"select id,categoryName  from category limit 6");
while($row=mysqli_fetch_array($sql))
{
    ?>

			<li class="dropdown yamm"  style="background: black;">
				<a href="category.php?cid=<?php echo $row['id'];?>"> <?php echo $row['categoryName'];?></a>
			
			</li>
			<?php } ?>

			
		</ul><!-- /.navbar-nav -->
		<div class="clearfix"  style="background: black;"></div>				
	</div>
</div>


            </div>
        </div>
    </div>
</div>