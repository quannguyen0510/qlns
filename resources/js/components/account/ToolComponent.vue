<template>
    <div class="toolbar">
        <div class="row">
            <div class="col-sm-2">
                <a v-bind:href="this.createAccount" class="btn btn-info">New Member</a>
                <a v-bind:href="this.roleManager" class="btn btn-warning">Role Manager</a>
            </div>
        </div>
    </div>
</template>
