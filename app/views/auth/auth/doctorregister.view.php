                    <div class="form-v5-content">
			<form class="form-detail" action="/auth/doctorregister" method="post">
				<h2>Register As a Doctor</h2>
				<div class="form-row">
					<label for="full-name">Full Name</label>
					<input type="text" name="name" id="firstname" class="input-text" placeholder="Full Name" required>
					<i class="fas fa-user"></i>
				</div>
                                <div class="form-row">
					<label for="full-name">Mobile Number</label>
					<input type="tel" name="phone" id="mobilenumber" class="input-text" placeholder="Mobile Number" required>
					<i class="fas fa-mobile"></i>
				</div>
				<div class="form-row">
					<label for="your-email">Your Email</label>
					<input type="text" name="email" id="your-email" class="input-text" placeholder="Your Email" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}">
					<i class="fas fa-envelope"></i>
				</div>
				<div class="form-row">
					<label for="password">Password</label>
					<input type="password" name="password" id="password" class="input-text" placeholder="Your Password" required>
					<i class="fas fa-lock"></i>
				</div>
				<div class="form-row">
					<label for="password">Retype Password</label>
					<input type="password" name="password2" id="password" class="input-text" placeholder="Repeat Your Password To Match" required>
					<i class="fas fa-lock"></i>
				</div>
				<div class="form-row">
					<label for="code">Doctor's Code</label>
					<input type="text" name="code" id="code" class="input-text" placeholder="Your Code" required>
					<i class="fas fa-stethoscope"></i>
				</div>
				<div class="form-row-last">
					<input type="submit" name="submit" class="register" value = 'signup'>
				</div>
                                </form>
				<div class="text-center">
						<span class="txt1">
							Already Registered?
						</span>

						<a href="/" class="txt2 hov1">
							Log in
						</a>
					</div>
				<div class="text-center">
						<span class="txt1">
							Create a patient's account?
						</span>

						<a href="/auth/patientregister" class="txt2 hov1">
							Register As a Patient
						</a>
					</div>

		</div>