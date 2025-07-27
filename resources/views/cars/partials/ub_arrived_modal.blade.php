@if($car->status === 'mongolia_border')
<div x-data="{ open: false, rate: 420, total: 0 }">
    <button @click="open = true" class="bg-blue-500 text-white px-3 py-1 rounded">УБ-д ирсэн болгох</button>

    <div x-show="open" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
        <div class="bg-white rounded-xl shadow-lg p-6 w-full max-w-md" @click.away="open = false">
            <h2 class="text-lg font-bold mb-4">Зарах үнэ оруулах</h2>
            <form method="POST" action="{{ route('cars.status', $car) }}">
                @csrf
                <div class="mb-4">
                    <label class="block mb-1 font-medium">Ханш (₮/¥)</label>
                    <input type="number" x-model="rate" step="0.01" @input="calc()" class="w-full border rounded p-2">
                </div>
                <div class="mb-4">
                    <label class="block mb-1 font-medium">Нийт зардал (₮)</label>
                    <input type="text" x-bind:value="total" readonly class="w-full border bg-gray-100 p-2">
                </div>
                <div class="mb-4">
                    <label class="block mb-1 font-medium">Зарах үнэ (₮)</label>
                    <input type="number" name="selling_price_mnt" step="1" class="w-full border rounded p-2" required>
                </div>
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Хадгалах</button>
            </form>
            <button @click="open = false" class="mt-4 text-sm text-gray-600 hover:underline">Хаах</button>
        </div>
    </div>
</div>

<script>
function calc() {
    const purchase = {{ $car->purchase_price_yuan ?? 0 }};
    const transport = {{ $car->transport_cost_yuan ?? 0 }};
    const permit = {{ $car->permit_cost_yuan ?? 0 }};
    const tax = {{ $car->customs_tax_mnt ?? 0 }};
    const rate = document.querySelector('[x-model=rate]').value || 420;
    const total = ((+purchase + +transport + +permit) * +rate) + +tax;
    document.querySelector('[x-bind\\:value=total]').value = Math.round(total);
}
</script>
@endif
