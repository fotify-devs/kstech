<div
    x-data="{
        isModalOpen: false,
        phoneNumber: '',
        paymentStatus: '',
        async initiatePayment() {
            if (!this.phoneNumber) {
                this.paymentStatus = 'Please enter a valid Safaricom number';
                return;
            }


            try {
                const response = await $wire.stkPush(this.phoneNumber);
                if (response.ResponseCode === '0') {
                    this.paymentStatus = 'Payment initiated successfully';
                    // Additional logic to handle successful payment
                } else {
                    this.paymentStatus = response.ResponseDescription;
                }
            } catch (error) {
                this.paymentStatus = 'Payment failed. Please try again.';
            }
        }
    }"
    class="p-6 bg-white shadow-md rounded-lg"
>
    @if($student)
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Profile Information</h2>
        <div class="mb-4">
            <strong>Full Name:</strong> {{ $student->first_name }} {{ $student->last_name }}
        </div>
        <div class="mb-4">
            <strong>Email:</strong> {{ $student->email }}
        </div>
        <div class="mb-4">
            <strong>Phone:</strong> {{ $student->phone }}
        </div>
        <div class="mb-4">
            <strong>Course Registered:</strong> {{ $student->course->name }}
        </div>
        <div class="mb-4">
            <strong>Registration Status:</strong> {{ ucfirst($student->status) }}
        </div>
        <div class="mb-4">
            <strong>Registration Number:</strong> {{ $student->registration_number }}
        </div>


        <!-- Mpesa Payment Button -->
        <div class="mt-4">
            <button
                @click="isModalOpen = true"
                class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600"
            >
                Pay Registration Fee (KSh 1)
            </button>
        </div>


        <!-- Mpesa Payment Modal -->
        <div
            x-show="isModalOpen"
            x-cloak
            class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50"
        >
            <div class="bg-white p-6 rounded-lg shadow-xl w-96">
                <h3 class="text-xl font-bold mb-4">Complete Payment</h3>

                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Mpesa Phone Number</label>
                    <input
                        x-model="phoneNumber"
                        type="tel"
                        placeholder="Enter Safaricom Number +2547"
                        class="w-full px-3 py-2 border rounded-md"
                    >
                </div>


                <div class="mb-4">
                    <p class="text-sm text-gray-600">Registration Fee: KSh 1200</p>
                </div>


                <div x-show="paymentStatus" class="mb-4 text-sm"
                     :class="{
                         'text-green-600': paymentStatus.includes('successfully'),
                         'text-red-600': !paymentStatus.includes('successfully')
                     }">
                    <p x-text="paymentStatus"></p>
                </div>


                <div class="flex justify-between">
                    <button
                        @click="initiatePayment()"
                        class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600"
                    >
                        Pay Now
                    </button>
                    <button
                        @click="isModalOpen = false"
                        class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400"
                    >
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    @else
        <p class="text-gray-600">No profile information available. Please register first.</p>
    @endif
</div>
