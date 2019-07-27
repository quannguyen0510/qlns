<template>
    <div class="list-user">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Phone No.</td>
                    <td>
                    </td>
                </tr>
            </thead>
            <tbody>
                <tr v-for="user, index in users">
                    <td>{{ user.id }}</td>
                    <td>{{ user.name }}</td>
                    <td>{{ user.email }}</td>
                    <td>{{ user.phone }}</td>
                    <td>
                        <a href="#" v-on:click="deleteAccount(user.id, index)">Delete</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                users: []
            }
        },
        mounted() {
            var app = this;
            axios.get('/api/v1/account')
                .then(function (resp) {
                    app.users = resp.data;
                })
                .catch(function (resp) {
                    console.log(resp);
                    alert("Could not load companies");
                });
        },
        methods: {
            deleteAccount(id, index){
                if(confirm('Are you sure?')){
                    var app = this
                    axios.delete('/api/v1/account/'+id)
                        .then(function(resp){
                            app.users.splice(index,1)
                        })
                        .catch(function (resp) {
                            console.log(resp);
                            alert("Could not delete account");
                        });
                }
            }
        }
    }
</script>

<style lang="scss" scoped>
.list-user{
    height: fit-content;
}
</style>