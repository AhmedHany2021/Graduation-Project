		<div class="form-v5-content">
			<form class="form-detail" action="/auth/default" method="post" name="form" id="form" onkeypress="">
				<h2>Login</h2>
				<div class="form-row">
					<label for="your-email">Email</label>
					<input type="text" name="email" id="your-email" class="input-text" placeholder="write your email or phone" required>
					<i class="fas fa-envelope"></i>
				</div>
				<div class="form-row">
					<label for="password">Password</label>
					<input type="password" name="password" id="pass1" class="input-text" placeholder="Your Password" required>
					<i class="fas fa-lock"></i>
				</div>  
                <div class="form-row">
                    <input type="button" id = 'patient' value = "patient" style="width:200px"
                           onclick="document.getElementById('patient').style.backgroundColor = 'aqua';
                                    document.getElementById('doctor').style.backgroundColor = 'white';
                                    document.getElementById('type').value = 'patient';
                         " />  
                    <input type="button" id = 'doctor' value = "doctor" style="width:200px;align:left"
                           onclick="document.getElementById('patient').style.backgroundColor = 'white';
                                    document.getElementById('doctor').style.backgroundColor = 'aqua';
                                    document.getElementById('type').value = 'doctor';
                                    "/> 
                    <input type="hidden" name = 'user-type'  id = 'type' value ='' />
                </div>
                <div class="form-row">
                     
                </div>
				<div class="form-row-last">
                        <input type="submit" name="submit" class="register" value = 'login'>
				</div>
            </form>

					<div class="text-center">
						<span class="txt1">
							Forgot your password?
						</span>

						<a href="/auth/forgotpassword" class="txt2 hov1">
							Reset
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
				<div class="text-center">
						<span class="txt1">
							Create a doctor's account?
						</span>

						<a href="/auth/doctorregister" class="txt2 hov1">
							Register As a Doctor
						</a>
                                </div>									
		</div>