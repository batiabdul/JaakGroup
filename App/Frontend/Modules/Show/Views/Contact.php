	<!-- Title Page -->
	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(/Web/images/heading-pages-06.jpg);">
		<h2 class="l-text2 t-center">
			Contactez-Nous
		</h2>
	</section>

<!-- content page -->
	<section class="bgwhite p-t-66 p-b-60">
		<div class="container">
			<div class="row">
						<div class="col-md-6 p-b-30">
					<div class="item-blog-txt p-t-33">
								<a href="#" class="s-text20">
									<i class="fa fa-calendar m-l-8" aria-hidden="true"></i> Du Lundi au Vendredi de 9h00 – 19h
									/ Samedi à 9h00 – 17h00
								</a>
								<br/>
								<a href="#mapSERVICES" class="s-text20">
									<i class="fa fa-map-marker m-l-8" aria-hidden="true"></i> 06 BP 2213 Carrefour Bidossessi, Abomey Calavi – BENIN
								</a>
								<br/>
								<a href="#" class="s-text20">
									<i class="fa fa-phone m-l-8" aria-hidden="true"></i> +229 95 53 77 77
								</a>
								<br/>
								<a href="https://wa.me/22995537777?text=Bonjour%20JAAK%20SERVICES%20!%20Je%20suis%20interessé(e)%20par%20vos%20produits%20" class="s-text20">
									<i class="fa fa-whatsapp m-l-8" aria-hidden="true"></i> +229 95 53 77 77
								</a>
								<br/>
								<a href="mailto:contact@jaakgroup.com" class="s-text20">
									<i class="fa fa-envelope m-l-8" aria-hidden="true"></i> contact@jaakgroup.com
								</a>
							</div>
				</div>
				<div class="col-md-6 p-b-30">
					<div class="item-blog-txt p-t-33">
								<a href="#" class="s-text20">
									<i class="fa fa-calendar m-l-8" aria-hidden="true"></i> Ouvert 7 jours / 7 jours | 07h - 23h30
								</a>
								<br/>
								<a href="#mapRESIDENCE" class="s-text20">
									<i class="fa fa-map-marker m-l-8" aria-hidden="true"></i> 06 BP 2213 Fidjrosse Akogbato, Cotonou – BENIN
								</a>
								<br/>
			         <a href="#" class="s-text20">
									<i class="fa fa-phone m-l-8" aria-hidden="true"></i> +229 97 69 33 33
								</a>
								<br/>
								<a href="https://wa.me/22997693333?text=Bonjour%20JAAK%20RESIDENCE%20!%20Je%20suis%20interessé(e)%20par%20vos%20appartements%20et%20j'aimerais%20avoir%20plus%20d'informations.%20Merci%20" class="s-text20">
 									<i class="fa fa-whatsapp m-l-8" aria-hidden="true"></i> +229 97 69 33 33
 								</a>
 								<br/>
								<a href="mailto:reservation@jaakgroup.com" class="s-text20">
									<i class="fa fa-envelope m-l-8" aria-hidden="true"></i> reservation@jaakgroup.com</a>
							</div>
				</div>

				<div class="col-md-6 p-b-30" id="mapSERVICES">
					<div class="p-r-20 p-r-0-lg">
						<div class="contact-map size21"><iframe  class="contact-map size21" id="google_map" data-map-x="40.614439" data-map-y="-73.926781" data-pin="web/images/icons/icon-position-map.png" data-scrollwhell="0" data-draggable="1" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15858.904174705858!2d2.350803!3d6.4292302!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x9c409ff4948ac304!2sJAAK%20Services%20SARL!5e0!3m2!1sen!2sbj!4v1598270776781!5m2!1sen!2sbj" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe></div>
					</div>

			</div>
		<div class="col-md-6 p-b-30" id="mapRESIDENCE">
					<div class="p-r-20 p-r-0-lg">
						<div class="contact-map size21"><iframe class="contact-map size21" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15860.876102913684!2d2.3707576698375963!3d6.365694426297669!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1023551bcbffeddd%3A0xefc7eb00e0f4ed2!2sJAAK%20RESIDENCE!5e0!3m2!1sen!2sbj!4v1598271190537!5m2!1sen!2sbj" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe></div>
					</div>
				</div>
			</div>

			<!-- Commentary -->
			<section class="relateproduct bgwhite p-t-45 p-b-138" style="display:none">
				<div class="container">
					<div class="sec-title p-b-60">
						<h5 class="m-text5 t-center">
							EXPÉRIENCE de nos client
						</h5>
					</div>

					<!-- Slide2 -->
					<div class="wrap-slick2">
						<div class="slick2"><?= $infos ?>
						</div>
					</div>
				</div>
			</section>
			<!-- ./End of Commentary -->
			<section class="newproduct bgwhite p-t-45 p-b-105">
		<div class="container">
			<div class="sec-title p-b-60">
				<h3 class="m-text5 t-center">
					Comment pouvons-nous améliorer votre expérience ?
				</h3>
			</div>
				<div class="row">
				<div class="col-md-2 p-b-30">
				</div>
					<div class="col-md-8 p-b-30">
					<form class="leave-comment" action="Ajax.php" method="post">
						<input type="text" name="key" value="PeopleComment" hidden>
						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="name" placeholder="Nom et prénom" required>
						</div>
						<textarea class="dis-block s-text7 size20 bo4 p-l-22 p-r-22 p-t-13 m-b-20" name="message" placeholder="Vos suggestions" required></textarea>
						<div class="w-size25">
							<!-- Button -->
							<input class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4" type="submit" name="submit" value="Envoyer">
						</div>
					</form>
				</div>

				<div class="col-md-2 p-b-30">

				</div>
				</div>
			</div>
		</div>
	</section>
	<!-- footer -->
