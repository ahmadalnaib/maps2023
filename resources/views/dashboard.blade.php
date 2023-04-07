<x-admin>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
                <div class="my-6">
                    <div>Last Year: {{array_sum($lastYearOrders)}}</div>
                    <div>This Year: {{array_sum($thisYearOrders)}}</div>
                </div>
                <canvas id="myChart"></canvas>
         
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
  const ctx = document.getElementById('myChart');

new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
    datasets: [{
      label: '# Last Year Rentals',
      data: {{Js::from($lastYearOrders)}},
      backgroundColor:'lightgray',
      borderWidth: 1
    },{
      label: '# This Year Rentals',
      data: {{Js::from($thisYearOrders)}},
      backgroundColor:'lightgreen',
      borderWidth: 1
    }
]
  },
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  }
});
    </script>
    @endpush
</x-admin>
