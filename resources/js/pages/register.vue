<template>
    <div>
        <!--banner-->
        <breadcrumb-data :name="value" />

        <!--login-->
        <div class="login">
            <div class="main-agileits">
                    <div class="form-w3agile form1">
                        <h3>Register</h3>
                        <form action="#" method="post">
                            <div class="key">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <input  type="text" value="Username" name="Username" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Username';}" required="">
                                <div class="clearfix"></div>
                            </div>
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
                            <div class="key">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                                <input  type="password" value="Confirm Password" name="Confirm Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Confirm Password';}" required="">
                                <div class="clearfix"></div>
                            </div>
                            <input type="submit" value="Submit">
                        </form>
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
            this.value = 'Register';
        }
    }
</script>