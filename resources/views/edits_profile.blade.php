@extends('layouts.edits_profile')

@section('main-content')
<div class="container-fluid">
		<div class="row mt-5 no-gutters">

				<!-- <h3 class="form_title">Profile Setting</h3> -->

				<div class="col-md-4 d-none d-md-block">
					<div class="container">
							<div class="side-nav">
									<div class="logo-con">
										<p class="logo text-center py-2">Lan<span>c</span>ers</p>
									</div>
									<div class="d-flex flex-column align-items-center">
									<div class="d-flex flex-column align-items-center">
								<div class="d-flex flex-column">
									<a href="/dashboard/profile/settings" class="nav-option active-nav py-3">Profile Settings</a>
									<a href="/dashboard/emails/settings" class="nav-option">Email Notifications</a>
									<a href="/pricing" class="nav-option py-3">Subscription</a>
								</div>
								</div>
				</div>
				</div>

					</div>
					</div>

			 <div class="col-sm-12 col-md-8  pl-2 pr-2 pb-4">
                        <p><strong>Personal Profile</strong></p>

                    @if ($errors->any())
						<div class="col-sm-12">
							<div class="alert  alert-danger alert-dismissible fade show" role="alert">
								@foreach ($errors->all() as $error)
									<span><p>{{ $error }}</p></span>
								@endforeach
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
							</div>
						</div>
					@endif


					  @if(session('success') != null)
                 	<div class="col-sm-12">
							<div class="alert  alert-success alert-dismissible fade show" role="alert">
                      	<span><p>{{ session('success') }}</p></span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>

                        </div>
                    @endif
                    

                     					<div class="container profile_form">
							<form id="profileForm"  method="POST" action="{{ url('/profile/update') }}">
								@csrf

									<label for="" class="msg"></label>
							<div class="form-group">
									<div class="names">
											<div class="firstname">
													<label for="firstName">First Name</label>
													<input id="firstName" class="form-control" type="text" name="first_name" value="{{ $user->profile->first_name }}" placeholder="First Name">
											</div>
											<div class="lastname">
													<label for="lastName">Last Name</label>
													<input id="lastName" class="form-control" type="text" name="last_name" placeholder="Last Name" value="{{ $user->profile->last_name }}">
											</div>
									</div>
											<!-- <span id="name_message"></span> -->
							</div>
							<div class="form-group">
									<div class="title_text">
													<div class="title">
															<label for="title">Title</label>
															<input id="mytitle" class="form-control" type="text" name="title" placeholder="Your Job Title" value="{{ $user->profile->title}}">
													</div>
													<div class="email">
															<label for="my-email">User Email</label>
															<input id="email" class="form-control" type="text" name="email" placeholder="Your Email Address" value="{{ $user->email }}">
													</div>
									</div>
									<!-- <span id="emessage"></span> -->
							</div>
							<div class="caret">
									<h6> <i class="fas fa-angle-down show-angle-down"></i><i class="fas fa-angle-up show-angle-up"></i> &nbsp Change Password</h6>
							</div>
							<div class="form-group show-password-section">

									<p>
									<div>
											<label for="my-password">Password</label>
											<input id="password" class="form-control" type="password" name="current_password" placeholder="Current password">
									</div>
									</p>
									<div class="newpassword">
													<div class="newPass">
															<label for="new_password">New Password</label>
															<input id="npassword" class="form-control" type="password" name="new_password" placeholder="New password">
													</div>
													<div class="conPass">
															<label for="confirm_password">Confirm Password</label>
															<input id="cpassword" class="form-control" type="password" name="confirm_password" placeholder="Confirm password">
													</div>
									</div>

                                      </br>
                                      </br>
                                      </br>
                                      </br>
                                            <p style="text-align: center;">
                                            	<button  type="submit" class="green-btn">Update</button>
                                            </p>

							</div>


					</form>

					</div>

				</div>
		</div>

		<div class="row align-items-center mt-5 no-gutters">

					 <div class="col-sm-8 offset-md-4 company-details-form mt-5 pl-5 pr-5 pt-4 pb-4">
                     <p><strong>Company Information</strong></p>
							<div class="container">

                            <form id="company-details"  method="POST" action="{{ url('/profile/clientupdate') }}">										
						    @csrf
							<label for="" class="msg"></label>
									<p>
									<div class="form-group">
											<div class="coy-details">
													<div class="coy-details-name">
															<label for="coyName">Company Name</label>
															<input id="coyName" class="form-control" type="text" name="company_name" placeholder="Company Name" value="{{ $user->profile->company_name}}">
													</div>
													<div class="coy-details-email">
															<label for="coyEmail">Company Email</label>
															<input id="coyEmail" class="form-control" type="text" name="company_email" placeholder="Company Email" value="">
													</div>
											</div>
													<!-- <span id="name_message"></span> -->
									</div>
							         </p>
									<!-- <p>
											<div class="caretCompany">
													<h6> <i class="fas fa-angle-down show-angle-down"></i><i class="fas fa-angle-up show-angle-up"></i> &nbsp Address Setting</h6>
											</div>
									</p> -->

									<div class="form-group">
											<p>
											<div>
													<label for="coyaddress">Company Address</label>
													<input id="coyaddress" class="form-control" type="text" name="company_address" placeholder="Company Address" value="">
											</div>
									</p>

                                    <div class="form-group">
											<div class="coy-details">
													<div class="coy-details-name">
															<label for="firstName">Street Name</label>
															<input id="coyName" class="form-control" type="text" name="street" placeholder="Street" value="">
													</div>
													<div class="coy-details-email">
															<label for="lastName">Street Number</label>
															<input id="coyEmail" class="form-control" type="text" name="street_number" placeholder="Street Number" value="">
													</div>
											</div>
													<!-- <span id="name_message"></span> -->
									</div>

                                      <div class="form-group">
											<div class="coy-details">
													<div class="coy-details-name">
															<label for="city">City</label>
															<input id="city" class="form-control" type="text" name="city" placeholder="city" value="">
													</div>


													<div class="coy-details-email">
															<label for="Zipcode">Zipcode</label>
															<input id="Zipcode" class="form-control" type="text" name="zipcode" placeholder="zipcode" value="">
													</div>

											</div>
													<!-- <span id="name_message"></span> -->
									</div>


                                        <div class="form-group">
											<div class="coy-details">
													<div class="coy-details-name">
															<label for="phone">Phone Number</label>
															<input id="phone" class="form-control" type="text" name="phone" placeholder="Phone Number" value="">
													</div>


													<div class="coy-details-email">
															<label for="Contacts">Contacts</label>
															<input id="Contacts" class="form-control" type="text" name="contacts" value="" placeholder="Contacts">
													</div>

											</div>
													<!-- <span id="name_message"></span> -->
									</div>


											<div class="coy-contact">
															<div class="coy-contact-country">
																	<label for="country_id">Country</label>
                                                                    <select id="country_id" name="country_id" class="form-control">
                                                                    <option value="">Select a country</option>
                                                                    
                                                                            
                                                                                                                                            </select>

															</div>
															<div class="coy-contact-state">
																	<label for="state_id">State</label>
																	<select id="state_id" name="state_id" class="form-control">
                                                                    <option value="">Select State</option>
                                                                    
                                                                    
                                                                                                                                        </select>


															</div>
											</div>

									</div>

											<div class="form-group">
															<div class="coy-details-2">
																			<div class="coy-currency">
																					<label for="currency_id">Currency</label>

                                                                                    <select class="form-control" id="currency_id" name="currency_id">
                                                                                    <option value="">Select Currency</option>

                                                                                        @if($currencies != null)

                                                                                        @foreach($currencies as $dataCurrency)
                                                                                        <option value={{ $dataCurrency['id'] }} >{{ $dataCurrency['symbol']}} -> {{ $dataCurrency['name'] }}</option>
                                                                                         @endforeach


                                                                                    @endif
                                                                                    </select>
																			</div>

																			<div class="coy-time-zone">
																					<label for="time-zone">Time Zone</label>
																					<select class="form-control" id="country" name="timezone">
                                                                                    <option value="">Select a Timezone</option>
                                                                                    <option value="">Time Zone</option>
                                                                                    <option value="GMT">GMT</option>
                                                                                    <option value="GMT +1">GMT +1</option>
                                                                                    <option value="GMT +2">GMT +2</option>
                                                                                    <option value="GMT +3">GMT +3</option>
																					</select>
																			</div>
															</div>
															<!-- <span id="emessage"></span> -->
											<!-- <span id="pmessage"></span> -->
									</div>

									<div class="d-flex justify-content-center">
											<button type="submit" class="green-btn">Update</button>
										</div>
							</form>
							</div>
						</div>
				</div>
            </div>
   @endsection
