<template>
    <div>
        <div class="form-group">
            <a v-bind:href="create" class="btn btn-success">Create new post</a>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">List news</div>
            <div class="panel-body">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Posted By</th>
                        <th>Posted at</th>
                        <th width="100">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for='nws, index in news'>
                        <td>{{ nws.id }}</td>
                        <td>{{ nws.title }}</td>
                        <td>{{ nws.content }}</td>
                        <td>{{ nws.users.name }}</td>
                        <td>{{ nws.created_at }}</td>
                        <td>
                            <a v-bind:href="edit + '/' + nws.id" class="btn btn-xs btn-default">
                                Edit
                            </a>
                            <a href="#"
                               class="btn btn-xs btn-danger"
                               v-on:click="showAlertConfirm(nws.id, index)">
                                Delete
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                news: [],
                create: laroute.route('news.create'),
                edit: laroute.route('news.edit')
            }
        },
        mounted() {
            var app = this;
            axios.get(laroute.route('api.news.index'))
                .then(function (resp) {
                    app.news = resp.data;
                })
                .catch(function (resp) {
                    console.log(resp);
                    alert("Could not load news");
                });
        },
        methods: {
            showAlertConfirm(id, index) {
                this.$swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                        var app = this;
                        axios.delete(laroute.route('api.news.destroy', {news: id}))
                            .then(function (resp) {
                                app.news.splice(index, 1);
                            })
                        this.$swal(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    } else {
                        this.$swal(
                            'Fail!',
                            'Your file has not been deleted.',
                        )
                    }
                });
            },
        }
    }
</script>
