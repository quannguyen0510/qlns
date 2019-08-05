<template>
    <form v-on:submit="updateRole()" class="container" >
        <div class="row">
            <div class="col-sm-9">
                <select class="form-control" v-model="user.id_role">
                    <option v-for="role in roleList" :value="role.id" >
                        {{role.role}}
                    </option>
                </select>
            </div>
            <div class="col-sm-2">
                <button class="btn btn-warning">Change</button>
            </div>
        </div>
    </form>
</template>
<script>
export default {
    props:{
        roleList:{
            type: Array
        },
        user:{
            type: Object
        }
    },
    methods:{
        updateRole(){
            event.preventDefault();
            let app = this
            let changed = app.user 
            axios.post(app.updateAccountRole, changed)
                .then(function (resp) {
                    alert("Assigned new role for "+changed.name);
                })
                .catch(function (resp) {
                    alert("Could not update account");
                });
            return false;
        }
    }
}
</script>
