<template>
<div>
    <form v-on:submit="create()" enctype="multipart/form-data">
        <a v-bind:href="accountIndex" class="btn btn-default">Back</a>
        <button class="btn btn-success">Confirm</button>
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td>Email</td>
                    <td>
                        <input type="text" v-model="account.email" id="" class="form-control">
                    </td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>
                        <input type="text"  id="" v-model="account.password" class="form-control">
                    </td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td>
                        <input type="text" id="" v-model="account.name" class="form-control">
                    </td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td>
                        <input type="text"  id="" v-model="account.phone" class="form-control">
                    </td>
                </tr>
                <tr>
                    <td>Avatar</td>
                    <td>
                        <input type="file" name="avatar" id="" accept="image/*" class="form-control">
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>
</template>
<script>
    export default {
        data() {
            return {
                account: {
                    name: '',
                    email: '',
                    password: 'password',
                    phone: ''
                }
            }
        },
        methods: {
            create() {
                event.preventDefault();
                var app = this;
                var newAccount = app.account;
                axios.post(app.storeAccount, newAccount)
                    .then(function (resp) {
                        window.location = app.accountIndex
                    })
                    .catch(function (resp) {
                        alert("Could not create account");
                    });
            }
        }
    }
</script>
