<div>
    <input wire:model="name" type="text">
    <button wire:click='submit'> submit</button>
    @if($success)
    <div>saved</div>
    @endif
</div>
