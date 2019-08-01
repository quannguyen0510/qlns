<template>
    <div>
        <div class="form-group">
            <a v-bind:href="index" class="btn btn-default">Back</a>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">Create new news</div>
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
                        <div :class="['col-xs-12 form-group', errors.content ? 'has-error' : '']">
                            <label class="control-label">Content</label>
                            <textarea rows="3" v-model="news.content" class="form-control"></textarea>
                            <span v-if="errors.content" :class="['label label-danger']">{{ errors.content[0] }}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div :class="['col-xs-12 form-group', errors.posted_by ? 'has-error' : '']">
                            <label class="control-label">Posted by</label>
                            <select v-model="news.posted_by" class="form-control">
                                <option disabled value="">Select poster</option>
                                <option v-for="usr of users" :key="usr.id" v-bind:value="usr.id">{{ usr.name }}
                                    <span v-if="errors.posted_by" :class="['label label-danger']">{{ errors.posted_by[0] }}</span>
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div :class="['col-xs-12 form-group', errors.created_at ? 'has-error' : '']">
                            <label class="control-label">Posted at</label>
                            <input type="date" v-model="news.created_at" class="form-control">
                            <span v-if="errors.created_at"
                                  :class="['label label-danger']">{{ errors.created_at[0] }}</span>
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
        data: function () {
            return {
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
                axios.post(laroute.route('api.news.store'), newNews)
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
                        console.log(response.data.errors);
                    });
            }
        }
    }
</script>
