<template>
    <div class="col-lg-9">
        <h1>{{ news.title }}</h1>

        <div class="lead">
            Posted by {{ news.users.name ? news.users.name : '' }}
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
                <button class="btn btn-primary" v-on:click="counter += 1">Comment</button>
            </form>
            <div class="media" v-for='cmt, index in datas'>
                <a class="pull-left" href="#">
                    <img class="media-object" src="http://placehold.it/64x64" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading"> {{ cmt.users.name}}
                        <small>{{ cmt.created_at }}</small>
                    </h4>
                    <p class="a">{{ cmt.comment }}</p>
                    <a class="delete" v-on:click="showAlertConfirm(cmt.id, index)"
                       v-if="comment.id_user === cmt.users.id">Delete</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "NewsDetail",
        data: function () {
            return {
                newsId: null,
                news: {
                    title: '',
                    content: '',
                    posted_by: '',
                    created_at: '',
                    users: {
                        name: '',
                        id: ''
                    }
                },
                comment: {
                    id: '',
                    id_user: '',
                    id_news: '',
                    comment: '',
                    created_at: '',
                    users: {
                        name: '',
                        id: ''
                    }
                },
                cmts: {
                    id: '',
                },
                datas: [],
                data1: {},
                counter: 0,
            }
        },
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
            axios.get(laroute.route('api.comment.show', {comment: id}))
                .then(function (resp) {
                    app.datas = resp.data;
                })
                .catch(function () {
                    alert("Could not load comment")
                });
        },

        async created() {
            try {
                let id = window.location.href.split('/').pop();
                const res = await axios.get(laroute.route('news.comment', {id: id}));
                this.cmts = res.data;
                this.$data.comment.id = '';
                this.$data.comment.id_news = this.cmts[0].id;
                this.$data.comment.users.name = this.cmts[1].name;
                this.$data.comment.users.id = this.cmts[1].id;
                this.$data.comment.id_user = this.cmts[1].id;
            } catch (e) {
                console.error(e)
            }
        },
        methods: {
            saveForm() {
                event.preventDefault();
                var newComment = this.comment;
                axios.post(laroute.route('api.comment.store'), newComment)
                    .then((resp) => {
                        this.data1 = resp.data;
                        this.comment.id = this.data1.id,
                            this.comment = {
                                id_user: newComment.id_user,
                                id_news: newComment.id_news,
                                users: {
                                    name: newComment.users.name,
                                    id: newComment.users.id,
                                },
                                comment: ''
                            };
                        this.datas.unshift(newComment);
                    })
                    .catch((error) => {
                        console.log(error);
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
                                app.datas.splice(index, 1);
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

    .delete {
        cursor: pointer;
        color: red;
    }

</style>
