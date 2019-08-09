<template>
    <div class="container-fluid">
        <h3>Salary Dashboard</h3>
        <div class="toolbar">
            <a href="" class="btn btn-default">Checkpoint History</a>
        </div>
        <div class="checkpoint">
            <div class="controlbar row">
                <form v-on:submit="search()" class="form-inline col-sm-3">
                    <div class="input-group">
                        <input type="text" v-model="searchInput.content" class="form-control">
                        <div class="input-group-btn">
                            <button class="btn btn-default">Search</button>
                            <button v-on:click="clearSearch()" class="btn btn-default">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th rowspan="2">ID</th>
                                <th rowspan="2">Name</th>
                                <th rowspan="2">Work?</th>
                                <th colspan="4">Work Counter</th>
                                <th rowspan="2">Current Fund</th>
                            </tr>
                            <tr>
                                <th>Offline</th>
                                <th>Morning</th>
                                <th>Afternoon</th>
                                <th>Fulltime</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-if="!searchResult.length">
                                <td colspan="100">No user found</td>
                            </tr>
                            <tr v-for="user, index in searchResult">
                                <td>{{user.id}}</td>
                                <td>{{user.name}}</td>
                                <td>
                                    <a v-on:click="checkpoint(user.id,0)" class="btn btn-sm btn-danger">OFFLINE</a>
                                    <a v-on:click="checkpoint(user.id,1)" class="btn btn-sm btn-info">MORNING</a>
                                    <a v-on:click="checkpoint(user.id,2)" class="btn btn-sm btn-info">AFTERNOON</a>
                                    <a v-on:click="checkpoint(user.id,3)" class="btn btn-sm btn-success">FULLTIME</a>
                                </td>
                                <td>{{user.offline}}</td>
                                <td>{{user.morning}}</td>
                                <td>{{user.afternoon}}</td>
                                <td>{{user.fulltime}}</td>
                                <td>$ {{user.fund}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data(){
        return{
            users: [],
            searchInput: {
                content: ""
            },
            searchResult: []
        }
    },
    mounted() {
        axios.get(laroute.route('api.salary.today'))
            .then(resp => {
                this.users = resp.data;
                this.searchResult = resp.data
            })
            .catch(resp => {
                alert("Could not load users");
            });
    },
    methods:{
        checkpoint(id,mode){
            let app = this
            axios.post(laroute.route('api.salary.checkpoint'),{id: id,mode: mode})
                .then(res => {
                    let data = res.data
                    let found = this.users.findIndex(u=>u.id==id)
                    this.users[found].morning = data.morning
                    this.users[found].afternoon = data.afternoon
                    this.users[found].offline = data.offline
                    this.users[found].fulltime = data.fulltime
                    this.users[found].fund = data.fund
                    let found2 = this.searchResult.findIndex(u=>u.id == this.users[found].id)
                    this.searchResult[found2] = this.users[found]
                })
                .catch(err => {
                    console.error(err)
                })
        },
        search(){
            event.preventDefault()
            let result = this.users.filter(u => {
                return u && u.name.includes(this.searchInput.content.toLowerCase())
            })
            this.searchResult = result
            return false
        },
        clearSearch(){
            event.preventDefault()
            this.searchResult = this.users
        }
    }
}
</script>
<style lang="scss" scoped>
th, td{
    text-align: center!important;
}
</style>
