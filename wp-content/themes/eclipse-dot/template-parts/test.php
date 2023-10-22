<?php /* Template Name: test */
get_header();

if(isset($_POST['ispost'])){

		$post_title = $_POST['fname'];
		$email = $_POST['email'];
		$post_content = $_POST['testimonial'];
		$company_name = $_POST['company_name'];
		$new_post = array(
			'post_title' => $post_title,
			'post_content' => $post_content,
			'post_status' => 'draft',
			'post_type' => 'testimonial',
		);

		$pid = wp_insert_post($new_post);
		add_post_meta($pid, 'meta_key', true);

		if ($company_name)
		{
			update_post_meta($pid, 'company_name', $company_name);
		}
		if ($email)
		{
			update_post_meta($pid, 'email_id', $email);
		}

	}
	?>
	<form class="form-horizontal1" name="form" method="post" enctype="multipart/form-data">
		<input type="hidden" name="ispost" value="1" />
		<input type="hidden" name="userid" value="" />

		<div class="">
			<input type="text" class="form-control" name="ffname" placeholder="Name" />
		</div>

		<div class="uploadblock">
			<input type="submit" class="wpcf7-submit" value="SUBMIT LICENSE" name="submit_license" />
		</div>
	</form>
	<script type="text/javascript">
		jQuery(document).ready(function(event) {
	jQuery(".form-horizontal1").validate({
		normalizer: function(value) {
			return jQuery.trim(value);
		},
		rules: {
				ffname: {
					required: true,
				},
			}, 
			messages: {
				image: {
					required: "	This field is required.",
				},
			},
		/*rules: {
			name: {
				required: true,
			},
			company_name: {
				required: false,
			},
			testimonial: {
				required: false,
			},
			email: {
				required: false,
				email: false,
				regexcompal:false,
			},
		}, 
		messages: {
			name: {
				required: "	This field is required.",
			},
			company_name: {
				required: "	This field is required.",
			},
			testimonial: {
				required: "	This field is required.",
			},
			email: {
				required: "	This field is required.",
				email: "Invalid",
			},
		},*/
		errorElement : 'span',
	    errorPlacement: function(error, element) {
		    error.insertAfter(element);
		}
	});
	});
	</script>
 <?php get_footer(); ?>