<template>
    <div class="role-form">
        <form v-on:submit="createRole()">
            <div class="form-group">
                <label for="">Role Name</label>
                <input type="text" v-model="role.role" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Fixed Salary</label>
                <input type="text" v-model="role.fixed_salary" class="form-control">
            </div>
            <button class="btn btn-submit">CONFIRM</button>
        </form>
    </div>
</template>
<script>
export default {
    data(){
        return {
            role: {
                role:'',
                fixed_salary:0
            }
        }
    },
    methods:{
        createRole(){
            event.preventDefault();
            var app = this
            var newRole = app.role
            axios.post(laroute.route('api.role.store'),newRole)
                .then(function(res){
                    window.location = window.location.href
                }).catch(function(err){
                    alert("Can't create new role")
                })
        }
    }
}
</script>
<style lang="scss" scoped>
.role-form{
    border-left: 2px solid #90b5f8;
    padding-left: 10px;
}
</style>
