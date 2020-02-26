<template>
    <div>
        <!--banner-->
		<breadcrumb-data :name="value" />

		<!-- contact -->
		<div class="contact">
			<div class="container">
				<headerComponent :name="value" />
				<div class=" contact-w3">	
					<div class="col-md-5 contact-right">	
						<img src="assets/images/cac.jpg" class="img-responsive" alt="">
						<iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d2482.432383990807!2d0.028213999961443994!3d51.52362882484525!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1423469959819" style="border:0"></iframe>
					</div>
					<div class="col-md-7 contact-left">
						<h4>Contact Information</h4>
						<p> Nemo enim ipsam voluptatem quia voluptas sit aspernatur 
						aut odit aut fugit, sed quia consequuntur magni dolores eos
						qui ratione voluptatem sequi nesciunt. Neque porro quisquam 
						est, qui dolorem ipsum quia dolor sit amet, consectetur</p>
						<ul class="contact-list">
							<li> <i class="fa fa-map-marker" aria-hidden="true"></i> 756 Global Place, New York.</li>
							<li><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:example@mail.com">mail@example.com</a></li>
							<li> <i class="fa fa-phone" aria-hidden="true"></i>+123 2222 222</li>
						</ul>
						<div id="container">
							<!--Horizontal Tab-->
							<div id="parentHorizontalTab">
								<ul class="resp-tabs-list hor_1">
									<li><i class="fa fa-envelope" aria-hidden="true"></i></li>
								</ul>
								<div class="resp-tabs-container hor_1">
									<div>
										<form action="#" method="post">
											<input type="text" value="Name" name="Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}" required="">
											<input type="email" value="Email" name="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
											<textarea name="Message..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message...';}" required="">Message...</textarea>
											<input type="submit" value="Submit" >
										</form>
									</div>	
								</div>
							</div>
						</div>
						
						
						
					</div>
					
				<div class="clearfix"></div>
			</div>
			</div>
		</div>
		<!-- //contact -->
    </div>
</template>

<script>
	import breadcrumbData from '../components/ui/breadcrumb.vue';
	import headerComponent from '../components/ui/header.vue';

    export default {
        components: {
			breadcrumbData,
			headerComponent
        },
        data: function () {
            return {
                value: ''
            }
        },
        created: function () {
            this.value = 'Contact';
        }
    }
</script>