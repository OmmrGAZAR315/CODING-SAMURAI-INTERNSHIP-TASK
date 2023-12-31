<?php include "includes/header.php" ?>
<?php include "includes/db.php" ?>

<?php //include "admin/admin_functions.php"; ?>
<!-- Navigation -->
<?php include "includes/navigation.php" ?>


<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

			<?php
			if (isset($_GET["author"])) {
				$post_author = $_GET["author"];
                $post_author = str_replace("%20",' ',$post_author);

				$query = "SELECT * FROM posts WHERE post_author = '$post_author' ";
				$query .= "AND post_status = 'Published' ";
				$select_all_posts_query = mysqli_query($connection, $query);
				if (mysqli_num_rows($select_all_posts_query) == 0)
					echo "<h1 class='text-center text-danger'>NO POST SORRY</h1>";

				while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
					$post_id = $row["post_id"];
					$post_title = $row["post_title"];
					$post_author = $row["post_author"];
					$post_date = $row["post_date"];
					$post_image = $row["post_image"];
					$post_content = substr($row["post_content"], 0, 400);
					$post_status = $row["post_status"];

				?>
                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="post_author?author=<?php echo $post_author ?>"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    All posts by <a href="#"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date ?></p>
                <hr>
                <a href="post?pid=<?php echo $post_id ?>">
                    <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="" width="250px"
                         height="150"></a>
                <hr>
                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="post.php?pid=<?php echo $post_id ?>">Read More <span
                            class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
			<?php } } ?>

        </div>


        <!-- Blog Sidebar Widgets Column -->
		<?php include "includes/sideBar.php" ?>


    </div>
    <!-- /.row -->

    <hr>
    <!-- Footer -->
	<?php include "includes/footer.php" ?>
