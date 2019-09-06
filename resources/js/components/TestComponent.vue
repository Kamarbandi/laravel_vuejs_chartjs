<template>
    <div class="row">
        <div class="col">
            <table class="table table-dark">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Url</th>
                </tr>
                </thead>

                <tbody>
                <tr v-for="url in urldata">
                    <td>{{url.title}}</td>
                    <td><a target="_blank">{{url.url}}</a></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    export default {
        props:[
            'urldata'
        ],
        mounted() {
            console.log('Component mounted.')
        },
        methods:{
            update: function () {
                console.log(this.urldata);
            }
        }
    }
</script>
