@extends('layouts.mails')

@section('title', 'You are now Activated')

@section('content')
<table border="0" cellpadding="0" cellspacing="0" class="body">
	<tr>
		<td>&nbsp;</td>
		<td class="container">
			<div class="content">
				<span class="preheader">Subscribe to Coloured.com.ng mailing list</span>
				<table class="main">

					<!-- START MAIN CONTENT AREA -->
					<tr>
						<td class="wrapper">
							<table border="0" cellpadding="0" cellspacing="0">
								<tr>
									<td>
										<h1>Dear : {{ $user->display_name }}, Your Account Email : {{ $user->email }} is now activated</h1>
										<table border="0" cellpadding="0" cellspacing="0" class="btn btn-primary">
											<tbody>
												<tr>
													<td align="left">
														<table border="0" cellpadding="0" cellspacing="0">
															<tbody>
																<tr>
																	<td>
																		<a href="{{ route('login') }} ">Go now login with those credentials
																		</a>
																	</td>
																</tr>
															</tbody>
														</table>
													</td>
												</tr>
											</tbody>
										</table>
										<p>You received this email because you tried to create an account in <a href="/">Blacktrail app</a>If you're not the one who did this simply erase this email.</p>
									</td>
								</tr>
							</table>
						</td>
					</tr>

					<!-- END MAIN CONTENT AREA -->
				</table>

				<!-- START FOOTER -->
				<div class="footer">
					<table border="0" cellpadding="0" cellspacing="0">
						<tr>
							<td class="content-block">
								<span class="apple-link">Blacktrail | Earn money while helping your country fight crime<a href="#"></a>.
								</td>
							</tr>
							<tr>
								<td class="content-block powered-by">
									Email was Designed by <a href="https://fb.me/jalasem">Jalasem</a>.
								</td>
							</tr>
						</table>
					</div>
				</div>
			</td>
			<td>&nbsp;</td>
		</tr>
	</table>
	@endsection