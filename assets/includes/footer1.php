		<!-- Footer -->
		<footer id="footer">
			<div class="inner">
				<section>
					<h2>Contact Us</h2>
					<form method="post" action="<?= urlOf('assets/api/insertMessage.php') ?>">
						<div class="fields">
							<div class="field half">
								<input type="text" name="name" id="name" placeholder="Name" />
							</div>

							<div class="field half">
								<input type="text" name="email" id="email" placeholder="Email" />
							</div>

							<div class="field">
								<textarea name="message" id="message" rows="3" placeholder="Notes"></textarea>
							</div>

							<div class="field text-right">
								<label>&nbsp;</label>

								<ul class="actions">
									<li><input type="submit" name="submit" value="Send Message" class="primary" /></li>
								</ul>
							</div>
						</div>
					</form>
				</section>
				<section>
					<h2>Contact Info</h2>

					<ul class="alt">
						<li><span class="fa fa-envelope-o"></span> <a href="#">contact@company.com</a></li>
						<li><span class="fa fa-phone"></span> +0288 6588875 </li>
						<li><span class="fa fa-map-pin"></span> 08, Star Avenue, MG Road, Ahmedabad</li>
					</ul>

					
				</section>

				<ul class="copyright">
					<li>Copyright © 2023 Book Ki Dukan </li>
				</ul>
			</div>
		</footer>

		</div>