<template>
    <div class="roles-list">
        <h3>Role List</h3>
        <table class="table">
            <tbody>
                <tr v-for="role, index in roleList">
                    <td class="role-name">{{role.role}}</td>
                    <td class="role-del-btn"><button v-on:click="deleteRole(role, index)" class="btn btn-danger">X</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
export default {
    props:{
        roleList:{
            type: Array
        }
    },
    data(){
        return {

        }
    },
    methods:{
        deleteRole(role,index){
            if(confirm('Delete role '+role.role+'?')){
                var app = this
                axios.delete(laroute.route('api.role.destroy',{role:role.id}))
                    .then(function(res){
                        window.location = window.location.href
                    })
                    .catch(function(err){
                        alert("Can't delete role")
                    })
            }
        }
    }
}
</script>
<style lang="scss" scoped>
.roles-list{
    margin-top: 15px;
    min-height: 100px;
    border-left: 2px solid #ffa5a5;
    padding-left: 10px;
    h3{
        text-align: center;
        font-weight: bold;
    }
    .role-name{
        font-size: 20px;
        text-transform: capitalize
    }
    .role-del-btn{
        text-align: right;
        .btn{
            margin: 0;
        }
    }
}
</style>
