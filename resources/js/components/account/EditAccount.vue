<template>
<div>
    <form v-on:submit="update()" enctype="multipart/form-data">
        <a v-bind:href="accountIndex" class="btn btn-default">Back</a>
        <button class="btn btn-success">Confirm</button>
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td>Email</td>
                    <td>
                        <input type="text" v-model="account.email" id="" class="form-control" required>
                    </td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>
                        <input type="text"  id="" v-model="account.password" class="form-control" required>
                    </td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td>
                        <input type="text" id="" v-model="account.name" class="form-control" required>
                    </td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td>
                        <input type="text"  id="" v-model="account.phone" class="form-control">
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
                accountID : null,
                account: {
                    name: '',
                    email: '',
                    password: '',
                    phone: ''
                }
            }
        },
        mounted(){
            let app = this
            let temp = window.location.href.split('/')
            app.accountID = temp[temp.length-2]
            axios.get(app.getAccount(app.accountID))
                .then(function (resp) {
                    app.account = resp.data
                })
                .catch(function () {
                    alert("Could not load account")
                });
        },
        methods: {
            update() {
                event.preventDefault();
                var app = this;
                var newAccount = app.account;
                axios.patch(app.updateAccount(app.accountID), newAccount)
                    .then(function (resp) {
                        window.location = app.accountIndex
                    })
                    .catch(function (resp) {
                        alert("Could not update account");
                    });
            }
        }
    }
</script>
