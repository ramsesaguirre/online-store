<template>
    <div>
        <!--banner-->
		<breadcrumb-data :name="value" />

        <div class="login">
            <div class="main-agileits">
                <div class="form-w3agile">
                    <h3>Login</h3>
                    <form action="#" method="post">
                        <div class="key">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <input  type="text" value="Email" name="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
                            <div class="clearfix"></div>
                        </div>
                        <div class="key">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                            <input  type="password" value="Password" name="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="">
                            <div class="clearfix"></div>
                        </div>
                        <input type="submit" value="Login">
                    </form>
                </div>
                <div class="forg">
                    <a href="#" class="forg-left">Forgot Password</a>
                    <a href="#" class="forg-right">Register</a>
                <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import breadcrumbData from '../components/ui/breadcrumb.vue';

    export default {
        components: {
            breadcrumbData
        },
        data: function () {
            return {
                value: ''
            }
        },
        created: function () {
            this.value = 'Login';
        }
    }
</script>