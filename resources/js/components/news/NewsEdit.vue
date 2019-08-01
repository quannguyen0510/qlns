<template>
    <div>
        <div class="form-group">
            <a href="/admin/news" class="btn btn-default">Back</a>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">Create new News</div>
            <div class="panel-body">
                <form v-on:submit="update">
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Title</label>
                            <input type="text" v-model="news.title" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Content</label>
                            <input type="text" v-model="news.content" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Post By</label>
                            <input type="text" v-model="news.posted_by" class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <button class="btn btn-success">Create</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                newsID: null,
                news: {
                    title: '',
                    content: '',
                    posted_by: ''

                }
            }
        },
        mounted() {
            let app = this
            let temp = window.location.href.split('/')
            app.newsID = temp[temp.length - 2]
            axios.get(laroute.route('api.news.show', {news: app.newsID}))
                .then(function (resp) {
                    app.news = resp.data
                })
                .catch(function () {
                    alert("Could not load account")
                });
        },
        methods: {
            update() {
                event.preventDefault();
                var app = this;
                var listnews = app.news;
                axios.patch(laroute.route('api.news.update', {news: app.newsID}), listnews)
                    .then(function (resp) {
                        window.location = app.indexNews
                    })
                    .catch(function (resp) {
                        alert("Could not update account");
                    });
            }
        }
    }
</script>
