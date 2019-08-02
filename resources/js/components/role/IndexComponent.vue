<template>
    <div class="container-fluid permission-dashboard">
        <div class="row">
            <div class="col-sm-8">
                <user-roles :roleList="roles"></user-roles>
            </div>
            <div class="col-sm-4">
                <div class="role-section">
                    <role-form></role-form>
                    <roles-list :roleList="roles"></roles-list>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import RolesList from './RolesList.vue'
    import UserRoles from './UserRoles.vue'
    import RoleForm from './RoleForm.vue'
    export default {
        data(){
            return {
                roles: []
            }
        },
        components:{
            'roles-list': RolesList,
            'user-roles': UserRoles,
            'role-form': RoleForm
        },
        mounted(){
            var app =this
            axios.get(laroute.route('api.role.index')).then(function(res){
                app.roles = res.data
            }).catch(function(err){
                console.log(err)
            })
        }
    }
</script>
<style lang="scss" scoped>
.permission-dashboard{
    font-size: 20px;
}
</style>
