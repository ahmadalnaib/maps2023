
 <div class="bg-teal-600 border shadow-md rounded-lg px-4 py-6">
    <div class="flex justify-between items-center">
        <h4 class="text-white font-medium">{{__('admin.Revenue')}}</h4>
        <select name="selectedDays" id="selectedDays" class="border-solid border-2 border-red-500 bg-white" wire:model="selectedDays" wire:change="updateStat">
            <option value="30">30 {{__('admin.days')}}</option>
            <option value="60">60 {{__('admin.days')}}</option>
            <option value="90">90 {{__('admin.days')}}</option>
        </select>
    </div>
    <div class="text-3xl text-white font-bold mt-4">
       {{ (new NumberFormatter('de_DE', NumberFormatter::CURRENCY))->formatCurrency($revenueCount, 'EUR') }}
    </div>
</div>
