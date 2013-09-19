<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Suko443_underscored
 */
 get_header(); ?>

<!--*PAGE-CONTACT.PHP*-->

<?php
if(isset($_POST['submitted'])) {
	if(trim($_POST['fm_name']) === '') {
		$nameError = 'Please enter your name.';
		$hasError = true;
	} else {
		$name = trim($_POST['fm_name']);
	}
	if(trim($_POST['fm_email']) === '')  {
		$emailError = 'Please enter your email address.';
		$hasError = true;
	} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+.[A-Z]{2,4}$", trim($_POST['fm_email']))) {
		$emailError = 'You entered an invalid email address.';
		$hasError = true;
	} else {
		$email = trim($_POST['fm_email']);
	}
	if(trim($_POST['fm_message']) === '') {
		$commentError = 'Please enter a message.';
		$hasError = true;
	} else {
		if(function_exists('stripslashes')) {
			$message = stripslashes(trim($_POST['fm_message']));
		} else {
			$message = trim($_POST['fm_message']);
		}
	}
	if(!isset($hasError)) {
		$emailTo = get_option('tz_email');
		if (!isset($emailTo) || ($emailTo == '') ){
			$emailTo = get_option('admin_email');
		}
		$subject = '[PHP Snippets] From '.$name;
		$body = "Name: $name nnEmail: $email nnComments: $message";
		$headers = 'From: '.$name.' <'.$emailTo.'>' . "rn" . 'Reply-To: ' . $email;
		mail($emailTo, $subject, $body, $headers);
		$emailSent = true;
	}
} ?>
	
		<section class="content-bg">
					
			<header class="entry-header">
				<h1 class="entry-title"><?php the_title(); ?></h1>
			</header><!-- .entry-header -->
			<?php if(isset($emailSent) && $emailSent == true) { ?>
				<p>Email sent</p>
			<?php } ?>

			<?php if(isset($hasError)) { ?>
			    <p class="error">
			     There was an error submitting the form.
			    <p>
			    <?php 
					echo $nameError;
					echo $emailError;
					echo $commentError;
				?>
			<?php } ?>

		
			<p>Fields marked with * are mandatory (Basically, please fill out all fields &#8211; thanks!).</p>				
			
				<form  method="post" action="<?php the_permalink(); ?>">
					<?php echo $response; ?>
					<div>
						<label for="fm_name">Name<span class="required">*</span></label>
						<input class="fmtext" type="text" name="fm_name" id="fm_name" placeholder="Name" value="<?php if(isset($_POST['fm_name'])) echo $_POST['fm_name'];?>" />
						<?php if($nameError != '') { ?> 
							<span class="error">Please enter name</span> 
 						<?php } ?>
					</div>
					<div>
						<label for="fm_email">Email<span class="required">*</span></label>
						<input class="fmtext" type="email" name="fm_email" id="fm_email" placeholder="Email" value="Email" />
						<?php if($emailError != '') { ?> 
							<span class="error">Please enter email address</span> 
 						<?php } ?>
					</div>
					<div>
						<label for="fm_message">Message<span class="required">*</span></label>
						<textarea class="fmtextarea" name="fm_message" cols="20" rows="6" id="fm_message" placeholder="Message" >Your message here</textarea>
						<?php if($commentError != '') { ?> 
							<span class="error">Please enter message</span> 
 						<?php } ?>

					</div>

					<input type="hidden" name="submitted" value="1" />
					<input type="submit" name="form_submitted_1" value="Send Email" />
				</form>

				<a href="#top" class="toplink">Back to top</a>

			
			
		</section><!--/.content-bg -->

	
		<!-- right col sidebar here -->	
		<?php get_sidebar(); ?>
		<?php get_footer(); ?>
				
	






