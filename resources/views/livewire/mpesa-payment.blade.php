<div class="max-w-md mx-auto p-6 bg-white shadow-md rounded-lg">
    <h2 class="text-2xl font-bold mb-4">M-Pesa Payment</h2>

    @if($errorMessage)
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            {{ $errorMessage }}
        </div>
    @endif

    @if($successMessage)
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            {{ $successMessage }}
        </div>
    @endif

    <form wire:submit.prevent="initiatePayment">
        <div class="mb-4">
            <label for="phoneNumber" class="block text-gray-700 text-sm font-bold mb-2">
                Phone Number (format: 254XXXXXXXXX)
            </label>
            <input 
                type="tel" 
                id="phoneNumber"
                wire:model="phoneNumber" 
                placeholder="254712345678"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline
                    @error('phoneNumber') border-red-500 @enderror"
            >
            @error('phoneNumber')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="amount" class="block text-gray-700 text-sm font-bold mb-2">
                Amount (KES)
            </label>
            <input 
                type="number" 
                id="amount"
                wire:model="amount" 
                placeholder="Enter amount"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline
                    @error('amount') border-red-500 @enderror"
            >
            @error('amount')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center justify-between">
            <button 
                type="submit" 
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
            >
                Initiate Payment
            </button>
        </div>
    </form>
</div>