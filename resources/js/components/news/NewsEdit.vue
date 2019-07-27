<template>
    <div>
        <div class="form-group">
            <a v-bind:href="index" class="btn btn-default">Back</a>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">Edit news</div>
            <div class="panel-body">
                <form v-on:submit="saveForm()">
                    <div class="row">
                        <div :class="['col-xs-12 form-group', errors.title ? 'has-error' : '']">
                            <label class="control-label">Title</label>
                            <input type="text" v-model="news.title" class="form-control">
                            <span v-if="errors.title" :class="['label label-danger']">{{ errors.title[0] }}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Content</label>
                            <textarea rows="3" v-model="news.content" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Posted by</label>
                            <select v-model="news.posted_by" class="form-control">
                                <option disabled value="">Select poster</option>
                                <option v-for="usr of users" :key="usr.id" v-bind:value="usr.id">{{ usr.name }}
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Posted at</label>
                            <input type="date" v-model="news.created_at" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <button class="btn btn-success">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            let app = this;
            let id = window.location.href.split('/').pop();
            app.newsId = id;
            axios.get(laroute.route('api.news.show', {news: id}))
                .then(function (resp) {
                    app.news = resp.data;
                })
                .catch(function () {
                    alert("Could not load your news")
                });
        },
        data: function () {
            return {
                newsId: null,
                news: {
                    title: '',
                    content: '',
                    posted_by: '',
                    created_at: '',
                },
                users: [],
                errors: [],
                index : laroute.route('news.index')
            }
        },
        async created() {
            try {
                const res = await axios.get(laroute.route('news.json'));
                this.users = res.data;
            } catch (e) {
                console.error(e)
            }
        },
        methods: {
            saveForm() {
                event.preventDefault();
                var app = this;
                var newNews = app.news;
                axios.patch(laroute.route('api.news.update', {news: app.newsId}), newNews)
                    .then(function (resp) {
                        window.location = laroute.route('news.index');
                        this.errors = [];
                        this.title = '';
                        this.content = '';
                        this.posted_by = '';
                        this.created_at = '';
                    })
                    .catch((error) => {
                        this.errors = error.response.data.errors;
                    });
            }
        }
    }
</script>
