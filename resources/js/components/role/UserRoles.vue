<template>
    <div class="users-roles">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Account ID</th>
                    <th>Account Name</th>
                    <th>Account Permission</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="userRole in userRoles">
                    <td>{{userRole.id}}</td>
                    <td>{{userRole.name}}</td>
                    <td>
                        <role-selector :roleList="roleList" :user="userRole"></role-selector>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
import { all } from 'q';
import RoleSelector from './RoleSelector.vue'
export default {
    props:{
        roleList: {
            type: Array
        }
    },
    data(){
        return{
            userRoles: []
        }
    },
    components:{
        'role-selector': RoleSelector
    },
    mounted(){
        var app = this
        axios.get(app.accounts)
            .then(function(res){
                app.userRoles = res.data
            }).catch(function(err){
                alert("Can't load account list")
            })
    }
}
</script>
<style lang="scss">
</style>
