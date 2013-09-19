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
 * Template Name: Contact Form
 */
 ?>

<!--*PAGE-CONTACT.PHP*-->
<?php 
//If the form is submitted
if(isset($_POST['submitted'])) {
	//Check to see if the honeypot captcha field was filled in
	if(trim($_POST['checking']) !== '') {
	 $captchaError = true; //failed the captcha test
	} else {
		//passed the captcha test - do the rest of the validation
		//Check to make sure that the name field is not empty
		if(trim($_POST['contactName']) === '') {
			$nameError = 'You forgot to enter your name.';
			$hasError = true;
		} else {
			$name = trim($_POST['contactName']);
		}
		//Check to make sure sure that a valid email address is submitted
		if(trim($_POST['email']) === '')  {
			$emailError = 'You forgot to enter your email address.';
			$hasError = true;
		} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+.[A-Z]{2,4}$", trim($_POST['email']))) {
			$emailError = 'You entered an invalid email address.';
			$hasError = true;
		} else {
			$email = trim($_POST['email']);
		}

		//Check to make sure comments were entered 
		if(trim($_POST['comments']) === '') {
			$commentError = 'You forgot to enter your comments.';
			$hasError = true;
		} else {
			if(function_exists('stripslashes')) {
				$comments = stripslashes(trim($_POST['comments']));
			} else {
				$comments = trim($_POST['comments']);
			}
		}
	}

	//If there is no error, send the email
	if(!isset($hasError)) {
		//no error - send email
		$emailTo = get_option('admin_email');
		$subject = 'Contact Form Submission from '.$name;
		$sendCopy = trim($_POST['sendCopy']);
		$body = "Name: $name nnEmail: $email nnComments: $comments";
		$headers = 'From: My Site <'.$emailTo.'>' . "rn" . 'Reply-To: ' . $email;

		mail($emailTo, $subject, $body, $headers);
		if($sendCopy == true) {
			$subject = 'You emailed Your Name';
			$headers = 'From: Your Name <noreply@somedomain.com>';
			mail($email, $subject, $body, $headers); //do the sending
		}
		$emailSent = true; //set marker for success
	}
} ?>
<?php get_header(); ?>
<section class="content-bg">
					
			<header class="entry-header">
				<h1 class="entry-title"><?php the_title(); ?></h1>
			</header><!-- .entry-header -->
<?php 
//If the email was sent, show a thank you message
//Otherwise show form
if(isset($emailSent) && $emailSent == true) {
?>
	<!-- thanks you message or page -->
	<div class="thanks">
	  <h1>Thanks, <?=$name;?></h1>
	  <p>Your email was successfully sent. I will be in touch soon.</p>
	</div>
<?php } else { ?>
<!-- show form if email not sent -->
	<?php if (have_posts()) : ?>
 
		<?php while (have_posts()) : the_post(); ?>
		
		<?php the_content(); ?>

		<?php if(isset($hasError) || isset($captchaError)) { ?>
		<p class="error">
		 There was an error submitting the form.
		<p>
		<?php } ?>

		<form action="<?php the_permalink(); ?>" id="contactForm" method="post">
			<ol class="forms">
				<li>
					<label for="contactName">Name</label>
					<input type="text" name="contactName" id="contactName" placeholder="Name" value="
					<?php if(isset($_POST['contactName'])) echo $_POST['contactName'];?>"
					class="requiredField" />
					<?php if($nameError != '') { ?>
					<span class="error"><?=$nameError;?></span> 
					<?php } ?>
				</li>

				<li>
					<label for="email">Email</label>
					<input type="text" name="email" id="email" placeholder="Email" value="
					<?php if(isset($_POST['email']))  echo $_POST['email'];?>"
					class="requiredField email" />
					<?php if($emailError != '') { ?>
					<span class="error"><?=$emailError;?></span>
					<?php } ?>
				</li>

				<li class="textarea">
					<label for="commentsText">Comments</label>
					<textarea name="comments" id="commentsText" placeholder="Message" class="requiredField">
					<?php if(isset($_POST['comments'])) { 
					if(function_exists('stripslashes')) { 
					echo stripslashes($_POST['comments']); 
					} else { 
					echo $_POST['comments']; 
					}
					} ?></textarea>
					<?php if($commentError != '') { ?>
					<span class="error"><?=$commentError;?></span> 
					<?php } ?>
				</li>
				<li class="inline">
					<input type="checkbox" name="sendCopy" id="sendCopy" value="true"
					<?php if(isset($_POST['sendCopy']) && $_POST['sendCopy'] == true) 
					echo ' checked="checked"'; ?> 
					/>
					<label for="sendCopy">Send a copy of this email to yourself</label>
				</li>
				<li class="screenReader">
					<label for="checking" class="screenReader">If you want to submit this form, do not enter anything in this field</label>
					<input type="text" name="checking" id="checking" class="screenReader" value="
					<?php if(isset($_POST['checking']))  echo $_POST['checking'];?>"
					/>
				</li>
				<li class="buttons">
					<input type="hidden" name="submitted" id="submitted" value="true" />
					<button type="submit">Email me »</button>
				</li>
				</ol>

		</form>

		<?php endwhile; ?>
	<?php endif; ?>
<?php } ?>

	
		
			
			

				<a href="#top" class="toplink">Back to top</a>

			
			
		</section><!--/.content-bg -->

	
		<!-- right col sidebar here -->	
		<?php get_sidebar(); ?>
		<?php get_footer(); ?>
				
	






