<template>
    <div>
        <div class="form-group">
            <a href="/admin/news" class="btn btn-default">Back</a>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">Create new News</div>
            <div class="panel-body">
                <form v-on:submit="saveForm">
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Title</label>
                            <input type="text" v-model="item.title" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Content</label>
                            <input type="text" v-model="item.content" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Post By</label>
                            <input type="text" v-model="item.posted_by" class="form-control">
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
                item: {
                    title: '',
                    content: '',
                    posted_by: 0,
                }
            }
        },
        methods: {
            saveForm() {
                event.preventDefault();
                var app = this;
                var newNews = app.item;
                axios.post(app.createPost, newNews)
                    .then(function (resp) {
                        window.location = app.indexNews;
                    })
                    .catch(function (resp) {
                        console.log(resp);
                        alert("Could not create your company");
                    });
            }
        }
    }
</script>
