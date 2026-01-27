<div class="flex flex-col gap-[10px]">
    
    <p>Clicked times: <span class="{{$count>=5000?'red':''}}"> {{$count}}</span></p>
    <div class="flex gap-[10px]">
        <button wire:click="increment" class="border border-[2px] p-[5px]">Povecaj</button>
        <button wire:click="decrement" class="border border-[2px] p-[5px]">Smanji</button>
    </div>
    <p>{{$errorMessage}}</p>
    <input type="number" min="1" wire:blur="validateAmount" wire:model.live.debounce="amount" class="border  border-[2px] max-w-[200px]">
    <p>Amount is: {{$amount}}</p>
    <style>
        .red{color:red}
    </style>
</div>
