<template>
    <div style="width: 100%;" class="news-component">
        <div class="form-group">
            <a v-bind:href="createNews" class="btn btn-success">Create new news</a>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">News list</div>
            <div class="panel-body">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Posted by</th>
                        <th width="100">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="news_item, index in news">
                        <td>{{ news_item.title }}</td>
                        <td>{{ news_item.content }}</td>
                        <td>{{ news_item.posted_by}}</td>
                        <td>
                            <a v-bind:href="editNews(news_item.id)" class="btn btn-xs btn-default">
                                Edit
                            </a>
                            <a href="#"
                               class="btn btn-xs btn-danger"
                               v-on:click="deleteEntry(news_item.id, index)">
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
                news: []
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
            deleteEntry(id, index) {
                if (confirm("Do you really want to delete it?")) {
                    var app = this;
                    axios.delete(app.deleteNews(id))
                        .then(function (resp) {
                            app.news.splice(index, 1);
                        })
                        .catch(function (resp) {
                            alert("Could not delete news");
                        });
                }
            }
        }
    }
</script>
