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
                        <a v-bind:href="editAccount(user.id)" class="btn btn-info">Edit</a>
                        <a href="#" v-on:click="destroy(user.id, index)" class="btn btn-danger">Delete</a>
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
            axios.get(laroute.route('api.account.index'))
                .then(function (resp) {
                    app.users = resp.data;
                    
                })
                .catch(function (resp) {
                    alert("Could not load companies");
                });
        },
        methods: {
            destroy(id, index){
                if(confirm('Are you sure?')){
                    var app = this
                    axios.delete(app.deleteAccount(id))
                        .then(function(resp){
                            app.users.splice(index,1)
                        })
                        .catch(function (resp) {
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
