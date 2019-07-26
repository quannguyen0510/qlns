<template>
    <div class="create-form">
        <form v-on:submit="saveForm()" enctype="multipart/form-data">
            <router-link to="/" class="btn btn-default">Back</router-link>
            <button to="" class="btn btn-success">Create Account</Button>
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <td>Name</td>
                    <td>
                        <input class="form-control" v-model="account.name" type="text" id="name" required>
                    </td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>
                        <input class="form-control" v-model="account.email" type="text" id="email" required>
                    </td>
                </tr>
                <tr>
                    <td>Phone No.</td>
                    <td>
                        <input class="form-control" v-model="account.phone" type="text" id="phone">
                    </td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>
                        <input class="form-control" type="text" v-model="account.password" id="password" required>
                    </td>
                </tr>
                <tr>
                    <td>Avatar</td>
                    <td>
                        <input class="form-control" type="file" name="avatar" id="avatar" accept="image/*">
                    </td>
                </tr>
                </tbody>
            </table>
        </form>
    </div>
</template>
<script>
export default {
    data(){
        return{
            account:{
                name: '',
                email: '',
                phone: '',
                password: '12345678'
            }
        }
    },
    methods:{
        saveForm(){
            event.preventDefault();
            var app = this;
            var newAccount = app.account;
            axios.post('/api/v1/account', newAccount)
                .then(function (resp) {
                    app.$router.push({path: '/'});
                })
                .catch(function (resp) {
                    console.log(resp);
                    alert("Could not create your account");
                });
        }
    }
}
</script>
