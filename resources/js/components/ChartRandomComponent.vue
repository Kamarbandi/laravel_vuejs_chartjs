<template>
    <div class="row">
        <div class="col">
            <line-chart :chart-data="data" :height="100" :options="{responsive: true, maintainAspectRatio: true}"></line-chart>
            <button @click="update" class="btn btn-primary btn-sm mh-10">Update</button>
        </div>
    </div>
</template>

<script>
    import LineChart from './LineChart.js'

    export default {
        components: {
            LineChart
        },
        data:function(){
          return {
              data: [],
          }
        },
        mounted() {
            this.update()
        },
        methods:{
            update: function () {
                axios.get('/random-chart').then((response) => {
                    this.data = response.data
                });
            }
        }
    }
</script>
