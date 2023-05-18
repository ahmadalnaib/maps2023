<div class="mt-4"
     wire:ignore
     x-data="{
         selectedYear: @entangle('selectedYear'),
         lastYearOrders: @entangle('lastYearOrders'),
         thisYearOrders: @entangle('thisYearOrders'),
         init() {
             const labels = [];
             const data = {
                 labels: labels,
                 datasets: [{
                     label: `${this.selectedYear - 1} Rentals`,
                     backgroundColor: 'lightgray',
                     data: this.lastYearOrders,
                 }, {
                     label: `${this.selectedYear} Rentals`,
                     backgroundColor: 'lightgreen',
                     data: this.thisYearOrders,
                     
                 }]
             };
             const config = {
                 type: 'bar',
                 data: data,
                 options: {}
             };
             const myChart = new Chart(
                 this.$refs.canvas,
                 config
             );
             Livewire.on('updateTheChart', () => {
                 myChart.data.datasets[0].label = `${this.selectedYear - 1} Rentals`;
                 myChart.data.datasets[1].label = `${this.selectedYear} Rentals`;
                 myChart.data.datasets[0].data = this.lastYearOrders;
                 myChart.data.datasets[1].data = this.thisYearOrders;
                 myChart.update();
             })
         }
     }">
    <span>Year:</span>
    <select name="selectedYear" id="selectedYear" class="border-solid border-2 border-red-200" wire:model="selectedYear" wire:change='updateOrdersCount'>
        @foreach ($availableYears as $year)
            <option value="{{$year}}">{{$year}}</option>
        @endforeach
    </select>
    <div class="my-6">
        <div><span x-text="selectedYear - 1"></span> Rentals:  <span x-text="calculateTotalRentals(lastYearOrders)"></span></div>
        <div><span x-text="selectedYear"></span> Rentals:   <span x-text="calculateTotalRentals(thisYearOrders)"></span></div>
    </div>
    
    <canvas id="myChart" x-ref="canvas"></canvas>

    <script>
        function calculateTotalRentals(monthlyOrders) {
            return Object.values(monthlyOrders).reduce((total, count) => total + count, 0);
        }
    </script>
</div>