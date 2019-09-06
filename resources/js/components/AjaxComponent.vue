<template>
    <div class="row">
        <div class="col">
            <button @click="update" class="btn btn-dark mb-1" v-if="!is_refresh">Update - {{id}}...</button>
            <span class="badge badge-primary mb-1" v-if="is_refresh">Updating...</span>
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
        data:function(){
          return {
              urldata: [],
              is_refresh: false,
              id: 0
          }
        },
        mounted() {
            this.update()
        },
        methods:{
            update: function () {
                this.is_refresh = true
                axios.get('/ajax-component').then((response) => {
                    console.log(response);
                    this.urldata = response.data
                    this.is_refresh = false
                    this.id++
                });
            }
        }
    }
</script>
