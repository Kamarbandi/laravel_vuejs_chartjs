<template>
    <div class="row">
        <div class="col">
            <line-chart :chart-data="data" :height="100" :options="{responsive: true, maintainAspectRatio: true}"></line-chart>
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
                axios.get('/data-chart').then((response) => {
                    this.data = response.data
                });
            }
        }
    }
</script>
