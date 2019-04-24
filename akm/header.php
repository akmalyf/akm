<?php include ('koneksi.php'); ?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="asset/css/bootstrap.min.css" />
<link rel="stylesheet" href="asset/css/style.css" />
	<title>Akm</title>
</head>
<body>
<nav class="navbar navbar-expand-md fixed-top header">
	<div class="navbar-header">
      <a class="navbar-brand" href="#">
		<img src="logo.png" alt="logo" width="100px">
      </a>
    </div>
	<ul class="nav">
		<li class="nav-item">
			<a class="nav-link" href="index.php">
				home
			</a>
		</li>
	</ul>
	<ul class="nav">
		<li class="nav-item">
			<a class="nav-link" href="aboutus.php">
				about us
			</a>
		</li>
	</ul>
	<ul class="nav">
		<li class="nav-item">
			<a class="nav-link" href="portofolio.php">
				portofolio
			</a>
		</li>
	</ul>
	<ul class="nav">
		<li class="nav-item">
			<a class="nav-link" href="blog.php">
				blog
			</a>
		</li>
	</ul>
	<ul class="nav">
		<li class="nav-item">
			<a class="nav-link" href="contact.php">
				contact
			</a>
		</li>
	</ul>
	<ul class="nav">
		<li class="nav-item">
			<a class="nav-link" href="tes.php">
				tes
			</a>
		</li>
	</ul>
</nav>
<script type="text/javascript">
$(function() {
    $(window).on("scroll", function() {
        if($(window).scrollTop() > 20) {
            $(".header").addClass("active");
        } else {
            //remove the background property so it comes transparent again (defined in your css)
           $(".header").removeClass("active");
        }
    });
});
</script>
</body>
</html>
