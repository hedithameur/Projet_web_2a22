<body>
	<div class="page-container">
		<!--/content-inner-->
		<div class="left-content">
			<div class="mother-grid-inner">
				<!--header start here-->
				<div class="header-main">
					<?php require 'topbar.php'; ?>

				</div>
				<div class="sidebar-menu">
					<?php require 'maincolum.php'; ?>
				</div>
				<!--heder end here-->
				<ol class="breadcrumb">
				</ol>

				<!-- Write Code Here -->
				<?php
				include_once '../../controller/CommentairesC.php';

				$commentairesC = new CommentairesC();
				$liste = $commentairesC->afficherCommentaires();

				?>


				<div class="container-fluid bg-white py-4 px-4 my-2">

					<table class="table">
						<tbody>
							<?php foreach ($liste as $commentaire) { ?>

								<tr class="table-row">
									<td class="table-img">
										<img src="imagesback/avatar.png" class="img-responsive" alt="">
									</td>
									<td class="table-text">
										<h6> <?php echo $commentaire['nameUsers'] . ' ' . $commentaire['lastnameUsers']; ?></h6>
										<p><?php echo $commentaire['texte']; ?></p>
									</td>
									<td>
										<span class="fam"><?php echo $commentaire['titre']; ?></span>
									</td>
									<td class="march">
										<?php echo $commentaire['dateCommentaire']; ?>
									</td>

									<td>
										<a onclick="return confirm('Vous êtes sure de supprimer cetter commentaire ?');" href="../../controller/supprimerCommentaires.php?idCommentaire=<?php echo $commentaire['idCommentaire']; ?>">
											<button type="submit" class="btn btn-danger deleteCommentaire">
												<span class="glyphicon glyphicon-trash"></span>
											</button>
										</a>

									</td>
								</tr>

							<?php } ?>

						</tbody>
					</table>

				</div>




				<!-- //Write Code Here -->
				<!-- script-for sticky-nav -->
				<script>
					$(document).ready(function() {
						var navoffeset = $(".header-main").offset().top;
						$(window).scroll(function() {
							var scrollpos = $(window).scrollTop();
							if (scrollpos >= navoffeset) {
								$(".header-main").addClass("fixed");
							} else {
								$(".header-main").removeClass("fixed");
							}
						});

					});
				</script>
				<!-- /script-for sticky-nav -->
				<!--inner block start here-->
				<div class="inner-block">

				</div>
				<!--inner block end here-->
				<!--copy rights start here-->

				<!--COPY rights end here-->
			</div>
		</div>
		<!--//content-inner-->
		<!--/sidebar-menu-->

		<div class="clearfix"></div>
	</div>
</body>