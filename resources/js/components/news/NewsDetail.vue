<template>
    <div class="col-lg-9">
        <h1>{{ news.title }}</h1>

        <div class="lead">
            Posted by {{ news.users.name }}
        </div>

        <p><span class="glyphicon glyphicon-time"></span> {{ news.created_at }}</p>
        <hr>
        <p class="lead">{{ news.content }}</p>
        <div class="well">
            <h4>Write comment ...<span class="glyphicon glyphicon-pencil"></span></h4>
            <form v-on:submit="saveForm()">
                <div class="form-group">
                    <textarea class="form-control" v-model="comment.comment" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Comment</button>
                <div class="media" v-for='cmt, index in data'>
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"> {{ cmt.users.name }}
                            <small>{{ cmt.created_at }}</small>
                        </h4>
                        <p>{{ cmt.comment }}</p>
                        <a v-on:click="showAlertConfirm(cmt.id, index)" v-if="cmt.users.id === cmts[1].id">Delete</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        name: "NewsDetail",
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
        async created() {
            try {
                let id = window.location.href.split('/').pop();
                const res = await axios.get(laroute.route('news.comment', {id: id}));
                const res1 = await axios.get(laroute.route('api.comment.show', {comment: id}));
                this.cmts = res.data;
                this.data = res1.data;
                this.$data.comment.id_news = this.cmts[0].id;
                this.$data.comment.id_user = this.cmts[1].id;
            } catch (e) {
                console.error(e)
            }
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
                comment: {
                    id_user: '',
                    id_news: '',
                    comment: '',
                    created_at: ''
                },
                cmts: [],
                data: [],
                index: laroute.route('news.index'),
            }
        },
        methods: {
            saveForm() {
                event.preventDefault();
                var app = this;
                var newComment = app.comment;
                let id = window.location.href.split('/').pop();
                axios.post(laroute.route('api.comment.store'), newComment)
                    .then(function (resp) {
                        window.location = laroute.route('news.detail', {id: id});
                    })
                    .catch((error) => {
                        this.errors = error.response.data.errors;
                        console.log(response.data.errors);
                    });
            },
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
                        axios.delete(laroute.route('api.comment.destroy', {comment: id}))
                            .then(function (resp) {
                                app.data.splice(index, 1);
                            })
                        this.$swal(
                            'Deleted!',
                            'Your comment has been deleted.',
                            'success'
                        )
                    } else {
                        this.$swal(
                            'Fail!',
                            'Your comment has not been deleted.',
                        )
                    }
                });
            },
        }
    }
</script>

<style scoped>

</style>
