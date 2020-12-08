<div class="sml-scrn-info">
    <ul>
        <li><h3><i class="fas fa-user"></i><h3></li>
        <li><h3><?php print($_SESSION['studentName']);?></h3></li>
        <li><h3><?php print($_SESSION['studentIdentification']);?></h3></li>
    </ul>
</div>
<div class="navbar" id="nav">
    <a href="search.php" id="search"><i class="fas fa-search"></i>Search</a>
    <?php echo '<img src="../img/'.$_SESSION['studentIdentification'].'.jpg" alt="profile-img" class="profile-img" />'?>
    <?php 
        if(empty($_SESSION["guardianId"])){
            echo '<a href="entry.php" id="btn-add"><i class="fas fa-plus"></i>Entry</a>'; 
        }
    ?>
    <span>
        <h3> 
            <?php print($_SESSION['studentName']);?>
        </h3>
    </span>
    <span>
        <h4>
            <?php print($_SESSION['studentIdentification']);?>
        </h4>
    </span>
    <a href="home.php"><i class="fas fa-th"></i>Home</a>
    <a href="reports.php"><i class="fas fa-pen"></i>Reports</a>
    <a href="stats.php"><i class="fas fa-chart-bar"></i>Stats.</a>
    <a href="notes.php"><i class="fas fa-sticky-note"></i>Notes</a>
    <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
    <?php 
        if (isset($_SESSION['isAdmin'])) {
            echo '<a href="admin.php"><i class="fas fa-toolbox"></i>Admin</a>';
    } ?>
 
</div>

